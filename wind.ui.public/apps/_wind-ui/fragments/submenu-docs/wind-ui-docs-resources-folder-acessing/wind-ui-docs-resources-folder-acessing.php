<?php
    //Import core files and start fragment renderization.
    include_once("../../../../../.core/base/fragment/wind-ui-fragment-prepare.php");
    WindUiFragmentRenderer::startFragment(__DIR__);
?>
<!-- Start of fragment content modifiable and visible to user area -->


<center>
    <h1>Armazenando e Acessando Recursos Presentes na Pasta "resources" de Qualquer Lugar do Seu App</h1>
</center>

A função da pasta "resources" do seu app é armazenar recursos, ou seja, arquivos de vídeo, php, imagens, musica e etc. Todo e qualquer arquivo presente
 na pasta "resources" pode ser acessado facilmente tanto no Frontend quanto no Backend de sua aplicação, usando a API do Wind UI.

<br>
<br>

Digamos que tenhamos a seguinte hierarquia de arquivos dentro da pasta "resources" do nosso app...

<br>
<br>

<?php
    WindUiPhp::renderComponentHere("AdaptativeImage", (object)array(
        "src"=>WindUiPhp::getResourcePath("images/resources-example.png")
    ), false);
?>

<br>
<br>

Agora vamos, hipoteticamente, nós vamos adicionar uma imagem a um fragmento nosso. Para que não precisemos criar toda uma referência com barras e etc, podemos simplesmente usar
 a API do Wind UI para acessar o arquivo "imagem.png" dentro da pasta "example-folder" que está dentro da pasta "resources" do nosso app.

<?php 
    WindUiPhp::renderComponentHere("CodeBlock", (object)array(
    "language"=>"html",
    "codeToShow"=>
'<img src="<?php WindUiPhp::getResourcePath(\'example-folder/imagem.png\') ?>" style="width: 100%;" />
'
), false);
?>

Esse método pode ser usado dentro do Client.php, fragmentos e até APIs PHP dentro do seu app. Você pode chamar esse método em qualquer lugar para referenciar-se a recursos do seu app de maneira fácil e rápida.
 Consulte a referência a API do Wind UI, para maiores detalhes.

<h3>E se eu quiser acessar algum arquivo da pasta resources, no frontend?</h3>

É simples! Basta usar o método JavaScript, o funcionamento é identico ao método PHP acima, porém, é JavaScript!

<?php 
    WindUiPhp::renderComponentHere("CodeBlock", (object)array(
    "language"=>"html",
    "codeToShow"=>
'var caminhoAteImagem = WindUiJs.getResourcePath("imagem.png"); //Aqui acessamos o arquivo "imagem.png" que está logo na raiz da pasta "resources"
'
), false);
?>

É só isso!

<!-- End of fragment modifiable content and visible area -->
<?php
    //End of fragment renderization.
    WindUiFragmentRenderer::finishFragment();
?>