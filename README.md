#Prelude - Symfony Explicit Architecture Boilerplate
##Description
Goal of this project is to minimize overhead connected with setting up modern Symfony6, PHP-8, PHP-FPM, Nginx project while following [Explicite Architecture](https://herbertograca.com/2017/11/16/explicit-architecture-01-ddd-hexagonal-onion-clean-cqrs-how-i-put-it-all-together/).
Prelude also aims to promote optimal - in my opinion - directory structure on both application and operational level.  
##Requirements
I have to apologize developers who use Apple and Microsoft hardware, I did not have such devices and did not test this solution on such hardware.  
I am running:
* Ubuntu 20.04
* Docker version 20.10.12
* docker-compose version 1.28.6
##Usage
To start development environment simply run `docker-compose up -d app` which will start main service in background (detached mode). Service should be available at `localhost:1805`.  
There is also a production environment available. Run `docker-compose -f docker-compose.prod.yml up -d app`.
##Overview

