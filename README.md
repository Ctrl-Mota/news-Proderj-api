# Passo a passo Instalação

## Instalar dependências

`composer install`

## Configurar o acesso ao DB local (ENV)

 1-crie um Schema no DB para se conectar <br>
 2-Coloque os dados de login e o nome do schema que foi criado que foi criado

## Gerar tabelas

`php artisan migrate`

## Popular tabela de Noticias com alguns dados aleatórios para teste(opcional)

`php artisa db:seed`

## Rodar o projeto local

`php artisan serve`

### lembrete

Após emular o app é necessário reverter a porta de acesso do adb para as aplicações se comunicarem, ja com as duas aplicações rodando, digite:

`adb reverse tcp:8000 tcp:8000`


## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
