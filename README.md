## Simple rest CRUD service built with Docker
### Pre-requisites
* Docker running on the host machine.
* Docker compose running on the host machine.
* Docker version 20.10.17
* docker-compose version 2.6.0
## Installation
### To get started, the following steps needs to be taken:
* Clone the repo.
* git clone https://github.com/elijahhada/laravel9-docker-crud.git into a folder of your choice
* cd to the project's directory.
* run command:
* sudo docker compose build --no-cache
* after successful built run command: sudo docker compose up -d
* copy from .env.example to .env: cp .env.example .env to use env config file
* run commands to migrate and seed db:
* sudo docker compose exec app php artisan migrate
* sudo docker compose exec app php artisan db:seed
* Visit http://localhost:8100 to see Laravel application.
## usage:
* to start all containers: sudo docker compose up -d
* to stop all containers: sudo docker compose down
* to run unit tests: sudo docker compose exec app vendor/bin/phpunit
* to test application you can use Postman, available urls and actions:
* GET http://localhost:8100/api/news
* POST http://localhost:8100/api/news
* GET http://localhost:8100/api/news/id
* PUT http://localhost:8100/api/news/id
* DELETE http://localhost:8100/api/news/id
