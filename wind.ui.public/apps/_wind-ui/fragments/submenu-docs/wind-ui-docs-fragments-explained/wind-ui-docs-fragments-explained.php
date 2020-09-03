<?php
    //Import core files and start fragment renderization.
    include_once("../../../../../.core/base/fragment/wind-ui-fragment-prepare.php");
    WindUiFragmentRenderer::startFragment(__DIR__);
?>
<!-- Start of fragment content modifiable and visible to user area -->


<center>
    <h1>Explicando o Funcionamento dos Fragmentos</h1>
</center>

Como você deve ter visto aqui <a onclick="WindUiJs.loadNewFragment('submenu-docs/wind-ui-docs-how-works', null);">aqui</a>, um fragmento é um pedaço de página
 que sempre é exibido dentro do FragmentsViewer do seu Client.php. Os fragmentos do seu app, são guardados dentro da pasta "fragments" do seu app. Quando pensamos em
 um fragmento, não devemos pensar que se trata de um arquivo. Fragmento na verdade, é uma pasta que guarda 4 arquivos.

<br>
<br>

<?php
    WindUiPhp::renderComponentHere("AdaptativeImage", (object)array(
        "src"=>WindUiPhp::getResourcePath("images/fragment-descritive-example.png")
    ), false);
?>

<br>
<br>

Na imagem acima, temos o diretório raiz do nosso app, onde existem as pastas "fragments", "components" e "resources" como exemplo. Os fragmentos são armazenados dentro da
 pasta "fragments" e um fragmento na verdade é uma pasta, que contém 4 arquivos. Vamos ver o que significa cada um deles. Vamos imaginar que temos um fragmento (pasta) chamado "fragment"
 com esses 4 arquivos dentro...

<ul>
    <li><b>fragment.json</b> - Armazena um código JSON simples que contém informações sobre este fragmento. Estas informações são metatags do fragmneto, tais como, descrição, titulo da página,
     imagem e etc. Essas metatags são incluidas e exibidas ao usuário quando ele acessa esse fragmento, e também serão usadas quando alguém compartilha o link para este fragmento, pois o site que
     puxar as informações desse link, irá acessar esse arquivo para obter as informações do link, como título e descrição.</li>
    <li><b>fragment.js</b> - Armazena todo o código JavaScript do seu fragmento. É altamente recomendado que todo o código JavaScript do seu fragmento fique apenas aqui dentro. Seu fragmento poderá
     acessar todos os métodos, variaveis e etc, que estiverem aqui dentro, sem problemas. Se você realmente precisar colocar algum código JavaScript dentro do seu fragmento, inclua-o dentro da tag
     SCRIPT e evite colocar coisas mais complexas, como métodos e etc. Deixe a parte mais complicada para colocar aqui dentro.</li>
    <li><b>fragment.css</b> - Armazena todo o código CSS do seu fragmento. O código CSS aqui dentro pode formatar o conteúdo do seu fragmento e até mesmo componentes que são renderizados dentro do seu
     fragmento.</li>
    <li><b>fragment.php</b> - Armazena todo o código HTML e PHP do seu fragmento. Aqui dentro é onde você cria o conteúdo do seu fragmento, como textos, imagens, renderiza componentes, usa código PHP e etc.
     O seu fragmento pode acessar qualquer método da API Backend PHP e Frontend JavaScript do Wind UI.</li>
</ul>

Note que, a pasta só se torna um Fragmento, se contiver esses 4 arquivos dela. Note também que esses arquivos devem ter o mesmo nome da pasta ao qual eles estão dentro! Veja um exemplo de um "fragment.php".

<?php 
    WindUiPhp::renderComponentHere("CodeBlock", (object)array(
    "language"=>"php",
    "codeToShow"=>
'<?php
    //Import core files and start fragment renderization.
    include_once("../../../../../.core/base/fragment/wind-ui-fragment-prepare.php");
    WindUiFragmentRenderer::startFragment(__DIR__);
?>

<!-- Seu código PHP, HTML vai aqui. -->

Algum conteúdo de exemplo. <?php echo("teste") ?>
etc.......

<?php
    //End of fragment renderization.
    WindUiFragmentRenderer::finishFragment();
?>
'
), false);
?>

É só isso! Nas linhas 1, 2, 3, 4 e 5, como no Client.php, nós inicializamos o Fragmento, importando a biblioteca Backend do Wind UI, e nas 4 últimas linhas nos finalizamos a renderização do Fragmento. O
 código do nosso Fragmento, fica entre essa inicialização e finalização do Fragmento. Durante esse meio tempo, também podemos renderizar quantos componentes quisermos, usar tags HTML, código PHP e etc.
 Não há a necessidade e não é recomendado o uso das tags HEAD, HTML ou BODY aqui.

<h3>Carregando um Fragmento</h3>

Vamos analisar o esquema que mostra uma hierarquia de fragmentos, novamente...

<br>
<br>

<?php
    WindUiPhp::renderComponentHere("AdaptativeImage", (object)array(
        "src"=>WindUiPhp::getResourcePath("images/fragment-descritive-example.png")
    ), false);
?>

<br>
<br>

Como vimos anteriormente, o "fragmento" é a pasta que contem os arquivos PHP, CSS, JSON e JS. Sendo assim, sempre que formos carregar um fragmento, precisamos informar um caminho até a pasta (Fragmento). Esse caminho tem como
 pasta raiz, a pasta "fragments" do seu app. Por exemplo, digamos que queremos carregar o fragmento chamado "another-fragment". Vamos usar o caminho "sub-folder/another-fragment" e pronto! O fragmento será exibido dentro do Client.php".
 Veja o exemplo abaixo...

<br>
<br>

<?php
    WindUiPhp::renderComponentHere("AdaptativeImage", (object)array(
        "src"=>WindUiPhp::getResourcePath("images/load-fragment-on-url.png")
    ), false);
?>

<br>
<br>

A mesma coisa vale, se quisermos mandar um comando para nosso Client.php trocar o fragmento que atualmente esta sendo exibido, e exibir o fragmento "another-fragment". Só precisamos chamar o método WindUiJs.loadNewFragment() informando
 o caminho até o fragmento que desejamos e pronto! Na hora que chamarmos esse método, instantaneamente o Client.php irá buscar pelo fragmento que queremos e começará a carrega-lo para exibi-lo ao usuário. Veja o exemplo...

<?php 
    WindUiPhp::renderComponentHere("CodeBlock", (object)array(
    "language"=>"javascript",
    "codeToShow"=>
'WindUiJs.loadNewFragment("sub-folder/another-fragment", null);
'
), false);
?>

Logo que o fragmento terminar de carregar, ele será exibido ao usuário e o titulo da página será alterado para exibiro titulo do fragmento (titulo este que está dentro do JSON do fragmento, junto de outras informações como descrição e etc). A URL
 do navegador do usuário também terá o parâmetro "fragment=" alterado para o caminho do Frgamento que atualmente está sendo exibido, ou seja, o fragmento que você acabou de carregar, usando a API JavaScript acima. Essa nova URL alterada também irá para
 o histórico do navegador do usuário, ou seja, o usuário terá a possibilidade de simplesmente clicar no botão de voltar do navegador, e o fragmento anterior ao qual ele estava olhando, será carregado. Como um retroceder de páginas de sites simples.

<br>
<br>

Se você precisa trocar fragmentos, normalmente você faria isso usando as tags A com atributo HREF em sites comum, mas aqui, basta você usar algo como abaixo...

<?php 
    WindUiPhp::renderComponentHere("CodeBlock", (object)array(
    "language"=>"html",
    "codeToShow"=>
'...
Clique <a onclick="WindUiJs.loadNewFragment(\'fragment\', null);">aqui</a> para carregar outro fragmento.
...
'
), false);
?>

Você deve ter notado o parâmetro "null" que está no método "WindUiJs.loadNewFragment();". Esse parâmetro pode ser usado para que você passe dados POST para o fragmento ao qual você está tentando carregar. É muito simples, veja um exemplo...

<?php 
    WindUiPhp::renderComponentHere("CodeBlock", (object)array(
    "language"=>"javascript",
    "codeToShow"=>
'var dados = new FormData();
dados.append("idade", "21");

WindUiJs.loadNewFragment("sub-folder/another-fragment", dados);
'
), false);
?>

Ao fazer isso, logo que carregamos o fragmento "sub-folder/another-fragment" ele já receberá pelo método POST, a variavel "idade" definida com o valor "21". Isso pode ser usado em diferentes casos, principalmente quando você simplesmente quer passar informações
 entre fragmentos.

<br>
<br>

Agora, você deve estar se perguntando, mas, voltando ao exemplo da imagem abaixo...

<br>
<br>

<?php
    WindUiPhp::renderComponentHere("AdaptativeImage", (object)array(
        "src"=>WindUiPhp::getResourcePath("images/fragment-descritive-example.png")
    ), false);
?>

<br>
<br>

... e se eu quiser carregar o fragmento "home-fragment"?

<br>
<br>

É bem simples. Como o fragmento "home-fragment" está na pasta raiz "fragments", simplesmente o carregamos assim...

<?php 
    WindUiPhp::renderComponentHere("CodeBlock", (object)array(
    "language"=>"javascript",
    "codeToShow"=>
'WindUiJs.loadNewFragment("home-fragment", null);
'
), false);
?>

e assim, se formos carrega-lo pela URL...

<br>
<br>

<?php
    WindUiPhp::renderComponentHere("AdaptativeImage", (object)array(
        "src"=>WindUiPhp::getResourcePath("images/load-fragment-on-url-2.png")
    ), false);
?>

<br>
<br>

Isso é tudo sobre Fragmentos!

<!-- End of fragment modifiable content and visible area -->
<?php
    //End of fragment renderization.
    WindUiFragmentRenderer::finishFragment();
?>