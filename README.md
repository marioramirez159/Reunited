We develop smart contracts on polygon that are found on the source/smartcontract

We used an API service on the laravel controls that you can find on this route; https://api-eu1.tatum.io/v3/ipfs to be able to upoad and scan the data on IPFS










# Creación del contenedor





IMPORTANTE: Antes de seguir deberemos tener instalado:
- docker: https://docs.docker.com/install/
- docker-compose: https://docs.docker.com/compose/install/

## Pasos a Seguir

1. Luego de Clonar del repositorio de la ruta: "https://gitlab.com/adga137/mirai.git" con el siguiente comando:

git clone https://gitlab.com/adga137/searchperson.git mirai

2. Copiar de la carpeta nginx-mariadb todo su contenido

```
cd ~/searchperson/
```

3. El siguiente paso es contruir el contenedor y ejemcutarlo para hacer este proceso se requieren permisos de administrador (root) en linux

```
docker-compose up --build
```

4. Una vez en ejecución el proyecto abrir una instancia de la terminal o consola como (root) en linux para acceder al bash del contenedor

```
docker exec -it searchperson_php-fpm bash
```

5. Una vez dentro de la bash del proyecto estaremos en la carpeta "~/src" si necesitamos composer podemos ejecutar:

```
composer install
```

6. Luego instalar acacha adminlte laravel template con lo siguiente:

```
composer require "acacha/admin-lte-template-laravel"
php artisan vendor:publish --tag=adminlte --force

composer require yajra/laravel-datatables-oracle
php artisan vendor:publish --tag=datatables --force
```

7. Una vez terminadas toda la contrucción del proyecto cada vez que querramos ejecutarlo solo debemos ejecutar:

```
docker-compose up
```

8. Para accceder al proyecto desde el navegador:

```
localhost:817
```


9. Parar la ejecución del contenedor pulsar teclas en la consola de ejecución "Ctrl + c"


Nota: para eliminar la imagen o contenedor se debe ejecutar:

```
docker rmi searchperson_php-fpm
docker rmi searchperson_nginx
docker rmi searchperson_mariadb
```

Para consultar la lista de imagenes de contenedores ejecutar:

```
docker images
```
