<?php
    //Import core files and start fragment renderization.
    include_once("../../../../../.core/base/fragment/wind-ui-fragment-prepare.php");
    WindUiFragmentRenderer::startFragment(__DIR__);
?>
<!-- Start of fragment content modifiable and visible to user area -->

<center>
    <h1>Criar Novo Fragmento Para Um App</h1>
</center>

Aqui você pode criar um novo Fragmento para um app que esteja dentro do seu Wind UI. Primeiramente você precisa selecionar a pasta onde
 o novo fragmento será colocado. Em seguida, preencher as suas informações, como nome, descrição, titulo e etc. Estas informações serão aplicadas
 como metatags daquele fragmento, e serão usadas para que sites como o Facebook, busquem informações daquele Fragmento em especifico.

<br>
<br>
<br>

<h2 id="currentStepName">1. Primeiro, selecione o aplicativo que receberá o Fragmento</h2>
<div class="progressBarBg">
    <div class="progressBarFg" id="currentStepPercent">
    </div>
</div>
<br>
<br>

<!-- ################################ Step 1 ################################ -->

<?php
    //Create the code containing all apps existing inside Wind UI
    $appList = WindUiPhp::getListOfFoldersInDir("../../../../");
    $listHtmlCode = "";
    for($i = 0; $i < count($appList); $i++)
        $listHtmlCode .= '<option value="'.$appList[$i].'">wind.ui.public/apps/'.$appList[$i].'</option>';
?>

<!-- Application Selection Block -->
<div class="content" id="step1interface">
    <?php 
        WindUiPhp::renderComponentHere("SelectField", (object)array(
        "id"=>"appToReceive",
        "allowempty"=>"false",
        "label"=>"Aplicativo Que Receberá o Fragmento",
        "optionshtml"=>$listHtmlCode
    ), false);
    ?>
    <br>
    <br>
    <?php 
        WindUiPhp::renderComponentHere("Button", (object)array(
            "onclick"=>"selectAppAndNextStep();",
            "value"=>"Vamos lá!"
        ), false);
    ?>
</div>

<!-- ################################ Step 2 ################################ -->

<!-- Fragment Directory Selection Block -->
<div class="dirSelection" id="step2interface" style="display: none; opacity: 0;">

</div>

<!-- ################################ Step 3 ################################ -->

<!-- Fragment Creation Block -->
<div class="content" id="step3interface" style="display: none; opacity: 0; width: 100%; max-width: 100%;">
    <div class="fragmentCreationBlocks">
        <div class="fragmentCreationBlockOfCreation">
            <?php 
                WindUiPhp::renderComponentHere("StringField", (object)array(
                "id"=>"fragmentName",
                "label"=>"Nome do Fragmento"
            ), false);
            ?>
            <br>
            <?php 
                WindUiPhp::renderComponentHere("StringField", (object)array(
                "id"=>"fragmentTitle",
                "label"=>"Título do Fragmento"
            ), false);
            ?>
            <br>
            <?php 
                WindUiPhp::renderComponentHere("TextField", (object)array(
                "id"=>"fragmentDescription",
                "label"=>"Descrição do Fragmento"
            ), false);
            ?>
            <br>
            <?php 
                WindUiPhp::renderComponentHere("StringField", (object)array(
                "id"=>"fragmentImage",
                "label"=>"Imagem de Capa do Fragmento"
            ), false);
            ?>
            <br>
            <?php 
                WindUiPhp::renderComponentHere("SelectField", (object)array(
                "id"=>"fragmentType",
                "label"=>"Tipo do Conteúdo do Fragmento",
                "onchangecontent"=>"onChangeFragmentType();",
                "optionshtml"=>'<option value="website">Website</option><option value="article">Artigo</option>'
            ), false);
            ?>
            <br>
            <div id="articleData" style="display: none; opacity: 0; transition: all 250ms;">
                <?php 
                    WindUiPhp::renderComponentHere("StringField", (object)array(
                    "id"=>"fragmentArticleAuthor",
                    "label"=>"Autor do Artigo"
                ), false);
                ?>
                <br>
                <?php 
                    WindUiPhp::renderComponentHere("StringField", (object)array(
                    "id"=>"fragmentArticleSection",
                    "label"=>"Seção do Artigo"
                ), false);
                ?>
                <br>
                <?php 
                    WindUiPhp::renderComponentHere("StringField", (object)array(
                    "id"=>"fragmentArticleTags",
                    "label"=>"Tags do Artigo (Separado Por Vírgulas)"
                ), false);
                ?>
                <br>
            </div>
            <?php 
                WindUiPhp::renderComponentHere("PasswordField", (object)array(
                "id"=>"password",
                "allowempty"=>"false",
                "label"=>"Senha do Seu Wind UI"
            ), false);
            ?>
        </div>
        <div class="fragmentCreationDivisor"><div style="height: 30%; background-color: #f3f3f3;"></div></div>
        <div class="fragmentCreationBlockOfIntro">
            O novo Fragmento que está sendo criado, será instalado no app <b id="appToInstall">APP</b>, no diretório <b id="appToInstallDir">DIR</b>.
        </div>
    </div>
    <div class="fragmentCreationButton">
        <br>
        <br>
        <?php 
            WindUiPhp::renderComponentHere("Button", (object)array(
                "id"=>"deleteAppRequest",
                "onclick"=>"finallyCreateTheFragment();",
                "value"=>"Criar Fragmento"
            ), false);
        ?>
    </div>
</div>

<!-- End of fragment modifiable area -->
<?php
    //End of fragment renderization.
    WindUiFragmentRenderer::finishFragment();
?>