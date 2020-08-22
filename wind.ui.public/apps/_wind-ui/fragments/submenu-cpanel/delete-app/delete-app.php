<?php
    //Import core files and start fragment renderization.
    include_once("../../../../../.core/base/fragment/wind-ui-fragment-prepare.php");
    WindUiFragmentRenderer::startFragment(__DIR__);
?>
<!-- Start of fragment content modifiable and visible to user area -->

<center>
    <h1>Deleter App Existente Dentro do Seu Wind UI</h1>
</center>

Para deletar um app que esteja dentro do seu Framework Wind UI, escolha o app desejado abaixo e insira a senha do seu Wind UI.
 Você não pode deletar o app _wind-ui, pois é um app do Framework.

<br>
<br>
<br>

<?php
    //Create the code containing all apps existing inside Wind UI
    $appList = WindUiPhp::getListOfFoldersInDir("../../../../");
    $listHtmlCode = "";
    for($i = 0; $i < count($appList); $i++)
        if($appList[$i] != "_wind-ui")
            $listHtmlCode .= '<option value="'.$appList[$i].'">wind.ui.public/apps/'.$appList[$i].'</option>';
?>

<div class="content" id="formToDelete">
    <?php 
        WindUiPhp::renderComponentHere("SelectField", (object)array(
        "id"=>"appToDelete",
        "allowempty"=>"false",
        "label"=>"Aplicativo Para Deletar",
        "optionshtml"=>$listHtmlCode
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
    <br>
    <br>
    <?php 
        WindUiPhp::renderComponentHere("Button", (object)array(
            "id"=>"deleteAppRequest",
            "onclick"=>"deleteAppRequested();",
            "value"=>"Deletar App"
        ), false);
    ?>
</div>

<!-- End of fragment modifiable area -->
<?php
    //End of fragment renderization.
    WindUiFragmentRenderer::finishFragment();
?>