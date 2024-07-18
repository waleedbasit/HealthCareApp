# HealthCareApp

## Introduction
This project is a small web application developed for a hypothetical healthcare client. It is designed to allow users to register, log in, and manage patient information efficiently and securely. It built using laravel 10 and TALL stack. 

## Prerequisites
Before you begin, ensure you have met the following requirements:
- PHP >= 8.0
- Composer
- Node.js and npm

## Setup Instructions if using without Lando

### Step 1: Copy .env.example to .env
Copy the .env.example file to create your .env file:
```bash
cp .env.example .env
```

### Step 2: Install Composer Dependencies
Install the project dependencies using Composer:
```bash
composer install
```

### Step 3: Install Composer Dependencies
Install the necessary NPM packages:
```bash
npm install
```

### Step 4: Run Migrations and Seed Database
Run the database migrations and seed the database with initial data:
```bash
php artisan migrate --seed
```

### Step 5: Start the Development Server
Start the Laravel development server:
```bash
php artisan serve
```

### Step 6: Compile Assets
Compile the front-end assets:
```bash
npm run dev
```
