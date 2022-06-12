# Citadel Framework

A CoC & easy to deploy framework for building robust and realtime web applications / API's (REST/GraphQL) built on top of Symfony and Mercure.

## Getting Started

Everything has been pre-configured for you, so you don't have to do break your head doing it, we have included bob "the builder" cli tool as an abstraction layer on top of symfony as well as custom commands to execute batch commands.

### Prerequisites

- PHP >= 8.1
- Composer
- npm
- MySQL/PostgresSQL driver or SQLITE
- Symfony cli (Optional)
- Docker (Optional)
- LAMP/WAMP dev server (Optional)

### Installing

Citadel comes with a powerful command to generate all migrations and compile resources.

NOTE: We must have our database connection on our .env file set up.

##### Building using bob cli tool

This framework comes with server database sessions for the web application and JWT auth for the REST API/GraphQL Api powered by Api platform, to build the app for development execute:

``` cmd

# Example for Linux

user@machine:~Path/$ php bob build:dev


```

##### Building from scratch using Symfony

You can use bob to execute this commands, nonetheless, we will remove al the boilerplate and show you how to build by using makerbundle.

###### Install all the composer dependencies

``` cmd

user@machine:~Path/$ composer install

```

###### Generate the initial migration in the database.

``` cmd

user@machine:~Path/$ php bin/console doctrine:migrations:migrate

```

And repeat

```
until finished
```

End with an example of getting some data out of the system or using it for a little demo

## Running the tests

Pending:


### And coding style tests

We strongly recommend using PSR-4 and PSR-12 coding standards

```
Give an example
```

## Deployment

Add additional notes about how to deploy this on a live system

## Built With

* [Symfony](https://symfony.com/) - Symfony is a set of reusable PHP components and a PHP framework for web projects.

* [API Platform](https://api-platform.com) - API Platform is the most advanced API platform, in any framework or language.

* [MakerBundle](https://symfony.com/bundles/SymfonyMakerBundle/current/index.html) - Symfony Maker helps you create empty commands, controllers, form classes, tests and more so you can forget about writing boilerplate code.

* [EasyAdmin](https://symfony.com/bundles/EasyAdminBundle/current/index.html) - Creates beautiful administration backends for your Symfony applications. It's free, fast and fully documented.

* [NPM](https://www.npmjs.com/) - JavaScript Package Manager, Registry & Website.

## Contributing

Please read [CONTRIBUTING.md](https://gist.github.com/PurpleBooth/b24679402957c63ec426) for details on our code of conduct, and the process for submitting pull requests to us.

## Versioning

We use [SemVer](http://semver.org/) for versioning. For the versions available, see the [tags on this repository](https://github.com/your/project/tags). 

## Authors

* **Jose Alejandro Melendez G.** - *Dev* - [PurpleBooth](https://github.com/PurpleBooth)

See also the list of [contributors](https://github.com/your/project/contributors) who participated in this project.

## License

This project is licensed under the MIT License - see the [LICENSE.md](LICENSE.md) file for details

## Acknowledgments

* Hat tip to anyone whose code was used
* Inspiration
* etc

