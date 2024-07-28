# Phone Book System

A simple phone book system built using the CodeIgniter 3 framework to demonstrate PHP and MySQL skills. This system includes basic CRUD operations, user authentication, and pagination.

## Table of Contents
- [Features](#features)
- [Requirements](#requirements)
- [Installation](#installation)
- [Database Setup](#database-setup)
- [Project Structure](#project-structure)
- [Usage](#usage)
- [Additional Notes](#additional-notes)
- [Credits](#credits)

## Features

### Basic Features
1. Add new record.
2. Edit records.
3. Delete records.
4. Upload image for record.
5. Registration and login for the phone book system.
6. Pagination for records.
7. Use CSS to make the system more attractive.

### Advanced Features (Optional)
1. Responsive design.
2. Ajax for dynamic updates.

## Requirements

- XAMPP
- CodeIgniter 3
- PHP 5.6 or newer
- MySQL
- Use CSS (Bootstrap 5)(https://getbootstrap.com/docs/5.0/getting-started/introduction/).
## Installation

1. **Download and Install XAMPP:**
   - Download XAMPP from [Apache Friends](https://www.apachefriends.org/index.html).
   - Install and start Apache and MySQL from the XAMPP Control Panel.

2. **Download CodeIgniter 3:**
   - Download CodeIgniter 3 from [CodeIgniter Downloads](https://www.codeigniter.com/download).
   - Extract the CodeIgniter files to `C:/xampp/htdocs/phonebook`.

3. **Configure CodeIgniter:**
   - Open `application/config/config.php` and set the base URL:
     ```php
     $config['base_url'] = 'http://localhost/phonebook/';
     ```
   - Configure the database in `application/config/database.php`:
     ```php
     $db['default'] = array(
         'dsn'   => '',
         'hostname' => 'localhost',
         'username' => 'root',
         'password' => '',
         'database' => 'phonebook',
         'dbdriver' => 'mysqli',
         'dbprefix' => '',
         'pconnect' => FALSE,
         'db_debug' => (ENVIRONMENT !== 'production'),
         'cache_on' => FALSE,
         'cachedir' => '',
         'char_set' => 'utf8',
         'dbcollat' => 'utf8_general_ci',
         'swap_pre' => '',
         'encrypt' => FALSE,
         'compress' => FALSE,
         'stricton' => FALSE,
         'failover' => array(),
         'save_queries' => TRUE
     );
     ```

## Database Setup

1. **Create a Database:**
   - Open `phpMyAdmin` (http://localhost/phpmyadmin/).
   - Create a new database named `phonebook`.

2. **Import the SQL Dump:**
   - In `phpMyAdmin`, select the `phonebook` database.
   - Go to the `Import` tab.
   - Choose the SQL dump file (`phonebook.sql`) provided in the project directory.
   - Click `Go` to import the database structure and data.

## Project Structure

### Controllers

#### `Phonebook.php`
- **Constructor:** Loads helpers (`url`), libraries (`form_validation`, `session`, `pagination`), and the model (`Phonebook_model`).
- **Functions:**
  - `dashboard`: Manages user login session and pagination.
  - `add_record`: Adds a new contact record.
  - `edit_record`: Edits an existing contact record.
  - `delete_record`: Deletes a contact record.

#### `Welcome.php`
- **Functions:**
  - `index`: Home page.
  - `register_now`: Handles user registration.
  - `login`: Login page.
  - `login_now`: Handles user login.
  - `dashboard`: User dashboard.
  - `logout`: Logs out the user.

### Models

#### `Phonebook_model.php`
- Contains functions to interact with the database for CRUD operations.
  - function insert_record
  - function get_record
  - function get_all_records
  - function update_record
  - function delete_record
  - function upload_image
  - function get_total_records
  - function get_paginated_records
  - function get_record
#### `user.php`
- Contains functions to interact with the database for CRUD operations.
  - function insertuser
  - function checkPassword

### Views
- Contains views for displaying forms, lists, and other UI elements for the phone book system.
#### `homepage.php`
The main landing page for the application.
#### `login.php`
Contains the login form for user authentication.
#### `add_record.php`
Contains the form to add a new contact record.
#### `edit_record.php`
Contains the form to edit an existing contact record.
#### `dashboard.php`
Displays the record  list of contacts and options to add, edit, or delete records.

## Result

# Login Page
<p align="center">
<img src="https://github.com/user-attachments/assets/e80f1569-da37-48d1-a790-80ddcb88e5dc" width=70% height=75% > </br>
</p>

# Registration Page
<p align="center">
<img src="https://github.com/user-attachments/assets/b8704ca4-b055-4a82-a9a9-f858fcebb13c" width=70% height=75% > </br>
</p>

# Dashboard(Table)
<p align="center">
<img src="https://github.com/user-attachments/assets/e5f7be62-5826-410f-b1b6-6e4d871cb21c" width=70% height=75% > </br>
</p>

# AddRecord(Form)
<p align="center">
<img src="https://github.com/user-attachments/assets/6246b31b-2aca-4268-a9aa-5d10ae79d280" width=70% height=75% > </br>
</p>

# EditRecord(Form)
<p align="center">
<img src="[https://github.com/user-attachments/assets/6246b31b-2aca-4268-a9aa-5d10ae79d280](https://github.com/user-attachments/assets/ad1124a7-9b2d-45fc-acd0-2b04a9060d41)" width=70% height=75% > </br>
</p>



1. **Run the Application:**
2. 
## Usage

1. **Run the Application:**
   - Open your web browser and go to `http://localhost/phonebook`.

2. **Functionality:**
   - **Add New Record:** Add new contacts to the phone book.
   - **Edit Records:** Modify existing contact details.
   - **Delete Records:** Remove contacts from the phone book.
   - **Upload Image for Record:** Upload and associate an image with a contact.
   - **Registration and Login:** Register new users and allow them to log in.
   - **Pagination:** Navigate through multiple pages of contacts.
   - **CSS Styling:** Enhanced visual appearance with CSS.

## Additional Notes

- **Optional Features:**
  - Responsive design ensures the application works on different devices.
  - Ajax can be used for dynamic updates without page refresh.

## Credits

- [CodeIgniter 3](https://codeigniter.com/)
- [XAMPP](https://www.apachefriends.org/index.html)

---

Ensure to export your database as a `.sql` file and include it with your project when submitting.
- [XAMPP](https://www.apachefriends.org/index.html)

---

Ensure to export your database as a `.sql` file and include it with your project when submitting.
