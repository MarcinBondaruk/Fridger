# Fridger - Lets cook together!
  
## Requirements
Project was developed on:
* Ubuntu 20.04
* Docker version 20.10.12
* docker-compose version 1.28.6

I also recommend enabling BuildKit [howto](https://docs.docker.com/develop/develop-images/build_enhancements/)

I have to apologize developers who use Apple and Microsoft products, I did not have such devices and did not test this solution on such hardware.
## Usage
To start development environment simply run `docker-compose up -d`

To create an admin user run `docker exec -it fridger-main bin/console app:create-user:admin`
Your admin credentials will be: login: `admin` passwod: `bardzotrudnehaslo`
