# Fridger - find your recipes
  
## Requirements
Project was developed on:
* Ubuntu 20.04
* Docker version 20.10.12
* docker-compose version 1.28.6

I also recommend enabling BuildKit [howto](https://docs.docker.com/develop/develop-images/build_enhancements/)

I have to apologize developers who use Apple and Microsoft products, I did not have such devices and did not test this solution on such hardware.
## Usage
To start development environment simply run `docker-compose up -d app` which will start main service in background (detached mode). Service should be available at `localhost:1805`.  
There is also a production environment available. Run `docker-compose -f docker-compose.prod.yml up -d app`.  
Composer install commands should be run inside a containers.
