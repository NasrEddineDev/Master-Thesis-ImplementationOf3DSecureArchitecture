# Implementation Of 3D Secure Architecture
## Contents:

## 1) Motivation:
This is our master thesis project in [University of Ibn Khaldoun TIARET](http://www.univ-tiaret.dz/an/). The present projects and documents (please take a look to this document: [Master thesis repport](master%20thesis%20docs/Master%20Thesis%203D%20Secure%20Architecture.pdf)) aims to describe how to implement the 3D secure protocol according to the EMV standard and adapt it for the ecommerce market in Algeria, and also how to make the double authentication using SMS and email via one-time password (OTP), or other mechanisms.
To implement 3D Secure protcol, we have developed 5 web applications witch are: Hanouti ecommerce, payment gateway, interoperability domain, Issuer domain(bank), acquirer domain(bank). We have used Laravel and JQuery framework and many others open source tools to develop these web apps and to implement this architecture.
## 2) Folders description:
master thesis docs: this folder contains report and slidshow of this thesis
figures: contains figures used in this thsis
source codes of web apps: contains source codes of the fifth web apps
books: contains few usefull books
images: contains logo, ...
screenshots: according to the given name, this folder contains screeshots of differents web applications
## 2) Introduction: (from our thesis)
Until these days, for many hundreds of years or since the existence of the human being, people were shopping and sometimes traveled to do this to improve their lifestyles. Nowadays, fewer and fewer consumers want to travel to shop, through the Internet these consumers can do all their shopping without leaving their homes. This type of shopping is called e-commerce.
E-Commerce is becoming a useful service for consumers, but it is also an important component in the daily activities of merchants. It allows them to contact their customers and suppliers, advertise and even organize efficiently the invoicing and the distribution of their products and services. In addition, it reduces the operating and support costs of the business. However, the lack of security in web-based transactions and the ease with which the privacy of online communications can be violated are the main stumbling blocks of e-commerce.
Merchant online shop websites provide an easy target for attackers because they typically have limited funds and do not have dedicated personnel to monitor, update and defend their systems.  The attacks on businesses continue to rise each year. The challenge is to successfully integrate effective security measures and mechanisms to protect the business from being compromised by attackers. Effective security is important for the continuity of business, trust of clients, and compliance with industry-specific laws and regulations. One breach in security can cost a business a lot of money, even shut it down.
There are a lot of E-commerce security strategies and mechanisms, one of them is 3D Secure protocol. Which is a messaging protocol developed by EMVCo to enable consumers to authenticate themselves with their card issuer when making card-not-present (CNP) e-commerce purchases. The additional security layer helps prevent unauthorized CNP transactions and protects the merchant from CNP exposure to fraud. The three domains consist of the merchant/acquirer domain, customer/issuer domain, and the interoperability domain.
The documents of this project aims to describe how to implement the 3D secure protocol according to the EMV standard and adapt it for the ecommerce market in Algeria, and also how to make the double authentication using SMS and email via one-time password (OTP), or other mechanisms.
This document is divided into three main sections. The first section gives an overview of ecommerce and E-payment security (the state of the art), this section is organized as follows: the first chapter begins by a history of Ecommerce, following this by its types, its characteristics, and finally its pros and cons. In the second chapter we will show the security services or requirements, the different security models for E-payment using cards, the most famous protocols used in online shopping, and a detailed study of 3D Secure System and a summary of two alternatives that implement 3D Secure scheme.
The second section examines 3D Secure protocol components and messages, a general activity diagram of the protocol is outlined in this section, a detailed and explained steps of this protocol, and finally we will show the 3D Secure pseudocode.
In the last section, we have described our environment including hardware and software tools used, and we have analyzed and presented the different diagrams used to develop the three web applications for banks1, payment gateway, and merchant online shop. After that, we will present source code developed to implement our protocol, and by making a real demonstration, we have obtained comprehensive results proving our implementation.
## ) My dev environment:
### a. Hardware

### b. Software


## ) Apps developped


Architecture of 3D Secure implementation
![alt text](https://raw.githubusercontent.com/NasrEddineDev/Master-Thesis-ImplementationOf3DSecureArchitecture/figures/hardware%20architecture.png)

## ) Islamic banks!:

  We would like to note that all current banking systems in Algeria are illegal in islamic ruls (sharia or Fiqh), because they contain Riba (interest or usury), Gharar (uncertainty) and may be Maysir (gambling), and others in its transactions. These three elements are prohibited by :
1. The Holy Quran, please take a look to : 
   - Riba: Al-Rum, 30:39; Al-Nisa, 4:161; Ali-Imran, 3:130 and Al-Bakarah, 2:275-281.
   - El gharar: Al-Bakarah, 2:188; Al- Nisa, 4:29.
   - Gambling: Al- Bakarah, 2:219 and Al-Maidah, 5:93.
2. The sunnah or Elhadith of Prophet Muhammad (PBUH): 
   * Riba: 'Abdullah (b. Mas'ud) (Allah be pleased with him) said that Allah's Messenger (ﷺ) cursed the one who accepted interest and the one who paid it I asked about the one who recorded it, and two witnesses to it. He (the narrator) said: We narrate what we have heard [Sahih Muslim 1513].
   * El gharar: Abu Huraira (Allah be pleased with him) reported that Allah's Messenger (ﷺ) forbade a transaction determined by throwing stones, and the type which involves some uncertainty [Sahih Muslim 1513].
   * Gambling: Abu Huraira reported Allah's Messenger (ﷺ) as saying: He who takes an oath in the course of which he says: By Lat (and al-'Uzza), he should say: There is no god but Allah; and that if anyone says to his friend:" Come and I will gamble with you," he should pay sadaqa [Sahih Muslim 1647].
   
  We would like also to note that the Prohibition of Riba (interest or usury), Gharar (uncertainty) and Maysir (gambling) are the important principles -especially the Riba- of Islamic banking and they allow to differentiate it from conventional banking systems. 'Presence of these elements in financial transactions lead to many problems, among them: excessive debt, negative growth, speculation, and create large difference between the wealthy and needy. This is against the principles of Islam; hence, there is a strict prohibition to protect the society from the impact of instability, unemployment, inflation, and it promotes economic efficiency and social justice. The economic rationale behind eliminating Riba (interest or usury) is to establish a banking system based on the value of justice, social responsibility, equality, stability and growth.' The Islamic banking system encourages risk and return sharing amongst the investor and entrepreneur to share equitable returns based on capital proportion and the services offered. It promotes the theme ‘Banking for everyone’, whereby there is no discrimination in offering banking services to people of different social standings. The objective is to minimize the gap between rich and poor and to establish socio-economic justice and to achieve other ethical and religious goals.
   
  For more information about Islamic banks and Riba, please take a deep look to these books and reports: “Ettamhid”which is an explanation of mowata Imam Malek, “Prohibition of Riba and Gharar in Islamic Banking”, and Principles of Islamic Finance: Prohibition of Riba, Gharar and Maysir.
