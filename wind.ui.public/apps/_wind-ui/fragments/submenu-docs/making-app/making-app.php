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
    "fragmentOgMetaTagTitle": "Criando Novo App",
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
<!-- Here you can type plain text and open PHP or HTML tags. -->

<center>
    <h1>Criando seu app Wind UI</h1>
</center>

Após ler este tópico você já conseguirá criar seu app com o Wind UI. Leia os tópicos em sequência para compreender tudo corretamente.

<h3>1. Criar pasta do seu app</h3>

Dentro da pasta "wind.ui.public" que você baixou e copiou para sua hospedagem, vá até a pasta "apps", duplique a pasta "_learn" (a pasta que armazena)
 este app de aprendizado. Então, renomeie a pasta que você duplicou, com o nome do seu futuro app. Por exemplo, "meu-primeiro-app".

<h3>2. Preparando seu novo app</h3>

Agora que você tem a pasta do seu app, é hora de redefinir todo o conteúdo dela, preparando o terreno para que você possa criar o conteúdo do
 seu app. Para isso...

<ul>
    <li>Remova todo o conteúdo da pasta <b>ajax-http-apis</b>.</li>
    <li>Remova todo o conteúdo da pasta <b>components</b>.</li>
    <li>Remova todo o conteúdo da pasta <b>fragments</b>.</li>
    <li>Remova todo o conteúdo da pasta <b>resources</b>.</li>
    <li>Remova todo o conteúdo da pasta <b>thirdparty-libs</b>.</li>
    <li>Abra o arquivo <b>client.php</b> e limpe todo o conteúdo dele.</li>
</ul>

Após fazer tudo acima, o seu novo app não terá componentes, nem fragmentos, e o client.php estará completamente limpo, além do conteúdo de todas
 as pastas, o seu novo app agora está em 0km. Continue seguindo os próximos tópicos para deixar seu primeiro app pronto para uso!

<h3>3. Criando o client.php (página principal) do seu app</h3>

Abra o arquivo "client.php" do seu app. Primeiramente, vamos inicializar a página do seu client.php. Para isso, use o código abaixo, logo no
 começo do seu "client.php".

<!-- End of fragment modifiable area -->
<?php
    //End of fragment renderization.
    WindUiFragmentRenderer::finishFragment();
?>