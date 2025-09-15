# Assessment App

## Requirements
- docker/docker-compose

## Disclaimer
Frontend UI/UX are mostly created with an aid of AI (Roo Code + Gemini and Github Copilot) mimicking a google form:
- blade file (not including the loops and logic)
- app.scss

## Installation Steps

1. **Clone the repository**
   ```bash
   git clone git@github.com:cliffordacion/assessment-app.git
   cd assessment-app
   git checkout task/assessment-app
   ```

2. Install PHP dependencies and copy `.env.example` to your `.env`
   ```bash
   composer install
   cp .env.example .env
   ```

3. Generate application key
   ```bash
   php artisan key:generate
   ```
4. Build and run `docker-compose.yml` using laravel sail
    ```bash
    ./vendor/bin/sail up -d
    ```
    * optional: https://laravel.com/docs/12.x/sail#configuring-a-shell-alias

5. Run database migration/schema and seeds/initial data
    ```bash
    ./vendor/bin/sail artisan migrate --seed
    ```
    This will start the application on http://localhost, which will show the laravel welcome page
    And will now make the Form Accessible on:
    - http://localhost/assessment/1 -> Partially Filled Form
    - http://localhost/assessment/2 -> No value form

6. Install and Compile frontend assets to make the forms presentable
    ```bash
    ./vendor/bin/sail npm install
    ./vendor/bin/sail npm run dev
    ```