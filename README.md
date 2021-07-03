Faker PHP
=========

Este repositório é um fork do FakerRestaurant com muita informação sobre o Faker do fzaninotto

[https://github.com/fzaninotto/Faker](https://github.com/fzaninotto/Faker)

[https://github.com/jzonta/FakerRestaurant](https://github.com/jzonta/FakerRestaurant)

Adaptação de Ribamar FS

Aqui trago o fork restaurant do faker com algun exemplos do faker e alguns resclarecimentos além de um esquema que criei para a criação de dados para tabelas e já gerar o SQL.

Pesquisei várias alternativas para produção da dados/registros para testes aleatórios para bancos/sql.

Fui desde o generatedata.com, passei por stored procedures, pela criação de arquivos sql usando funções do php para gerar strings e datas aleatórias.
O generatedata.com é muito bom mas online somente gera 100 registros e eu quero gerar um milhão.
Stored procedures e funções do php geram dados bem longe de parecer com dados reais.
Acontece que alguém já havia pensado e investido muito neste assunto e foi a melhor alternativa encontrada, a biblioteca Faker:
https://github.com/fzaninotto/Faker

Muitos recursos para o assunto. Ela já tem variáveis e objetos para vários tipos de dados: nome, email, data, endereço, cidade, estado, pais, etc. 
Sem contar que gera dados localizados, bem aprecidos com dados reais, com nomes brasileiros, por exemplo.
É tanto que esta bibliteca atualmente é utilizada por diversos frameworks.

## Como Usar

A estrutura já está pronta. Falta apenas:

- Executar o "composer install" no raiz
- Copiar um dos arquivos em tabelas-php e renomear para a sua tabela. Efetuar os devidos ajustes, com nomes de  campos, tamanhos, etc
- Indicar o nome do seu arquivo php para a sua tabela no index.php
- Chamar pelo navegador e esperar um pouco, somente se tiver configurado para uma grande quantidade de registros
Pronto, pode pegar seu sql na pasta gerados
=======
Para facilitar crie uma cópia de algum dos arquivos .php para tabelas que eu criei.
Faça as adaptações para sua tabela e campos e inclua no index.php e o execute para que gere o .sql.

## Algumas experiências

Demora para criar o arquivo com um milhão de registros, depende do computador.
Num micro com 4GB de RAM, core i3 ele demorou 20 minutos para gerar o arquivo.

Quanto alterei para usar pt_BR o tempo aumentou para 26 minutos e o tamanho do arquivo de 76MB para 86MB.
Mas valeu a pena pois a opção localizada gera dados mais parecidos com os nossos reais no Brasil.

Para dar uma ideia: para abrir o arquivo no gedit levou 4 minutos.

## Como Usar

Crie um arquivo com o código desejado e inclua no index.php e o execute para que gere o .sql.

```php
<?php

$faker = \Faker\Factory::create();
$faker->addProvider(new \FakerRestaurant\Provider\en_US\Restaurant($faker));

// Generator
$faker->foodName();      // Nome de alimento aleatório
$faker->beverageName();  // Bebidas
$faker->dairyName();  // Laticínios
$faker->vegetableName();  // Vegetais
$faker->fruitName();  // Frutas
$faker->meatName();  // Carnes
$faker->sauceName();  // Molhos
```
## Abaixo cito alguns dos métodos/variáveis da biblioteca faker com algo da restaurant

Biblioteca Faker para PHP

Geração de dados fake para testar aplicativos

"Um problema muito comum que temos quando desenvolvemos grandes sistemas, é criar dados fake para realizarmos testes de carga, aceitação, para mostrar para o cliente uma simulação da aplicação ou só para não usar nomes como “Teste”, “Testeiro”, “Testeira”, “Teste show” ou seus dados pessoais nesse caso.

Para isso, existe um pacote sensacional escrito em PHP, o Faker. Com ele você pode gerar muitos tipos de dados fake para utilizar nos testes da sua aplicação. Nomes, datas, endereços, telefones, números, dados de empresas, exemplos de pagamento, imagens, textos e mais um monte de dados, podendo até gerar esses dados em diversas línguas."

Citação de:

https://imasters.com.br/back-end/voce-deveria-usar-o-faker-para-criar-seus-dados-de-teste-em-php

Alguns dos métodos e variáveis:

$nome = addslashes($faker->name);
$cpf = $faker->numberBetween($min = 10000000000, $max = 99999999999);
$quantidade = $faker->randomNumber($nbDigits = NULL, $strict = false);
$preco_venda = $faker->numberBetween($min = 20, $max = 1200);

title($gender = null|'male'|'female')     // 'Ms.'
titleMale                                 // 'Mr.'
titleFemale                               // 'Ms.'
suffix                                    // 'Jr.'
name($gender = null|'male'|'female')      // 'Dr. Zane Stroman'
firstName($gender = null|'male'|'female') // 'Maynard'
firstNameMale                             // 'Maynard'
firstNameFemale                           // 'Rachel'
lastName                                  // 'Zulauf'

Faker\Provider\en_US\Address

cityPrefix                          // 'Lake'
secondaryAddress                    // 'Suite 961'
state                               // 'NewMexico'
stateAbbr                           // 'OH'
citySuffix                          // 'borough'
streetSuffix                        // 'Keys'
buildingNumber                      // '484'
city                                // 'West Judge'
streetName                          // 'Keegan Trail'
streetAddress                       // '439 Karley Loaf Suite 897'
postcode                            // '17916'
address                             // '8888 Cummings Vista Apt. 101, Susanbury, NY 95473'
country                             // 'Falkland Islands (Malvinas)'
latitude($min = -90, $max = 90)     // 77.147489
longitude($min = -180, $max = 180)  // 86.211205

Faker\Provider\en_US\PhoneNumber

phoneNumber             // '201-886-0269 x3767'
tollFreePhoneNumber     // '(888) 937-7238'
e164PhoneNumber     // '+27113456789'

date($format = 'Y-m-d', $max = 'now') // '1979-06-09'
time($format = 'H:i:s', $max = 'now') // '20:49:42'

email                   // 'tkshlerin@collins.com'
userName                // 'wade55'
password                // 'k&|X+a45*2['
domainName              // 'wolffdeckow.net'

Faker\Provider\Payment

creditCardType          // 'MasterCard'
creditCardNumber        // '4485480221084675'
creditCardExpirationDate // 04/13
creditCardExpirationDateString // '04/13'
creditCardDetails       // array('MasterCard', '4485480221084675', 'Aleksander Nowak', '04/13')
// Generates a random IBAN. Set $countryCode to null for a random country
iban($countryCode)      // 'IT31A8497112740YZ575DJ28BP4'
swiftBicNumber          // 'RZTIAT22263'

fileExtension          // 'avi'
file($sourceDir, $targetDir, false) // '13b73edae8443990be1aa8f1a483bc27.jpg'

Miscellaneous

boolean // false
boolean($chanceOfGettingTrue = 50) // true
md5           // 'de99a620c50f2990e87144735cd357e7'
sha1          // 'f08e7f04ca1a413807ebc47551a40a20a0b4de5c'
sha256        // '0061e4c60dac5c1d82db0135a42e00c89ae3a333e7c26485321f24348c7e98a5'
locale        // en_UK
countryCode   // UK
languageCode  // en
currencyCode  // EUR
emoji         // 😁

Loren
randomHtml(2,3)

Base

randomDigit             // 7
randomDigitNot(5)       // 0, 1, 2, 3, 4, 6, 7, 8, or 9
randomDigitNotNull      // 5
randomNumber($nbDigits = NULL, $strict = false) // 79907610
randomFloat($nbMaxDecimals = NULL, $min = 0, $max = NULL) // 48.8932
numberBetween($min = 1000, $max = 9000) // 8567
randomLetter            // 'b'
// returns randomly ordered subsequence of a provided array
randomElements($array = array ('a','b','c'), $count = 1) // array('c')
randomElement($array = array ('a','b','c')) // 'b'
shuffle(array(1, 2, 3)) // array(2, 1, 3)
numerify('Hello ###') // 'Hello 609'
lexify('Hello ???') // 'Hello wgt'
bothify('Hello ##??') // 'Hello 42jz'
asciify('Hello ***') // 'Hello R6+'
regexify('[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}'); // sm0@y8k96a.ej


word                                             // 'aut'
words($nb = 3, $asText = false)                  // array('porro', 'sed', 'magni')
sentence($nbWords = 6, $variableNbWords = true)  // 'Sit vitae voluptas sint non voluptates.'
sentences($nb = 3, $asText = false)              // array('Optio quos qui illo error.', 'Laborum vero a officia id corporis.', 'Saepe provident esse hic eligendi.')
paragraph($nbSentences = 3, $variableNbSentences = true) // 'Ut ab voluptas sed a nam. Sint autem inventore aut officia aut aut blanditiis. Ducimus eos odit amet et est ut eum.'
paragraphs($nb = 3, $asText = false)             // array('Quidem ut sunt et quidem est accusamus aut. Fuga est placeat rerum ut. Enim ex eveniet facere sunt.', 'Aut nam et eum architecto fugit repellendus illo. Qui ex esse veritatis.', 'Possimus omnis aut incidunt sunt. Asperiores incidunt iure sequi cum culpa rem. Rerum exercitationem est rem.')
text($maxNbChars = 200)                          // 'Fuga totam reiciendis qui architecto fugiat nemo. Consequatur recusandae qui cupiditate eos quod.'


randomNumber($nbDigits = NULL, $strict = false) // 79907610
randomFloat($nbMaxDecimals = NULL, $min = 0, $max = NULL) // 48.8932
numberBetween($min = 1000, $max = 9000) // 8567

echo $faker->regexify('[sn]').'<br>'; // s ou n
echo $faker->randomElement($array = array ('s','n'));
echo $faker->randomLetter;
echo $faker->regexify('[A-Z]+[a-z]{2,5}'); // 2 a 5 letras
echo $faker->regexify('[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}').'<br>'; // sm0@y8k96a.ej
echo $faker->randomElement($array = array ('a','b','c')).'<br>'; // 'b'
print $faker->sentence($nbWords = 3, $variableNbWords = true);
echo $faker->sentence($nbWords = 6, $variableNbWords = true).'<br>';
echo $faker->address.'<br>'; // rua, número e cep
echo $faker->text.'<br>'; // Para grandes quantidades de texto
echo $faker->sentence($nbWords = 6, $variableNbWords = true).'<br>';
echo $faker->text($maxNbChars = 200).'<br>';
echo $faker->title($gender = null|'male'|'female').'<br>';     // 'Ms.'
echo $faker->name($gender = null|'male'|'female').'<br>';      // 'Dr. Zane Stroman'
echo $faker->cityPrefix.'<br>';
echo $faker->state.'<br>';
echo $faker->stateAbbr.'<br>';
echo $faker->buildingNumber.'<br>';
echo $faker->city.'<br>';
echo $faker->streetName.'<br>';
echo $faker->streetAddress.'<br>';
echo $faker->postcode.'<br>';
echo $faker->country.'<br>';
echo $faker->PhoneNumber.'<br>';
echo $faker->company.'<br>';
echo $faker->date($format = 'Y-m-d', $max = 'now').'<br>';
echo $faker->time($format = 'H:i:s', $max = 'now').'<br>';
echo $faker->freeEmail.'<br>';
echo $faker->password.'<br>';
echo $faker->domainName.'<br>';
echo $faker->url.'<br>';
echo $faker->ipv4.'<br>';
echo $faker->macAddress.'<br>';
echo $faker->creditCardType.'<br>';
echo $faker->creditCardNumber.'<br>';
echo $faker->creditCardExpirationDateString.'<br>';
echo $faker->hexcolor.'<br>';
echo $faker->colorName.'<br>';
echo $faker->fileExtension.'<br>';
echo $faker->mimeType.'<br>';
echo $faker->locale.'<br>';
echo $faker->countryCode.'<br>';
echo $faker->randomHtml(2,3).'<br>';

Mais em:

https://github.com/fzaninotto/Faker

Restaurant

$faker = \Faker\Factory::create();
$faker->addProvider(new \FakerRestaurant\Provider\pt_BR\Restaurant($faker));

// Generator
$faker->foodName();      // Nome de alimento aleatório
$faker->beverageName();  // Bebidas
$faker->dairyName();  // Laticínios
$faker->vegetableName();  // Vegetais
$faker->fruitName();  // Frutas
$faker->meatName();  // Carnes
$faker->sauceName();  // Molhos

Mais detalhes em:

https://github.com/jzonta/FakerRestaurant


