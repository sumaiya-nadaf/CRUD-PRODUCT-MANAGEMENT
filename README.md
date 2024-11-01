# CRUD Product Management System

A simple CRUD (Create, Read, Update, Delete) Product Management System built using PHP, MySQL, HTML, CSS, JavaScript, Bootstrap, and AJAX.

## Features

- **Add Product**: Add new products with name, description, image, price, and category.
- **Edit Product**: Update existing product details.
- **Delete Product**: Remove products from the list.
- **Responsive UI**: Built with Bootstrap for mobile and desktop compatibility.
- **AJAX-powered**: Real-time data fetching for a smooth user experience.

## Tech Stack

- **Frontend**: HTML, CSS, JavaScript, Bootstrap
- **Backend**: PHP
- **Database**: MySQL
- **AJAX**: Used for dynamic data fetching

## Database Schema

### Tables
- **categories**: Stores product categories.
  - Fields: `id` (INT, Primary Key), `name` (VARCHAR)
  
- **products**: Stores product details.
  - Fields: `id` (INT, Primary Key), `name` (VARCHAR), `description` (TEXT), `image` (VARCHAR), `price` (DECIMAL), `category_id` (Foreign Key to `categories`)

### SQL Setup

To set up the database, use the following SQL commands:

```sql
CREATE DATABASE product_management;

USE product_management;

CREATE TABLE categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL
);

CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description TEXT,
    image VARCHAR(255),
    price DECIMAL(10, 2) NOT NULL,
    category_id INT,
    FOREIGN KEY (category_id) REFERENCES categories(id) ON DELETE SET NULL
);


