# ArtCreation

ArtCreation est un site internet présentant des dessins.

## Environnement de développement

#### Pré-requis

* PHP 8
* Composer
* Symfony CLI
* Docker
* Docker-compose

Vous pouvez vérifier les pré-requis (sauf Docker et Docker-compose) avec la commande suivante (de la CLI Symfony) : 


```bash
symfony check:requirements
```

### Lancer l'environnement de développement

```bash
docker-compose up -d
symfony serve -d
```

## Lancer des tests

```bash
php bin/phpunit --testdox
```

