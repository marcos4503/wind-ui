<?php
    //Import core files and start fragment renderization.
    include_once("../../../../../.core/base/fragment/wind-ui-fragment-prepare.php");
    WindUiFragmentRenderer::startFragment(__DIR__);
?>
<!-- Start of fragment content modifiable and visible to user area -->

<center>
    <h1>API JavaScript Frontend: Métodos Essenciais Para Componentes</h1>
</center>

O Wind UI funciona com bibliotecas Backend e Frontend com várias ferramentas e recursos para que você crie seu aplicativo. Uma dessas
 ferramentas é a API Frontend JavaScript do Wind UI. Com a API Frontend em JavaScript, você tem métodos rápidos para efetuar ações que
 desenvolvedores Web geralmente precisam muito.

<br>
<br>

Aqui você encontra todos os métodos Backend PHP do Wind UI, porém, estes métodos são somente métodos essenciais para componentes.

<br>
<br>

Por favor, note que todos os métodos listados aqui são utilizáveis, e todos os códigos encontrados aqui são para referência, para que
 você saiba como utiliza-los e possa entender como eles funcionam e ter um código de exemplo para cada um.

<br>
<br>

<!-- getComponentById(componentId) -->
<?php 
    WindUiPhp::renderComponentHere("JsMethodName", (object)array(
        "methodname"=>"getComponentById(componentId)"
    ), false);
?>
Este método que procura um elemento HTML através do seu ID. Porém, o diferencial deste método é que ele envia uma notificação no console
 do Browser caso não encontre o elemento HTML na página.
<ul>
    <li>
        <b>componentId (String)</b> - Uma string contendo o ID do componente desejado.
    </li>
</ul>
<?php 
    WindUiPhp::renderComponentHere("CodeBlock", (object)array(
    "language"=>"javascript",
    "codeToShow"=>
'//Tenta encontrar o elemento HTML
var elemento = WindUiJs.getComponentById("idDoElemento");

//Caso tenha encontrado, realiza o código...
if(elemento != null){
    //Faz algo...
}
'
), false);
?>

<!-- End of fragment modifiable area -->
<?php
    //End of fragment renderization.
    WindUiFragmentRenderer::finishFragment();
?>