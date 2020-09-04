<?php
    //Import core files and start fragment renderization.
    include_once("../../../../../.core/base/fragment/wind-ui-fragment-prepare.php");
    WindUiFragmentRenderer::startFragment(__DIR__);
?>
<!-- Start of fragment content modifiable and visible to user area -->


<center>
    <h1>Maneira Correta de Compartilhar Links de Um App Wind UI</h1>
</center>

Como você já tem uma noção, após ler sobre fragmentos <a onclick="WindUiJs.loadNewFragment('submenu-docs/wind-ui-docs-fragments-explained', null);">aqui</a> a URL do seu app
 feito com o Wind UI, nunca muda, porém, a única coisa que muda é o parâmetro "fragment=" que fica na URL do seu app. O conteúdo desse parâmetro é o caminho para o fragmento
 que atualmente está sendo exibido no Client.php para o usuário, se o fragmento trocar, o conteúdo do parâmetro "fragment=" também muda. Isso é a única coisa que muda.

<br>
<br>

Então, a maneira correta de compartilhar os links de um app feito com o Wind UI, é igual a maneira convencional, basta copiar o link inteiro e sair enviando! Só não se esqueça do mais
 importante que é o parâmetro "fragment=", é ele que define qual é o fragmento que será exibido ao usuário que clicar no link compartilhado por você.

<br>
<br>

Como cada fragmento possui um arquivo de metatags e etc, caso o link seja compartilhado em um site que tente buscar og:metatags, ele irá automaticamente puxar as metatags do seu fragmento, caso
 já estejam configuradas no arquivo JSON do seu fragmneto, não se preocupe. O Wind UI irá retornar para o site que tentar buscar as og:metatags, as mesmas metatags correspondentes ao fragmento
 especificado no parâmetro "fragment=" da URL.

<br>
<br>

Isso é tudo! Resumindo, sempre compartilhe a URL inteira!

<!-- End of fragment modifiable content and visible area -->
<?php
    //End of fragment renderization.
    WindUiFragmentRenderer::finishFragment();
?>