
# symfony 6.4 + rabbitmq + docker

### Uruchamianie

```bash
docker compose up

php bin/console doctrine:migrations:migrate

php bin/console doctrine:fixtures:load


```


### Api Get token

request:

POST localhost/api/login   {emai: 'aaa@poczta.pl', 'password':'sdsds'}

response:

{'token': 'sdsd4545...}

### Api fetch data

GET localhost/api/product      --> with token bearer 'sdsd4545...'
POST localhost/api/product  {'name':'maslo','price':'44.5'}     --> with token bearer 'sdsd4545...'


### Messenger - start

// rabbitmq panel   haslo/login kalo
127.0.0.1:15672

php bin/console messenger:consume async -vv

//przyklad
localhost/api/message?message=sdsdsaaaaaa
