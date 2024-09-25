# Organization Registration System

## Overview

The Organization Registration System is a web application built using Laravel, Blade, and Bootstrap. The application aims to streamline the registration process for organizations, allowing users to create profiles, verify their email addresses, and manage their information efficiently.

### Key Features

- **User Registration**: Users can register their organizations with necessary details.
- **Email Verification**: The application sends verification emails to ensure users confirm their email addresses.
- **Organization Profile Management**: Users can create and update their organization profiles, including ownership details, TIN, BIN, and registration information.
- **Responsive Design**: The application uses Bootstrap for a clean and responsive user interface.
- **Authentication**: Built-in Laravel authentication system ensures secure user access.
  
### Tech Stack

- **Backend**: Laravel (PHP Framework)
- **Frontend**: Blade, Bootstrap
- **Database**: MySQL

### Getting Started

To get started with the project, follow these steps:

### Installation Steps

1. **Clone the Repository**:
    ```bash
    git clone https://github.com/JabedHossainSwe/support-ticket-coding-test.git
    cd file-name
    ```

2. **Install Backend Dependencies**:
    ```bash
    composer install
    ```

3. **Set Up Environment File**:
    Copy `.env.example` to `.env` and set up your database and mail configurations:
    ```bash
    cp .env.example .env
    ```

4. **Generate Application Key**:
    ```bash
    php artisan key:generate
    ```

5. **Run Migrations**:
    ```bash
    php artisan migrate
    ```

6. **Run Seeder**:
    ```bash
    php artisan db:seed
    ```

7. **Frontend Setup**:
    ```bash
    composer require laravel/ui
    php artisan ui bootstrap --auth
    npm install && npm run dev
    ```

8. **Start the Development Server**:
    ```bash
    php artisan serve
    ```

Now you can access the application at `http://localhost:8000`.

### Usage

1. Visit the Homepage: Navigate to the homepage of the application.
2. Sign Up: Create an account by providing the necessary information.
3. Log In: After successful registration, log in using your credentials.
4. Add a Support Ticket: Once logged in, you can directly add a support ticket. Fill in the required details and submit the ticket.
5. Email Notification: Upon successful ticket creation, an email notification will be sent to you confirming the ticket submission.
6. Admin Dashboard: Admins can view and manage all submitted tickets from the dashboard, including the option to close or cancel tickets.
7. Cancellation Notification: If an admin closes a ticket, the user will receive an email notification regarding the ticket closure.



### Contributing

Contributions are welcome! Please create a pull request or open an issue for any suggestions or improvements.


