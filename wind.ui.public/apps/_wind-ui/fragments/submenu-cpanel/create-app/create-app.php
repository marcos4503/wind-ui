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

<<<<<<< HEAD
<div class="appCreationBlocks">
    <div class="appCreationBlockOfCreation">
        <?php 
            WindUiPhp::renderComponentHere("StringField", (object)array(
                "id"=>"appTitle",
                "allowempty"=>"false",
                "label"=>"Nome do App"
            ), false);
        ?>
        <br>
        <?php 
            WindUiPhp::renderComponentHere("StringField", (object)array(
                "id"=>"appBaseUrl",
                "allowespecialchars"=>"false",
                "allowuppercase"=>"false",
                "allowempty"=>"false",
                "specialcharsallowed"=>"-",
                "label"=>"Nome da Pasta"
            ), false);
        ?>
        <br>
        <?php 
            WindUiPhp::renderComponentHere("StringField", (object)array(
                "id"=>"appCode",
                "allowespecialchars"=>"false",
                "allowuppercase"=>"false",
                "allowempty"=>"false",
                "specialcharsallowed"=>".,-,_",
                "label"=>"Código do App"
            ), false);
        ?>
        <br>
        <?php 
            WindUiPhp::renderComponentHere("StringField", (object)array(
                "id"=>"appLang",
                "allowespecialchars"=>"false",
                "allowempty"=>"false",
                "specialcharsallowed"=>"-,_",
                "maxchars"=>"6",
                "label"=>"Língua do App (ISO)"
            ), false);
        ?>
        <br>
        <?php 
            WindUiPhp::renderComponentHere("PasswordField", (object)array(
                "id"=>"password",
                "allowempty"=>"false",
                "label"=>"Senha do Seu Wind UI"
            ), false);
        ?>
    </div>
    <div class="appCreationDivisor"><div style="height: 30%; background-color: #f3f3f3;"></div></div>
    <div class="appCreationBlockOfIntro">
        Para definir uma senha para seu Wind UI (se você ainda não definiu uma), você deve colocar a sua senha de texto normal,
         convertida em um Hash MD5, dentro do arquivo <b>management-key.txt</b>, dentro da pasta <b>wind.ui.data</b>, esta por
         sua vez, deve ficar no mesmo diretório da pasta <b>wind.ui.public</b> do Framework Wind UI que está instalado em sua
         hospedagem.

        <h3>Apps Já Existentes</h3>
        Estes são os apps que atualmente existem dentro do Wind UI instalado em sua hospedagem...
        <div id="appList"></div>
        Estes apps podem ser encontrados no diretório <b>wind.ui.public/apps</b> do Framework Wind UI que está instalado em sua hospedagem.
    </div>
</div>

<div class="appCreationButton">
=======
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
>>>>>>> 4311b5564d08e846da9da9d6e1f506ad76ade9f5
    <br>
    <br>
    <?php 
        WindUiPhp::renderComponentHere("Button", (object)array(
<<<<<<< HEAD
            "id"=>"submitRequestButton",
            "onclick"=>"createRequestedApp();",
=======
>>>>>>> 4311b5564d08e846da9da9d6e1f506ad76ade9f5
            "value"=>"Criar Novo App"
        ), false);
    ?>
</div>

<!-- End of fragment modifiable area -->
<?php
    //End of fragment renderization.
    WindUiFragmentRenderer::finishFragment();
?>