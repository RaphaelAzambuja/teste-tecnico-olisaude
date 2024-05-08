# Olisaude API

This is a simple API for managing customer health information for the Olisaude program.

## Features

- Create, Read, Update, and Delete customers
- Add health problems for customers
- Calculate health risk score for customers based on their health problems

## Endpoints

- `GET /api/customers?page={page number}`: Get all customers
- `POST api/customers`: Create a new customer
- `GET api/customers/{id}`: Get a specific customer by ID
- `PUT api/customers/{id}`: Update a specific customer by ID
- `DELETE api/customers/{id}`: Delete a specific customer by ID
- `GET api/top-health-risk-customers`: Get the top 10 customers with the highest health risk score


- `GET /api/customers`: Get all customers
- `POST api/customers`: Create a new customer
- `GET api/customers/{id}`: Get a specific customer by ID
- `PUT api/customers/{id}`: Update a specific customer by ID
- `DELETE api/customers/{id}`: Delete a specific customer by ID

## Customer Object

``` json
{
  "name": "Bananilson Farofa",
  "date_of_birth": "2002-02-08",
  "gender": "Male"
}
```

## Problem Object

``` json
{
  "customer_id": 1,
  "name": "Diabetes",
  "severity": 2
}
```

## Health Risk Calculation

The health risk score for a customer is calculated using the formula:

```
sd = sum of severity of health problems
score = (1 / (1 + e^(-(-2.8 + sd)))) * 100
```

## Installation

1. Clone this repository
2. Install dependencies: `composer install`
3. Copy the `.env.example` file to `.env` and configure your database settings
4. Generate application key: `php artisan key:generate`
5. Run migrations: `php artisan migrate`
6. Serve the application: `php artisan serve`
