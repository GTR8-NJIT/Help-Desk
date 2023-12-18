IT610- Final Project

# Helpdesk Ticketing System with Docker
This code is designed to create a container image for a Helpdesk Ticketing system that can store user details and ticket information. It will use a MySQL database image from Docker Hub to accomplish this. The image will also include user login functionality and a PHP web application that can display all logged-in tickets. The goal is to make this image accessible to anyone who needs a simple helpdesk ticketing system.

## Getting Started
1. Install Docker: [Docker Installation Guide](https://docs.docker.com/get-docker/)
2. Clone this repository: `git clone https://github.com/GTR8-NJIT/Help-Desk-Ticketing-System.git](https://github.com/GTR8-NJIT/NJ610-Final.git)`
3. Navigate to the project directory: `cd Help_Desk`
4. Start the Docker containers: `docker-compose up -d`

## Usage
- Access the application in your web browser: `http://localhost`
- Login using your credentials to manage tickets.

### Default Database Credentials
$servername = "mysql";
$username = "helpdesk_user";
$password = "helpdesk_password";
$dbname = "helpdesk_db";

### Sample User Data Credentials 
Username: user1 and Password: password1;
Username: user2 and Password: password2;
Username: user3 and Password: password3

## Notes

- Ensure Docker is running before starting the containers.
- Customize the PHP application for your specific use case.
