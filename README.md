<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## About Project
So i'm using PHP Version 7.4 and Laravel 7.30 for this task.
Extra library i used in this project is Image Intervention for uploading the image

So i start with creating a command to fetch records from the api and store that records one by on in databaes
once the process is finished all the entries will be store in the database and displayed on home page.

On listing page two actions button you will get once for the delete and second for edit the current data entry
On edit page same data will be displayed for update also the image preview to modify.

I'm not using any login credential here so anyone who will use this project can run the command and without logging the user can display the records in table form 

Steps to follow:
1. Clone the project
2. Create .env file and update the database fields
3. Run php artisan key:generate (Optional)
4. Run Composoer install to install required libraries
5. Run migration to get the tables
6. Run command to fill database : php artisan fetch:records


