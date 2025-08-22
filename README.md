Product Catalog

Product Catalog is a Laravel-based web application designed to manage and showcase products in a structured and efficient way.
It demonstrates clean CRUD operations, best practices in Laravel, and provides a foundation that can easily be extended into a full-scale e-commerce solution.

✨ Features

✅ Create, update, and delete products

✅ View a searchable & organized catalog

✅ Responsive, clean UI with Blade templates (HTML, CSS)

✅ Built with scalability in mind (extendable to categories, stock, or cart system)

🛠 Tech Stack

Backend: Laravel 11 (PHP 8+)

Database: MySQL

Frontend: Blade Templates, HTML, CSS

Version Control: Git & GitHub

🚀 Getting Started
Prerequisites

PHP >= 8.1

Composer

MySQL / MariaDB

Node.js & NPM (optional for frontend assets)

Installation

# Clone repository

git clone https://github.com/OlakiitanEkundayo/product_catalog.git
cd product_catalog

# Install dependencies

composer install

# Copy environment file & generate key

cp .env.example .env
php artisan key:generate

# Run migrations

php artisan migrate

# Serve the app

php artisan serve

Project Structure (Laravel)

app/ # Application logic (Models, Controllers)
database/ # Migrations and seeders
resources/ # Blade templates, CSS, JS
routes/ # Web and API routes
tests/ # PHPUnit tests

👨‍💻 Author

Built with ❤️ by Olakiitan
