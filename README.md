## Aplicación de prueba para GLM

Esta aplicación corresponde a las funcionalidades solicitadas en la prueba técnica bajo framework Laravel 8 o superior. 
## Base de datos
-	El nombre de la base de datos es glmtest, por lo cual se recomienda el este comando __CREATE DATABASE glmtest;__.
-	La aplicación Laravel contiene el modelo de base de datos en su modelo migrate, para lo cual se recomienda correr el siguiente código sobre consola. __php artisan migrate__.
## Aplicación
-	En el archivo .env parámetro **ADMIN_EMAIL** se registrara el correo electrónico del administrador al cual se enviara el correo solicitado en la prueba. 
-	En el controlador SystemController se encuentran las funcionalidades de las diferentes peticiones en el flujo del sistema.