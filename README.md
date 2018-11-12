# WEB-SYS-FINAL-PROJECT

######Living Your Best Life#########

Abstract:  After young adults grow out of the foster system, there are not many resources provided for them to receive an education or proper job training. With limited options, these young adults are at a disadvantage career and income-wise. To assist people coming out of foster care, we propose to create a website that connects them with mentors from various career fields, scholarship resources, and certification/training. The mentors’ goal would be to assist students in finding resources, guide them towards a career path, and give the young adults advice for them to reach their goals.

Intro: 
	The significance of this project is to assist young adults leaving the foster care systems with providing them resources such as scholarships, trade training, and connection with mentors for various fields. The website will consist of a home page, login/sign-in using php, resource pages for scholarships, jobs, etc., gathered from databases and personal pages for the young adult and mentor. Using php, we will create a simple messenger page for mentors and mentees to chat. By the end of this project period, we hope to have a simple version of each feature.

Project Goals:
To provide a user-friendly interface
Help disadvantaged youth maintain professional relationships
Aid mentees in obtaining resources for secondary school or career options such as the military 

Stakeholders:

Young adults from foster system- These people are about to age out if the foster system is looking for guidance for career choices or life choices. Site is valuable to them because it connects them with resources and mentors.

Technologies: HTML5,CSS,PHP,MySQL, XAMPP

To run site, a MySQL database must be created in phpMyAdmin 

User Interface Instructions:
From main page select a new database from the side branch.

Database type: utf8_general_ci

The data base will be called Members. 

After the database is created, import the SQL files, located in the SQL folder, by going to the import tab, browse to the SQL file and leave the character set to the default utf-8, then press go.

To run site with php pages, the XAMPP application is needed. 

To download XAMPP visit: https://www.apachefriends.org/download.html

From there travel to the Apache conf file by right clicking config, then browse Apache following this path: C:\xampp\apache\conf\extra

Once in the folder continue to httpd-vhost, opening the file with a text editor. Once in, a virtual host can be created.

Example:

<VirtualHost *:80>
    DocumentRoot /xampp/htdocs/WEB-SYS-FINAL-PROJECT/index.php"
    ServerName LYBL
    <Directory "/xampp/htdocs/WEB-SYS-FINAL-PROJECT/index.php>
	Require all granted
    </Directory>
</VirtualHost>

*Note: If you serve your file outside the htdocs of XAMPP, an absolute path in the local directory will be need to put in the directory and document root of the virtual host. Example of absolute directory path: C:\Users\username\folder\WEB-SYS-FINAL-PROJECT\index.php

After creating a virtual host, in the local machine go to the host files, after opening a text editor as an admin. *Location of host file varies from machine.

Windows: C:\Windows\System32\drivers\etc
Instructions for MAC: https://www.imore.com/how-edit-your-macs-hosts-file-and-why-you-would-want

In file, use an IP address, then create a server using the same name used in the virtual host file, and save.

Run Apache and MySQL from XAMPP and access the website from the server name. 


