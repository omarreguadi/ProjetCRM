# Projet_CRM

#### Getting Started
These instructions will get you a copy of the project up and running on your local machine for development and testing purposes.


####Prerequisites
What things you need to install the software and how to install them?

* Docker CE
* Docker Compose

#### Install 
```bash
docker-compose up -d
docker-compose exec --user=application web bash
composer install
php bin/console d:s:u --force
php bin/phpunit pour les tests
```
