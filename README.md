# 🚀 Symfony docker-compose mini-configuration 🚀
# Description
This package allow you to get a containerized SF 4 application in PHP 7.4.

# Installation
- Simply run `docker-compose up`
- Optionally, add your custom domain both in `/etc/hosts` and in your nginx config file
- Your app is now mapped in http://localhost

# Features
- The PHP container has also installed composer, npm and yarn if you want to develop a fullstack application.
- Also it has the Symfony binary installed (https://symfony.com/download) if you want to do it in a document-recommended 
way.
