<?php
    //Import core files and start fragment renderization.
    include_once("../../../../../.core/base/fragment/wind-ui-fragment-prepare.php");
    WindUiFragmentRenderer::startFragment((__DIR__ . "/../../../"));
?>

<!-- Fragment manifest and parameters area -->
<!-- Do not type plain text in this area and do not open PHP or HTML tags. Just edit the JSON content. -->
<!-- Make sure to always maintain a correct JSON syntax, otherwise the Wind UI will not be able to process your fragment's metadata. -->

<json id="windUiJsonFragmentManifest" type="text/json" app="wind.ui">
{
    "fragmentOgMetaTagTitle": "API de Notificações Frontend",
    "fragmentOgMetaTagDescription": "Página inicial do Wind UI App.",
    "fragmentOgMetaTagImage": "/resources/images/startup-loading.png",
    "fragmentOgMetaTagImageType": "image/png",
    "fragmentOgMetaTagImageWidth": "512",
    "fragmentOgMetaTagImageHeight": "512",
    "fragmentOgMetaTagType": "website",
    "fragmentOgArticleAuthor": "",
    "fragmentOgArticleSection": "",
    "fragmentOgArticleTags": "",
    "fragmentOgArticlePublishTime": ""
}
</json>

<!-- Start of fragment content modifiable and visible to user area -->
<!-- Here you can type plain text and open PHP or HTML tags. -->

<center>
    <h2>Teste da API de Notificações JavaScript do Wind UI</h2>
</center>
<br>
<br>
A API de Notificações JavaScript do Wind UI permite que seu aplicativo construído com o Wind UI, faça comunicações rápidas e interativas com o
 seu usuário. Você só precisa chamar um método para exibir notificações e existem vários tipos de notificações... Enquanto existirem notificações
  na tela, o ícone do seu aplicativo Wind UI será alterado para um ícone que indique que há notificações na tela. Assim o usuário saberá de
   notificações mesmo sem estar com o seu aplicativo em foco.
<br>
<br>

Notificações Simples Com Duração de 3 Segundos
<br>
<br>
<div style="width: 100%; display: flex; justify-content: center; align-items: center; flex-wrap: wrap;">
    <?php 
        WindUiPhp::renderComponentHere("Button", (object)array(
            "style"=>"width: 300px; margin: 4px;",
            "onClickJsEvent"=>"WindUiJs.showSimpleNotification('Teste', 3000, true, null);",
            "value"=>"Mostrar Notificação Com Som"
        ), false);
    ?>
    <?php 
        WindUiPhp::renderComponentHere("Button", (object)array(
            "style"=>"width: 300px; margin: 4px;",
            "onClickJsEvent"=>"WindUiJs.showSimpleNotification('Teste', 3000, false, null);",
            "value"=>"Mostrar Notificação Sem Som"
        ), false);
    ?>
    <?php 
        WindUiPhp::renderComponentHere("Button", (object)array(
            "style"=>"width: 300px; margin: 4px;",
            "onClickJsEvent"=>"WindUiJs.showSimpleNotification('Teste', 3000, true, function(){ WindUiJs.showSimpleNotification('Você fechou a notificação! Este evento estava registrado no onCloseEvent da notificação fechada!', 3000, true, null); });",
            "value"=>"Mostrar Notificação Com Evento"
        ), false);
    ?>
</div>

<br>
<br>
Notificações Com Botão de Ação e Duração Eterna
<br>
<br>
<div style="width: 100%; display: flex; justify-content: center; align-items: center; flex-wrap: wrap;">
    <?php 
        WindUiPhp::renderComponentHere("Button", (object)array(
            "style"=>"width: 300px; margin: 4px;",
            "onClickJsEvent"=>"WindUiJs.showActionNotification('Notificação Eterna', 0, true, 'Ação', function(){ WindUiJs.showSimpleNotification('Clicou na ação! A notificação não foi fechada por que esta ação não foi configurada para isso.', 3000, false, null); }, false, null);",
            "value"=>"Mostrar Notificação Com Ação"
        ), false);
    ?>
</div>

<br>
<br>
Notificações Com Botões de Ações e Duração Eterna
<br>
<br>
<div style="width: 100%; display: flex; justify-content: center; align-items: center; flex-wrap: wrap;">
    <?php 
        WindUiPhp::renderComponentHere("Button", (object)array(
            "style"=>"width: 300px; margin: 4px;",
            "onClickJsEvent"=>"WindUiJs.showComplexNotification('Notificação complexa eterna', 0, true, 'Sim', null, 'Não', null, true, null);",
            "value"=>"Mostrar Notificação Complexa"
        ), false);
    ?>
</div>

<br>
<br>
Notificação Gerenciavel
<br>
<br>
<div style="width: 100%; display: flex; justify-content: center; align-items: center; flex-wrap: wrap;">
    <?php 
        WindUiPhp::renderComponentHere("Button", (object)array(
            "style"=>"width: 300px; margin: 4px;",
            "onClickJsEvent"=>"ultimaNotificacaoCriada = WindUiJs.showComplexNotification('Notificação Gerenciavel', 0, true, 'Sim', null, 'Não', null, true, null);",
            "value"=>"Criar Gerenciavel e Armazenar Referencia"
        ), false);
    ?>

    <?php 
        WindUiPhp::renderComponentHere("Button", (object)array(
            "style"=>"width: 300px; margin: 4px;",
            "onClickJsEvent"=>"checarSeNotificacaoGerenciavelEstaAtiva();",
            "value"=>"A Notificação Ainda Está Ativa?"
        ), false);
    ?>

    <?php 
        WindUiPhp::renderComponentHere("Button", (object)array(
            "style"=>"width: 300px; margin: 4px;",
            "onClickJsEvent"=>"alterarConteudoDaNotificacao();",
            "value"=>"Alterar Conteúdo da Notificação"
        ), false);
    ?>
</div>

<script type="text/javascript">
    //you can set basic functions to be runned in a SCRIPT tag, but, only the basics. Always prefer to write your javascript functions in the file "script.js"
    // of your fragment. A good simple use of script tags within your fragment.php is, for example, to perform checks with PHP and based on that, use "echo"
    // to run javascript functions.

    WindUiJs.showSimpleNotification('Fragmento carregado!', 3000, false, null);

    <?php 
        //Load the Home fragment, if variable "aVar" is set on POST
        if(isset($_POST["aVar"]) == true)
            echo("WindUiJs.loadNewFragment('Home', null);");
    ?>
</script>

<!-- End of fragment modifiable area -->
<?php
    //End of fragment renderization.
    WindUiFragmentRenderer::finishFragment();
?>