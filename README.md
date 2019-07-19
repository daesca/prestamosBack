##Descripcion
=================

Este proyecto corresponde a la versión BackEnd de la prueba propuesta, el cual involucra todo lo relacionado con el consumo de la base de datos y el retorno de datos (API).

## Prerequisitos
==================

Contar con las siguientes tecnologías:

PHP(version 7.3.5)
Composer (version 1.8.6)

El proyecto contiene el script que le permitirá crear las tablas de la base de datos con la que se trabajó. Importelo en su gestor de base de datos.

##Instalación
====================

Una vez descargado el proyecto, ingrese a la terminal de su servidor y acceda a la carpeta raiz en la que el proyecto se guardó.

Estando en la carpeta raíz y una vez instalado tambien Composer, ejecute el comando 'composer install' para que el gestor de dependencias instale los componentes necesarios para ejecutar el proyecto.

Finalizado lo anterior, se procede a acceder al archivo '.env-example' que se encuentra alojado en el directorio raíz del proyecto. Edite el nombre del archivo,de tal forma que solo se denomine ".env". Dentro se deben alojar los datos necesarios para acceder a la base de datos de la cual se desea adquirir la información. Copie y pegue la siguiente estructura (obviando la descripción que se hace de cada variable):

hostname=localhost --> Nombre del host.
dbname=prestamos   --> Nombre de la base de datos.
user=root          --> Usuario con el que se accede a la base de datos.
password=          --> Contraseña con la cual se accede a la base de datos.

Definidas las variables de acceso, configure el puerto del host en el que desee que el proyecto se ejecute. Puede usar el comando 'php -S localhost:8080' para activar el puerto que guste (en este caso, el puerto 8080).

Ya el proyecto se encuentra listo para su correcto funcionamiento.

## Agradecimientos
========================

Se agradece la oportunidad ofrecida en este proceso de selección de formar parte de un equipo de desarrollo con grandes posibilidades de crecimiento a nivel profesional y personal.

Muchas gracias