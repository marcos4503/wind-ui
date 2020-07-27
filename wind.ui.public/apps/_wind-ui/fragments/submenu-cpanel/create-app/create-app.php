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
    "fragmentOgMetaTagTitle": "Create App",
    "fragmentOgMetaTagDescription": "Crie um novo aplicativo dentro do seu Wind UI Framework.",
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
    <h1>Criar Novo App Dentro do Seu Wind UI</h1>
</center>

Este é o aplicativo que vem acompanhado do seu Framework Wind UI ao baixa-lo. Aqui você pode gerenciar seu Wind UI, criando novos apps,
 contemplando seu app existente, com novos Fragmentos, Componentes base e etc. Esse também é o melhor local para aprender sobre como
 usar o Wind UI, por aqui você tem acesso a documentação total do Wind UI.

<!-- End of fragment modifiable area -->
<?php
    //End of fragment renderization.
    WindUiFragmentRenderer::finishFragment();
?>