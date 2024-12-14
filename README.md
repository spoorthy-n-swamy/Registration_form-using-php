# Registration_form-using-php


This project is a simple user registration system built with **PHP**, **HTML**, and **CSS**. It collects user information via an HTML form, processes it in PHP, validates the user's age, hashes the password for security, and inserts the data into a MySQL database. The registration process also includes functionality for password visibility toggling.

## Features

- **Form Validation**:
  - Ensures that the user is at least 18 years old.
  - Password visibility toggle.
  
- **User Registration**:
  - Collects first name, middle name, last name, email, phone number, password, date of birth, gender, and country.
  - Submits the data to a MySQL database after validation.
  
- **Responsive Design**:
  - The form is designed to be mobile-friendly, adjusting layout on smaller screens.

## Files

1. **HTML / PHP Form** (`index.php` or similar):
   - A form to collect user data.
   - On form submission, the data is processed using PHP to calculate age, hash the password, and insert into the database.

2. **PHP Script** (`process.php` or inline in `index.php`):
   - Handles form submission, data validation, and database interaction.

3. **CSS File** (`styles.css` or inline styles):
   - Provides styling for the form, including responsiveness and user-friendly UI elements.

## How to Use

### Requirements

- **PHP** (version 7.x or later)
- **MySQL Database**
- Web Server (Apache, Nginx, etc.)
- **XAMPP/WAMP** (Optional for local development)

### Steps to Run the Project

1. **Clone or Download the Repository**:
   - Clone the repository or download the project files to your local machine.

2. **Set Up Database**:
   - Create a MySQL database called `register` and a table named `registration` with the following structure:

   ```sql
   CREATE TABLE `registration` (
     `id` INT AUTO_INCREMENT PRIMARY KEY,
     `first_name` VARCHAR(100) NOT NULL,
     `middle_name` VARCHAR(100) DEFAULT NULL,
     `last_name` VARCHAR(100) NOT NULL,
     `email` VARCHAR(100) NOT NULL,
     `phone_number` VARCHAR(20) NOT NULL,
     `password` VARCHAR(255) NOT NULL,
     `dob` DATE NOT NULL,
     `gender` ENUM('Male', 'Female', 'Other') NOT NULL,
     `country` VARCHAR(100) NOT NULL
   );
