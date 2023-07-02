# PHP Forum App

Forum-App is a web application that enables users to participate in online discussions, create topics, and connect with other users in a forum-like environment.

![Preview](https://lh3.googleusercontent.com/pw/AJFCJaUG3y4mJv32J_3AhrgRMrLwyuJRZnpcGoIO8DKQO3dBBe_TkTeS2UXaV7S6y_lwq0-Rf2yCBkHbltVCJ75O6v8mWSau-Ei-xD_411Iu2T9iDoUvgXgRNUxinA2D2iin3N2QhNsB7aQhdFIbr4CaEEzB=w879-h277-s-no)

## Main Objective/s 
The main objective of Forum-App is to provide a user-friendly platform for users to share ideas, exchange knowledge, and engage in meaningful conversations on various topics.

## Sequence Diagram

#### User Interaction
``` mermaid
sequenceDiagram
    participant User
    participant Forum
    participant Database

    User->>Forum: Login
    Forum->>Database: Authenticate User
    Database-->>Forum: User Authenticated
    Forum-->>User: User authenticated
    User->>Forum: View Topics
    Forum->>Database: Fetch Topic List
    Database-->>Forum: List of topics
    Forum-->>User: List of topics
    User->>Forum: View Topic Details
    Forum->>Database: Fetch Topic Details
    Database-->>Forum: Topic details
    Forum-->>User: Topic details
    User->>Forum: Create Topic
    Forum->>Database: Create New Topic
    Database-->>Forum: Topic created
    Forum-->>User: Topic created
    User->>Forum: Add Post
    Forum->>Database: Add New Post
    Database-->>Forum: Post added
    Forum-->>User: Post added
    User->>Forum: Logout
    Forum->>Database: Logout User
    Database-->>Forum: User logged out
    Forum-->>User: User logged out
```

#### Admin's Interaction
```mermaid
sequenceDiagram
    participant Admin
    participant Forum
    participant Database

    Admin->>Forum: Login
    Forum->>Database: Authenticate Admin
    Database-->>Forum: Admin Authenticated
    Forum-->>Admin: Admin authenticated
    Admin->>Forum: View Reports
    Forum->>Database: Fetch Reports
    Database-->>Forum: List of reports
    Forum-->>Admin: List of reports
    Admin->>Forum: View User Activity
    Forum->>Database: Fetch User Activity
    Database-->>Forum: User activity details
    Forum-->>Admin: User activity details
    Admin->>Forum: Delete Topic
    Forum->>Database: Delete Topic
    Database-->>Forum: Topic deleted
    Forum-->>Admin: Topic deleted
    Admin->>Forum: Delete Post
    Forum->>Database: Delete Post
    Database-->>Forum: Post deleted
    Forum-->>Admin: Post deleted
    Admin->>Forum: Ban User
    Forum->>Database: Ban User
    Database-->>Forum: User banned
    Forum-->>Admin: User banned
    Admin->>Forum: Logout
    Forum->>Database: Logout Admin
    Database-->>Forum: Admin logged out
    Forum-->>Admin: Admin logged out
```

## Entity Relationship Diagram
```mermaid
erDiagram
    users ||..o{ topic : creates
    topic ||--o{ post : has

    users {
        int id PK
        string username 
        string password
        string email
        date date
        int replies
        int topics
        int score
        string profile_pic
    }

    topic {
        int id PK
        string topic_name
        string topic_content
        string content_creator
        date date
    }

    post {
        int post_id PK    
        string post_content
        string post_creator
        int post_id FK
        date date
    }

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
