
## Prerequisite

- **[PHP ^8.2](https://windows.php.net/downloads/releases/archives/)**
- **[MySQL]**
- **[Composer](https://getcomposer.org/download/)**
- **[Xampp Server](https://www.apachefriends.org/download.html)**

Install and setup all above prerequisites

## Clone Repository

## Installation

- Open the project in editor eg. VSCode.
- Open console and run following commands
- composer install
- copy .env.example .env
- php artisan key:generate

- **setup .env file (database, mail)**

- php artisan storage:link
- php artisan migrate --seed
- **php artisan serve** 

After running all the command

## Usage

- Open any browser and enter **http://localhost:8000**

 ### Admin Panel

- Enter **http://localhost:8000/login**

- Username: **admin@gmail.com**

- Password: **password**

**Note: Use same URL for Vendor login as well**
