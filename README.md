# Interview Technical Round Question
You need to complete the below mentioned task within 24 hours and share the task back to us using Gitbub public link, Google drive shareable link, Wetransfer, Sendgb.
 
Create Table using below query.

    CREATE TABLE users ( id INT AUTO_INCREMENT PRIMARY KEY,
 
        name VARCHAR(255) NOT NULL,
 
        email VARCHAR(255) NOT NULL UNIQUE,
 
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP);
 
1. Task : creating a PHP script that:
 
    1.Connects to the database securely.
 
    2.Inserts a new user record.
 
    3.Retrieves and displays a list of users.
 
    4.Updates the information of an existing user.
 
    5.Deletes a user record
 
2. Task : create a PHP script that handles user authentication for a simple web application (implemented with above pages).
 
The script should include the following features:
 
    1.User registration with fields like username, email, and password.
 
    2.Password storage in the database.
 
    3.User login functionality with appropriate session management.
 
    4.A "Forgot Password" feature that allows users to reset their passwords via email (Consider email OTP as static 1111).
 
    5.Access control to certain pages or features for authenticated users only.
 
3. Task : Building a PHP script that serves as a simple API endpoint for managing a collection of products(Create database for this as you want).
 
The API should support:
 
   1.Retrieving a list of items.
 
    2.Retrieving details of a specific item.
 
    3.Adding a new item.
 
    4.Updating an existing item.
 
    5.Deleting an item.
# My Work Done on this Question
I have tried to make the every action of the page very simple to understand. Therefore i have not used the MVC model.
