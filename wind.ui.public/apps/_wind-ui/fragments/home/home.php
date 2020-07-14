<?php
    //Import core files and start fragment renderization.
    include_once("../../../../.core/base/fragment/wind-ui-fragment-prepare.php");
    WindUiFragmentRenderer::startFragment((__DIR__ . "/../../"));
?>

<!-- Fragment manifest and parameters area -->

<json id="windUiJsonFragmentManifest" type="text/json" app="wind.ui">
{
    "fragmentOgMetaTagTitle": "Wind UI App",
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

<center>
    <h1>Aplicativo de Gerenciamento e Documentação do Wind UI</h1>
</center>

Este é o aplicativo que vem acompanhado do seu Framework Wind UI ao baixa-lo. Aqui você pode gerenciar seu Wind UI, criando novos apps,
 contemplando seu app existente, com novos Fragmentos, Componentes base e etc. Esse também é o melhor local para aprender sobre como
 usar o Wind UI, por aqui você tem acesso a documentação total do Wind UI.

<br>
<br>
<br>

<?php 
    WindUiPhp::renderComponentHere("AdaptativeImage", (object)array(
        "imageSrc"=>WindUiPhp::getResourcePath("images/framework.png"),
        "style"=>"max-height: 350px;"
    ), false);
?>

<br>
<br>

<div style="width: 100%; display: flex; align-items: center; justify-content: center;">
    <center>
        <?php 
            WindUiPhp::renderComponentHere("Button", (object)array(
                "style"=>"max-width: 250px; margin: 4px; min-width: 16px;",
                "onClickJsEvent"=>"openAppMenu();",
                "value"=>"Abrir Menu"
            ), false);
        ?>
    </center>
    <center>
        <?php 
            WindUiPhp::renderComponentHere("Button", (object)array(
                "style"=>"max-width: 250px; margin: 4px; min-width: 16px;",
                "onClickJsEvent"=>"window.open('https://github.com/marcos4503/wind-ui', '_blank');",
                "value"=>"Ver Wind UI no GitHub"
            ), false);
        ?>
    </center>
</div>


<!-- End of fragment modifiable content and visible area -->
<?php
    //End of fragment renderization.
    WindUiFragmentRenderer::finishFragment();
?>