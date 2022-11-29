
# Laravel-hobby app

An app for listing Laravel gigs/jobs. This project is from my YouTube course.

## Usage

### Database Setup
This app uses MySQL. To use something different, open up config/Database.php and change the default driver.

To use MySQL, make sure you install it, setup a database and then add your db credentials(database, username and password) to the .env.example file and rename it to .env

### Migrations
To create all the nessesary tables and columns, run the following
```
php artisan migrate
```

### Running Then App
Upload the files to your document root, Valet folder or run 
```
php artisan serve
```

