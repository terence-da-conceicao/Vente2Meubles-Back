# V2M – Back (Symfony)

Ce dépôt contient la partie **Back-end** du projet **V2M**, développé avec **Symfony**.  
Il est relié à une partie **Front-end** en **Vue.js** (à cloner séparément).


## Prérequis

- PHP >= 8.1  
- [Composer](https://getcomposer.org/)  
- Symfony CLI  
- MySQL avec MariaDB  
- Node.js (si certains scripts en ont besoin)


## Installation

1. Cloner le dépôt
2. Installer les dépendances PHP
3. Créer une BDD et la lancer
4. Lancer le server Symfony avec symfony server:start

L'application sera accessible par défaut à http://127.0.0.1:8000

## Structure du projet
src/ – Code source principal
config/ – Configuration Symfony
migrations/ – Migrations de base de données
public/ – Dossier public (point d’entrée HTTP)
tests/ – Tests unitaires

## Partie Front
Le dépôt du Front Vue.js est à cloner séparément.
Il consomme cette API Symfony via des requêtes HTTP.

