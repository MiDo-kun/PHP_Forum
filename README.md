# PHP Forum App

## Project's Description
Forum-App is a web application that enables users to participate in online discussions, create topics, and connect with other users in a forum-like environment.

## Main Objective/s 
The main objective of Forum-App is to provide a user-friendly platform for users to share ideas, exchange knowledge, and engage in meaningful conversations on various topics.

![Preview](https://lh3.googleusercontent.com/pw/AJFCJaUG3y4mJv32J_3AhrgRMrLwyuJRZnpcGoIO8DKQO3dBBe_TkTeS2UXaV7S6y_lwq0-Rf2yCBkHbltVCJ75O6v8mWSau-Ei-xD_411Iu2T9iDoUvgXgRNUxinA2D2iin3N2QhNsB7aQhdFIbr4CaEEzB=w879-h277-s-no)

You can view the live web page [here]().
## Project's Workflow 
- Users can still log in or register as new users.
- After successful login, users are authenticated and redirected to the dashboard.
- From the dashboard, regular users can perform actions such as creating topics, posting replies, and editing their profile.
- Administrators, indicated by the "Admin" condition, have additional privileges.
- Authenticated administrators are directed to the admin dashboard, where they can perform various administrative tasks.
- The admin dashboard allows administrators to manage users, topics, and posts.

``` mermaid
graph TD;
    A[User] --> B(Login);
    A --> C(Register);
    B --> D{Authenticated};
    D --> E(Dashboard);
    E --> F{Create Topic};
    F --> G(Create Post);
    G --> F;
    E --> H(View Topic);
    H --> I{Post Reply};
    I --> H;
    E --> J(Edit Profile);
    J --> E;
    E --> K(Logout);
    D --> L{Admin};
    L --> M(Admin Dashboard);
    M --> N{Manage Users};
    M --> O{Manage Topics};
    M --> P{Manage Posts};
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
