# PHP Login-System
complete Login System using PHP Prepared statements

## Implementing User Authentication Mechanism
User authentication is very common in modern web application. It is a security mechanism that is used to restrict unauthorized access to member-only areas and tools on a site.
This project is comprised of two parts: in the first part we'll create a user registration form, and in the second part we'll create a login form, as well as a welcome page and a logout script.

### Building the Registration System
In this section we'll build a registration system that allows users to create a new account by filling out a web form. But, first we need to create a table that will hold all the user data.

### Building the Login System
In this section we'll create a login form where user can enter their username and password. When user submit the form these inputs will be verified against the credentials stored in the database, if the username and password match, the user is authorized and granted access to the site, otherwise the login attempt will be rejected.

## Built With

* [HTML3](http://html5doctor.com/) - The web framework used
* [XAMPP](https://www.apachefriends.org/index.html) - Apache web server
* [PHP] - Hypertext Preprocessor
* [SQL] - SQL / PDO
* [CSS3] - Cascading style sheets
* [PDO] - PHP Data Objects

## Advantages of using PDO

MySQL: This was the main extension that was designed to help PHP applications send and receive data from MySQL database. However, use of MySQL has been deprecated and removed as of PHP 7 and its newer versions. This is why it is not recommended for new projects, and that’s the reason why MySQLi and PDO extensions are used more nowadays.
The main advantage of using PDO is that it supports, and provides a uniform method of access to 11 different databases.
Using PDO is that it makes switching the project to another database simpler. Therefore, the only thing to do is to change the connection string and those queries that will not be supported by the new database.
In case of PDO, a new PDO object must be created.

### Pre-requisites

* [XAMPP](https://www.apachefriends.org/index.html) - Apache web server
* [VS Code] Visual Studio Code editor

## Author

* **Joshhortt**
