# Skeleton
Custom symfony skeleton.

Includes:
- Doctrine
- Nelmio
- Sentry
- Monolog

## Install
 ```bash
 composer create-project biglion-tech/symfony-skeleton \
 --stability=dev \
 --no-secure-http
 ```

## Deploy to minikube:
```bash
task deploy-dev
task exec-php
php bin/console doctrine:database:create
php bin/console doctrine:schema:create

```

## Start testing
```bash
tesk exec-test
```