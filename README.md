Daraja API Integration (PHP & MySQL)

This project is a simple implementation of Safaricom's Daraja API using PHP and MySQL for handling MPESA payments. The Daraja API allows you to integrate MPESA payment functionalities, including MPESA Express (STK Push), C2B (Customer to Business), and transaction status checks.

Features:
MPESA Express (STK Push): Initiate a payment request to the user's phone.

C2B Transactions: Handle payments from customers to your business.
Transaction Status: Query the status of a payment using CheckoutRequestID or other parameters.

Prerequisites:
PHP 7.2+ with cURL enabled
MySQL Database
Safaricom Developer account with access to Daraja API credentials

Installation:
1. Clone this repository:
git clone https://github.com/victoromondi/darajaapi
2. Import the SQL file provided to set up your database schema.
3. Configure your Daraja API keys by adding your consumer_key and consumer_secret to the accessToken.php file.
4. Update the database connection details in dbconnection.php with your MySQL credentials.
5. Use index.php to initiate payment requests, and the same file to check transaction statuses.

Usage:
Call the index.php script to initiate payments.
Poll index.php to check transaction status after initiating payment.

License:
This project is licensed under the MIT License.