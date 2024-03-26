# Laravel Microservices xRPC Playground

This GitHub repository contains a set of Laravel microservices that use RPC (Remote Procedure Call) to communicate with each other. The services are designed to be lightweight and scalable, making it easy to add or remove services as needed. Each service is self-contained and can run on its own, making it simple to deploy and manage. The repository also includes a demo application that demonstrates how the microservices can work together.

## Installation

To get started with this project, you will need to clone the repository using Git. Once cloned, navigate into the project directory and run `composer install` to install the dependencies.

## Configuration

Before running the application, you will need to configure the `.env` file with your database credentials. You can find the .env.example file in the root of the project, rename it to .env, and update the values as needed.

## Migrate and Seed

Simply run `php artisan migrate:fresh --seed` within each micropservice to setup your database and seed it with dummy data.

## Running the Application

To run the application, navigate into each microservice directory (e.g., cart or products) and run `php artisan serve`. This will start the server for that microservice. You can then access the API endpoints by navigating to http://localhost:8000/.
