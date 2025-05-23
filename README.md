# Project Guide

## Name
    Clients Documents Manager

## Description
    Clients Docs Manager is a document manager website/webapp that lets an organization manage (save, locate & delete) records/files of their clients easier and faster, in order to reduce unnecessary stress and extreme time consumption in finding these files.

## Technologies
### Languages
    HTML5,
    CSS3,
    JavaScript,
    PHP,
    MySQL

### Frameworks
#### Frontend
    AngularJS & Bootstrap 5

## Guide
### Step 1
    Create a database called office in your MySQL server.

### Step 2
    Update MySQL server connection code in '.config/conn.php', change the following variables:

        $server ($server -> servername)

        $user ($user -> username)

        $pwd ($pwd -> password)
        
    to your own existing credentials.

### Step 3
    Create a table called 'Customers' with the following details:
    CREATE TABLE Customers (
        ID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        Title VARCHAR(255) NOT NULL,
        FullName VARCHAR(255) NOT NULL,
        File VARCHAR(255) NOT NULL,
        PostedBy VARCHAR(255) NOT NULL,
        Created_On TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )

### Step 4
    Create another table called 'Staff' with the following details:
    CREATE TABLE Staff (
        ID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        FullName VARCHAR(40) NOT NULL,
        Email VARCHAR(255) NOT NULL,
        MobileNo VARCHAR(255) NOT NULL,
        Avatar VARCHAR(255) NOT NULL,
        PWD VARCHAR(255) NOT NULL,
        Reg_Date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )

### Step 5
    Update the package/app data in includes/page.php.
    (This file is for setting and extract data into all other pages. pages.) 

## Notes
### 1.
    Use 'base()' function in PHP to include any file or folder from the project's root.
    base() & baseUrl() were created to help import any file from the project's root without using '../', but when you start encountering issues, especially when working with functions within the files you wanna include, using the normal include() and require(). Also make sure to inlucde base.php in all your pages that would require base(), baseUrl() & NotFound() functions.
    For safety purposes, only use them to include files that you did not create any php functions in.

### 2.
    Use 'baseUrl($url)' function to return a $url from the project root's directory.

### 3.
    To create a new page without revealing index.php in the url, create an index.php for that folder. E,g:

    To make this url function: https://www.yourproject.com/clients/records
    Instead of: https://www.yourproject.com/clients/records.php,
    create a records folder inside clients, then add an index.php file to the records folder. Whatever should come out in index.php will display when you visit: https://www.yourproject.com/clients/records

    Same rule also applies to clients folder and every other folder in your project..

### 4.
    Use the 'NotFound()' function to goto NotFound/Error 404 page. This page is also customizable and located in the root of the project.

## Finally
    Enjoy! :)