<?php

//Usando o Composer(2/2) - como inserir minhas próprias classes e nosso próprio padrão dentro do autoload do composer:

//uma das formas é ir no arquivo composer.json e colocar um namespace, e indicar em qual pasta vai estar, nesse caso {"classes\\":<- nome do namespace,  pasta->"classes/"}

/*
"autoload": {
    "psr-4": {"classes\\": "classes/"} 
}
}

o namespace vai dizer o nome inicial que é para procurar, entao todo lugar que estiver com aquele namespace vai ser achado, automaticamente saberá que a classe é a seguinte ao namespace, o namespace é so para dizer: procure a classe aqui! achando pegará e seguinte: namespace-> classes/classe <-classe que vai ser pega

agora preciso adicionar o namespace ao nome das classes no arquivo matematica.php: 
Exemplo:

->   NomedoNameSpace\classe  <-- classe que vai ser pega

<?php
namespace classes\matematica;   <---

class Basica{
public function somar($x, $y){
   return $x + $y;
}
}


e no composer.json:

"autoload": {
"psr-4": { "classes\\": "classes/" }
}

no index.php puxamos as classes com:
    
        use \classes\matematica\Basica;

para ai sim usar as classes abaixo.

feito essas alterações no arquivo composer.json e no matematica.php.
agora abrimos o prompt de comando e pedimos para regerar/recarregar o composer:

com o comando:   composer dump-autoload


no index.php:
*/


require 'vendor/autoload.php';
require 'classes/Matematica.php';

//código copiado na parte de baixo do repositório + adicionado uso de classe criada por mim class Basica e namespace matematica:

use \classes\matematica\Basica;  //<--para puxar e usar abaixo classes que criei na pasta classes
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Monolog\Level;


// create a log channel
$log = new Logger('name');
$log->pushHandler(new StreamHandler('TesteSalvar.log', Level::Warning)); //informa(cria) o arquivo/pasta que ficará salvo


$n = new Basica();
echo $n->somar(10, 10);

// add records to the log, adiciona 2 registros:
$log->warning('Foo');
$log->error('Bar');


?>