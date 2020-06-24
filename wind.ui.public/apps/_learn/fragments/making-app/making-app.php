<?php
    //Import core files and start fragment renderization.
    include_once("../../../../.core/base/fragment/wind-ui-fragment-prepare.php");
    WindUiFragmentRenderer::setParameters((object)
    array(
        "thisAppRootDir"=>(__DIR__) . "/../../",
        "thisFragmentTitle"=>"Criando Seu App"
    ));
    WindUiFragmentRenderer::startFragment();
?>
<!-- Start of fragment modifiable area -->

<center>
    <h1>Criando seu app Wind UI</h1>
</center>

O Wind UI é uma Framework para criação de aplicativos Web (ou sites) dinâmicos, aos quais não possuem carregamentos, mas todo o conteúdo
 é atualizado dinamicamente. Esse aplicativo Web "Wind UI Learn" foi criado usando o Wind UI. Quando você clicou na opção "Como Funciona" no menu
 ao lado, você deve ter notado que não houve recarregamentos da página, mas somente o conteúdo foi atualizado. Isso que você testemunhou, foi
 o client deste aplicativo, trocando o fragmento anterior para o fragmento "Como Funciona". Continue lendo para entender mais.

<!-- End of fragment modifiable area -->
<?php
    //End of fragment renderization.
    WindUiFragmentRenderer::finishFragment();
?>