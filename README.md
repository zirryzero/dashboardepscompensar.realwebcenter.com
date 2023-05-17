# CodeIgniter 4 Application Starter

## What is CodeIgniter?

CodeIgniter is a PHP full-stack web framework that is light, fast, flexible and secure.
More information can be found at the [official site](https://codeigniter.com).

This repository holds a composer-installable app starter.
It has been built from the
[development repository](https://github.com/codeigniter4/CodeIgniter4).

More information about the plans for version 4 can be found in [CodeIgniter 4](https://forum.codeigniter.com/forumdisplay.php?fid=28) on the forums.

The user guide corresponding to the latest version of the framework can be found
[here](https://codeigniter4.github.io/userguide/).

## Installation & updates

`composer create-project codeigniter4/appstarter` then `composer update` whenever
there is a new release of the framework.

When updating, check the release notes to see if there are any changes you might need to apply
to your `app` folder. The affected files can be copied or merged from
`vendor/codeigniter4/framework/app`.

## Setup

Copy `env` to `.env` and tailor for your app, specifically the baseURL
and any database settings.

## Important Change with index.php

`index.php` is no longer in the root of the project! It has been moved inside the *public* folder,
for better security and separation of components.

This means that you should configure your web server to "point" to your project's *public* folder, and
not to the project root. A better practice would be to configure a virtual host to point there. A poor practice would be to point your web server to the project root and expect to enter *public/...*, as the rest of your logic and the
framework are exposed.

**Please** read the user guide for a better explanation of how CI4 works!

## Repository Management

We use GitHub issues, in our main repository, to track **BUGS** and to track approved **DEVELOPMENT** work packages.
We use our [forum](http://forum.codeigniter.com) to provide SUPPORT and to discuss
FEATURE REQUESTS.

This repository is a "distribution" one, built by our release preparation script.
Problems with it can be raised on our forum, or as issues in the main repository.

## Server Requirements

PHP version 7.4 or higher is required, with the following extensions installed:

- [intl](http://php.net/manual/en/intl.requirements.php)
- [mbstring](http://php.net/manual/en/mbstring.installation.php)

Additionally, make sure that the following extensions are enabled in your PHP:

- json (enabled by default - don't turn it off)
- [mysqlnd](http://php.net/manual/en/mysqlnd.install.php) if you plan to use MySQL
- [libcurl](http://php.net/manual/en/curl.requirements.php) if you plan to use the HTTP\CURLRequest library

# Spanish

# Inicio de la aplicación de CodeIgniter 4
## ¿Qué es CodeIgniter?
CodeIgniter es un marco de aplicaciones web completo en PHP que es ligero, rápido, flexible y seguro. Puedes encontrar más información en el sitio oficial.

Este repositorio contiene una aplicación inicializable a través de Composer. Ha sido construido a partir del repositorio de desarrollo.

Puedes encontrar más información sobre los planes para la versión 4 en CodeIgniter 4 en los foros.

La guía del usuario correspondiente a la última versión del marco se puede encontrar aquí.

## Instalación y actualizaciones

Ejecuta el comando "composer create-project codeigniter4/appstarter" y luego "composer update" cada vez que haya una nueva versión del marco.

Al actualizar, revisa las notas de la versión para ver si hay cambios que debas aplicar a tu carpeta de la aplicación. Los archivos afectados se pueden copiar o fusionar desde "vendor/codeigniter4/framework/app".

##Configuración

Copia el archivo "env" a ".env" y ajústalo para tu aplicación, especialmente la URL base y cualquier configuración de la base de datos.

Cambio importante con index.php
¡El archivo index.php ya no se encuentra en la raíz del proyecto! Se ha movido dentro de la carpeta "public" para una mejor seguridad y separación de componentes.

Esto significa que debes configurar tu servidor web para que "apunte" a la carpeta "public" de tu proyecto, y no a la raíz del proyecto. Sería una práctica recomendada configurar un host virtual para apuntar allí. Sería una mala práctica apuntar tu servidor web a la raíz del proyecto y esperar ingresar a "public/...", ya que el resto de tu lógica y el marco estarían expuestos.

¡Lee la guía del usuario para una mejor explicación de cómo funciona CI4!

## Gestión del repositorio

Utilizamos problemas en GitHub en nuestro repositorio principal para rastrear ERRORES y paquetes de trabajo de DESARROLLO aprobados. Utilizamos nuestro foro para proporcionar APOYO y discutir SOLICITUDES DE FUNCIONES.

Este repositorio es una "distribución", construida mediante nuestro script de preparación de lanzamientos. Los problemas relacionados con él se pueden plantear en nuestro foro o como problemas en el repositorio principal.

## Requisitos del servidor
Se requiere PHP versión 7.4 o superior, con las siguientes extensiones instaladas:

intl
mbstring
Además, asegúrate de que las siguientes extensiones estén habilitadas en tu PHP:

json (habilitado de forma predeterminada, no lo desactives)
mysqlnd si planeas usar MySQL
libcurl si planeas usar la biblioteca HTTP\CURLRequest.
