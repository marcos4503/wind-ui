<?php
    //Import core files and start fragment renderization.
    include_once("../../../../../.core/base/fragment/wind-ui-fragment-prepare.php");
    WindUiFragmentRenderer::startFragment(__DIR__);
?>
<!-- Start of fragment content modifiable and visible to user area -->

<center>
    <h1>API PHP Backend: Ferramentas e Métodos Básicos</h1>
</center>

O Wind UI funciona com bibliotecas Backend e Frontend com várias ferramentas e recursos para que você crie seu aplicativo. Uma dessas
 ferramentas é a API Backend PHP do Wind UI. Com a API Backend em PHP, você tem métodos rápidos para efetuar ações que desenvolvedores
 Web geralmente precisam muito.

<br>
<br>

Aqui você encontra todos os métodos Backend PHP do Wind UI, porém, estes métodos são somente métodos básicos para que utilize em seus
 aplicativos.

<br>
<br>

Por favor, note que todos os métodos listados aqui são utilizáveis, e todos os códigos encontrados aqui são para referência, para que
 você saiba como utiliza-los e possa entender como eles funcionam e ter um código de exemplo para cada um.

<br>
<br>

<!-- isJson($string) -->
<?php 
    WindUiPhp::renderComponentHere("PhpMethodName", (object)array(
        "methodname"=>'isJson($string)'
    ), false);
?>
Este método analisa uma string que você forneça e caso seja um código JSON, retornará true.
<ul>
    <li>
        <b>$string (String)</b> - Neste argumento deve-se passar um texto string.
    </li>
</ul>
<?php 
    WindUiPhp::renderComponentHere("CodeBlock", (object)array(
    "language"=>"php",
    "codeToShow"=>
'//Inicio do código PHP
$variavel_1 = "{\"variavelJson\":\"conteudo\"}";

//Vai retornar "true"
if(WindUiPhp::isJson($variavel_1) == true){
    echo("A string é uma JSON.");
}
'
), false);
?>

<!-- DOMinnerHTML($element) -->
<?php 
    WindUiPhp::renderComponentHere("PhpMethodName", (object)array(
        "methodname"=>'DOMinnerHTML($element)'
    ), false);
?>
Este método retorna o texto que está dentro de um nó (entre tags) XML ou HTML. Para usar este método você antes
 precisa decodificiar uma string XML ou HTML usando a API nativa do PHP e então escolher um nó alvo e passa-lo
 para este método. Por exemplo, caso escolha o nó <b>&ltteste&gt</b>Texto dentro do nó<b>&lt/teste&gt</b>, este método retornará
 o texto que estiver dentro destas tags.
<ul>
    <li>
        <b>$element (DOMNode)</b> - Neste argumento deve-se passar um nó de um texto XML ou HTML.
    </li>
</ul>
<?php 
    WindUiPhp::renderComponentHere("CodeBlock", (object)array(
    "language"=>"php",
    "codeToShow"=>
'//Inicio do código PHP
$xmlString = "<?xml version=\"1.0\"> encoding=\"UTF-8\"?><root><node>Conteúdo de texto</node><node>Outro conteúdo de texto</node></root>";

//Decodificando a string xml e a transformando numa classe estruturada
$xmlDom = new DOMDocument;
$xmlDom->loadXML($xmlString);

//Obtendo o conteúdo de texto dos nós "node"
$nodes = $xmlDom->getElementsByTagName("node");
foreach($node as $nodes){
    $innerHTML = WindUiPhp::DOMinnerHTML($node);
}

//Exibirá o conteúdo de texto que estiver na variável "innerHTML" que foi extraído de dentro dos nós "node"
echo($innerHTML);
'
), false);
?>

<!-- End of fragment modifiable area -->
<?php
    //End of fragment renderization.
    WindUiFragmentRenderer::finishFragment();
?>