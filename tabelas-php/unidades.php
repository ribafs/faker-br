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

$unidades = "CREATE TABLE unidades (
    id int primary key auto_increment,
    unidade varchar(4) not null
);
";

// Registros
$unidades .= "INSERT INTO unidades (unidade) VALUES \n";

function randUnidade($length = 4) {
    $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

for ($i=0; $i < 1000; $i++) {
    $unidade = randUnidade();

    if($i<1000-1){
        $unidades .= "('$unidade'),\n";
    }else{
        $unidades .= "('$unidade');\n";
    }
}
$fp = fopen("gerados/unidades.sql", "w");
fwrite($fp, $unidades);
fclose($fp);

print '<h3>Arquivo criado</h3>';
