<?php
    //Import core files and start fragment renderization.
    include_once("../../../../../.core/base/fragment/wind-ui-fragment-prepare.php");
    WindUiFragmentRenderer::startFragment(__DIR__);
?>
<!-- Start of fragment content modifiable and visible to user area -->

<center>
    <h1>Criar Novo Componente Dentro do Seu Wind UI</h1>
</center>

Aqui você pode criar um novo componente dentro da sua framework Wind UI. O componente será criado dentro do app de seu desejo e poderá ser editado logo em seguida.

<br>
<br>
<br>

<?php
    //Create the code containing all apps existing inside Wind UI
    $appList = WindUiPhp::getListOfFoldersInDir("../../../../");
    $listHtmlCode = "";
    for($i = 0; $i < count($appList); $i++)
        $listHtmlCode .= '<option value="'.$appList[$i].'">wind.ui.public/apps/'.$appList[$i].'</option>';
?>

<div class="appCreationBlocks">
    <div class="appCreationBlockOfCreation">
        <?php 
            WindUiPhp::renderComponentHere("SelectField", (object)array(
            "id"=>"appToReceive",
            "allowempty"=>"false",
            "label"=>"Aplicativo Que Receberá o Componente",
            "onchangecontent"=>"updateCreatedComponentsList();",
            "optionshtml"=>$listHtmlCode
        ), false);
        ?>
        <br>
        <?php 
            WindUiPhp::renderComponentHere("StringField", (object)array(
                "id"=>"componenteName",
                "allowespecialchars"=>"false",
                "allowempty"=>"false",
                "allownumbers"=>"false",
                "label"=>"Nome do Componente",
                "tooltip"=>"O nome do componente será o nome da Pasta que guardará os arquivos do componente e também será o nome necessário que você deve informar sempre que for renderizar o componente."
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
        Após criar seu componente, basta edita-lo. Ele já virá formatado para que você o edite.

        <h3>Componentes Já Existentes</h3>
        Estes são os Componentes que atualmente existem dentro do Wind UI instalado no app selecionado.
        <div id="componentsList"><ul><li>Por favor, selecione um app para ver seus componentes.</li></ul></div>
    </div>
</div>

<div class="appCreationButton">
    <br>
    <br>
    <?php 
        WindUiPhp::renderComponentHere("Button", (object)array(
            "id"=>"submitRequestButton",
            "onclick"=>"createRequestedApp();",
            "value"=>"Criar Novo Componente"
        ), false);
    ?>
</div>

<!-- End of fragment modifiable area -->
<?php
    //End of fragment renderization.
    WindUiFragmentRenderer::finishFragment();
?>