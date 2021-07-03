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

$customers = "CREATE TABLE customers (
    id int primary key auto_increment,
    name varchar(50) not null,
    email varchar(50),
    city varchar(50)
);
";

// Registros
$customers .= "INSERT INTO customers (name,email,city) VALUES \n";

for ($i=0; $i < 999; $i++) {
		$name = addslashes($faker->name);
		$name = str_replace("'", "\'", $name);		
		$email = $faker->email;
    $city = $faker->city;

    if($i<1000){
        $customers .= "(\"$name\",\"$email\",\"$city\"),\n";
    }else{
        $customers .= "(\"$name\",\"$email\",\"$city\");\n";
    }
}

$fp = fopen("gerados/customers.sql", "w");
fwrite($fp, $customers);
fclose($fp);

print '<h3>Arquivo criado</h3>';
