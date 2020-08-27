<?php
    //Import core files and start fragment renderization.
    include_once("../../../../../.core/base/fragment/wind-ui-fragment-prepare.php");
    WindUiFragmentRenderer::startFragment(__DIR__);
?>
<!-- Start of fragment content modifiable and visible to user area -->

<center>
    <h1>Criar Nova API Consumível Para Um App</h1>
</center>

Aqui você pode criar uma nova API para um app que esteja dentro do seu Wind UI. Primeiramente você precisa selecionar a pasta onde
 a nova API será colocada. Em seguida, preencher as suas informações, como nome e etc.

<br>
<br>
<br>

<h2 id="currentStepName">1. Primeiro, selecione o aplicativo que receberá a API nova</h2>
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
        "label"=>"Aplicativo Que Receberá a API Nova",
        "optionshtml"=>$listHtmlCode
    ), false);
    ?>
    <br>
    <br>
    <?php 
        WindUiPhp::renderComponentHere("Button", (object)array(
            "onclick"=>"selectAppAndNextStep();",
            "value"=>"Pronto!"
        ), false);
    ?>
</div>

<!-- ################################ Step 2 ################################ -->

<!-- Fragment Directory Selection Block -->
<div class="dirSelection" id="step2interface" style="display: none; opacity: 0;">

</div>
<div id="folderCreationInterface" style="display: none; opacity: 0; transition: all 500ms;">
    <center>
        <h2>Criar Nova Pasta</h2>
        A nova pasta será criada dentro do diretório <b id="createFolderInto">DIR</b>.
    </center>
    <br>
    <br>
    <div class="apiFolderCreationBlocks">
        <div class="apiFolderCreationBlock">
            <?php 
                WindUiPhp::renderComponentHere("StringField", (object)array(
                    "id"=>"createFolderName",
                    "label"=>"Nome da Pasta",
                    "allowuppercase"=>"false",
                    "allowespecialchars"=>"false",
                    "specialcharsallowed"=>"-",
                    "allowempty"=>"false"
                ), false);
            ?>
        </div>
        <div class="apiFolderCreationBlock">
            <?php 
                WindUiPhp::renderComponentHere("PasswordField", (object)array(
                "id"=>"passwordToCreateFolder",
                "allowempty"=>"false",
                "label"=>"Senha do Seu Wind UI"
            ), false);
            ?>
        </div>
    </div>
    <div class="apiFolderCreationButton">
        <br>
        <?php 
            WindUiPhp::renderComponentHere("Button", (object)array(
                "id"=>"createFolderRequest",
                "onclick"=>"createFolder();",
                "value"=>"Criar Pasta"
            ), false);
        ?>
    </div>
</div>

<!-- ################################ Step 3 ################################ -->

<!-- Fragment Creation Block -->
<div class="content" id="step3interface" style="display: none; opacity: 0; width: 100%; max-width: 100%;">
    <div class="apiCreationBlocks">
        <div class="apiCreationBlockOfCreation">
            <?php 
                WindUiPhp::renderComponentHere("StringField", (object)array(
                "id"=>"apiName",
                "label"=>"Nome da Nova API",
                "tooltip"=>"O nome da API será literalmente o nome do arquivo PHP de seu API. Não precisa inserir a extensão \".php\" aqui. O nome da API será necessário para que suas requisições acessem sua API.",
                "allowuppercase"=>"false",
                "allowespecialchars"=>"false",
                "specialcharsallowed"=>"-",
                "allowempty"=>"false"
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
        <div class="apiCreationDivisor"><div style="height: 30%; background-color: #f3f3f3;"></div></div>
        <div class="apiCreationBlockOfIntro">
            A nova API que está sendo criada, será instalado no app <b id="appToInstall">APP</b>, no diretório <b id="appToInstallDir">DIR</b>.

            <h3>Conteúdo da Pasta Selecionada</h3>
            Estes são as APIs que atualmente existem dentro da pasta que você selecionou...
            <div id="folderSelectedContent"></div>
        </div>
    </div>
    <div class="apiCreationButton">
        <br>
        <br>
        <?php 
            WindUiPhp::renderComponentHere("Button", (object)array(
                "id"=>"createApiRequest",
                "onclick"=>"finallyCreateTheApi();",
                "value"=>"Criar API"
            ), false);
        ?>
    </div>
</div>

<!-- End of fragment modifiable area -->
<?php
    //End of fragment renderization.
    WindUiFragmentRenderer::finishFragment();
?>