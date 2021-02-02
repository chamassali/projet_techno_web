---
title: ”Projet techno web”
author:
- Arnal Théo
- Chamass Ali
output:
pdf_document: default
---

<h1>Pour le bon fonctionnement du projet, veuillez suivre les étapes suivantes :<h1/>

#Installation de la librairie du panier
Sur le terminal du projet, lancer la commande suivante pour télécharger la libraire du panier : 

<strong>composer require hardevine/shoppingcart</strong>

Lien github de la librairie : https://github.com/hardevine/LaravelShoppingcart 

S'il y a une erreur qui apparaît par rapport à la mémoire, il faut aller sur laragon, faire clique droit, aller dans PHP -> Quick settings -> memory_limit et augmenter la mémoire.

#Installation de la librairie du pdf
Sur le terminal du projet, lancer la commande suivante pour télécharger la libraire du pdf : 

<strong>composer require barryvdh/laravel-dompdf</strong>

Lien github de la librairie : https://github.com/barryvdh/laravel-dompdf

Ensuite dans le dossier du projet, aller dans config -> app.php et coller les lignes suivantes tout en haut di fichier : 

    'providers' => [
        //....
        Barryvdh\DomPDF\ServiceProvider::class,
    ],
      
    'aliases' => [
        // ....
        'PDF' => Barryvdh\DomPDF\Facade::class,
    ],


#Attention : L'envoi de mail ne fonctionnera sur votre machine car il faut faire une configuration sur gmail pour récupérer une clé de sécurité.
