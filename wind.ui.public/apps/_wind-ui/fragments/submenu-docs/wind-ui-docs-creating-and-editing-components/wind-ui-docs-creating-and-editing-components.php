<?php
    //Import core files and start fragment renderization.
    include_once("../../../../../.core/base/fragment/wind-ui-fragment-prepare.php");
    WindUiFragmentRenderer::startFragment(__DIR__);
?>
<!-- Start of fragment content modifiable and visible to user area -->


<center>
    <h1>Criando e Editando Componentes do Wind UI</h1>
</center>

Você pode usar o CPanel do Wind UI modo de adminstrador, para criar componentes para seus apps, de maneira rápida e fácil. Para isso, acesse o app Wind UI
 do seu Framework Wind UI em sua hospedagem, no modo administrador e clique em "Criar Novo Componente Para Um App". Então basta selecionar o app que receberá o componente,
 preencher todas as informações e o componente será criado dentro da pasta "components" do seu app.

<br>
<br>

No final da criação, o componente será colocado dentro da pasta "components", no diretório que você selecionou e no app que você selecionou. Então, é só ser feliz, começar a editar
 o código fonte do seu componente e renderiza-lo, quantas vezes quiser! Clique <a onclick="WindUiJs.loadNewFragment('submenu-docs/wind-ui-docs-components-explained', null);">aqui</a> para saber mais sobre os componentes.

<!-- End of fragment modifiable content and visible area -->
<?php
    //End of fragment renderization.
    WindUiFragmentRenderer::finishFragment();
?>