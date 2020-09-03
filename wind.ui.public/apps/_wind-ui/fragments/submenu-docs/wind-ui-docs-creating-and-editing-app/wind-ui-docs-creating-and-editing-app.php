<?php
    //Import core files and start fragment renderization.
    include_once("../../../../../.core/base/fragment/wind-ui-fragment-prepare.php");
    WindUiFragmentRenderer::startFragment(__DIR__);
?>
<!-- Start of fragment content modifiable and visible to user area -->


<center>
    <h1>Criando e Editando Seu Primeiro App do Wind UI</h1>
</center>

Se você está lendo esse artigo, assumimos que você já leu todos os outros acima desde, artigos sobre como funciona o Wind UI, fragmentos,
 componentes e etc. Sabendo disso, você precisa acessar o app Wind UI que está na sua framework instalada em seu Servidor, deve acessa-la com o
 modo administração, para que você possa ter acesso as ferramentas adicionais. Se precisar dar uma relembrada, clica <a onclick="WindUiJs.loadNewFragment('submenu-docs/wind-ui-docs-installing-in-host', null)">aqui</a>!

<br>
<br>

Agora, clique em "Criar Novo Aplicativo Wind UI" que está no Menu de CPanel do seu app Wind UI. Então basta seguir o passo-a-passo até criar seu novo app.

<br>
<br>

No final da criação, o seu app estará dentro do diretório "wind.ui.public/apps". Todos os apps que você criar dentro do seu Wind UI Framework, irão para este diretório por padrão. Então, como você sabe, para acessa-los
 basta acessar o Client.php deles.

<br>
<br>

Se você já leu todos os artigos até então, você já tem a noção básica para começar a editar o seu app, então sinta-se livre para começar a formata-lo, criar seu conteúdo e etc! Após criar seu app com o Wind UI, ele virá
 com um código e visual bem básico, mas já virá funcional, você só precisará editar até o seu app ficar do seu jeito.

<br>
<br>

Continue lendo os próximos artigos para entender mais sobre os outros diretórios e arquivos do seu app.

<!-- End of fragment modifiable content and visible area -->
<?php
    //End of fragment renderization.
    WindUiFragmentRenderer::finishFragment();
?>