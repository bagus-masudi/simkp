# SIMKP (Sistem Informasi Monitoring Kendaraan Perusahaan)

## Usage
### Prerequisites
- Code Editor / IDE
- PHP [Composer](https://getcomposer.org/download/)
- Terminal
    
### Database Design
![img](/public/images/erd.png)

## Installation

1. Clone the repository
    ```bash
    git clone https://github.com/bagus-masudi/simkp.git
    ```

2. Use the package manager [composer](https://getcomposer.org/download/) to install vendor.
    ```bash
    composer install
    ```

3. Configure .env files, => copy .env.example and rename it to .env
    ```bash
    cp .env.example .env
    ```

4. Set your database configuration in .env files

5. Generate APP_KEY
    ```bash
    php artisan key:generate
    ```

6. Run Migration
    ```bash
    php artisan migrate
    ```

7. Run Seeder
    ```bash
    php artisan db:seed
    ```

8. Run Laravel server
    ```bash
    php artisan serve
    ```

9. Basic Role Credentials
    - Admin
        ```
        username: admin@gmail.com
        password: password
        ```
    - User
       ```
       username: satria@gmail.com
       password: password
       ```
