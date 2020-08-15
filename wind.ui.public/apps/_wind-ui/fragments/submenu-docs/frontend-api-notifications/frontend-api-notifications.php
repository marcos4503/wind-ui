<?php
    //Import core files and start fragment renderization.
    include_once("../../../../../.core/base/fragment/wind-ui-fragment-prepare.php");
    WindUiFragmentRenderer::startFragment(__DIR__);
?>
<!-- Start of fragment content modifiable and visible to user area -->

<center>
    <h1>API JavaScript Frontend: Emissão de Notificações Customizáveis</h1>
</center>

O Wind UI funciona com bibliotecas Backend e Frontend com várias ferramentas e recursos para que você crie seu aplicativo. Uma dessas
 ferramentas é a API Frontend JavaScript do Wind UI. Com a API Frontend em JavaScript, você tem métodos rápidos para efetuar ações que
 desenvolvedores Web geralmente precisam muito.

<br>
<br>

Aqui você encontra todos os métodos Backend PHP do Wind UI, porém, estes métodos são somente métodos básicos para que você consiga
 emitir de maneira rápida e customizável, notificações para seu usuário.

<br>
<br>

Por favor, note que todos os métodos listados aqui são utilizáveis, e todos os códigos encontrados aqui são para referência, para que
 você saiba como utiliza-los e possa entender como eles funcionam e ter um código de exemplo para cada um.

<br>
<br>

<!-- forceAlwaysExibitionOfNotificationFavicon(enabled) -->
<?php 
    WindUiPhp::renderComponentHere("JsMethodName", (object)array(
        "methodname"=>"forceAlwaysExibitionOfNotificationFavicon(enabled)"
    ), false);
?>
O Wind UI possui um recurso, ao qual troca o Favicon da página por um Favicon específico para mostrar que há notificações atualmente em
 exibição (normalmente trata-se de um Favicon igual ao padrão, porém, com um circulo vermelho para mostrar ao usuário de que há notificações
 atualmente em exibição na tela). Com este método, você pode forçar o Wind UI a exibir este Favicon, mesmo quando não houverem notificações
 do Wind UI em exibição na tela. É especialmente útil para mostrar ao usuário de que no seu app, está ocorrendo coisas, mesmo que ele esteja
 em outra aba do navegador por exemplo.
<ul>
    <li>
        <b>enabled (Bool)</b> - Caso seja true, o Favicon de notificação será forçado a ser exibido sempre.
    </li>
</ul>
<?php 
    WindUiPhp::renderComponentHere("CodeBlock", (object)array(
    "language"=>"javascript",
    "codeToShow"=>
'//Inicio do código JavaScript

//Força o Favicon de notificação a sempre aparecer
WindUiJs.forceAlwaysExibitionOfNotificationFavicon(true);
'
), false);
?>


<!-- isNotificationFaviconForcedToAlwaysShow() -->
<?php 
    WindUiPhp::renderComponentHere("JsMethodName", (object)array(
        "methodname"=>"isNotificationFaviconForcedToAlwaysShow()"
    ), false);
?>
Este método retorna true, se atualmente o Favicon de notificação presente, estiver sendo forçado a ser exibido.
<?php 
    WindUiPhp::renderComponentHere("CodeBlock", (object)array(
    "language"=>"javascript",
    "codeToShow"=>
'//Inicio do código JavaScript

//Exibe "true"
console.log(WindUiJs.isNotificationFaviconForcedToAlwaysShow());
'
), false);
?>


<!-- showSimpleNotification(message, duration, playSound, onCloseEvent) -->
<?php 
    WindUiPhp::renderComponentHere("JsMethodName", (object)array(
        "methodname"=>"showSimpleNotification(message, duration, playSound, onCloseEvent)"
    ), false);
?>
Envia uma notificação simples, na tela do usuário. Essa notificação só exibirá uma mensagem de texto com um botão para que o usuário a feche.
 Você pode definir uma função para ser executada assim que o usuário clicar em fechar. Este método também retorna um element "Notificação" para que você
 possa armazena-lo numa variável e usar outros métodos do Wind UI para manipula-la mais tarde.
<ul>
    <li>
        <b>message (String)</b> - A mensagem que será exibida na notificação.
    </li>
    <li>
        <b>duration (Int)</b> - A duração da mensagem que será exibida. A duração deve ser em millisegundos (sendo que 1 segundo possui 1000ms). Logo
        que o Wind UI mandar sua notificação para o usuário, ele começará o contador de tempo que você definir, e quando esse tempo se esvair, a notificação
        será dispensada automaticamente pelo próprio Wind UI. Se você definir uma duração igual a 0, a duração da notificação será eterna, isto é, até que
        o usuário a feche.
    </li>
    <li>
        <b>playSound (Bool)</b> - Caso seja true, o Wind UI emitirá um som de notificação, ao lançar a notificação para o usuário.
    </li>
    <li>
        <b>onCloseEvent (JS Function)</b> - Uma função que será executada assim que o usuário clicar no botão de fechar da notificação. Caso não queira
        definir uma função, basta passar "null" para este parâmetro.
    </li>
</ul>
<?php 
    WindUiPhp::renderComponentHere("CodeBlock", (object)array(
    "language"=>"javascript",
    "codeToShow"=>
'//Inicio do código JavaScript

//Exibe uma notificação simples
var notificacao = WindUiJs.showSimpleNotification("Olá, bem vindo ao Wind UI App!", 10000, true, function(){
    console.log("A notificação acaba de ser fechada.");
});
'
), false);
?>


<!-- showActionNotification(message, duration, playSound, actionText, onClickActionEvent, closeNotificationOnClickOnActionButton, onCloseEvent) -->
<?php 
    WindUiPhp::renderComponentHere("JsMethodName", (object)array(
        "methodname"=>"showActionNotification(message, duration, playSound, actionText, onClickActionEvent, closeNotificationOnClickOnActionButton, onCloseEvent)"
    ), false);
?>
Envia uma notificação de ação, na tela do usuário. Essa notificação exibirá uma mensagem de texto com um botão para que o usuário a feche, e também exibirá
 um botão que vem antes do botão de fechar. Este botão pode ser customizado por você, tanto em seu valor, quanto na ação que será executada quando o usuário
 clicar nele. Você pode definir uma função para ser executada assim que o usuário clicar em fechar. Este método também retorna um element "Notificação" para que você
 possa armazena-lo numa variável e usar outros métodos do Wind UI para manipula-la mais tarde.
<ul>
    <li>
        <b>message (String)</b> - A mensagem que será exibida na notificação.
    </li>
    <li>
        <b>duration (Int)</b> - A duração da mensagem que será exibida. A duração deve ser em millisegundos (sendo que 1 segundo possui 1000ms). Logo
        que o Wind UI mandar sua notificação para o usuário, ele começará o contador de tempo que você definir, e quando esse tempo se esvair, a notificação
        será dispensada automaticamente pelo próprio Wind UI. Se você definir uma duração igual a 0, a duração da notificação será eterna, isto é, até que
        o usuário a feche.
    </li>
    <li>
        <b>playSound (Bool)</b> - Caso seja true, o Wind UI emitirá um som de notificação, ao lançar a notificação para o usuário.
    </li>
    <li>
        <b>actionText (String)</b> - O texto que aparecerá dentro do botão de Ação.
    </li>
    <li>
        <b>onClickActionEvent (JS Function)</b> - Uma função que será executada assim que o usuário clicar no botão de Ação da notificação. Caso não queira
        definir uma função, basta passar "null" para este parâmetro.
    </li>
    <li>
        <b>closeNotificationOnClickOnActionButton (Bool)</b> - Caso seja true, a notificação será automaticamente dispensada, caso o usuário clique no botão
        de ação. Mesmo que não clique no botão de fechar.
    </li>
    <li>
        <b>onCloseEvent (JS Function)</b> - Uma função que será executada assim que o usuário clicar no botão de fechar da notificação. Caso não queira
        definir uma função, basta passar "null" para este parâmetro.
    </li>
</ul>
<?php 
    WindUiPhp::renderComponentHere("CodeBlock", (object)array(
    "language"=>"javascript",
    "codeToShow"=>
'//Inicio do código JavaScript

//Exibe uma notificação com botão de Ação
var notificacao = WindUiJs.showActionNotification("Sua mensagem foi enviada!", 0, true, "Desfazer", function(){
    //roda o código para desfazer o envio da mensagem
},
true,
function(){
    //roda o código quando o usuário clicar no botão de fechar
    console.log("Notificação foi fechada.");
}); 
'
), false);
?>


<!-- showComplexNotification(message, duration, playSound, yesButtonText, onClickYesEvent, noButtonText, onClickNoEvent, closeNotificationOnClickOnActionButton, onCloseEvent) -->
<?php 
    WindUiPhp::renderComponentHere("JsMethodName", (object)array(
        "methodname"=>"showComplexNotification(message, duration, playSound, yesButtonText, onClickYesEvent, noButtonText, onClickNoEvent, closeNotificationOnClickOnActionButton, onCloseEvent)"
    ), false);
?>
Envia uma notificação de ação, na tela do usuário. Essa notificação exibirá uma mensagem de texto com um botão para que o usuário a feche, e também exibirá
 2 botões que vem antes do botão de fechar. Estes botões podem ser customizados por você, tanto em seus valores, quanto nas ações que serão executadas quando o usuário
 clicar em algum deles. Você pode definir uma função para ser executada assim que o usuário clicar em fechar. Este método também retorna um element "Notificação" para que você
 possa armazena-lo numa variável e usar outros métodos do Wind UI para manipula-la mais tarde.
<ul>
    <li>
        <b>message (String)</b> - A mensagem que será exibida na notificação.
    </li>
    <li>
        <b>duration (Int)</b> - A duração da mensagem que será exibida. A duração deve ser em millisegundos (sendo que 1 segundo possui 1000ms). Logo
        que o Wind UI mandar sua notificação para o usuário, ele começará o contador de tempo que você definir, e quando esse tempo se esvair, a notificação
        será dispensada automaticamente pelo próprio Wind UI. Se você definir uma duração igual a 0, a duração da notificação será eterna, isto é, até que
        o usuário a feche.
    </li>
    <li>
        <b>playSound (Bool)</b> - Caso seja true, o Wind UI emitirá um som de notificação, ao lançar a notificação para o usuário.
    </li>
    <li>
        <b>yesButtonText (String)</b> - O texto que aparecerá dentro do botão de Ação referente ao "Sim".
    </li>
    <li>
        <b>onClickYesEvent (JS Function)</b> - Uma função que será executada assim que o usuário clicar no botão de Ação referente ao "Sim" da notificação. Caso não queira
        definir uma função, basta passar "null" para este parâmetro.
    </li>
    <li>
        <b>noButtonText (String)</b> - O texto que aparecerá dentro do botão de Ação referente ao "Não".
    </li>
    <li>
        <b>onClickNoEvent (JS Function)</b> - Uma função que será executada assim que o usuário clicar no botão de Ação referente ao "Não" da notificação. Caso não queira
        definir uma função, basta passar "null" para este parâmetro.
    </li>
    <li>
        <b>closeNotificationOnClickOnActionButton (Bool)</b> - Caso seja true, a notificação será automaticamente dispensada, caso o usuário clique no botão
        de ação. Mesmo que não clique no botão de fechar.
    </li>
    <li>
        <b>onCloseEvent (JS Function)</b> - Uma função que será executada assim que o usuário clicar no botão de fechar da notificação. Caso não queira
        definir uma função, basta passar "null" para este parâmetro.
    </li>
</ul>
<?php 
    WindUiPhp::renderComponentHere("CodeBlock", (object)array(
    "language"=>"javascript",
    "codeToShow"=>
'//Inicio do código JavaScript

//Exibe uma notificação complexa, com 2 botões de Ação
var notificacao = WindUiJs.showComplexNotification("Marcos Tomaz lhe enviou uma mensagem. Responder de volta?", 0, true, 
"Sim", 
function(){
    //roda o código para resposta
},
"Não",
function(){
    //roda o código de recusa para a resposta
},
true,
function(){
    //roda o código quando o usuário clicar no botão de fechar
    console.log("Notificação foi fechada.");
}); 
'
), false);
?>


<!-- isNotificationCurrentlyInScreen(notificationNodeObj) -->
<?php 
    WindUiPhp::renderComponentHere("JsMethodName", (object)array(
        "methodname"=>"forceAlwaysExibitionOfNotificationFavicon(enabled)"
    ), false);
?>
Este método retorna true, caso a notificação ainda esteja na tela do usuário, sendo exibida para ele.
<ul>
    <li>
        <b>notificationNodeObj (Element)</b> - Aqui você deve passar um elemento de notificação, que é retornado ao chamar uma notificação.
    </li>
</ul>
<?php 
    WindUiPhp::renderComponentHere("CodeBlock", (object)array(
    "language"=>"javascript",
    "codeToShow"=>
'//Inicio do código JavaScript

//Manda a notificação
var notificacao = WindUiJs.showSimpleNotification("Olá, bem vindo ao Wind UI App!", 10000, true, null);

//Exibirá "true"
console.log(WindUiJs.isNotificationCurrentlyInScreen(notificacao));
'
), false);
?>


<!-- changeTextContentOfNotification(notificationNodeObj, newTextContent) -->
<?php 
    WindUiPhp::renderComponentHere("JsMethodName", (object)array(
        "methodname"=>"changeTextContentOfNotification(notificationNodeObj, newTextContent)"
    ), false);
?>
Este método altera o conteúdo de texto de alguma notificação (que ainda esteja na tela do usuário), para um novo conteúdo que você preferir. Esse
 método não altera a função ou texto dos botões de Ação.
<ul>
    <li>
        <b>notificationNodeObj (Element)</b> - Aqui você deve passar um elemento de notificação, que é retornado ao chamar uma notificação.
    </li>
    <li>
        <b>newTextContent (String)</b> - O novo texto que será exibido dentro da notificação.
    </li>
</ul>
<?php 
    WindUiPhp::renderComponentHere("CodeBlock", (object)array(
    "language"=>"javascript",
    "codeToShow"=>
'//Inicio do código JavaScript

//Manda a notificação
var notificacao = WindUiJs.showSimpleNotification("Olá, bem vindo ao Wind UI App!", 10000, true, null);

//Altera o conteúdo dela.
WindUiJs.changeTextContentOfNotification(notificacao, "Você está conectado como: Visitante.");
'
), false);
?>


<!-- hideNotificationAndDestroyNode(parentnode, nodeToDelete) -->
<?php 
    WindUiPhp::renderComponentHere("JsMethodName", (object)array(
        "methodname"=>"hideNotificationAndDestroyNode(parentnode, nodeToDelete)"
    ), false);
?>
Este método dispensa e deleta uma notificação que atualmente esta na tela do usuário, lhe sendo exibida.
<ul>
    <li>
        <b>parentnode (Element)</b> - Aqui você deve passar o valor "null".
    </li>
    <li>
        <b>nodeToDelete (Element)</b> - O elemento notificação que será deletado da tela.
    </li>
</ul>
<?php 
    WindUiPhp::renderComponentHere("CodeBlock", (object)array(
    "language"=>"javascript",
    "codeToShow"=>
'//Inicio do código JavaScript

//Manda a notificação
var notificacao = WindUiJs.showSimpleNotification("Olá, bem vindo ao Wind UI App!", 10000, true, null);

//Deleta a notificação
WindUiJs.hideNotificationAndDestroyNode(null, notificacao);
'
), false);
?>


<!-- getCountOfNotificationsInScreen() -->
<?php 
    WindUiPhp::renderComponentHere("JsMethodName", (object)array(
        "methodname"=>"getCountOfNotificationsInScreen()"
    ), false);
?>
Este método lhe retonar um valor inteiro, que lhe mostra quantas notificações atualmente estão sendo exibidas para o usuário.
<?php 
    WindUiPhp::renderComponentHere("CodeBlock", (object)array(
    "language"=>"javascript",
    "codeToShow"=>
'//Inicio do código JavaScript

//Exibirá "Atualmente existem X notificações na tela."
console.log("Atualmente existem " + WindUiJs.getCountOfNotificationsInScreen().toString() + " notificações na tela.");
'
), false);
?>


<!-- End of fragment modifiable area -->
<?php
    //End of fragment renderization.
    WindUiFragmentRenderer::finishFragment();
?>