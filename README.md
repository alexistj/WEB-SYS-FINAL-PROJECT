# WEB-SYS-FINAL-PROJECT: Living Your Best Life

## Abstract
After young adults grow out of the foster system, there are not many resources provided for them to receive an education or proper job training. With limited options, these young adults are at a disadvantage career and income-wise. To assist people coming out of foster care, we propose to create a website that connects them with mentors from various career fields, scholarship resources, and certification/training. The mentors’ goal would be to assist students in finding resources, guide them towards a career path, and give the young adults advice for them to reach their goals.

## Intro
The significance of this project is to assist young adults leaving the foster care systems with providing them resources such as scholarships, trade training, and connection with mentors for various fields. The website will consist of a home page, login/sign-in using php, resource pages for scholarships, jobs, etc., gathered from databases and personal pages for the young adult and mentor. Using php, we will create a simple messenger page for mentors and mentees to chat. By the end of this project period, we hope to have a simple version of each feature.

## Project Goals
To provide a user-friendly interface
Help disadvantaged youth maintain professional relationships
Aid mentees in obtaining resources for secondary school or career options such as the military 

## Stakeholders
Young adults from foster system- These people are about to age out if the foster system is looking for guidance for career choices or life choices. Site is valuable to them because it connects them with resources and mentors.

## Technologies
* HTML5
* CSS
* PHP
* MySQL
* XAMPP

## User Interface Instructions:
1. To run site, a MySQL database must be created in phpMyAdmin 
2. From main page select a new database from the side branch. Database type should be utf8_general_ci. The database will be called Members. 
3. After the database is created, import the SQL files, located in the SQL folder, by going to the import tab, browse to the SQL file and leave the character set to the default utf-8, then press go.
4. To run site with php pages, the XAMPP application is needed. To download XAMPP visit: https://www.apachefriends.org/download.html
5. From there travel to the Apache conf file by right clicking config, then browse Apache following this path: C:\xampp\apache\conf\extra
6. Once in the folder continue to httpd-vhost, opening the file with a text editor. Once in, a virtual host can be created. Example:
```
<VirtualHost *:80>
    DocumentRoot /xampp/htdocs/WEB-SYS-FINAL-PROJECT/index.php"
    ServerName LYBL
    <Directory "/xampp/htdocs/WEB-SYS-FINAL-PROJECT/index.php>
	Require all granted
    </Directory>
</VirtualHost>

*Note: If you serve your file outside the htdocs of XAMPP, an absolute path in the local directory will be need to put in the directory and document root of the virtual host. Example of absolute directory path: C:\Users\username\folder\WEB-SYS-FINAL-PROJECT\index.php
```
7. After creating a virtual host, in the local machine go to the host files, after opening a text editor as an admin. Location of host file varies from machine.
   * Windows: `C:\Windows\System32\drivers\etc`
   * Instructions for MAC: https://www.imore.com/how-edit-your-macs-hosts-file-and-why-you-would-want
8. In file, use an IP address, then create a server using the same name used in the virtual host file, and save.
9. Run Apache and MySQL from XAMPP and access the website from the server name.
10. To access the web pages on a browser, type in the server name,LYBL, in the top bar. 

## Site pages 

After landing on the homepage, the user will see a slideshow with images revolving around career and education as well as the website's purpose. The website uses javascript and jQuery to move the slideshow, and the CSS and font are imported from a class package.


On the top of the webpage, there is a tab for login and register. When a person selects to create an account and submits, using PHP and SQL, a query will be made, first, check to see if the email is used or not in the member's table.If the 2 password entries match and the entries are valid, the user is entered into the database as a member and depending if they registered as a mentee or mentor entered into the corresponding table. Javascript is used to check if all boxes have been filled. All passwords are hashed to improve security.

In the login tab, the user will enter their email and password. If their information is found in the database, then their profile page will load else an error will be returned. The login does a query that first searches for the email, the uses a verify command to compare the hashed password with the given password. After successfully a login, a session will start, and save the username and ID until the session is terminated by logout.

On the profile page, the user will see the information they registered such as name, location, age, etc. This is displayed using SQL query in PHP finding the information from the ID in session. On the users, on the first login, the image box will be empty. The user has the option to enter a profile image which uses a form, and once submitted the picture location will be saved into the mentor/mentee table, then when the user's page is loaded the photo will appear. 


On the profile page, there are links to enter the scholarship page which uses JSON and AJAX to display manually entered scholarships, with the application due date, link to the page, description, and scholarship style.

Another page accessed from the profile page is the mentor/mentee page. The result of the page is dependent on what the user is logged in as, for example, if the user is a mentee the page list all mentors available to them as well as there contact email, which can be used in the final page, the messenger.

From the messenger page the user can enter the email of the addressee submit the form, then PHP is used to input the message in the messenger database, and then the message sent is displayed as well as the messages sent in between the two users.



