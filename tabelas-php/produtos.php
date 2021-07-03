<?php
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

$produtos = "CREATE TABLE produtos (
    id int primary key auto_increment,
    nome varchar(50) not null,
    data_cadastro date,
    quantidade int,
    unidade_id int not null,
	constraint unidade_fk foreign key (unidade_id) references unidades(id)
);\n\n";

$produtos .= "INSERT INTO produtos (nome, quantidade, data_cadastro, unidade_id) VALUES \n";

for ($i=0; $i < 1000; $i++) {   
    $nome = addslashes($faker->fruitName());
    $data_cadastro = $faker->date;
    $quantidade = $faker->numberBetween($min = 10, $max = 1000);
    $unidade_id = $faker->numberBetween($min = 1, $max = 1000);

    if($i<999){
        $produtos .= "('$nome', $quantidade, '$data_cadastro', '$unidade_id'),\n";
    }else{
        $produtos .= "('$nome', x''$quantidade, '$data_cadastro', '$unidade_id');\n";
    }
}

$fp = fopen("gerados/produtos.sql", "w");
fwrite($fp, $produtos);
fclose($fp);

print '<h3>Arquivo criado</h3>';
