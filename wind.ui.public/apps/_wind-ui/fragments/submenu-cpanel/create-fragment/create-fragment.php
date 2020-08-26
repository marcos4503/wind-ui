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
<div id="folderCreationInterface" style="display: none; opacity: 0; transition: all 500ms;">
    <center>
        <h2>Criar Nova Pasta</h2>
        A nova pasta será criada dentro do diretório <b id="createFolderInto">DIR</b>.
    </center>
    <br>
    <br>
    <div class="fragmentFolderCreationBlocks">
        <div class="fragmentFolderCreationBlock">
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
        <div class="fragmentFolderCreationBlock">
            <?php 
                WindUiPhp::renderComponentHere("PasswordField", (object)array(
                "id"=>"passwordToCreateFolder",
                "allowempty"=>"false",
                "label"=>"Senha do Seu Wind UI"
            ), false);
            ?>
        </div>
    </div>
    <div class="fragmentFolderCreationButton">
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
    <div class="fragmentCreationBlocks">
        <div class="fragmentCreationBlockOfCreation">
            <?php 
                WindUiPhp::renderComponentHere("StringField", (object)array(
                "id"=>"fragmentName",
                "label"=>"Nome do Fragmento",
                "tooltip"=>"O nome do fragmento não é o título. O nome do fragmento será o nome da pasta que conterá os arquivos do fragmento. Este nome será usado para carregar este fragmento, mais tarde e também aparecerá na URL do seu app.",
                "allowuppercase"=>"false",
                "allowespecialchars"=>"false",
                "specialcharsallowed"=>"-",
                "allowempty"=>"false"
            ), false);
            ?>
            <br>
            <?php 
                WindUiPhp::renderComponentHere("StringField", (object)array(
                "id"=>"fragmentTitle",
                "label"=>"Título do Fragmento",
                "tooltip"=>"O título do fragmento é como se fosse um título da página. Este aparecerá no navegador do usuário e também será incluído nas metatags do seu fragmento.",
                "allowempty"=>"false",
                "maxchars"=>"100"
            ), false);
            ?>
            <br>
            <?php 
                WindUiPhp::renderComponentHere("TextField", (object)array(
                "id"=>"fragmentDescription",
                "label"=>"Descrição do Fragmento",
                "tooltip"=>"Uma breve descrição do seu fragmento.",
                "maxchars"=>"160"
            ), false);
            ?>
            <br>
            <?php 
                WindUiPhp::renderComponentHere("StringField", (object)array(
                "id"=>"fragmentImage",
                "label"=>"Imagem de Capa do Fragmento",
                "tooltip"=>"Escreva aqui, o caminho para um arquivo de imagem para ser a capa do seu fragmento. Este arquivo deve estar dentro da pasta \"resources\" do seu app. Esta imagem de capa será colocada como metatag do seu fragmento e será exibida em situações, como quando o usuário copia e cola o link em alguma rede social por exemplo."
            ), false);
            ?>
            <br>
            <?php 
                WindUiPhp::renderComponentHere("SelectField", (object)array(
                "id"=>"fragmentType",
                "label"=>"Tipo do Conteúdo do Fragmento",
                "onchangecontent"=>"onChangeFragmentType();",
                "optionshtml"=>'<option value="website">Website</option><option value="article">Artigo</option>',
                "tooltip"=>"O tipo de conteúdo ao qual se trata este fragmento. Se será um fragmento comum do seu app, deixe como \"Website\", se será um artigo de notícia por exemplo, deixe como \"Article\".",
                "allowempty"=>"false"
            ), false);
            ?>
            <br>
            <div id="articleData" style="display: none; opacity: 0; transition: all 250ms;">
                <?php 
                    WindUiPhp::renderComponentHere("StringField", (object)array(
                    "id"=>"fragmentArticleAuthor",
                    "label"=>"Autor do Artigo",
                    "tooltip"=>"O nome do autor do artigo.",
                    "maxchars"=>"60"
                ), false);
                ?>
                <br>
                <?php 
                    WindUiPhp::renderComponentHere("StringField", (object)array(
                    "id"=>"fragmentArticleSection",
                    "label"=>"Seção do Artigo",
                    "tooltip"=>"O nome da seção do artigo. Por exemplo, \"últimas noticias\", \"ciência\" ou \"carros\" por exemplo. Evite usar mais do que 6 tags para descrever seu artigo.",
                    "maxchars"=>"100",
                    "allowespecialchars"=>"false",
                    "specialcharsallowed"=>"comma, "
                ), false);
                ?>
                <br>
                <?php 
                    WindUiPhp::renderComponentHere("StringField", (object)array(
                    "id"=>"fragmentArticleTags",
                    "label"=>"Tags do Artigo (Separado Por Vírgulas)",
                    "tooltip"=>"As tags deste artigo, ou palavras-chave. Por exemplo: carros, noticia, pontiac, gasolina",
                    "maxchars"=>"100",
                    "allowespecialchars"=>"false",
                    "specialcharsallowed"=>"comma, "
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
                "id"=>"createFragmentRequest",
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