# Gaming Gear Web Application

**Author**: Luke Fixari  
**Date of Submission**: 25 April 2025  
**Course Name**: Web Technologies
**Instructor's Name**: Shawna Sumemrs
**Semester**: Spring 2025

## Project Overview

This is a web application built for the **Gaming Gear Rental** service. It allows users to browse gaming gear products, add them to their cart, and place an order. The web app features user authentication, product management, and order processing. The back-end interacts with a MySQL database, where product details and user orders are stored and retrieved.

## Setup Instructions

1. **Download .zip File**:
     - Go to the repositroy where it says "Code" and click the down arrow then click download ZIP
     
2. **Install Dependencies**:
   - Ensure you have a local server (e.g., XAMPP or WAMP) to run PHP and MySQL.
   
3. **Create Database**:
   - Import the provided `.sql` file into your MySQL database to set up the necessary tables for users, products, and orders.
   
4. **Configure Database**:
   - Update the database connection in `includes/config.php` with your MySQL username, password, and database name (if needed).
   
5. **Put .zip File into htdocs folder**:
   - Move the .zip file into the htdocs folder in the XAMPP application folder

6. **Turn on XAMPP servers**:
    - Make sure all of the servers are running

7. **Put URL into the link slot**:
    - type localhost/GameGear/Online-GamingGear-main/index.php



## Description

The **Gaming Gear** web application is designed to provide users with an easy and intuitive platform to buy (fake) gaming gear. Users can browse through a catalog of available gaming gear, such as controllers and headsets, view their prices, and add them to their cart. They can then log in (or register if they are new users), proceed to checkout, and place their order. The application is integrated with a database where product details, user information, and orders are stored and retrieved.

This web application provides a user-friendly interface for managing products, viewing shopping carts, and processing orders. It also features an authentication system for secure login and registration.

## Application Functionality

- **User Registration & Login**: Users can create an account or log in to access personalized features like viewing their cart and making orders.
- **Product Management**: Users can browse available products and add them to their shopping cart. The cart updates in real-time when items are added or removed.
- **Order Processing**: After users finalize their cart, they can proceed to checkout. The app inserts the order details into the `orders` table in the database, ensuring proper transaction tracking.
- **Cart Management**: Users can adjust the quantities of items in their cart and remove items before placing an order.

## Technologies Used

- **HTML**: Structure and content of the web pages.
- **CSS**: Styling the web pages for a clean and user-friendly design.
- **Bootstrap**: Responsive design framework to ensure the app is mobile-friendly.
- **JavaScript**: Client-side functionality for dynamic updates (e.g., updating cart quantities).
- **PHP**: Server-side scripting for handling user authentication, product management, and order processing.
- **MySQL**: Database management system to store products, users, and orders.
- **SQL**: Queries to interact with the database and retrieve product and order data.
  
## Target Audience

This application is designed for users who are looking to buy gaming gear for various platforms. It is intended for individuals who prefer to rent instead of purchasing expensive equipment, including gamers, streamers, and event organizers. The application is also useful for those who want a hassle-free rental experience with secure and easy-to-use online payment options.

## Challenges & Notes

While building this web application, I encountered several challenges, particularly with setting up proper session management and database interaction. The cart management system required careful attention to detail, ensuring that the cart was properly updated as users added and removed items. I had to implement error handling to ensure that the user experience was smooth and informative if an error occurred during order placement.

Additionally, integrating the checkout and order processing required understanding how to interact with the database using PHP and SQL. This was a bit tricky due to the need to securely handle user input and session variables.

I also wanted to include more advanced features like user profile management and order history, but due to time constraints, these features were left out.

## Resources Utilized

- [W3Schools PHP Tutorial](https://www.w3schools.com/php/)
- [Bootstrap Documentation](https://getbootstrap.com/docs/)
- [MySQL Documentation](https://dev.mysql.com/doc/)
- [PHP Manual](https://www.php.net/manual/en/)
- [Stack Overflow](https://stackoverflow.com/) - For troubleshooting and solutions to common coding problems.

## Future Improvements

If I had more time, I would focus on the following improvements:

1. **User Profile Management**: Adding features that allow users to view and update their profile information, track their order history, and manage payment methods.
   
2. **Order History**: Implement a page that lets users view all of their past orders, including detailed information like date of order and items rented.
   
3. **Payment Integration**: Integrating a secure payment gateway such as PayPal or Stripe to handle transactions for rental orders.
   
4. **Admin Panel**: Adding an admin panel where the admin can manage product listings, view all orders, and handle inventory.

These additions would further enhance the user experience and make the application more robust and feature-rich.

## Conclusion

The Gaming Gear Store web application is a simple yet functional platform for renting gaming equipment. It covers essential functionality, such as user registration, product browsing, cart management, and order processing. With further development, this application could evolve into a fully-fledged platform for transaction and rental services, offering additional features like payment integration, user profiles, and an admin dashboard.
