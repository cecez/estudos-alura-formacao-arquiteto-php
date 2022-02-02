```shell
# composer install
docker build -t php-003 .
docker run -it --volume $PWD:/usr/src/myapp --name php-003-rodando php-003
```

phpunit