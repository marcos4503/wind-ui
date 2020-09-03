<?php
    //Import core files and start fragment renderization.
    include_once("../../../../../.core/base/fragment/wind-ui-fragment-prepare.php");
    WindUiFragmentRenderer::startFragment(__DIR__);
?>
<!-- Start of fragment content modifiable and visible to user area -->


<center>
    <h1> Editando o CSS Universal do Seu App</h1>
</center>

O arquivo "app-css-style.php" armazena o CSS do seu app. Todo o CSS dentro desse arquivo, formata tudo do seu app, desde o Client.php até
 os seus componentes, fragmentos e etc. Por isso, se você precisa colocar um CSS e quer aplica-lo a tudo no seu app, a melhor maneira é adiciona-lo aqui.
 Assim tudo fica organizado.

<!-- End of fragment modifiable content and visible area -->
<?php
    //End of fragment renderization.
    WindUiFragmentRenderer::finishFragment();
?>