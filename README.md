## Created Using APIATO & PORTO

This boilerplate is created using [Apiato](https://apiato.io/) and [Porto System Architectural Pattern](https://mahmoudz.github.io/Porto/)
> Scaffolded on top of laravel.
  

## Installation

- Unzip or clone the project, make sure to load .env file. Almost any configuration is from there.

- Run the composer & npm Install
    ```shell
    composer install
    npm install
    ```

- Create the designated database before doing any migration. (You can use either Pgsql Or Mysql, in my case I use pgsql)

	```env
	DB_CONNECTION=pgsql
	DB_HOST=127.0.0.1
	DB_PORT=5432
	DB_DATABASE=db
	DB_USERNAME=postgres
	DB_PASSWORD=

	# DB_CONNECTION=mysql
	# DB_HOST=127.0.0.1
	# DB_PORT=3306
	# DB_DATABASE=db
	# DB_USERNAME=root
	# DB_PASSWORD=
	```
	
- Generate APP KEY
	```shell
	php artisan key:generate
	```

- Run Migrations (use the seeder for initial build, if you want to start over from scratch just run the 2nd line)
	```shell
	php artisan migrate --seed
	php artisan migrate:fresh --seed
   php artisan db:seed --class=App\Ship\Seeders\ActivityLogging\LogLevelSeeder
	```

- Generate passport client for Login using OAUTH2
> NOTE: Go to your database and find oauth_clients table, copy the id and secret that has password_client = true. Paste into field in API LOGIN
    ```shell
	php artisan passport:client --password
	```

- Running the project
	```shell
	php artisan serve
	```

- Default user login:
	```
	USERNAME: admin
	PASSWORD: admin
	```

- Running Jobs & Queue
   ```shell
   php artisan queue:work
   php artisan schedule:work
   ```

## OPTIONAL (Unit-Tests)
>NOTE: Running test will wipe the entire database records, the tests are meant to be rebuild the entire application from ground up. Make sure you changed the DB_DATABASE configuration in the .ENV (make another env.testing for test purposes) 

- Running the test suite. (This test suite is scoped only for encompassing the technical test features e.g: Users and Post) 


	```shell
	php artisan test --testsuite=Juicebox-Unit --env=testing
	```

## Production and Debug Mode (OPTIONAL)
> You can toggle the production mode and debug mode in .env
    
```env
	APP_ENV=local //APP_ENV=production
	APP_DEBUG=true //APP_DEBUG=false
```

## Postman Docs
https://documenter.getpostman.com/view/17778669/2sBYHPzh7s?utm_source=postman-app#431de4c6-ec33-4315-b74a-6b06768204d8

## More Information

Feel free to contact me (Tevin Dean Ramadhan): deantevinn.work@gmail.com if you having trouble installing the files.