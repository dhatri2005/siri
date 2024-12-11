import pyttsx3
import speech_recognition as sr
import requests
import datetime
import random
import webbrowser
import os
from email.message import EmailMessage
import smtplib


# Class to track operations
class OperationTracker:
    def __init__(self):  # Fixed the typo here
        self.total_operations = 0
        self.successful_operations = 0
    def record_operation(self, success: bool):
        self.total_operations += 1
        if success:
            self.successful_operations += 1

    def calculate_accuracy(self):
        if self.total_operations == 0:
            return 0
        return (self.successful_operations / self.total_operations) * 100


# Initialize recognizer and engine
listener = sr.Recognizer()
engine = pyttsx3.init()


def speak(audio):
    print(f"Speaking: {audio}")  # Debug statement
    engine.say(audio)
    engine.runAndWait()


def take_command():
    """Listen for a voice command and return the recognized text."""
    try:
        with sr.Microphone() as source:
            listener.adjust_for_ambient_noise(source, duration=1)
            print("Listening...")  # Debugging line
            audio = listener.listen(source)
            print("Audio captured, now recognizing...")
            command = listener.recognize_google(audio, language="en-in")
            print(f"You said: {command}")
            return command.lower()
    except sr.UnknownValueError:
        print("Sorry, I didn't catch that. Could you repeat?")
        return None
    except sr.RequestError as e:
        print(f"Request error: {e}")
        return None




def send_email(receiver, subject, message):
    """Send an email to the specified receiver with the given subject and message."""
    try:
        server = smtplib.SMTP('smtp.gmail.com', 587)
        server.starttls()
        # Replace with your email and app-specific password
        server.login('kavyachagamu@gmail.com', '396073Kavya?')
        email = EmailMessage()
        email['From'] = 'kavyachagamu@gmail.com'
        email['To'] = receiver
        email['Subject'] = subject
        email.set_content(message)
        server.send_message(email)
        server.close()
        speak("Email sent successfully!")
    except Exception as e:
        speak("Sorry, I couldn't send the email.")
        print(f"Error: {e}")


def get_email_info():
    """Get details for sending an email and send it."""
    email_list = {
        'ABC': 'dhatrisrimuddada@gmail.com'
    }
    speak("Who do you want to send the email to?")
    name = take_command()
    receiver = email_list.get(name, None)
    if not receiver:
        speak(f"I couldn't find an email address for {name}.")
        return

    speak("What is the subject of the email?")
    subject = take_command()

    speak("What should I say in the email?")
    message = take_command()

    send_email(receiver, subject, message)


def log_results(accuracy):
    """Log accuracy results to a file."""
    with open("operation_accuracy_log.txt", "a") as log_file:
        log_file.write(f"Session ended with accuracy: {accuracy:.2f}%\n")


# Main Program
if __name__ == "__main__":

    tracker = OperationTracker()

    # Check for password to unlock
    for attempt in range(3):
        password = input("Enter Password to unlock assistant: ")
        with open("password.txt", "r") as pw_file:
            correct_password = pw_file.read().strip()
        if password == correct_password:
            print("Welcome! Say 'Wake up' to start.")
            break
        elif attempt == 2:
            print("Maximum attempts reached. Exiting.")
            exit()
        else:
            print("Incorrect password. Try again.")

    while True:
        speak("Say the magical words to unlock me")
        query = take_command()
        if query and "wake up" in query:
            speak("I'm awake! How can I assist you?")
            while True:
                query = take_command()

                if not query:
                    tracker.record_operation(success=False)
                    continue

                tracker.record_operation(success=True)

                if "sleep" in query:
                    speak("Goodbye! Call me anytime.")
                    break

                elif "time" in query:
                    current_time = datetime.datetime.now().strftime("%H:%M")
                    speak(f"The current time is {current_time}")

                elif "search google" in query:
                    speak("What should I search for?")
                    search_query = take_command()
                    if search_query:
                        webbrowser.open(f"https://www.google.com/search?q={search_query}")
                        speak(f"Searching for {search_query}")
                    else:
                        speak("I didn't catch that. Try again.")

                elif "play song" in query:
                    speak("Playing a random song for you.")
                    songs = [
                        "https://www.youtube.com/watch?v=Oextk-If8HQ",
                        "https://www.youtube.com/watch?v=hT_nvWreIhg",
                        "https://www.youtube.com/watch?v=YykjpeuMNEk"
                    ]
                    webbrowser.open(random.choice(songs))

                elif "set alarm" in query:
                    speak("What time should I set the alarm for? Please enter in HH:MM format.")
                    alarm_time = input("Set alarm for (HH:MM): ")
                    with open("alarm.txt", "w") as alarm_file:
                        alarm_file.write(alarm_time)
                    speak(f"Alarm set for {alarm_time}.")

                elif "send email" in query:
                    get_email_info()

                elif "exit" in query:
                    speak("Goodbye! Logging accuracy and exiting.")
                    accuracy = tracker.calculate_accuracy()
                    log_results(accuracy)
                    print(f"Session Accuracy: {accuracy:.2f}%")
                    exit()

                
                