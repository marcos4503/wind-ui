<?php
    //Import core files and start fragment renderization.
    include_once("../../../../../.core/base/fragment/wind-ui-fragment-prepare.php");
    WindUiFragmentRenderer::startFragment(__DIR__);
?>
<!-- Start of fragment content modifiable and visible to user area -->


<center>
    <h1>Ler Documentação de Um Componente</h1>
</center>

Nesta página você pode ler a documentação de um dos componentes, presentes em um de seus apps. Note que, apenas documentos de texto com a extensão
 ".md" podem ser escaneados para serem lidos aqui.

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

<div class="blocks">
        <div class="block">
            <?php 
            WindUiPhp::renderComponentHere("SelectField", (object)array(
                "id"=>"appName",
                "allowempty"=>"false",
                "label"=>"Aplicativo",
                "onchangecontent"=>"updateCreatedComponentsListForThisApp();",
                "optionshtml"=>$listHtmlCode
            ), false);
            ?>
        </div>
        <div class="block">
            <?php 
            WindUiPhp::renderComponentHere("SelectField", (object)array(
                "id"=>"componentName",
                "allowempty"=>"false",
                "label"=>"Componente",
                "optionshtml"=>""
            ), false);
            ?>
        </div>
    </div>
    <div class="button">
        <?php 
            WindUiPhp::renderComponentHere("Button", (object)array(
                "id"=>"loadDocumentationRequest",
                "onclick"=>"loadDocumentation();",
                "value"=>"Carregar Documentação"
            ), false);
        ?>
    </div>
</div>

<div class="visualizer" id="visualizer">
    <center>Nenhuma documentação carregada ainda.</center>
</div>

<!-- End of fragment modifiable content and visible area -->
<?php
    //End of fragment renderization.
    WindUiFragmentRenderer::finishFragment();
?>