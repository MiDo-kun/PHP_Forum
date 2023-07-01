# Forum-App

## Project's Description
Forum-App is a web application that enables users to participate in online discussions, create topics, and connect with other users in a forum-like environment.

You can view the live 

## Main Objective/s 
The main objective of Forum-App is to provide a user-friendly platform for users to share ideas, exchange knowledge, and engage in meaningful conversations on various topics.

## Tools Used
  - PHP
  - MySQL
  - HTML/CSS
  - JavaScript

## Project's Workflow 
Users can register an account or log in if they already have one.
Upon logging in, users can access the members' area to view and interact with other users.
Users can create topics, browse existing topics, and post replies.
Users can view profiles of other users to learn more about them.
Users can upload profile pictures to personalize their accounts.
Administrators have additional privileges to manage user accounts and moderate content.
``` mermaid

graph TD
    A[Register / Log In] --> B[Members Area]
    B --> C[Create Topics / Browse Topics]
    C --> D[Post Replies]
    B --> E[View Profiles]
    E --> F[Upload Profile Pictures]
    B --> G[Administrator Privileges]
    G --> C

  ```
## Quick Installation
To quickly install and set up the Forum-App project, follow these steps:

  1. Clone the project repository: git clone <repository-url>
  2. Set up a web server (e.g., Apache) with PHP and MySQL support.
  3. Create a MySQL database and import the provided SQL file.
  4. Update the database connection details in the connect.php file.
  5. Configure the server to point to the project directory.
  6. Access the Forum-App in a web browser.

## Contributing
If you would like to contribute, please follow these guidelines:

  1. Fork the repository and create a new branch.
  2. Make your changes and ensure they are well-documented and tested.
  3. Submit a pull request explaining the changes you have made.

License
This project is licensed under the MIT License. See the LICENSE file for more details.
