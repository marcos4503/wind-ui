<?php
    //Import core files and start fragment renderization.
    include_once("../../../../../.core/base/fragment/wind-ui-fragment-prepare.php");
    WindUiFragmentRenderer::startFragment(__DIR__);
?>
<!-- Start of fragment content modifiable and visible to user area -->

<center>
    <h1>Criar Novo App Dentro do Seu Wind UI</h1>
</center>

Aqui você pode criar um novo app dentro da sua framework Wind UI. O app será criado totalmente já estruturado dentro da pasta <b>apps</b>
 do seu Wind UI. Para fazer isso, você precisa definir alguns parâmetros básicos como nome do app, código do app e etc.

<br>
<br>
<br>

<div style="width: 90%; max-width: 350px; margin-left: auto; margin-right: auto;">
    <?php 
        WindUiPhp::renderComponentHere("StringField", (object)array(
            "id"=>"appTitle",
            "label"=>"Nome do App"
        ), false);
    ?>
    <br>
    <?php 
        WindUiPhp::renderComponentHere("StringField", (object)array(
            "id"=>"appBaseUrl",
            "label"=>"Nome da Pasta"
        ), false);
    ?>
    <br>
    <?php 
        WindUiPhp::renderComponentHere("StringField", (object)array(
            "id"=>"appCode",
            "label"=>"Código do App"
        ), false);
    ?>
    <br>
    <?php 
        WindUiPhp::renderComponentHere("StringField", (object)array(
            "id"=>"appLang",
            "label"=>"Língua do App (ISO)"
        ), false);
    ?>
    <br>
    <?php 
        WindUiPhp::renderComponentHere("PasswordField", (object)array(
            "id"=>"password",
            "label"=>"Senha do Seu Wind UI"
        ), false);
    ?>
    <br>
    <br>
    <?php 
        WindUiPhp::renderComponentHere("Button", (object)array(
            "value"=>"Criar Novo App"
        ), false);
    ?>
</div>

<!-- End of fragment modifiable area -->
<?php
    //End of fragment renderization.
    WindUiFragmentRenderer::finishFragment();
?>