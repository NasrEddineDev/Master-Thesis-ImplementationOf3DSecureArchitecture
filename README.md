# Implementation Of 3D Secure Architecture
## Contents:
 1) [Motivation](#1\)-Motivation:)
 2) [Folders description]()
 3) [About this project]()
 4) [My dev environment]()
 5) [Web Apps developped]()
 6) [Deployment]()

## 1) Motivation:
This is our master thesis project in [University of Ibn Khaldoun TIARET](http://www.univ-tiaret.dz/an/). The present projects and documents (please take a look to this document: [Master thesis repport](master%20thesis%20docs/Master%20Thesis%203D%20Secure%20Architecture.pdf)) aims to describe how to implement the 3D secure protocol according to the EMV standard and adapt it for the ecommerce market in Algeria, and also how to make the double authentication using SMS and email via one-time password (OTP), or other mechanisms.
To implement 3D Secure protcol, we have developed 5 web applications witch are: Hanouti ecommerce, payment gateway, interoperability domain, Issuer domain(bank), acquirer domain(bank). We have used Laravel and JQuery framework and many others open source tools to develop these web apps and to implement this architecture.
## 2) Folders description:
* **master thesis docs:** this folder contains report and slidshow of this thesis
* **figures:** contains figures used in this thsis
* **source codes of web apps:** contains source codes of the fifth web apps
* **books:** contains few usefull books
* **images:** contains logo, ...
* **screenshots:** according to the given name, this folder contains screeshots of differents web applications
## 3) About this project: (introduction from our thesis)
Until these days, for many hundreds of years or since the existence of the human being, people were shopping and sometimes traveled to do this to improve their lifestyles. Nowadays, fewer and fewer consumers want to travel to shop, through the Internet these consumers can do all their shopping without leaving their homes. This type of shopping is called e-commerce.
E-Commerce is becoming a useful service for consumers, but it is also an important component in the daily activities of merchants. It allows them to contact their customers and suppliers, advertise and even organize efficiently the invoicing and the distribution of their products and services. In addition, it reduces the operating and support costs of the business. However, the lack of security in web-based transactions and the ease with which the privacy of online communications can be violated are the main stumbling blocks of e-commerce.

Merchant online shop websites provide an easy target for attackers because they typically have limited funds and do not have dedicated personnel to monitor, update and defend their systems.  The attacks on businesses continue to rise each year. The challenge is to successfully integrate effective security measures and mechanisms to protect the business from being compromised by attackers. Effective security is important for the continuity of business, trust of clients, and compliance with industry-specific laws and regulations. One breach in security can cost a business a lot of money, even shut it down.
There are a lot of E-commerce security strategies and mechanisms, one of them is 3D Secure protocol. Which is a messaging protocol developed by EMVCo to enable consumers to authenticate themselves with their card issuer when making card-not-present (CNP) e-commerce purchases. The additional security layer helps prevent unauthorized CNP transactions and protects the merchant from CNP exposure to fraud. The three domains consist of the merchant/acquirer domain, customer/issuer domain, and the interoperability domain.

The documents of this project aims to describe how to implement the 3D secure protocol according to the EMV standard and adapt it for the ecommerce market in Algeria, and also how to make the double authentication using SMS and email via one-time password (OTP), or other mechanisms.

This document is divided into three main sections. The first section gives an overview of ecommerce and E-payment security (the state of the art), this section is organized as follows: the first chapter begins by a history of Ecommerce, following this by its types, its characteristics, and finally its pros and cons. In the second chapter we will show the security services or requirements, the different security models for E-payment using cards, the most famous protocols used in online shopping, and a detailed study of 3D Secure System and a summary of two alternatives that implement 3D Secure scheme.
The second section examines 3D Secure protocol components and messages, a general activity diagram of the protocol is outlined in this section, a detailed and explained steps of this protocol, and finally we will show the 3D Secure pseudocode.
In the last section, we have described our environment including hardware and software tools used, and we have analyzed and presented the different diagrams used to develop the three web applications for banks1, payment gateway, and merchant online shop. After that, we will present source code developed to implement our protocol, and by making a real demonstration, we have obtained comprehensive results proving our implementation.
## 4) My dev environment:
These are my laptops used to develop this project:
![Architecture of 3D Secure implementation](images/my%20environment/IMG_20201021_035216.jpg?raw=true "Title")
### a. Hardware

Table 01 Characteristics of physical and virtual machines.

![Table 01 Characteristics of physical and virtual machines](figures/Table%20of%20Characteristics%20of%20physical%20and%20virtual%20machines.png?raw=true "Title")

Architecture of 3D Secure implementation
![Architecture of 3D Secure implementation](figures/3D%20Secure%20Components.png?raw=true "Title")
### b. Software
We will present here the different tools that we have working with. All our services are most often created using free tools and open source technologies.
* **Laravel**
Is an open-source web application development framework written in PHP. It is created by
Taylor Otwell and released under MIT License. And it offers you rapid application
development following the model-view-controller (MVC) architectural pattern. Laravel is a
framework which makes it easier for you to build professional yet powerful web applications
following much expressive, elegant syntax and architectural pattern.
* **Other tools**
We have also used: PHP as a server scripting language, and Linux Ubuntu as OS, and other tools like: phpMyAdmin, MySQL,Bootstrap, WampServer, Composer, Apache, Visual Studio Code (vsc), VirtualBox, Draw.io, HTML, CSS, JQuery, XML, SSL, RestAPI, JSON.
## 5) Web Apps developped
### 1. Hanouti ecommerce.
To verify our implementation of 3D Secure protocol, we have developed this ecommerce website to make online shopping and it allows to their consumers to buy goods or services from a seller (Merchant) over the Internet using a web browser. The source code is in [Master thesis repport](source%20codes%20of%20web%20apps/hanouti).
### 2. Payment gateway.
To simulate a payment gateway, we have developed this web app, it allaws to us to verify the cardholder information, to send verification code, and to validate this code with the issuer domain. The source code is in [Master thesis repport](source%20codes%20of%20web%20apps/interoperability_domain).
### 3. Interoperability domain.
To simulate an interoperability domain, we have developed this web app to forward messages between issuer and acquirer domains. The source code is in [Master thesis repport](source%20codes%20of%20web%20apps/interoperability_domain).
### 4. Issuer domain(bank).
To simulate an issuer bank, we have developed this web app to create customers, accounts, cards, transactions, account types, users….etc., please take a look to [Master thesis repport](master%20thesis%20docs/Master%20Thesis%203D%20Secure%20Architecture.pdf) whre we have explained it in brief by showing use cases, sequence diagram, class diagram, functionalities list.
To get the source code, contact me!.
### 5. Acquirer domain(bank)
To simulate an issuer bank, we have developed this web app to create customers, accounts, cards, transactions, account types, users….etc., please take a look to [Master thesis repport](master%20thesis%20docs/Master%20Thesis%203D%20Secure%20Architecture.pdf) whre we have explained it in brief by showing use cases, sequence diagram, class diagram, functionalities list.
To get the source code, contact me!.

## 6) Deployment
To install the fifth Web apps, follow these steps for each web app:
1. Install the dependencies with Composer
```
# cd in your project directory
composer install
composer dumpautoload -o
```
2. Database configuration
* config/app.php
```
# cd in your config/app.php file
'env' => env('APP_ENV', 'production'),
# Debug mode
'debug' => env('APP_DEBUG', false),
# URL
'url' => env('APP_URL', 'http://localhost'),
....
```
* environment file
```
# cd in your .env file
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laracom
DB_USERNAME=nasreddine
DB_PASSWORD=*********
```
3. Email configuration
```
# cd in your .env file
MAIL_DRIVER=smtp
MAIL_HOST=smtp.googlemail.com
MAIL_PORT=465
MAIL_USERNAME=hanouti*******@gmail.com
MAIL_PASSWORD=*********
MAIL_ENCRYPTION=ssl
MAIL_FROM_ADDRESS=hanouti*******@gmail.com
MAIL_FROM_NAME="${APP_NAME}"
```
4. migrate and seed your database
```
# cd in your project directory
php artisan migrate --seed
```
4. Generate the key for your environment file
```
# cd in your project directory
php artisan key:generate
```
6. Finish by clearing the config and generate the cache
```
php artisan config:clear
php artisan config:cache
```
7. Start the ecommerce web site, and if you wish! you can start the other web apps. 
I hope you have an enjoyable time in our beautiful web apps!!
```
php artisan serve
```

