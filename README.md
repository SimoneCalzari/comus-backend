<h1 align="center">

    Comus Backend

</h1>
<!-- <h1 align="center">
</h1> 
-->

<!-- <p align="center">
  <a href="https://badge.fury.io/js/electron-markdownify">
    <img src="https://badge.fury.io/js/electron-markdownify.svg"
         alt="Gitter">
  </a>
  <a href="https://gitter.im/amitmerchant1990/electron-markdownify"><img src="https://badges.gitter.im/amitmerchant1990/electron-markdownify.svg"></a>
  <a href="https://saythanks.io/to/bullredeyes@gmail.com">
      <img src="https://img.shields.io/badge/SayThanks.io-%E2%98%BC-1EAEDB.svg">
  </a>
  <a href="https://www.paypal.me/AmitMerchant">
    <img src="https://img.shields.io/badge/$-donate-ff69b4.svg?maxAge=2592000&amp;style=flat">
  </a>
</p> -->

<p align="center">
  <a href="#description">Description</a> •
  <a href="#how-to-use">How To Use</a> •
  <a href="#used-technologies">Used technologies</a>
</p>

![screenshot](/public/img/welcome.png)

## Description

Comus, una web-app di food delivery.

⚙ Sviluppato con una meticolosa pianificazione divisa in tre fasi:

-   progettazione
-   sviluppo back-end, utilizzando Laravel 10
-   sviluppo front-end, con VueJS e Bootstrap

📱 La piattaforma è divisa in 2 sezioni, quella per i ristoratori, dal quale potranno gestire il loro ristorante, permettendo di aggiungere/modificare/eliminare i piatti e visualizzare gli ordini ricevuti; e una parte per i consumatori, che avranno la possibilità di filtrare i ristoranti, in base ai loro bisogni e aggiungendo i piatti al carrello, sarà possibile effettuare l'ordine.

## How To Use

-   install MAMP

    -   MAMP -> preferences -> server -> doc root (insert exercise folder path)

-   open webStart page MAMP -> http://localhost/MAMP/index.php?language=English&page=phpinfo and check php version
-   or check in terminal -> php -v

-   variabili di ambiene in windows

    -   path
    -   su una nuova riga incolla
        -   C:\MAMP\bin\php\php8.3.1 (ultimo pezzo metti la versione corrente)

-   apri php.ini

    -   open webStart page MAMP -> http://localhost/MAMP/index.php?language=English&page=phpinfo and check php version
    -   Loaded Configuration File -> copy path and paste in files

    -   Per debug errori php:

        -   extension=php_xdebug.dll -> remove ';'

    -   add

        -   xdebug.mode=development

        -   xdebug.start_with_request=yes

        -   xdebug.remote_enable = 1
        -   xdebug.remote_autostart = 1

-   file storage (per vedere le immagini dal backend) (slide 8 gennaio Boolean)

    -   paste img folder in storage/app/public
    -   php artisan storage:link

-   create .env file

    -   DB_DATABASE
    -   DB_PASSWORD

-   composer install
    -   modify php.ini
        -   extension=pdo_mysql

## Used technologies

This software uses the following technologies:

-   [PHP](https://it.wikipedia.org/wiki/PHP)
-   [Laravel](https://laravel.com/)
