<?php

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

$frutas = "CREATE TABLE frutas (
    id int primary key auto_increment,
    fruta varchar(20) not null,
    data date,
    valor int
);
";

// Registros
$frutas .= "INSERT INTO frutas (fruta, data, valor) VALUES \n";

$frutaa = array('Banana'=>0,'Manga'=>1,'Laranja'=>2);

for ($i=0; $i < 10; $i++) {
	    $fruta = array_rand($frutaa);
	    $data = $faker->date;
        $valor = $faker->numberBetween($min = 20, $max = 1200);;

    if($i<1000){
        $frutas .= "('$fruta','$data','$valor'),\n";
    }else{
        $frutas .= "('$fruta','$data','$valor');\n";
    }
}

$fp = fopen("gerados/frutas.sql", "w");
fwrite($fp, $frutas);
fclose($fp);

print '<h3>Arquivo criado</h3>';
