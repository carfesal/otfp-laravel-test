# otfp-laravel-test
Laravel Project for test in On The Fly Pos

Repositorio en [Github](https://github.com/carfesal/otfp-laravel-test/)

## Pasos para correr el proyecto: 
1. Clonar el proyecto del repositorio en github
2. Tener instalado docker 
3. Hacer una copia del archivo **.env.example** y renombrarlo a **.env**
4. Correr el comando ``` docker compose up -d``` 
5. Ingresar al contenedor con el comando 
   ```docker exec -it otfp-laravel-laravel.test-1 bash```
6. Dentro del contenedor correr los siguientes comandos:
   1. ```composer install```
   2. ```php artisan migrate```
   3. ```php artisan db:seed```
7. Ahora el proyecto estara listo para pruebas.

> El endpoint a atacar sera http://localhost/salary como metodo POST
> En el root del proyecto se adjunta un ejemplo del payload a utilizar 


> Se debera autenticar usand Basic Auth con las credenciales **username:** admin@admin.com 
> y **password:** Clave123+
