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
php artisan migrate
```
```shell
php artisan parse:events
```
###### Выполняется долго(парсится сторонний сайт)
```shell
npm install
```

### Сайт открывается на localhost:8080

Можно настроить cron на парсинг ежедневный парсинг ночью(или чаще, по желанию):
```shell
0 0 * * * php artisan parse:events
```

