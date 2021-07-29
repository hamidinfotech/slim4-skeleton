# Slim4 Skeleton
A Slim 4 Framework skeleton for web applications and APIs.

This skeleton has been developed base on [this tutorial](https://odan.github.io/2019/11/05/slim4-tutorial.html).

## Features
* Slim micro framework, powerful and lightweight.
* Single action controller
* PHP-DI for dependency injection container and autowiring.
* ADR pattern
* Dockerized!
* Monolog for logging
* simple php renderer for views
* Laravel mix for compiling assets
* Bootstrap
* Vuejs

## Setup using docker
I separated docker compose file for development environment.

In production use docker-compose.yml and for development use docker-compose.dev.yml

Use example file to create docker-compose.dev.yml
```
cp docker-compose.dev.example.yml docker-compose.dev.yml
```

Create .env file and update the MYSQL_ROOT_PASSWORD key in the file
```
cp .env.example .env
```

Create project settings file in config directory
```
cp config/env.example.php config/env.php
```

\* **Before running containers, you may want to change `my-project` string in docker compose files.**

Build the app image
```
docker-compose -f docker-compose.dev.yml build app
```

When the build is finished, run the containers in background mode with:
```
docker-compose -f docker-compose.dev.yml up -d
```

Install the application dependencies
```
docker-compose exec app composer install
docker-compose exec app npm install
```

Compile your Sass and Js files using the following scripts:
```
docker-compose exec app npm run dev
or
docker-compose exec app npm run prod
```

\* **Also you can enter the app container using the following command and run your project commands as well:**
```
docker exec -it my-project-app bash
```

Browse to Hello World!
```
http://127.0.0.1:8001
```

## Useful Links
* [Slim Framework](http://www.slimframework.com/)
* [PHP-DI](http://php-di.org/)
* [PHP Standards Recommendations](https://www.php-fig.org/psr/)
* [Action Domain Responder](https://github.com/pmjones/adr/blob/master/ADR.md)
* [Laravel Mix](https://laravel-mix.com/)
* [Daniel's Dev Blog](https://odan.github.io/)