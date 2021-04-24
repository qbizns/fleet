<h1><p align="center" ><b>
Fleet Management System, Test task for "Robusta studio"
</b>
</p></h1>

## 1st: Create new Database

Create Database laravel <br>

## 2nd: Update .env file

Update .env file database configuration<br>
```bash
DB_CONNECTION=mysql<br>
DB_HOST=127.0.0.1<br>
DB_PORT=3306<br>
DB_DATABASE=laravel<br>
DB_USERNAME=root<br>
DB_PASSWORD=<br>
```

## 3rd: Run the database migrations

php artisan migrate

## 4th: Run the database seeder

php artisan db:seed

## Finally: Start the local development server
```bash
php artisan serve
This command will start a development server at http://localhost:8000
```

## If you use Docker Containers
```bash
$ docker-compose up -d --build
```

## APIs Documentation
Fleet Management System API documentation is available [here](https://documenter.getpostman.com/view/7785567/TzJx9cSF)
