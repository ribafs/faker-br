<?php

if(!file_exists('vendor/autoload.php')){
    print '<h3 align="center">Precisa executar antes o comando "composer install" no raiz<br>Lembre de dar permissão de escrita para o servidor web nesse diretório</h3>';
    exit;
}

// Como exemplo vamos criar uma tabela com 1000 registros
require 'vendor/autoload.php';

$faker = \Faker\Factory::create();
$faker->addProvider(new \FakerRestaurant\Provider\pt_BR\Restaurant($faker));

ini_set('max_execution_time', '-1');// Ilimitados
ini_set('max_input_time', 120);// spt
ini_set('max_input_nesting_level', 64);//s
ini_set('memory_limit', '-1');//Ilimitada

$faker = Faker\Factory::create('pt_BR');
$faker->addProvider(new \FakerRestaurant\Provider\pt_BR\Restaurant($faker));

require_once 'tabelas-php/clientes.php';

