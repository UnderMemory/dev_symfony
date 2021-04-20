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

```