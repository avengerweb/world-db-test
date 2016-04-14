# AWWorld - test task

### Server Requirements
 - mysql
 - PHP >= 5.5.9
 - OpenSSL PHP Extension
 - PDO PHP Extension
 - Mbstring PHP Extension
 - Tokenizer PHP Extension

### Version
0.0.5

Install with composer
```sh
# git clone https://github.com/avengerweb/world-db-test.git world
# cd world
# composer install
# mv .env.example .env
```

In next step
 * Create database
 * Execute sql (world.gz in root directory)
 * Configure .env file (Database)

Generate app key
```sh
# php artisan key:generate
```


