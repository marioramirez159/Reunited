We develop smart contracts on polygon that are found on the source/smartcontract

We used an API service on the laravel controls that you can find on this route; https://api-eu1.tatum.io/v3/ipfs to be able to upoad and scan the data on IPFS










# Creación del contenedor




IMPORTANT: YOU NEED TO HAVE THE FOLLOWING INSTALELED:
- docker: https://docs.docker.com/install/
- docker-compose: https://docs.docker.com/compose/install/

## STEPS TO FOLLOW

1. Clone the repo on the next route: "https://gitlab.com/adga137/mirai.git" with this command:

git clone https://gitlab.com/adga137/searchperson.git mirai

2. Copy all content from the nginx-mariadb folder

```
cd ~/searchperson/
```

3. Build the container and execute. This requires an admon (root) permits on linux.

```
docker-compose up --build
```

4. When executed the project opens a terminal instance ir console as (root) in lunux to create the bash container.

```
docker exec -it searchperson_php-fpm bash
```

5. Once in the bash project, we will be using the "~/src" folder, if needed execute:

```
composer install
```

6. Install acacha adminlte laravel template con lo siguiente:

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
