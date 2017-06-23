# DigitalKataclysm

Laravel inspired Framework for small projects. 

Working with PHP it tries to emulate how frameworks such as Laravel works, but in their minimal 
state and the maximun code reach. Its not intended for final users or huge projects (not yet), 
but in the future it can take that path.

You will see that there are a lot of similarities with Laravel, and a lot of methods with the
same name; but this does not mean that it works exactly the same. This familiar code will help
usual Laravel developers to get use to this framework, and at the same time, get to know its differences.

The real objective of this project is not to become popular, or replace other MVC such as Laravel, but to
offer another lightweight option for those sites that does not require so much code power, but still
want to keep its common structure.

## Requirements

This framework was made using PHP 7.1. That means that we are not providing backward compatibility 
with older versions of PHP (Sorry, we have to aim for the future).

## Environment

I recommend using Linux Based servers to work with PHP since Microsoft Windows Servers are kind 
of hard to set up with PHP, specially if we want to use custom libraries and complex functionality.
 There is a really good manual at [Digital Ocean](https://www.digitalocean.com/community/tutorials/how-to-install-linux-apache-mysql-php-lamp-stack-on-ubuntu-16-04)
 explaining how to install and set up everything you would require for a 
 full PHP server, from the installation of Apache2 to the installation of all PHP libraries.
 
 If there is no other option but to work in a Microsoft Windows environment, I recommend using 
 the [Laragon](https://laragon.org/) package that will, automatically, install everything you would need
 to work with PHP in Microsoft Windows based systems (works with Server and Desktop versions).

Talking about the tools, right now I am working in the [PHP STORM](https://www.jetbrains.com/phpstorm/)  IDE. 
If in the future we find a better IDE to work PHP then we will switch,
but for now, I am very comfortable using it. If you want to give it a try go ahead. 

## Similarities with Laravel

### Database

We are using the same database engine as described in [here](https://github.com/illuminate/database). This is 
powerful database class and we don't think is necessary to redo another class if this works like a charm.

### Blade system

One of the most powerful tools in Laravel is its views system. Since we are trying to
emulate that part, we are using the same [Blade System](https://packagist.org/packages/philo/laravel-blade)
to take advantage of all its features.

### Dumper

Easier way to debug the code. Belong to the [Illiminate Support](https://packagist.org/packages/laracasts/utilities).

### HTAccess

We are using the exact same .htaccess file that Laravel provides.

### Shell scripting?

Laravel is famous for using a SHELL scripting called *Artisan* where you can code commands to be executed manually 
or using crontab. Well, we didn't want to be left behind so Digital Kataclysm has a scripting system called *meteor*
that works in a very similar way. What is the advantage? meteor is simpler and faster because it does not have a lot
of the funcionality that *artisan* has, but it has enough power to handle most of the most basic functions you 
would want.


## Why don't just use Laravel/Lumen/CakePHP? What its wrong with them?

Even when there are a lot of frameworks, libraries and free code out there, and they can be used by Digital Kataclysm, I decided to make
some of them by my own. For example the routes management is being made from scratch (instead of using for example
[Slim Framework](https://www.slimframework.com/)), and this is because we want to make a lighter one instead of
keep adding libraries to the project composer (and also, learn in the process).

We know that there are a lot of libraries out there that make most of the work we are doing here; like the great 
example: [Laravel](https://laravel.com/) that includes everything you will see here; but maybe it is including 
code, libraries and functions that we will never use, or worse, we will never understand how they work.

## Want to help me?

If you are willing to spend some time checking the code and adding improvements, 
you can request a PUSH to this repository and I will, personally, check it and add it.

I accept all kinds of help from full design pages to classes and even composer requirements that you
can suggest. Just be sure to comment all you can, links from where you are taking the classes of methods
or even a little poetry of how you manage to get that awesome logic in your code.

Your reward? You will be able to use this little project for small ideas or sites wherever you like, 
and even you can folk it and modify it yourself. What is better than that? Maybe other frameworks are
not suitable for your needs, so why just don't take this one and make it exactly as you want?

## Copyright

All the code made in this repository was made by Danilo Ramírez Mattey. Please use it carefully 
and be sure to credit me if you are using any of it, including independent classes.

Copyright 2017 | San José, Costa Rica

## Working status

- [x] Composer set up
    - [X] Composer installation
- [X] Public Folder
- [X] PHP Documentor integration
- [X] View Class
    - [X] Blade or similar (for Views)
- [X] Request Class
    - [X] Request Input
    - [X] Request Method
    - [X] Request Server
    - [X] Request Integration
- [X] Config class
- [X] File .INI compatibility
- [X] Bootstrap and Jquery addition (With the configuration for each version)
- [ ] URL Management
    - [X] URL Rewrite
    - [X] Routing with wildcards
    - [X] Error and not found system (pages 500 and 404) (Still not working as I would like it to work)
- [ ] User session class
- [ ] Framework integration
- [X] Database Global
- [ ] Integrated validations
- [X] Console commands
    - [ ] Working options
- [ ] Create logo
- [ ] Closures
- [ ] Add view for JSON type
- [ ] Add view for XML type


## Contributors

- Danilo Ramírez

Yes yes I know, sometimes I write "we" and other times I write "I", sometimes I feel kind of lonely in this project :D. 
**Don't judge me**.

## Technologies

![Composer](https://www.dev-metal.com/wp-content/uploads/2013/12/composer-logo-1-100x100.jpg)
![PHP](https://www.dev-metal.com/wp-content/uploads/2014/02/php-logo-1-100x100.jpg)
![JQUERY](https://www.audero.it/blog/wp-content/uploads/2013/09/jQuery-logo.png)
![BOOTSTRAP](http://www.nebula-marketing.co.uk/assets/images/bootstrap-logo.jpg)
![FONT-AWESOME](https://www.blognone.com/sites/default/files/styles/thumbnail/public/news-thumbnails/logo_51.png)

- Composer
- PHP
- Jquery
- Bootstrap
- FontAwesome
