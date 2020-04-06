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
I separate docker compose file for development environment.

In production use docker-compose.yml and for development use docker-compose.dev.yml

Use example to create docker-compose.dev.yml
```
cp docker-compose.dev.example.yml docker-compos.dev.yml
```

Build the my-project image
```
docker-compose build my-project
```

When the build is finished, run the containers in background mode with:
```
docker-compose -f docker-compose.dev.yml up -d
```

Install the application dependencies
```
docker-compose exec my-project composer install
docker-compose exec my-project npm install
```

You may want to enter the container using the following command and run your project commands as well:
```
docker exec -it my-project bash
```

Compile your Sass and Js files using the following scripts:
```
npm run dev
or
npm run prod
```