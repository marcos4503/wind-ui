<?php
    //Import core files and start fragment renderization.
    include_once("../../../../../.core/base/fragment/wind-ui-fragment-prepare.php");
    WindUiFragmentRenderer::startFragment(__DIR__);
?>
<!-- Start of fragment content modifiable and visible to user area -->

<center>
    <h1>API JavaScript Frontend: Exibição de Caixas de Dialogos Customizáveis</h1>
</center>

O Wind UI funciona com bibliotecas Backend e Frontend com várias ferramentas e recursos para que você crie seu aplicativo. Uma dessas
 ferramentas é a API Frontend JavaScript do Wind UI. Com a API Frontend em JavaScript, você tem métodos rápidos para efetuar ações que
 desenvolvedores Web geralmente precisam muito.

<br>
<br>

Aqui você encontra todos os métodos Backend PHP do Wind UI, porém, estes métodos são somente métodos para exibição e gerenciamento de
 caixas de diálogos do Wind UI.

<br>
<br>

Por favor, note que todos os métodos listados aqui são utilizáveis, e todos os códigos encontrados aqui são para referência, para que
 você saiba como utiliza-los e possa entender como eles funcionam e ter um código de exemplo para cada um.

<br>
<br>

<!-- showSimpleDialog(optionalUrlOfIcon, title, content, okButtonText, onClickOkButtonEvent) -->
<?php 
    WindUiPhp::renderComponentHere("JsMethodName", (object)array(
        "methodname"=>"showSimpleDialog(optionalUrlOfIcon, title, content, okButtonText, onClickOkButtonEvent)"
    ), false);
?>
Este método exibe uma caixa de diálogo customizável para o usuário. Essa caixa de diálogo contém apenas um botão.
 Após chamar este método, a caixa de diálogo é exibida e lhe é retornado um elemento DialogBox para que seja possível que você armazene esse
 elemento em uma variável e possa manipular esta caixa de diálogo mais tarde.
<ul>
    <li>
        <b>optionalUrlOfIcon (String)</b> - Uma URI ou URL opcional para uma imagem que servirá como ícone da caixa de diálogo. Caso não queira
        que sua caixa de diálogo tenha um ícone, basta fornecer uma string vazia.
    </li>
    <li>
        <b>title (String)</b> - O titulo da caixa de dialogo.
    </li>
    <li>
        <b>content (String)</b> - O conteúdo de texto da caixa de diálogo.
    </li>
    <li>
        <b>okButtonText (String)</b> - O conteúdo do botão de "Ok" da caixa de dialogo.
    </li>
    <li>
        <b>onClickOkButtonEvent (JS Function)</b> - A função que será executada ao clicar no botão de "Ok". Caso não queira executar nada, apenas
        fechar o diálogo, forneça um valor "null".
    </li>
</ul>
<?php 
    WindUiPhp::renderComponentHere("CodeBlock", (object)array(
    "language"=>"javascript",
    "codeToShow"=>
'//Inicio do código JavaScript

//Exibe uma caixa de diálogo simples
var caixaDeDialogo = WindUiJs.showSimpleDialog("", "Usuário indisponível", "Este usuário está indisponível e não é possível visualizar seu perfil agora.", "Ok",
    function(){
        //Roda o código ao clicar em "Ok".
    });
'
), false);
?>


<!-- showConfirmationDialog(optionalUrlOfIcon, title, content, yesButtonText, onClickYesButtonEvent, noButtonText, onClickNoButtonEvent) -->
<?php 
    WindUiPhp::renderComponentHere("JsMethodName", (object)array(
        "methodname"=>"showConfirmationDialog(optionalUrlOfIcon, title, content, yesButtonText, onClickYesButtonEvent, noButtonText, onClickNoButtonEvent)"
    ), false);
?>
Este método exibe uma caixa de diálogo customizável para o usuário. Essa caixa de diálogo contém dois botões.
 Após chamar este método, a caixa de diálogo é exibida e lhe é retornado um elemento DialogBox para que seja possível que você armazene esse
 elemento em uma variável e possa manipular esta caixa de diálogo mais tarde.
<ul>
    <li>
        <b>optionalUrlOfIcon (String)</b> - Uma URI ou URL opcional para uma imagem que servirá como ícone da caixa de diálogo. Caso não queira
        que sua caixa de diálogo tenha um ícone, basta fornecer uma string vazia.
    </li>
    <li>
        <b>title (String)</b> - O titulo da caixa de dialogo.
    </li>
    <li>
        <b>content (String)</b> - O conteúdo de texto da caixa de diálogo.
    </li>
    <li>
        <b>yesButtonText (String)</b> - O conteúdo do botão de "Sim" da caixa de dialogo.
    </li>
    <li>
        <b>onClickYesButtonEvent (JS Function)</b> - A função que será executada ao clicar no botão de "Sim". Caso não queira executar nada, apenas
        fechar o diálogo, forneça um valor "null".
    </li>
    <li>
        <b>noButtonText (String)</b> - O conteúdo do botão de "Não" da caixa de dialogo.
    </li>
    <li>
        <b>onClickNoButtonEvent (JS Function)</b> - A função que será executada ao clicar no botão de "Não". Caso não queira executar nada, apenas
        fechar o diálogo, forneça um valor "null".
    </li>
</ul>
<?php 
    WindUiPhp::renderComponentHere("CodeBlock", (object)array(
    "language"=>"javascript",
    "codeToShow"=>
'//Inicio do código JavaScript

//Exibe uma caixa de diálogo de confirmação
var caixaDeDialogo = WindUiJs.showConfirmationDialog("", "Deletar arquivo?", "Deseja realmente deletar este arquivo?", 
    "Sim",
    function(){
        //Roda o código de sim.
    },
    "Não",
    function(){
        //Roda o código de não.
    });
'
), false);
?>


<!-- showComplexDialog(optionalUrlOfIcon, title, content, yesButtonText, onClickYesButtonEvent, noButtonText, onClickNoButtonEvent, neutralButtonText, onClickNeutralButtonEvent) -->
<?php 
    WindUiPhp::renderComponentHere("JsMethodName", (object)array(
        "methodname"=>"showComplexDialog(optionalUrlOfIcon, title, content, yesButtonText, onClickYesButtonEvent, noButtonText, onClickNoButtonEvent, neutralButtonText, onClickNeutralButtonEvent)"
    ), false);
?>
Este método exibe uma caixa de diálogo customizável para o usuário. Essa caixa de diálogo contém três botões.
 Após chamar este método, a caixa de diálogo é exibida e lhe é retornado um elemento DialogBox para que seja possível que você armazene esse
 elemento em uma variável e possa manipular esta caixa de diálogo mais tarde.
<ul>
    <li>
        <b>optionalUrlOfIcon (String)</b> - Uma URI ou URL opcional para uma imagem que servirá como ícone da caixa de diálogo. Caso não queira
        que sua caixa de diálogo tenha um ícone, basta fornecer uma string vazia.
    </li>
    <li>
        <b>title (String)</b> - O titulo da caixa de dialogo.
    </li>
    <li>
        <b>content (String)</b> - O conteúdo de texto da caixa de diálogo.
    </li>
    <li>
        <b>yesButtonText (String)</b> - O conteúdo do botão de "Sim" da caixa de dialogo.
    </li>
    <li>
        <b>onClickYesButtonEvent (JS Function)</b> - A função que será executada ao clicar no botão de "Sim". Caso não queira executar nada, apenas
        fechar o diálogo, forneça um valor "null".
    </li>
    <li>
        <b>noButtonText (String)</b> - O conteúdo do botão de "Não" da caixa de dialogo.
    </li>
    <li>
        <b>onClickNoButtonEvent (JS Function)</b> - A função que será executada ao clicar no botão de "Não". Caso não queira executar nada, apenas
        fechar o diálogo, forneça um valor "null".
    </li>
    <li>
        <b>neutralButtonText (String)</b> - O conteúdo do botão de "Neutro" da caixa de dialogo.
    </li>
    <li>
        <b>onClickNeutralButtonEvent (JS Function)</b> - A função que será executada ao clicar no botão de "Neutro". Caso não queira executar nada, apenas
        fechar o diálogo, forneça um valor "null".
    </li>
</ul>
<?php 
    WindUiPhp::renderComponentHere("CodeBlock", (object)array(
    "language"=>"javascript",
    "codeToShow"=>
'//Inicio do código JavaScript

//Exibe uma caixa de diálogo de confirmação
var caixaDeDialogo = WindUiJs.showComplexDialog("", "O que esta achando?", "Se esta gostando do Wind UI, o que acha de nos dar um Feedback?", 
    "Sim",
    function(){
        //Roda o código de sim.
    },
    "Mais Tarde",
    function(){
        //Roda o código de Mais Tarde.
    },
    "Nunca",
    function(){
        //Roda o código de Nunca
    });
'
), false);
?>


<!-- showLoadingDialogBox(title) -->
<?php 
    WindUiPhp::renderComponentHere("JsMethodName", (object)array(
        "methodname"=>"showLoadingDialogBox(title)"
    ), false);
?>
Este método exibe uma caixa de diálogo simples que contém apenas um GIF Spinner mostrando um carregamento e uma título ao lado. Essa caixa de diálogo
 não oferece meios para que o usuario possa fecha-la, só é possível fecha-la por script. Sendo assim é um ótimo meio de bloquear a interface do seu app quando
 você precisar. Este método também retorna um elemento DialogBox para que você possa manipular essa caixa de dialogo mais tarde.
<ul>
    <li>
        <b>title (String)</b> - O título que aparecerá ao lado do GIF Spinner.
    </li>
</ul>
<?php 
    WindUiPhp::renderComponentHere("CodeBlock", (object)array(
    "language"=>"javascript",
    "codeToShow"=>
'//Inicio do código JavaScript

//Exibe a caixa de carregando..
var caixaDeDialogo =  WindUiJs.showLoadingDialogBox("Carregando...");
'
), false);
?>


<!-- showCustomContentDialogBox(showCloseButton, maxWidth, maxHeight, content) -->
<?php 
    WindUiPhp::renderComponentHere("JsMethodName", (object)array(
        "methodname"=>"showCustomContentDialogBox(showCloseButton, maxWidth, maxHeight, content)"
    ), false);
?>
Este método exibe uma caixa de diálogo Customizável que não possui um conteúdo fixo. Sendo assim, é você quem fornece o código HTML que será exibido dentro desta
 caixa de diálogo. Essa caixa de diálogo é exibida em tela inteira e pode ter as dimensões configuradas por você. Muito útil caso você precise exibir por exemplo
 uma visualização de alguma imagem, só que em tela inteira. Ela possui um sistema de dimensionamento totalmente automático, ela não irá cobrir totalmente a
 tela do usuário e se adaptará automaticamente para ocupar o espaço que você definir. Se a dimensão que você definir for maior do que a tela do usuário, ela ocupará
 um espaço limite de até 90% do tamanho de altura e largura. Caso o conteúdo que seja exibido dentro dessa caixa de diálogo seja maior do que a própria caixa
 de diálogo, o conteúdo será exibido com barras de rolagem automáticas. Você pode alterar o conteúdo dela por script, ou fecha-la por script também. Ao chamar
 este método, lhe será retornado um elemento DialogBox, para que você possa armazena-lo numa variável e o manipular mais tarde.
<ul>
    <li>
        <b>showCloseButton (Bool)</b> - Caso true, será exibido um botão para que o usuário possa fechar a caixa de diálogo.
    </li>
    <li>
        <b>maxWidth (String)</b> - A largura máxima que a caixa de dialogo pode ser exibida na tela. Você pode definir um tamanho em pixels ("300px") ou em
        porcentagem ("70%").
    </li>
    <li>
        <b>maxHeight (String)</b> - A altura máxima que a caixa de dialogo pode ser exibida na tela. Você pode definir um tamanho em pixels ("300px") ou em
        porcentagem ("70%").
    </li>
    <li>
        <b>content (String)</b> - O código HTML do conteúdo a ser exibido.
    </li>
</ul>
<?php 
    WindUiPhp::renderComponentHere("CodeBlock", (object)array(
    "language"=>"javascript",
    "codeToShow"=>
'//Inicio do código JavaScript

//Exibe a caixa de dialogo customizável
var caixaDeDialogo =  WindUiJs.showCustomContentDialogBox(true, "80%", "80%", "<img src=\"https://site.com/imagem.jpg\" />");
'
), false);
?>


<!-- static changeContentOfCustomContentDialogBox(customContentDialogNodeObj, showCloseButton, maxWidth, maxHeight, newContent) -->
<?php 
    WindUiPhp::renderComponentHere("JsMethodName", (object)array(
        "methodname"=>"changeContentOfCustomContentDialogBox(customContentDialogNodeObj, showCloseButton, maxWidth, maxHeight, newContent)"
    ), false);
?>
Este método altera o conteúdo de uma caixa de dialogo Customizável que foi criada anteriormente e ainda está na tela. Note que: Só é possível editar as
 caixas de diálogo Customizáveis. Caixas de diálogo Simples, de Confirmação ou Complexas não podem ser editadas por este método.
<ul> 
    <li>
        <b>customContentDialogNodeObj (Element)</b> - Um elemento DialogBox retornado ao chamar uma caixa de diálogo Customizável.
    </li>
    <li>
        <b>showCloseButton (Bool)</b> - Caso true, será exibido um botão para que o usuário possa fechar a caixa de diálogo.
    </li>
    <li>
        <b>maxWidth (String)</b> - A largura máxima que a caixa de dialogo pode ser exibida na tela. Você pode definir um tamanho em pixels ("300px") ou em
        porcentagem ("70%").
    </li>
    <li>
        <b>maxHeight (String)</b> - A altura máxima que a caixa de dialogo pode ser exibida na tela. Você pode definir um tamanho em pixels ("300px") ou em
        porcentagem ("70%").
    </li>
    <li>
        <b>content (String)</b> - O código HTML do conteúdo a ser exibido.
    </li>
</ul>
<?php 
    WindUiPhp::renderComponentHere("CodeBlock", (object)array(
    "language"=>"javascript",
    "codeToShow"=>
'//Inicio do código JavaScript

//Exibe a caixa de carregando..
WindUiJs.changeContentOfCustomContentDialogBox(caixaDeDialogo, true, "80%", "80%", "<img src=\"https://site.com/outraImagem.jpg\" />");
'
), false);
?>


<!-- static isDialogCurrentlyInScreen(dialogNodeObj) -->
<?php 
    WindUiPhp::renderComponentHere("JsMethodName", (object)array(
        "methodname"=>"isDialogCurrentlyInScreen(dialogNodeObj)"
    ), false);
?>
Este método retorna true caso uma caixa de diálogo ainda esteja visível na tela, para o usuário.
<ul> 
    <li>
        <b>dialogNodeObj (Element)</b> - Um elemento DialogBox retornado ao chamar uma caixa de diálogo qualquer.
    </li>
</ul>
<?php 
    WindUiPhp::renderComponentHere("CodeBlock", (object)array(
    "language"=>"javascript",
    "codeToShow"=>
'//Inicio do código JavaScript

//Chama uma caixa de dialogo
var caixaDeDialogo =  WindUiJs.showLoadingDialogBox("Carregando...");

//Exibirá "true"
console.log(WindUiJs.isDialogCurrentlyInScreen(caixaDeDialogo));
'
), false);
?>


<!-- static hideDialogBoxAndDestroyNode(parentnode, nodeToDelete) -->
<?php 
    WindUiPhp::renderComponentHere("JsMethodName", (object)array(
        "methodname"=>"hideDialogBoxAndDestroyNode(parentnode, nodeToDelete)"
    ), false);
?>
Este método fecha uma caixa de diálogo que está ativa e visível para o usuário e em seguida a deleta.
<ul> 
    <li>
        <b>parentnode (Element)</b> - Deve ser passado o valor "null".
    </li>
    <li>
        <b>nodeToDelete (Element)</b> - Deve ser passado um elemento DialogBox retornado ao chamar uma caixa de diálogo qualquer, e que ainda esteja visível.
    </li>
</ul>
<?php 
    WindUiPhp::renderComponentHere("CodeBlock", (object)array(
    "language"=>"javascript",
    "codeToShow"=>
'//Inicio do código JavaScript

//Chama uma caixa de dialogo
var caixaDeDialogo =  WindUiJs.showLoadingDialogBox("Carregando...");

//Fecha a caixa de diálogo
WindUiJs.hideDialogBoxAndDestroyNode(null, caixaDeDialogo);
'
), false);
?>


<!-- End of fragment modifiable area -->
<?php
    //End of fragment renderization.
    WindUiFragmentRenderer::finishFragment();
?>