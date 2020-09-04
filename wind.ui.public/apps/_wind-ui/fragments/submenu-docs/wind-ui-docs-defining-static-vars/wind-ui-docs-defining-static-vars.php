<?php
    //Import core files and start fragment renderization.
    include_once("../../../../../.core/base/fragment/wind-ui-fragment-prepare.php");
    WindUiFragmentRenderer::startFragment(__DIR__);
?>
<!-- Start of fragment content modifiable and visible to user area -->


<center>
    <h1>Definindo Variáveis Estáticas e Globais Em Seu App</h1>
</center>

Algumas vezes, pode ser necessário definir variaveis em seu app, que sejam acessíveis de qualquer lugar do seu app. Seja a partir de uma API Ajax, Fragmento ou Client.php.
 Sabendo disso, o arquivo "app-variables.php" existe na pasta raiz do seu app. Dentro desse arquivo você pode definir quantas variaveis quiser, como no exemplo abaixo...

<?php 
    WindUiPhp::renderComponentHere("CodeBlock", (object)array(
    "language"=>"php",
    "codeToShow"=>
'class WindUiAppVariables{
        private function __construct() {}

        public static $yourVarName = "Some Value";
        public static $otherVar = "Some Value";
    }
'
), false);
?>

E então, para acessar suas variaveis, basta usar o seguinte nos seus scripts PHP...

<?php 
    WindUiPhp::renderComponentHere("CodeBlock", (object)array(
    "language"=>"php",
    "codeToShow"=>
'//...
WindUiAppVariables::$nomeDaSuaVariavel;
//... ou...
WindUiAppVariables::$yourVarName;
//...
'
), false);
?>

As variaveis presentes no arquivo "app-variables.php" serão acessiveis do PHP de qualquer parte do seu app. Seja de Fragmentos, Client.php ou APIs Ajax.


<!-- End of fragment modifiable content and visible area -->
<?php
    //End of fragment renderization.
    WindUiFragmentRenderer::finishFragment();
?>