<?php
    //Import core files and start fragment renderization.
    include_once("../../../../../.core/base/fragment/wind-ui-fragment-prepare.php");
    WindUiFragmentRenderer::startFragment(__DIR__);
?>
<!-- Start of fragment content modifiable and visible to user area -->

<center>
    <h1>API JavaScript Frontend: Métodos Essenciais</h1>
</center>

O Wind UI funciona com bibliotecas Backend e Frontend com várias ferramentas e recursos para que você crie seu aplicativo. Uma dessas
 ferramentas é a API Frontend JavaScript do Wind UI. Com a API Frontend em JavaScript, você tem métodos rápidos para efetuar ações que
 desenvolvedores Web geralmente precisam muito.

<br>
<br>

Aqui você encontra todos os métodos Backend PHP do Wind UI, porém, estes métodos são somente métodos essenciais, métodos cuja o uso
 serão muito frequentes por você.

<br>
<br>

Por favor, note que todos os métodos listados aqui são utilizáveis, e todos os códigos encontrados aqui são para referência, para que
 você saiba como utiliza-los e possa entender como eles funcionam e ter um código de exemplo para cada um.

<br>
<br>

<!-- setFunctionToBeRunnedOnBeforeLoadANewFragment(customFunction) -->
<?php 
    WindUiPhp::renderComponentHere("JsMethodName", (object)array(
        "methodname"=>"setFunctionToBeRunnedOnBeforeLoadANewFragment(customFunction)"
    ), false);
?>
<<<<<<< HEAD
<<<<<<< HEAD
Com este método você pode registrar uma função para ser executada sempre ANTES que um novo fragmento seja carregado. A intenção aqui, é que
você só utilize este método, no código JavaScript do seu Client.php, ou no "app-javascript.php" do seu app. Continue lendo para entender.
=======
Com este método você pode registrar uma função para ser executada sempre ANTES que um novo fragmento seja carregado.
>>>>>>> 4311b5564d08e846da9da9d6e1f506ad76ade9f5
=======
Com este método você pode registrar uma função para ser executada sempre ANTES que um novo fragmento seja carregado.
>>>>>>> 4311b5564d08e846da9da9d6e1f506ad76ade9f5
<ul>
    <li>
        <b>customFunction (JS Function)</b> - Neste argumento deve-se passar uma função JavaScript.
    </li>
</ul>
<?php 
    WindUiPhp::renderComponentHere("CodeBlock", (object)array(
    "language"=>"javascript",
    "codeToShow"=>
'//Inicio do código JavaScript
var variavel = function(){ console.log("Fragmento vai ser carregado."); }

//Sempre que um novo fragmento começar a ser carregado, a mensagem "Fragmento vai ser carregado." será exibida no console do Browser.
WindUiJs.setFunctionToBeRunnedOnBeforeLoadANewFragment(variavel);
'
), false);
?>


<!-- setFunctionToBeRunnedAfterLoadANewFragment(customFunction) -->
<?php 
    WindUiPhp::renderComponentHere("JsMethodName", (object)array(
        "methodname"=>"setFunctionToBeRunnedAfterLoadANewFragment(customFunction)"
    ), false);
?>
<<<<<<< HEAD
<<<<<<< HEAD
Com este método você pode registrar uma função para ser executada sempre DEPOIS que um novo fragmento tiver seu carregamento concluído. 
 A intenção aqui, é que você só utilize este método, no código JavaScript do seu Client.php, ou no "app-javascript.php" do seu app. Continue
 lendo para entender.
=======
Com este método você pode registrar uma função para ser executada sempre DEPOIS que um novo fragmento tiver seu carregamento concluído.
>>>>>>> 4311b5564d08e846da9da9d6e1f506ad76ade9f5
=======
Com este método você pode registrar uma função para ser executada sempre DEPOIS que um novo fragmento tiver seu carregamento concluído.
>>>>>>> 4311b5564d08e846da9da9d6e1f506ad76ade9f5
<ul>
    <li>
        <b>customFunction (JS Function)</b> - Neste argumento deve-se passar uma função JavaScript.
    </li>
</ul>
<?php 
    WindUiPhp::renderComponentHere("CodeBlock", (object)array(
    "language"=>"javascript",
    "codeToShow"=>
'//Inicio do código JavaScript
var variavel = function(){ console.log("Fragmento foi carregado."); }

//Sempre que um novo fragmento terminar de ser carregado, a mensagem "Fragmento foi carregado." será exibida no console do Browser.
WindUiJs.setFunctionToBeRunnedAfterLoadANewFragment(variavel);
'
), false);
?>

<<<<<<< HEAD
<<<<<<< HEAD
<!-- setAnOtherFunctionToBeRunnedOnBeforeLoadANewFragment(customFunction) -->
<?php 
    WindUiPhp::renderComponentHere("JsMethodName", (object)array(
        "methodname"=>"setAnOtherFunctionToBeRunnedOnBeforeLoadANewFragment(customFunction)"
    ), false);
?>
Com este método você pode registrar uma função para ser executada sempre ANTES que um novo fragmento seja carregado. A intenção aqui, é que
 você só utilize este método, no código JavaScript dos seus Fragmentos. O motivo disso, é manter uma organização melhor das suas funções. O
 método <b>setFunctionToBeRunnedOnBeforeLoadANewFragment</b> foi criado com a intenção de ser usado somente no Client.php ou no "app-javascript.php"
 do seu app. O motivo é que se você chamar o <b>setFunctionToBeRunnedOnBeforeLoadANewFragment</b> no Client.php, você estará registrando uma função.
 Se chamar o <b>setFunctionToBeRunnedOnBeforeLoadANewFragment</b> novamente, mas em um de seus Fragmentos, você estará substituindo a função anteriormente
 gravada para ser executada, com uma nova função. Por isso o <b>setAnOtherFunctionToBeRunnedOnBeforeLoadANewFragment</b> foi criado, com o intuíto 
 de manter a organização de suas funções. Após o Wind UI executar a função que você cadastrar aqui, automaticamente ela será esquecida e para seja executada
 uma nova função, você precisará cadastrar uma outra novamente.
<ul>
    <li>
        <b>customFunction (JS Function)</b> - Neste argumento deve-se passar uma função JavaScript.
    </li>
</ul>
<?php 
    WindUiPhp::renderComponentHere("CodeBlock", (object)array(
    "language"=>"javascript",
    "codeToShow"=>
'//Inicio do código JavaScript
var variavel = function(){ console.log("Fragmento vai ser carregado."); }

//Sempre que um novo fragmento começar a ser carregado, a mensagem "Fragmento vai ser carregado." será exibida no console do Browser.
WindUiJs.setAnOtherFunctionToBeRunnedOnBeforeLoadANewFragment(variavel);
'
), false);
?>


<!-- setAnOtherFunctionToBeRunnedAfterLoadANewFragment(customFunction) -->
<?php 
    WindUiPhp::renderComponentHere("JsMethodName", (object)array(
        "methodname"=>"setAnOtherFunctionToBeRunnedAfterLoadANewFragment(customFunction)"
    ), false);
?>
Com este método você pode registrar uma função para ser executada sempre DEPOIS que um novo fragmento tiver seu carregamento concluído. 
 A intenção aqui, é que
 você só utilize este método, no código JavaScript dos seus Fragmentos. O motivo disso, é manter uma organização melhor das suas funções. O
 método <b>setFunctionToBeRunnedAfterLoadANewFragment</b> foi criado com a intenção de ser usado somente no Client.php ou no "app-javascript.php"
 do seu app. O motivo é que se você chamar o <b>setFunctionToBeRunnedAfterLoadANewFragment</b> no Client.php, você estará registrando uma função.
 Se chamar o <b>setFunctionToBeRunnedAfterLoadANewFragment</b> novamente, mas em um de seus Fragmentos, você estará substituindo a função anteriormente
 gravada para ser executada, com uma nova função. Por isso o <b>setAnOtherFunctionToBeRunnedAfterLoadANewFragment</b> foi criado, com o intuíto 
 de manter a organização de suas funções.
 <br>
 Além disso, quando o Wind UI, carrega um novo fragmento, primeiramente ele carrega o código JavaScript daquele fragmento, para depois somente, carregar
 a DOM (ou código PHP e HTML) do documento. Sendo assim, se você precisa chamar métodos JavaScript logo após o fragmento carregar, é altamente recomendado
 que utilize este método, assim você pode registrar os métodos que devem ser chamados, dentro deste. É a maneira mais confiável de garantir que os métodos
 que você deseja, sejam chamados após o carregamento do fragmento. Após o Wind UI executar a função que você cadastrar aqui, automaticamente ela será esquecida e para seja executada
 uma nova função, você precisará cadastrar uma outra novamente.
<ul>
    <li>
        <b>customFunction (JS Function)</b> - Neste argumento deve-se passar uma função JavaScript.
    </li>
</ul>
<?php 
    WindUiPhp::renderComponentHere("CodeBlock", (object)array(
    "language"=>"javascript",
    "codeToShow"=>
'//Inicio do código JavaScript
var variavel = function(){ console.log("Fragmento foi carregado."); }

//Sempre que um novo fragmento terminar de ser carregado, a mensagem "Fragmento foi carregado." será exibida no console do Browser.
WindUiJs.setAnOtherFunctionToBeRunnedAfterLoadANewFragment(variavel);
'
), false);
?>

=======
>>>>>>> 4311b5564d08e846da9da9d6e1f506ad76ade9f5
=======
>>>>>>> 4311b5564d08e846da9da9d6e1f506ad76ade9f5

<!-- setFunctionToBeRunnedOnEach100Milliseconds(customFunction) -->
<?php 
    WindUiPhp::renderComponentHere("JsMethodName", (object)array(
        "methodname"=>"setFunctionToBeRunnedOnEach100Milliseconds(customFunction)"
    ), false);
?>
Com este método você pode registrar uma função para ser executada a cada 100ms (0.1 segundos). Isso pode ser útil para checagens e etc. Evite adicionar
 funções que sejam pesadas aqui, ou sua aplicação Wind UI pode ter problemas de desempenho e afetar seus usuários.
<ul>
    <li>
        <b>customFunction (JS Function)</b> - Neste argumento deve-se passar uma função JavaScript.
    </li>
</ul>
<?php 
    WindUiPhp::renderComponentHere("CodeBlock", (object)array(
    "language"=>"javascript",
    "codeToShow"=>
'//Inicio do código JavaScript
var variavel = function(){ console.log("100ms se passaram..."); }

//A cada 100ms, a mensagem "100ms se passaram..." será imprimida no console do Browser.
WindUiJs.setFunctionToBeRunnedOnEach100Milliseconds(variavel);
'
), false);
?>


<!-- loadNewFragment(fragmentName, postData) -->
<?php 
    WindUiPhp::renderComponentHere("JsMethodName", (object)array(
        "methodname"=>"loadNewFragment(fragmentName, postData)"
    ), false);
?>
Este é sem dúvidas um dos métodos mais importantes do Wind UI. É com ele que você carrega novos fragmentos no Client.php. Sempre que um usuário clica
 num botão ou link e o conteúdo da página deve se alterar, trocando o fragmento, você deve chamar este método. Ao chamar este método você precisa informar
 a URI para a pasta que armazena os seus arquivos de fragmento e então o Wind UI irá tratar de carregar o novo fragmento e exibi-lo no seu Client.php.
 Lembre-se a URI para o seu fragmento deve apontar para a pasta que contém os arquivos de seu fragmento (fragmento.js e fragmento.php).
<ul>
    <li>
        <b>fragmentName (String)</b> - A URI que aponta para a pasta que contém seus arquivos de fragmento. E que estejam dentro da pasta "fragments" do seu
        app Wind UI.
    </li>
    <li>
        <b>postData (FormData)</b> - Um objeto instancia da classe FormData (opcional) ao qual você pode enviar dados através do método POST para o fragmento
        que será carregado. Caso não queira enviar dados, basta colocar um "null" aqui.
    </li>
</ul>
<?php 
    WindUiPhp::renderComponentHere("CodeBlock", (object)array(
    "language"=>"javascript",
    "codeToShow"=>
'//Inicio do código JavaScript

//Carregando um novo fragmento, sem enviar dados POST.
WindUiJs.loadNewFragment("pasta/onde/esta/o/fragmento", null);

//Carregando um novo fragmento e enviando dados para ele através do POST.
var dados = new FormData();
dados.append("dado1", "valorDoDado");
WindUiJs.loadNewFragment("pasta/onde/esta/o/fragmento", dados);
'
), false);
?>


<!-- changeCurrentClientTitle(newTitle) -->
<?php 
    WindUiPhp::renderComponentHere("JsMethodName", (object)array(
        "methodname"=>"changeCurrentClientTitle(newTitle)"
    ), false);
?>
Este método altera o título atual da página Client.php no Browser do usuário. Este é o único <b>método recomendado</b> se você precisa alterar o título da página.
<ul>
    <li>
        <b>newTitle (String)</b> - Uma string contendo o novo título que você deseja.
    </li>
</ul>
<?php 
    WindUiPhp::renderComponentHere("CodeBlock", (object)array(
    "language"=>"javascript",
    "codeToShow"=>
'//Inicio do código JavaScript

//Altera o título da página para "Documento"
WindUiJs.changeCurrentClientTitle("Documento");
'
), false);
?>


<!-- getCurrentRequestedFragmentName() -->
<?php 
    WindUiPhp::renderComponentHere("JsMethodName", (object)array(
        "methodname"=>"getCurrentRequestedFragmentName()"
    ), false);
?>
Este método retorna uma string contendo a URI para o fragmento que atualmente estiver em exibição no Client.php.
<?php 
    WindUiPhp::renderComponentHere("CodeBlock", (object)array(
    "language"=>"javascript",
    "codeToShow"=>
'//Inicio do código JavaScript

//Exibirá "submenu-docs/frontend-api-core-method"
console.log(WindUiJs.getCurrentRequestedFragmentName());
'
), false);
?>


<!-- setFunctionToBeRunnedAccordingClientScreenWidth(customFunction) -->
<?php 
    WindUiPhp::renderComponentHere("JsMethodName", (object)array(
        "methodname"=>"setFunctionToBeRunnedAccordingClientScreenWidth(customFunction)"
    ), false);
?>
Com este método você pode uma função para ser executada e o Wind UI passará para sua função, a atual largura da tela do dispositivo. Assim você
 pode fazer modificações no seu app Wind UI de acordo com a largura atual da tela para adaptar-se melhor ao tamanho do dispositivo. Mesmo que a largura
 da tela seja dinâmica, não há problemas pois o Wind UI executará sua função a cada 100ms, e sempre que ela for executada, ela receberá a atual largura
 da tela do dispositivo. Lembre-se de evitar colocar instruções muito pesadas para serem executadas, pois como sua função será executada a cada 100ms,
 isso pode afetar o desempenho de seu app.
<ul>
    <li>
        <b>customFunction (JS Function)</b> - Neste argumento deve-se passar uma função JavaScript.
    </li>
</ul>
<?php 
    WindUiPhp::renderComponentHere("CodeBlock", (object)array(
    "language"=>"javascript",
    "codeToShow"=>
'//Inicio do código JavaScript
var variavel = function(roundedScreenWidth, realtimeScreenWidth){ 
    console.log("A largura atual da tela é: " + realtimeScreenWidth + ". A largura arredondada para um valor padrão mais próximo é: " + roundedScreenWidth); 
}

//A cada 100ms, a sua função será executada e receberá a largura atual real em "realtimeScreenWidth" e uma largura arredondada para o valor mais próximo em "roundedScreenWidth". Exemplo: Se a largura atual é 1117, o valor arredondado é de 1280.
WindUiJs.setFunctionToBeRunnedAccordingClientScreenWidth(variavel);
'
), false);
?>


<!-- getCurrentClientScreenWidth() -->
<?php 
    WindUiPhp::renderComponentHere("JsMethodName", (object)array(
        "methodname"=>"getCurrentClientScreenWidth()"
    ), false);
?>
Este método lhe retonará a atual largura real da tela, em pixels.
<?php 
    WindUiPhp::renderComponentHere("CodeBlock", (object)array(
    "language"=>"javascript",
    "codeToShow"=>
'//Inicio do código JavaScript

//Exibe no console, a largura atual da tela, em pixels.
console.log(WindUiJs.getCurrentClientScreenWidth());
'
), false);
?>

<!-- getResourcePath(resourceName) -->
<?php 
    WindUiPhp::renderComponentHere("JsMethodName", (object)array(
        "methodname"=>"getResourcePath(resourceName)"
    ), false);
?>
Este método é similar ao WindUiPhp::getResourcePath da API Backend PHP do Wind UI, porém, esta funciona no lado do Frontend com JavaScript. Com este
 método você obtem o caminho completo para qualquer recurso que esteja na pasta "resources" de seu app Wind UI. Rapidamente você pode referenciar qualquer
 recurso do seu app. Se você passar uma string de caminho vazio, o Wind UI retornará apenas o caminho para o diretório raiz da pasta "resources".
<ul>
    <li>
        <b>resourceName (String)</b> - Uma string que aponta para o recurso desejado, que esteja dentro da pasta "resources" do seu app Wind UI.
    </li>
</ul>
<?php 
    WindUiPhp::renderComponentHere("CodeBlock", (object)array(
    "language"=>"javascript",
    "codeToShow"=>
'//Inicio do código JavaScript

//Alterando a imagem que está sendo exibida dentro de uma tag <img>

//Buscando a img no DOM da página
var image = document.getElementById("imagem");

//Alterando seu SRC
image.src = WindUiJs.getResourcePath("imagem.png");

//A imagem foi substituida para "imagem.png"
'
), false);
?>

<!-- End of fragment modifiable area -->
<?php
    //End of fragment renderization.
    WindUiFragmentRenderer::finishFragment();
?>