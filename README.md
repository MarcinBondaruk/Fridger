# Prelude - Symfony Explicit Architecture Boilerplate
## Description
Goal of this project is to minimize overhead connected with setting up modern Symfony6, PHP-8, PHP-FPM, Nginx project while following [Explicite Architecture](https://herbertograca.com/2017/11/16/explicit-architecture-01-ddd-hexagonal-onion-clean-cqrs-how-i-put-it-all-together/).
Prelude also aims to promote optimal - in my opinion - directory structure on both application and operational level.  
## Requirements
I have to apologize developers who use Apple and Microsoft hardware, I did not have such devices and did not test this solution on such hardware.  
I am running:
* Ubuntu 20.04
* Docker version 20.10.12
* docker-compose version 1.28.6
## Usage
To start development environment simply run `docker-compose up -d app` which will start main service in background (detached mode). Service should be available at `localhost:1805`.  
There is also a production environment available. Run `docker-compose -f docker-compose.prod.yml up -d app`.
## Overview


### Operational Directory Structure
#### Infrastructure as a Code directory
####  Docker Directory
This directory contains Dockerfile, s6-overlay scripts, and directories which contains services configurations such as fpm and nginx per env.
##### Dockerfile
Dockerfile follows multi-stage build practice and follows layering good practices.  
###### Stages organization


##### S6-overlay
##### Env specific configurations

#### Application Directory

### Application Directory Structure
#### Explicit Architecture
[![Explicit Architecture](https://docs.google.com/drawings/d/e/2PACX-1vQ5ps72uaZcEJzwnJbPhzUfEeBbN6CJ04j7hl2i3K2HHatNcsoyG2tgX2vnrN5xxDKLp5Jm5bzzmZdv/pub?w=960&amp;h=657)][2]

[2]: https://docs.google.com/drawings/d/1E_hx5B4czRVFVhGJbrbPDlb_JFxJC8fYB86OMzZuAhg/edit?usp=sharing
