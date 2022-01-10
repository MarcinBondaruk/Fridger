# Prelude - Symfony Explicit Architecture Boilerplate
## Description
The goal of this project is to minimize overhead connected with setting up modern Symfony6, PHP-8, PHP-FPM, Nginx project while following [Explicite Architecture](https://herbertograca.com/2017/11/16/explicit-architecture-01-ddd-hexagonal-onion-clean-cqrs-how-i-put-it-all-together/).
Prelude also aims to promote optimal - in my opinion - directory structure on both application and operational level.  
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
## Overview
Project is based off of official (offofoff :wink: ) `php:8.0.14-fpm-alpine3.15` image and extended with [s6-overlay](https://github.com/just-containers/s6-overlay) project along with Nginx for apline.
I decided to include Nginx inside app container which basically broke one process per container rule. This is done mostly out of convenience. There is a basic argument that services based on this project would be deployed on a cloud using orchestration such as Kubernetes.
Load balancing would be done by some other solution and all the communication would go over HTTP - not FastCGI. PHP services would not be load balanced by Nginx. In this scenario Nginx could be deployed as Sidecar to main App, but it is more convenient to run two processes.  
Downside to this solution is that Nginx and App are limited to same amount of resources and could choke each other, but this will not be a problem on local environment.    
S6-overlay helps with process management, offers a way to easily run startup scripts such as fixtures and migrations and is a great tool to fix permissions inside a container.

### Operational Directory Structure
This is how I refer to top level directory. This one is currently divided into 3 subdirectories - `docker`, `app` and `infra`.  
There could also be a CI directory but this is more vendor specific - github actions require special directory.  

Division into 3 main directories comes from separation of concerns.   
Main concern of `docker` directory is to encapsulate environment definitions and processes configurations that run inside a container. `app` directory contains application definition - basically all business code.

#### Infrastructure as a Code directory
I left this one empty but most probably I would place here Helm Charts.
####  Docker Directory
This directory contains Dockerfile, s6-overlay scripts, and directories which contains services configurations such as fpm and nginx per env.
##### Dockerfile
Dockerfile is divided into stages:
* base - this stage installs s6-overlay, nginx and necessary libraries. 
* base build - this stage copies composer.json and lock inside and downloads composer.phar
* production build - runs composer install with prod flags 
* production - copies prod config of php.ini, fpm, nginx, s6-overlay scripts, prod build artifacts and directories that are vital to application
* local - copies local configurations, app directory and runs composer install with dev deps

##### S6-overlay

### Application Directory Structure
Application directory is based on Explicit Architecture
#### Explicit Architecture
[![Explicit Architecture](https://docs.google.com/drawings/d/e/2PACX-1vQ5ps72uaZcEJzwnJbPhzUfEeBbN6CJ04j7hl2i3K2HHatNcsoyG2tgX2vnrN5xxDKLp5Jm5bzzmZdv/pub?w=960&amp;h=657)][2]

## Todos:
* add helper scripts to run composer commands from container context
* encapsulate services in private network
* resolve ownership issues when container has mapped volumes


[2]: https://docs.google.com/drawings/d/1E_hx5B4czRVFVhGJbrbPDlb_JFxJC8fYB86OMzZuAhg/edit?usp=sharing
