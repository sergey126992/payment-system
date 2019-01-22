# Simple Payment System Application

Work with Laravel, MySQL and Cron

## Basic functions
* Api for create payment
* Cron sending payments to operators with using of multithreading
* Cron notification partners for change payment status with using of multithreading
* Console command for send payment and change payment status

## Installation

Require this package with git.

```shell
git clone https://github.com/sergey126992/payment-system.git
```

Create tables with migrate command:

```shell
php artisan migrate
```

Console command for send payment and update payment status:

```shell
php artisan payment:send
php artisan payment:update
```

For create Cron process, you mast add cron-command for Crontab

```shell
crontab -e
```
And save to file

```shell
* * * * * php /path/to/artisan schedule:run >> /dev/null 2>&1
```

## Multithreading

For multithreading using PCNTL functions

