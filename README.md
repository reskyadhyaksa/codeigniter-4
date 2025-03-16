# Webunion
[Desc]

## Project Installation
1. Clone the repository 
```shell
git clone https://github.com/reskyadhyaksa/codeigniter4.git
```

2. Switch to the repo folder 
```shell
cd webunion
```

3. Install all the dependencies using composer
```shell
composer install
```
```shell
composer require codeigniter4/shield
```

4. Config setup
```shell
php spark shield:setup
```

5. Run the database migrations (Set the database connection in .env before migrating)
```shell
php spark migrate --all
```

6. Seed the database 
```shell
php spark db:seed DatabaseSeeder
```

7. config .env (example below, make sure the database is exists)
```shell
#--------------------------------------------------------------------
# ENVIRONMENT
#--------------------------------------------------------------------

CI_ENVIRONMENT = development

#--------------------------------------------------------------------
# DATABASE
#--------------------------------------------------------------------

database.default.hostname = localhost
database.default.database = database_webunion
database.default.username = root
database.default.password = root
database.default.DBDriver = MySQLi
database.default.DBPrefix =
database.default.port = 3306
```

8. Manually create a `app\writable` and `app\writable\cache` folder

9. Start the local development server 
```shell
php spark serve
```


