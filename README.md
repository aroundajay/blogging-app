# Blog Post Application

This application is a feature-rich blog platform built with Laravel 11, MySQL 8, Nginx, PHPUnit, Cypress, HTML 5, and CSS 3. It provides robust user authentication, authorization, and full CRUD capabilities for blog posts.

## Features

- **User Authentication**: Secure user login and logout functionality.
- **Blog Post Management**: Create, Read, Update, and Delete blog posts.
- **User Authorization**: Users can only modify or delete their own blog posts.
- **Home Page**: A home page that displays all blog posts.

## Getting Started

### Running the Project with Docker

To set up and run the project using Docker and Docker Compose, follow these steps:

1. **Copy the example environment variables file:**
   ```sh
   cp .env.example .env
   ```
2. **Start the application using Docker Compose:**
   ```sh
   docker-compose up
   ```

## Running Tests

### PHPUnit Unit Tests

1. **Install dependencies:**
   ```sh
   composer install
   ```

2. **Run the tests:**
   ```sh
   php artisan test
   ```

### Cypress Integration Tests

1. **Run the project with docker-compose:**

#### CLI Version

1. **Install dependencies:**
   ```sh
   yarn install
   ```

2. **Run the tests:**
   ```sh
   npx cypress run
   ```

#### Browser Interactive Version

1. **Install dependencies:**
   ```sh
   yarn install
   ```

2. **Open Cypress:**
   ```sh
   npx cypress open
   ```

3. **Run the spec in the interactive browser window.:**

## Project Structure

Key files and directories:

- **app/Http:** Controllers and Form Requests
- **app/Models:** ORM models
- **app/Policies:** Authorization policies
- **app/Repositories:** Data repositories
- **app/Services:** Custom services
- **database:** Migrations, Seeders, and Factories
- **docker:** Docker configuration files
- **resources:** UI template files and stylesheets
- **tests:** Unit tests (PHPUnit) and Integration tests (Cypress)
- **.env.example:** Example environment variables file
