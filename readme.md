# INSTALL Projet

```bash
symfony new Book --full --version=5.2
```
# Première execution 

```bash
symfony serve
```

# Premier controller

```bash
#test console
symfony console
#puis
symfony console make:controller 
```

## Premier probleme
A ce stade pas de DB configurée. 
Avec la route vers le controller Book, on a une erreur :
--> `Environment variable not found: "DATABASE_URL".`
## Solution provisoire ?
```bash
#dans le fichier .env
DATABASE_URL="mysql://root:@127.0.0.1:3306/db_books_eyrolles"
#depuis le terminal
symfony console doctrine:database:create
```
Taper l'adresse : https://localhost:8000/book
>> On arrive sur le controller qui lance sa vue.

# Test profiler
Barre du bas, tester l'onglet Routing.
```bash
#voir les routes, les noms de route avec leurs methodes
symfony console debug:router
```

# Controller et routes
## Annotations
Ici avec nom de route préfixé par app_ et méthod HTTP.

```php
/**
 * @Route("/book", name="app_book", methods={"GET"})
 */
public function index(): Response
```

#
## Méthodes et types de réponse
1. render() premet d'aller vers une vue html entre autre.
2. On peut aussi avoir d'autre type de réponses. Voir la méthode `message()`
2. 1. Réponse brute type String
2. 2. Réponse objet JSON

## Routes et wildcard
L'art et la manière de gérer les paramètres des méthodes

#
# Twig
Voir le code autour du controller Book.
# Exemple de code
```php
{% block body %}

{% for d in data %}

    {% if loop.index0 == 0 %}
        <p style='color:hotpink'>{{ d.name }} {{ d.action }} </p>
    {% else %}
        <p>{{ d.name }} {{ d.action }} </p>
    {% endif %}

{% endfor %}
```
__NB__ : 
-> {% %} => pour executer
-> {{ }} => pour afficher

#
# Entity
## Créer une entité

```bash
# Test console et mot clé = doctrine (ORM)
symfony console
symfony console make:entity
```
## Modifier une entité
J'ai crée une entité mais j'ai oublié quelques attributs

```bash
# Ajoute le champ requis
symfony console make:entity Book
```

#
# Migrations

```bash
bin/console make:migration
# ou
symfony console make:migration
```

Un fichier avec le code relatif au SGBD utilisé est crée.

```bash
symfony console doctrine:migrations:migrate
```

#
# Fixtures
- Comment alimenter la base de données pour tester pour la premiere fois.
- Système qui s'installe en mode dev.

```bash
composer require --dev doctrine/doctrine-fixtures-bundle
# à propos du cache
symfony console cache:clear
```