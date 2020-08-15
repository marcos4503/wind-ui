<?php
    //Import core files and start fragment renderization.
    include_once("../../../../../.core/base/fragment/wind-ui-fragment-prepare.php");
    WindUiFragmentRenderer::startFragment(__DIR__);
?>
<!-- Start of fragment content modifiable and visible to user area -->

<center>
    <h1>API PHP Backend: Gerenciamento de Sessões e Cookies</h1>
</center>

O Wind UI possui uma API PHP completa para que você crie seu sistema de salvamento de dados do usuário, Sessões e Cookies de maneira mais rápida.
 Assim fica fácil implementar seu sistema de login e registro em seu app Wind UI por exemplo.

<!-- isCurrentSessionOfReceivedCookiesValid($stopPhpIfInvalid, $destroySessionIfInvalid) -->
<?php 
    WindUiPhp::renderComponentHere("PhpMethodName", (object)array(
        "classname"=>'WindUiAppSessions',
        "methodname"=>'isCurrentSessionOfReceivedCookiesValid($stopPhpIfInvalid, $destroySessionIfInvalid)'
    ), false);
?>
Este método obtem o Cookie enviado pelo cliente, procura uma Sessão correspondente e então, analisa o conteúdo dessa Sessão. Se a sessão tiver todas as variaveis
 requeridas para que uma sessão no seu app, seja válida, ele retorna true. Se a sessão não tiver todas as variaveis requeridas, retorna false. Você pode definir
 quais são as variaveis requeridas para que uma sessão seja válida, no arquivo "app-settings.json" do seu app. Você pode usar este método para proteger certas páginas
 APIs ou áreas do seu Wind UI App. Por exemplo, você pode redirecionar o usuário para uma tela de login, caso ele acesse uma API ou Página que necessite de uma sessão
 ativa, e este método retorne false. Caso o usuário tente acessar uma página de login, enquanto tiver uma sessão válida, você pode redireciona-lo para a página inicial
 do seu app, por exemplo. Este método também é utilizável em APIs Ajax do seu App, pois o client sempre deve enviar Cookies também, ao comunicar com qualquer página do
 seu app. Os Browsers sempre enviarão os Cookies que foram criados pelo seu Wind UI App, a cada requisição que fizerem ao seu site.
<ul>
    <li>
        <b>$stopPhpIfInvalid (Bool)</b> - Irá parar a execução do script PHP caso a sessão seja inválida.
    </li>
    <li>
        <b>$destroySessionIfInvalid (Bool)</b> - Irá destruir a sessão correspondente, caso esta seja inválida.
    </li>
</ul>
<?php 
    WindUiPhp::renderComponentHere("CodeBlock", (object)array(
    "language"=>"php",
    "codeToShow"=>
'//Conteúdo do arquivo "app-settings.json"
//{ "sessionsRequiredDefinedVariablesToSessionBeValid" : [ "id", "login", "password"] }

//Conteúdo do cookie enviado pelo client (Exemplo)
//354trgf3et34t645365564tg4
//Se nenhuma sessão que corresponda ao cookie enviado pelo client, for encontrada no servidor, o método retornará false.
//Se a sessão não contiver todas as variaveis requiridas, ou contiver apenas uma das variaveis requiridas por exemplo, retornará false.

//Conteúdo da sessão encontrada pelo servidor, ao qual corresponde pelo Cookie enviado pelo usuário
//id|s:1:"1";login|s:10:"marcos4503";password|s:10:"tfgrkjengrojn34";

//Vai retornar "true"
if(WindUiAppSessions::isCurrentSessionOfReceivedCookiesValid(false, false, false, false) == true){
    echo("Esta é uma sessão válida, pois a sessão encontrada no servidor, contém as variáveis \"id\", \"login\" e \"password\" todas definidas.");
}
'
), false);
?>

<!-- createNewSessionAndProvideCookies() -->
<?php 
    WindUiPhp::renderComponentHere("PhpMethodName", (object)array(
        "classname"=>'WindUiAppSessions',
        "methodname"=>'createNewSessionAndProvideCookies()'
    ), false);
?>
Este método simplesmente cria uma sessão para o usuário e retorna um Cookie para ele, para que ele sempre possa enviar este Cookie ao servidor, em futuras requisições. Antes
 de usar este método é recomendado que chame isCurrentSessionOfReceivedCookiesValid() antes e verifique se já não existe uma sessão ativa. Também é altamente recomendado que utilize
 este método antes de começar a salvar dados do usuário, caso queira criar uma sessão para ele, devido ao fato de ele não ter uma sessão no momento.
<?php 
    WindUiPhp::renderComponentHere("CodeBlock", (object)array(
    "language"=>"php",
    "codeToShow"=>
'//Cria uma sessão ao usuário e retorna um Cookie que contém a chave para que o usuário sempre acesse sua sessão, enviando o Cookie em requisições futuras
WindUiAppSessions::createNewSessionAndProvideCookies();
'
), false);
?>


<!-- isSessionCreatedByThisApp() -->
<?php 
    WindUiPhp::renderComponentHere("PhpMethodName", (object)array(
        "classname"=>'WindUiAppSessions',
        "methodname"=>'isSessionCreatedByThisApp()'
    ), false);
?>
Este método verifica se a sessão ativa atualmente, foi criada pelo seu Wind UI App.
<?php 
    WindUiPhp::renderComponentHere("CodeBlock", (object)array(
    "language"=>"php",
    "codeToShow"=>
'//Cria a sessão
WindUiAppSessions::createNewSessionAndProvideCookies();

//Vai retornar true
if(WindUiAppSessions::isSessionCreatedByThisApp() == true)
        echo("Sessão criada por este app.");
'
), false);
?>


<!-- destroyCurrentSessionAndCookies() -->
<?php 
    WindUiPhp::renderComponentHere("PhpMethodName", (object)array(
        "classname"=>'WindUiAppSessions',
        "methodname"=>'destroyCurrentSessionAndCookies()'
    ), false);
?>
Este método destrói a Sessão existente no servidor. É útil para criar um método para que o usuário possa sair de sua conta. É altamente recomendável chamar este método somente
 se houver uma sessão atualmente existente e válida.
<?php 
    WindUiPhp::renderComponentHere("CodeBlock", (object)array(
    "language"=>"php",
    "codeToShow"=>
'//Destroi a sessão criada anteriormente, invalidando assim, o cookie que o usuário possui. Será necessário criar uma nova sessão.
WindUiAppSessions::destroyCurrentSessionAndCookies();
'
), false);
?>


<!-- saveValueInCurrentSession($valueName, $value) -->
<?php 
    WindUiPhp::renderComponentHere("PhpMethodName", (object)array(
        "classname"=>'WindUiAppSessions',
        "methodname"=>'saveValueInCurrentSession($valueName, $value)'
    ), false);
?>
Este método salva um valor dentro de uma variável de sua escolha. O valor será salvo dentro da sessão do usuário. Este método deve ser usado somente se o usuário possuir uma sessão ativa, então
 lembre-se de checar se o usuário tem uma sessão ativa no momento.
<?php 
    WindUiPhp::renderComponentHere("CodeBlock", (object)array(
    "language"=>"php",
    "codeToShow"=>
'//Salva quantos Reais o usuário tem agora.
WindUiAppSessions::saveValueInCurrentSession("reais", "R$ 2,50");
'
), false);
?>


<!-- readValueOfCurrentSession($valueName) -->
<?php 
    WindUiPhp::renderComponentHere("PhpMethodName", (object)array(
        "classname"=>'WindUiAppSessions',
        "methodname"=>'readValueOfCurrentSession($valueName)'
    ), false);
?>
Este método lê e retorna um valor que está dentro de uma variável de sua escolha. O valor dentro da sessão do usuário. Este método deve ser usado somente se o usuário possuir uma sessão ativa, então
 lembre-se de checar se o usuário tem uma sessão ativa no momento.
<?php 
    WindUiPhp::renderComponentHere("CodeBlock", (object)array(
    "language"=>"php",
    "codeToShow"=>
'//Salva quantos Reais o usuário tem agora.
echo("O usuário tem " . WindUiAppSessions::readValueOfCurrentSession("reais"));
'
), false);
?>


<!-- valueOfCurrentSessionExists($valueName) -->
<?php 
    WindUiPhp::renderComponentHere("PhpMethodName", (object)array(
        "classname"=>'WindUiAppSessions',
        "methodname"=>'valueOfCurrentSessionExists($valueName)'
    ), false);
?>
Este método retorna true, se uma variável com um determinado nome, existe e está sendo usada atualmente na sessão do usuário. Este método deve ser usado somente se o usuário possuir uma sessão ativa, então
 lembre-se de checar se o usuário tem uma sessão ativa no momento.
<?php 
    WindUiPhp::renderComponentHere("CodeBlock", (object)array(
    "language"=>"php",
    "codeToShow"=>
'//Retorna true
if(WindUiAppSessions::valueOfCurrentSessionExists("reais") == true){
    echo("A variável \"reais\" existe na sessão do usuário.");
}
'
), false);
?>


<!-- End of fragment modifiable area -->
<?php
    //End of fragment renderization.
    WindUiFragmentRenderer::finishFragment();
?>