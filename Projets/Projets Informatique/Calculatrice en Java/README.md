# Calculatrice en Java

Ce projet Java consiste en la création d'une application de calculatrice simple, permettant uniquement les opérations binaires de base. L'objectif était de mettre en œuvre les principes fondamentaux de Java, notamment l'encapsulation des variables, l'héritage et l'utilisation d'interfaces.

## Fonctionnalités

- Addition, soustraction, multiplication et division de nombres.
- Gestion des opérations de base : +, -, *, /.
- Prise en charge de la division par zéro avec gestion d'erreur.

## Structure du Projet

Le projet est organisé de la manière suivante :

### Packages

- `core` : Contient les classes principales de la calculatrice.
  - `CalculatriceSimple.java` : Classe principale de la calculatrice.
  - `Nombre.java` : Gestion des nombres et des opérations élémentaires.
  - `Operation.java` : Interface pour les opérations mathématiques.

- `operations` : Gère les différentes opérations mathématiques.
  - `Addition.java` : Classe pour l'opération d'addition.
  - `Soustraction.java` : Classe pour l'opération de soustraction.
  - `Multiplication.java` : Classe pour l'opération de multiplication.
  - `Division.java` : Classe pour l'opération de division.

- `exceptions` : Gère les exceptions, notamment la division par zéro.
  - `ArithmeticException.java` : Gestionnaire d'exception pour la division par zéro.


## Utilisation

Le code est conçu pour être simple et facile à comprendre. Il peut servir de base pour des projets plus complexes de calculatrices ou pour illustrer des concepts Java.

