<?php

// Como exemplo vamos criar uma tabela com 1000 registros

require 'vendor/autoload.php';

$faker = \Faker\Factory::create();
$faker->addProvider(new \FakerRestaurant\Provider\pt_BR\Restaurant($faker));
/*
ini_set('max_execution_time', '-1');// Ilimitados
ini_set('max_input_time', 120);// spt
ini_set('max_input_nesting_level', 64);//s
ini_set('memory_limit', '-1');//Ilimitada
*/
ini_set('display_errors', '1');
$faker = Faker\Factory::create('pt_BR');
$faker->addProvider(new \FakerRestaurant\Provider\pt_BR\Restaurant($faker));

$clientes = "CREATE TABLE clientes (
    id int primary key auto_increment,
    nome varchar(50) not null,
    email varchar(50),
    cpf varchar(11)
);
";

// Registros
$clientes .= "INSERT INTO clientes (nome, email, cpf) VALUES \n";

for ($i=0; $i < 1000; $i++) {
    $nome = $faker->name;
	$email = $faker->email;
    $cpf = $faker->numberBetween($min = 10010020003, $max = 99999999999);;

    if($i<1000-1){
        $clientes .= "('$nome','$email','$cpf'),\n";
    }else{
        $clientes .= "('$nome','$email','$cpf');\n";
    }
}
$fp = fopen("gerados/clientes.sql", "w");
fwrite($fp, $clientes);
fclose($fp);

print '<h3>Arquivo criado</h3>';
