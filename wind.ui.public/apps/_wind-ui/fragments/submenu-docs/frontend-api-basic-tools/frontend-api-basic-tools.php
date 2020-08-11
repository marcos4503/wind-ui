<?php
    //Import core files and start fragment renderization.
    include_once("../../../../../.core/base/fragment/wind-ui-fragment-prepare.php");
    WindUiFragmentRenderer::startFragment(__DIR__);
?>
<!-- Start of fragment content modifiable and visible to user area -->

<center>
    <h1>API JavaScript Frontend: Ferramentas e Métodos Básicos</h1>
</center>

O Wind UI funciona com bibliotecas Backend e Frontend com várias ferramentas e recursos para que você crie seu aplicativo. Uma dessas
 ferramentas é a API Frontend JavaScript do Wind UI. Com a API Frontend em JavaScript, você tem métodos rápidos para efetuar ações que
 desenvolvedores Web geralmente precisam muito.

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

<!-- isFunction(variableToCheck) -->
<?php 
    WindUiPhp::renderComponentHere("JsMethodName", (object)array(
        "methodname"=>"isFunction(variableToCheck)"
    ), false);
?>
Este método analisa uma variável, e caso o conteúdo dela seja uma função JavaScript, retornará true.
<ul>
    <li>
        <b>variableToCheck (Object)</b> - Neste argumento deve-se passar uma variável que contenha ou não uma função JavaScript.
    </li>
</ul>
<?php 
    WindUiPhp::renderComponentHere("CodeBlock", (object)array(
    "language"=>"javascript",
    "codeToShow"=>
'//Inicio do código JavaScript
var variavel = function(){ console.log("Ok!"); }

//Vai retornar "true"
if(WindUiJs.isFunction(variavel) == true){
    console.log("É uma função.");
}
'
), false);
?>


<!-- isJsonString(str) -->
<?php 
    WindUiPhp::renderComponentHere("JsMethodName", (object)array(
        "methodname"=>"isJsonString(str)"
    ), false);
?>
Este método analisa uma variável, e caso esta variável seja uma string contendo um código JSON com sintaxe correta, retornará true.
<ul>
    <li>
        <b>str (String)</b> - Neste argumento deve-se passar uma string contendo um código potencialmente JSON.
    </li>
</ul>
<?php 
    WindUiPhp::renderComponentHere("CodeBlock", (object)array(
    "language"=>"javascript",
    "codeToShow"=>
'//Inicio do código JavaScript
var variavel = \'{"teste":"valor", "teste2":"valor2"}\';

//Vai retornar "true"
if(WindUiJs.isJsonString(variavel) == true){
    console.log("É um JSON.");
}
'
), false);
?>


<!-- isXmlHttpRequest(object) -->
<?php 
    WindUiPhp::renderComponentHere("JsMethodName", (object)array(
        "methodname"=>"isXmlHttpRequest(object)"
    ), false);
?>
Este método analisa uma variável, e caso esta variável esteja atualmente guardando uma instância da class XmlHttpRequest do JavaScript,
 este método irá retornar true.
<ul>
    <li>
        <b>object (Object)</b> - Neste argumento deve-se passar uma variável.
    </li>
</ul>
<?php 
    WindUiPhp::renderComponentHere("CodeBlock", (object)array(
    "language"=>"javascript",
    "codeToShow"=>
'//Inicio do código JavaScript
var variavel = new XMLHttpRequest();

//Vai retornar "true"
if(WindUiJs.isXmlHttpRequest(variavel) == true){
    console.log("É um XMLHttpRequest.");
}
'
), false);
?>


<!-- isExistingClass(objectName) -->
<?php 
    WindUiPhp::renderComponentHere("JsMethodName", (object)array(
        "methodname"=>"isExistingClass(objectName)"
    ), false);
?>
Este método analisa se uma classe atualmente existe e está definida no seu aplicativo Wind UI. Por exemplo, caso queira verificar se alguma determinada
 classe existe, basta usar esse método, o informando numa String, o nome da classe que você quer verificar se existe.
<ul>
    <li>
        <b>objectName (String)</b> - Neste argumento deve-se passar o nome de alguma classe.
    </li>
</ul>
<?php 
    WindUiPhp::renderComponentHere("CodeBlock", (object)array(
    "language"=>"javascript",
    "codeToShow"=>
'//Inicio do código JavaScript

//Vai retornar "true"
if(WindUiJs.isExistingClass("WindUiJs") == true){
    console.log("WindUiJs é uma classe existente.");
}

//Vai retornar "false"
if(WindUiJs.isExistingClass("ClasseQueNaoExiste") == false){
    console.log("Esta classe não existe.");
}
'
), false);
?>


<!-- isFormData(object) -->
<?php 
    WindUiPhp::renderComponentHere("JsMethodName", (object)array(
        "methodname"=>"isFormData(object)"
    ), false);
?>
Este método analisa uma variável, e caso esta variável esteja atualmente guardando uma instância da classe FormData do JavaScript,
 este método irá retornar true.
<ul>
    <li>
        <b>object (Object)</b> - Neste argumento deve-se passar uma variável.
    </li>
</ul>
<?php 
    WindUiPhp::renderComponentHere("CodeBlock", (object)array(
    "language"=>"javascript",
    "codeToShow"=>
'//Inicio do código JavaScript
var variavel = new FormData();

//Vai retornar "true"
if(WindUiJs.isFormData(variavel) == true){
    console.log("É um FormData.");
}
'
), false);
?>


<!-- isDate(object) -->
<?php 
    WindUiPhp::renderComponentHere("JsMethodName", (object)array(
        "methodname"=>"isDate(object)"
    ), false);
?>
Este método analisa uma variável, e caso esta variável esteja atualmente guardando uma instância da classe Date do JavaScript,
 este método irá retornar true.
<ul>
    <li>
        <b>object (Object)</b> - Neste argumento deve-se passar uma variável.
    </li>
</ul>
<?php 
    WindUiPhp::renderComponentHere("CodeBlock", (object)array(
    "language"=>"javascript",
    "codeToShow"=>
'//Inicio do código JavaScript
var variavel = new Date();

//Vai retornar "true"
if(WindUiJs.isDate(variavel) == true){
    console.log("É um Date.");
}
'
), false);
?>


<!-- isString(value) -->
<?php 
    WindUiPhp::renderComponentHere("JsMethodName", (object)array(
        "methodname"=>"isString(value)"
    ), false);
?>
Este método analisa uma variável, e caso trata-se de uma variável do tipo String, retornará true.
<ul>
    <li>
        <b>value (Object)</b> - Neste argumento deve-se passar uma variável.
    </li>
</ul>
<?php 
    WindUiPhp::renderComponentHere("CodeBlock", (object)array(
    "language"=>"javascript",
    "codeToShow"=>
'//Inicio do código JavaScript
var variavel = "Conteúdo de texto.";

//Vai retornar "true"
if(WindUiJs.isString(variavel) == true){
    console.log("É uma string.");
}
'
), false);
?>


<!-- isNumber(value) -->
<?php 
    WindUiPhp::renderComponentHere("JsMethodName", (object)array(
        "methodname"=>"isNumber(value)"
    ), false);
?>
Este método analisa uma variável, e caso trata-se de uma variável que esteja guardando um número (seja INT ou FLOAT) retornará true.
<ul>
    <li>
        <b>value (Object)</b> - Neste argumento deve-se passar uma variável.
    </li>
</ul>
<?php 
    WindUiPhp::renderComponentHere("CodeBlock", (object)array(
    "language"=>"javascript",
    "codeToShow"=>
'//Inicio do código JavaScript
var variavel = 1.534;

//Vai retornar "true"
if(WindUiJs.isNumber(variavel) == true){
    console.log("É um número.");
}
'
), false);
?>


<!-- isFloat(value) -->
<?php 
    WindUiPhp::renderComponentHere("JsMethodName", (object)array(
        "methodname"=>"isFloat(value)"
    ), false);
?>
Este método analisa uma variável, e caso trata-se de uma variável que esteja guardando um número FLOAT retornará true.
<ul>
    <li>
        <b>value (Object)</b> - Neste argumento deve-se passar uma variável.
    </li>
</ul>
<?php 
    WindUiPhp::renderComponentHere("CodeBlock", (object)array(
    "language"=>"javascript",
    "codeToShow"=>
'//Inicio do código JavaScript
var variavel = 1.534;

//Vai retornar "true"
if(WindUiJs.isFloat(variavel) == true){
    console.log("É um número float.");
}
'
), false);
?>


<!-- isInt(value) -->
<?php 
    WindUiPhp::renderComponentHere("JsMethodName", (object)array(
        "methodname"=>"isInt(value)"
    ), false);
?>
Este método analisa uma variável, e caso trata-se de uma variável que esteja guardando um número INT retornará true.
<ul>
    <li>
        <b>value (Object)</b> - Neste argumento deve-se passar uma variável.
    </li>
</ul>
<?php 
    WindUiPhp::renderComponentHere("CodeBlock", (object)array(
    "language"=>"javascript",
    "codeToShow"=>
'//Inicio do código JavaScript
var variavel = 54;

//Vai retornar "true"
if(WindUiJs.isInt(variavel) == true){
    console.log("É um número int.");
}
'
), false);
?>


<!-- isBool(value) -->
<?php 
    WindUiPhp::renderComponentHere("JsMethodName", (object)array(
        "methodname"=>"isBool(value)"
    ), false);
?>
Este método analisa uma variável, e caso trata-se de uma variável que esteja guardando um valor BOOL retornará true.
<ul>
    <li>
        <b>value (Object)</b> - Neste argumento deve-se passar uma variável.
    </li>
</ul>
<?php 
    WindUiPhp::renderComponentHere("CodeBlock", (object)array(
    "language"=>"javascript",
    "codeToShow"=>
'//Inicio do código JavaScript
var variavel = false;

//Vai retornar "true"
if(WindUiJs.isBool(variavel) == true){
    console.log("É um booleano.");
}
'
), false);
?>


<!-- getFileFromFragmentNameStr(fragmentName) -->
<?php 
    WindUiPhp::renderComponentHere("JsMethodName", (object)array(
        "methodname"=>"getFileFromFragmentNameStr(fragmentName)"
    ), false);
?>
Este método analisa uma URI que aponta para um fragmento, e extrai dessa URI, o nome do fragmento em si, deixand o caminho para trás. Deve-se passar
 para este método um parâmetro como se fosse para carregar um fragmento, da mesma forma que é passado na URL do seu app Wind UI. Exemplo "submenu/fragments/seufragmento"
<ul>
    <li>
        <b>fragmentName (String)</b> - Neste argumento deve-se passar uma URI que aponta para a pasta que contém seus arquivos de fragmento, e que está dentro da pasta
         "fragments" do seu Wind Ui app.
    </li>
</ul>
<?php 
    WindUiPhp::renderComponentHere("CodeBlock", (object)array(
    "language"=>"javascript",
    "codeToShow"=>
'//Inicio do código JavaScript
var variavel = "noticias/2020/07/20/meu-fragmento";

//Vai retornar "meu-fragmento"
console.log(WindUiJs.getFileFromFragmentNameStr(variavel));
'
), false);
?>


<!-- getDirFromFragmentNameStr(fragmentName) -->
<?php 
    WindUiPhp::renderComponentHere("JsMethodName", (object)array(
        "methodname"=>"getDirFromFragmentNameStr(fragmentName)"
    ), false);
?>
Este método analisa uma URI que aponta para um fragmento, e extrai dessa URI, o diretório do fragmento em si, deixand o nome da pasta que armazena os arquivos do
 fragmento, para trás. Deve-se passar para este método um parâmetro como se fosse para carregar um fragmento, da mesma forma que é passado na URL do seu app Wind UI.
 Exemplo "submenu/fragments/seufragmento".
<ul>
    <li>
        <b>fragmentName (String)</b> - Neste argumento deve-se passar uma URI que aponta para a pasta que contém seus arquivos de fragmento, e que está dentro da pasta
         "fragments" do seu Wind Ui app.
    </li>
</ul>
<?php 
    WindUiPhp::renderComponentHere("CodeBlock", (object)array(
    "language"=>"javascript",
    "codeToShow"=>
'//Inicio do código JavaScript
var variavel = "noticias/2020/07/20/meu-fragmento";

//Vai retornar "noticias/2020/07/20/"
console.log(WindUiJs.getDirFromFragmentNameStr(variavel));
'
), false);
?>


<!-- getDayConvertedToString(dateObject) -->
<?php 
    WindUiPhp::renderComponentHere("JsMethodName", (object)array(
        "methodname"=>"getDayConvertedToString(dateObject)"
    ), false);
?>
Este método extrai a variável DIA de um objeto Date do JavaScript e o retorna formatado em String. Caso seja menor que 10, terá um 0 a sua frente.
<ul>
    <li>
        <b>dateObject (Date)</b> - Neste argumento deve-se passar uma instância do objeto Date do JavaScript, com um valor de data/hora de sua preferência.
    </li>
</ul>
<?php 
    WindUiPhp::renderComponentHere("CodeBlock", (object)array(
    "language"=>"javascript",
    "codeToShow"=>
'//Inicio do código JavaScript
var variavel = new Date(); //Obtem a data atual que é 2020-07-03 T 18:05

//Vai retornar "03" (pode retornar de 01 a 31)
console.log(WindUiJs.getDayConvertedToString(variavel));
'
), false);
?>


<!-- getMonthConvertedToString(dateObject) -->
<?php 
    WindUiPhp::renderComponentHere("JsMethodName", (object)array(
        "methodname"=>"getMonthConvertedToString(dateObject)"
    ), false);
?>
Este método extrai a variável MÊS de um objeto Date do JavaScript e o retorna formatado em String. Caso seja menor que 10, terá um 0 a sua frente.
<ul>
    <li>
        <b>dateObject (Date)</b> - Neste argumento deve-se passar uma instância do objeto Date do JavaScript, com um valor de data/hora de sua preferência.
    </li>
</ul>
<?php 
    WindUiPhp::renderComponentHere("CodeBlock", (object)array(
    "language"=>"javascript",
    "codeToShow"=>
'//Inicio do código JavaScript
var variavel = new Date(); //Obtem a data atual que é 2020-07-03 T 18:05

//Vai retornar "07" (pode retornar de 01 a 12)
console.log(WindUiJs.getMonthConvertedToString(variavel));
'
), false);
?>


<!-- getYearConvertedToString(dateObject) -->
<?php 
    WindUiPhp::renderComponentHere("JsMethodName", (object)array(
        "methodname"=>"getYearConvertedToString(dateObject)"
    ), false);
?>
Este método extrai a variável ANO de um objeto Date do JavaScript e o retorna formatado em String.
<ul>
    <li>
        <b>dateObject (Date)</b> - Neste argumento deve-se passar uma instância do objeto Date do JavaScript, com um valor de data/hora de sua preferência.
    </li>
</ul>
<?php 
    WindUiPhp::renderComponentHere("CodeBlock", (object)array(
    "language"=>"javascript",
    "codeToShow"=>
'//Inicio do código JavaScript
var variavel = new Date(); //Obtem a data atual que é 2020-07-03 T 18:05

//Vai retornar "2020"
console.log(WindUiJs.getYearConvertedToString(variavel));
'
), false);
?>


<!-- getHourConvertedToString(dateObject)-->
<?php 
    WindUiPhp::renderComponentHere("JsMethodName", (object)array(
        "methodname"=>"getHourConvertedToString(dateObject)"
    ), false);
?>
Este método extrai a variável HORA de um objeto Date do JavaScript e o retorna formatado em String. Caso seja menor que 10, terá um 0 a sua frente.
<ul>
    <li>
        <b>dateObject (Date)</b> - Neste argumento deve-se passar uma instância do objeto Date do JavaScript, com um valor de data/hora de sua preferência.
    </li>
</ul>
<?php 
    WindUiPhp::renderComponentHere("CodeBlock", (object)array(
    "language"=>"javascript",
    "codeToShow"=>
'//Inicio do código JavaScript
var variavel = new Date(); //Obtem a data atual que é 2020-07-03 T 18:05

//Vai retornar "18" (pode retornar de 00 a 23)
console.log(WindUiJs.getHourConvertedToString(variavel));
'
), false);
?>


<!-- getMinuteConvertedToString(dateObject)-->
<?php 
    WindUiPhp::renderComponentHere("JsMethodName", (object)array(
        "methodname"=>"getMinuteConvertedToString(dateObject)"
    ), false);
?>
Este método extrai a variável MINUTO de um objeto Date do JavaScript e o retorna formatado em String. Caso seja menor que 10, terá um 0 a sua frente.
<ul>
    <li>
        <b>dateObject (Date)</b> - Neste argumento deve-se passar uma instância do objeto Date do JavaScript, com um valor de data/hora de sua preferência.
    </li>
</ul>
<?php 
    WindUiPhp::renderComponentHere("CodeBlock", (object)array(
    "language"=>"javascript",
    "codeToShow"=>
'//Inicio do código JavaScript
var variavel = new Date(); //Obtem a data atual que é 2020-07-03 T 18:05

//Vai retornar "05" (pode retornar de 00 a 59)
console.log(WindUiJs.getMinuteConvertedToString(variavel));
'
), false);
?>

<!-- getSecondConvertedToString(dateObject)-->
<?php 
    WindUiPhp::renderComponentHere("JsMethodName", (object)array(
        "methodname"=>"getSecondConvertedToString(dateObject)"
    ), false);
?>
Este método extrai a variável SEGUNDO de um objeto Date do JavaScript e o retorna formatado em String. Caso seja menor que 10, terá um 0 a sua frente.
<ul>
    <li>
        <b>dateObject (Date)</b> - Neste argumento deve-se passar uma instância do objeto Date do JavaScript, com um valor de data/hora de sua preferência.
    </li>
</ul>
<?php 
    WindUiPhp::renderComponentHere("CodeBlock", (object)array(
    "language"=>"javascript",
    "codeToShow"=>
'//Inicio do código JavaScript
var variavel = new Date(); //Obtem a data atual que é 2020-07-03 T 18:05:23

//Vai retornar "23" (pode retornar de 00 a 59)
console.log(WindUiJs.getSecondConvertedToString(variavel));
'
), false);
?>

<!-- End of fragment modifiable area -->
<?php
    //End of fragment renderization.
    WindUiFragmentRenderer::finishFragment();
?>