<?php
    //Import core files and start fragment renderization.
    include_once("../../../../../.core/base/fragment/wind-ui-fragment-prepare.php");
    WindUiFragmentRenderer::startFragment(__DIR__);
?>
<!-- Start of fragment content modifiable and visible to user area -->


<center>
    <h1>Explicando o Funcionamento do Client.php</h1>
</center>

Como você deve ter lido <a onclick="WindUiJs.loadNewFragment('submenu-docs/wind-ui-docs-how-works', null)">aqui</a>, o Client.php funciona como a única
 página que o usuário entra e nunca mais sai dela, atuando como a cara do seu site e somente trocando o conteúdo conforme o usuário navega.

<br>
<br>

Eis um exemplo de código fonte de um Client.php.

<?php 
    WindUiPhp::renderComponentHere("CodeBlock", (object)array(
    "language"=>"php",
    "codeToShow"=>
'<?php
    //Start Wind UI Client Core
    include_once("../../.core/base/client/wind-ui-client-prepare.php");
    WindUiClientRenderer::startClient(__DIR__);
?>

<!-- Seu código PHP, HTML vai aqui. -->

<div id="toolbox"></div>

<div id="content">
    <?php WindUiPhp::renderFragmentsViewerHere(); ?>
</div>

<div id="footer"></div>

<?php
    //End Wind UI Client Core
    WindUiClientRenderer::finishClient(); 
?>
'
), false);
?>

É só isso! Nas linhas 1, 2, 3, 4 e 5, nós inicializamos o Client.php, importando a biblioteca Backend do Wind UI, e nas 4 últimas linhas nos finalizamos a renderização do Client.php. O
 código do nosso client.php, fica entre essa inicialização e finalização do Client.php. É claro que não podemos esquecer de renderizar nosso FragmentsViewer em um local que desejamos. Eu
 optei por renderizar o FragmentsViewer dentro da DIV com ID "content". É muito importante que renderizemos o FragmentsViewer, sem ele, os Fragmentos nunca serão mostrados e podem haver erros
 na execução do seu app. O Client.php fica na pasta raiz do seu app. Não há a necessidade e não é recomendado o uso das tags HEAD, HTML, BODY ou STYLE aqui.

<br>
<br>

Quando o usuário acessa seu app, ele sempre deve acessar o Client.php do seu app. Caso ele não informe nenhum fragmento a ser carregado, no parâmetro "fragment=", o fragmento padrão do seu app
 será carregado. Se especificar um fragmento, o fragmento desejado será carregado e exibido dentro do Client.php, no FragmentsViewer.

<br>
<br>

Dentro do seu Client.php, você pode utiliziar HTML e PHP livremente. Dentro do seu Client.php, você tem acesso a todos os métodos da biblioteca Backend PHP e Frontend JavaScript do Wind UI.

<!-- End of fragment modifiable content and visible area -->
<?php
    //End of fragment renderization.
    WindUiFragmentRenderer::finishFragment();
?>