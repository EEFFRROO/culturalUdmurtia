# culturalUdmurtia

### Требования
Для разворачивания проекта должен быть установлен docker

Нужно Склонировать проект к себе на локальную машину

В командной строке перейти по пути в скачанный репозиторий и выполнить команду:

```shell
docker-compose up -d --build
```

При самом первом запуске контейнеров выполнить команды:
```shell
docker-compose exec php-cult bash
```
```shell
composer install
```
```shell
php artisan parse:events
```
```shell
npm install
```

