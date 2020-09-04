<?php
    //Import core files and start fragment renderization.
    include_once("../../../../../.core/base/fragment/wind-ui-fragment-prepare.php");
    WindUiFragmentRenderer::startFragment(__DIR__);
?>
<!-- Start of fragment content modifiable and visible to user area -->


<center>
    <h1>Incorporando Bibliotecas CSS ou JavaScript de Terceiros ou Servidores Externos ao Seu App</h1>
</center>

O Wind UI oferece compatibilidade com bibliotecas CSS/JavaScript de terceiros, e você pode incorpora-las sem problemas ao seu app. Por exemplo, você pode incorporar
 bibliotecas JQuery, Bootstrap dentre outras, sem problemas.

<br>
<br>

É possível incorporar bibliotecas de terceiros, atráves da URL dessas bibliotecas, ou baixando os arquivos JS e CSS da biblioteca. Se você preferir baixar o CSS e JavaScript
 da biblioteca, coloque os arquivos CSS dentro do diretório "thirdparty-libs/css" e os arquivos JavaScript dentro do diretório "thirdparty-libs/js" do seu app. Se for uma biblioteca
 presente num servidor, você não precisa baixa-la, apenas adicionar suas URLs no arquivo de configuração do seu app.

<br>
<br>

O último passo necessário é configurar o seu "app-settings.json" para que seu app leia essas bibliotecas, e pronto! Clique <a onclick="WindUiJs.loadNewFragment('submenu-docs/wind-ui-docs-settings-of-app', null);">aqui</a> para ir até o tópico de configuração do arquivo "app-settings.json"
 do seu app, então vá até o tópico "Bibliotecas externas" e você entenderá a parte da configuração.


<!-- End of fragment modifiable content and visible area -->
<?php
    //End of fragment renderization.
    WindUiFragmentRenderer::finishFragment();
?>