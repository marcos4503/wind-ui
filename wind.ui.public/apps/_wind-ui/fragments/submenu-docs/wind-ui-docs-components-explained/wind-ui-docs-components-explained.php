<?php
    //Import core files and start fragment renderization.
    include_once("../../../../../.core/base/fragment/wind-ui-fragment-prepare.php");
    WindUiFragmentRenderer::startFragment(__DIR__);
?>
<!-- Start of fragment content modifiable and visible to user area -->


<center>
    <h1>Explicando o Funcionamento dos Componentes</h1>
</center>

Como você deve ter visto aqui <a onclick="WindUiJs.loadNewFragment('submenu-docs/wind-ui-docs-how-works', null);">aqui</a>, um componente é um código HTML, CSS e JavaScript
 reaproveitável, ao qual você pode renderizar dentro de um fragmento, quantas vezes você precisar, enquanto informa difentes valores para as variavies do componente, renderizando
 o mesmo código, só que com vários conteúdos diferentes. Os componentes são armazenados dentro da pasta "components" do seu app.

<br>
<br>

<?php
    WindUiPhp::renderComponentHere("AdaptativeImage", (object)array(
        "src"=>WindUiPhp::getResourcePath("images/component-descritive-example.png")
    ), false);
?>

<br>
<br>

Um componente é uma pasta, mas a pasta só é considerada um componente se estiver dentro da pasta "components" do seu app, e se tiver os seguintes arquivos dentro dela...

<ul>
    <li><b>Component.xml</b> - Armazena o código HTML do componente, variáveis que podem ser preenchidas ao renderizarmos esse componente, bem como os valores padrões que serão setados nas variaveis não
     preenchidos durante a renderização do componente.</li>
    <li><b>Component.css</b> - Armazena todo o código CSS do componente. O CSS aqui, pode formatar elementos do seu componente, Client.php, fragmentos e etc. Por isso é bom nomear suas classes de CSS, com o
     nome do seu componente.</li>
    <li><b>Component.js</b> - Armazena todo o código JavaScript do seu componente. O código JavaScript do seu componente pode ser acessado externamente por outros componentes, fragmentos, Client.php e etc. Por
     isso é interessante inserir todo o código JavaScript do seu componente, dentro de uma classe estática. Também, se você quer que o código HTML do seu componente chame métodos JavaScript daqui, prefira inserir
     eventos no código HTML de seu componente. Você sempre pode observar o código dos componentes do Wind UI, para ter uma noção.</li>
    <li><b>Component.md</b> - Este é um arquivo de texto ao qual você pode usar para criar a documentação do seu componente, inserir infromações como métodos do JavaScript do seu componente, variaveis usadas, descrição
     de funcionamento do componente e etc. Isso é importante caso você precise consultar isso no futuro. É recomendado que você use o formato MD, pois o Wind UI pode ler os documentos MD de todos os componentes de todos
     os apps.</li>
</ul>

Note também que esses arquivos devem ter o mesmo nome da pasta ao qual eles estão dentro! Veja um exemplo de um "Component.xml".

<br>
<br>

Agora vamos supor, que criamos um componente (pasta) chamado "HelloWorld". A única função desse componente, é só mostrar a frase "Hello World Name" onde nos decidamos renderiza-lo. Além disso, quando passarmos o mouse em cima dessa
 frase, ela deve ficar em vermelho. A palavra "Name" deverá ser substituida por um nome que quisermos, quando renderizamos o componente no local desejado. Então vamos lá!

<h3>Código CSS do componente</h3>

Veja abaixo um código CSS do componente. No código CSS, definimos a cor do texto do componente como preto.
 <br>
HelloWorld.css

<?php 
    WindUiPhp::renderComponentHere("CodeBlock", (object)array(
    "language"=>"css",
    "codeToShow"=>
'.componentHelloWorldRootDiv{
    color: black;
    font-size: 22px;
    font-weight: bolder;
}
'
), false);
?>

<h3>Código XML do componente</h3>

No arquivo XML do componente, nos definimos o código HTML do nosso componente, bem como as variaveis que ele conterá.
<br>
HelloWorld.xml

<?php 
    WindUiPhp::renderComponentHere("CodeBlock", (object)array(
    "language"=>"css",
    "codeToShow"=>
'<?xml version="1.0" ?>
<component>
    <json type="text/json" app="wind.ui">
        {
        }
    </json>

    <htmll type="text/html" app="wind.ui">

        <!-- O código HTML do nosso componente vai aqui dentro desse nó. -->
        <div class="componentHelloWorldRootDiv" onmouseover="HelloWorld.changeColorOnMouseOver(this);">
            Hello World Name!
        </div>

    </htmll>
</component>
'
), false);
?>

<h3>Código JS do componente</h3>

No arquivo JS do componente nos criamos uma função que será chamada logo que o mouse estiver em cima da frase, alterando a cor daquela DIV para vermelho.
<br>
HelloWorld.js

<?php 
    WindUiPhp::renderComponentHere("CodeBlock", (object)array(
    "language"=>"css",
    "codeToShow"=>
'class HelloWorld{
    static changeColorOnMouseOver(element){
        //Repare que a DIV do nosso componente, tem o evento "onmouseover" registrado, que chama este método logo que o mouse estiver em cima dela, e ao chamar este método, a div também fornece uma referência a ela, através da variável "element"
        element.style.color = "red";
    }
}
'
), false);
?>

<h3>Renderizando o componente num local desejado do Fragmento</h3>

Para renderizar um componente nós usamos uma API PHP do Wind UI, podemos renderizar um componente onde bem entendermos, basta chamar o método PHP no local desejado e o componente que você deseja, será renderizado ali dentro, no local extado que você chamar o método.
 Aqui está o método...
<?php 
    WindUiPhp::renderComponentHere("CodeBlock", (object)array(
    "language"=>"php",
    "codeToShow"=>
'//Note que "HelloWorld" é o nome do nosso componente, o nome da pasta que contém os arquivos MD, JS, CSS e XML do nosso componente.
WindUiPhp::renderComponentHere("HelloWorld", (object)array(), false);
'
), false);
?>

<h3>Vendo o resultado até agora...</h3>

Ok, tomei a liberade de criar de verdade esse componente que falamos agora, e aqui está o resultado! Tente passar o mouse em cima dele, e veja o que acontece! Note que aqui estou renderizando esse componente no local abaixo, usando a API PHP do Wind UI.

<br>
<br>

<?php WindUiPhp::renderComponentHere("HelloWorld", (object)array(), false); ?>

<br>
<br>

Agora vou renderiza-lo mais duas vezes usando a API PHP do Wind UI! Sem essa de ficar copiando e colando código HTML por aqui e ali!

<br>
<br>

<?php WindUiPhp::renderComponentHere("HelloWorld", (object)array(), false); ?>
<?php WindUiPhp::renderComponentHere("HelloWorld", (object)array(), false); ?>

<br>
<br>

O código que usei para renderizar esses componentes 3 vezes foi este...

<?php 
    WindUiPhp::renderComponentHere("CodeBlock", (object)array(
    "language"=>"php",
    "codeToShow"=>
'WindUiPhp::renderComponentHere("HelloWorld", (object)array(), false);
WindUiPhp::renderComponentHere("HelloWorld", (object)array(), false);
WindUiPhp::renderComponentHere("HelloWorld", (object)array(), false);
'
), false);
?>
É... Só isso..

<h3>Renderizando esse mesmo componente com conteúdos diferentes</h3>

Como você deve ter reparado, o componente só exibe "Hello World Name!". O que faremos é adicionar uma variável no lugar de "Name", e assim sempre que formos renderizar esse componente, poderemos passar um valor diferente para essa variável
 exibindo "Hello World" com diferentes nomes.

<br>
<br>

Primeiro vamos modificar o código XML do nosso componente, assim...
<?php 
    WindUiPhp::renderComponentHere("CodeBlock", (object)array(
    "language"=>"css",
    "codeToShow"=>
'<?xml version="1.0" ?>
<component>
    <json type="text/json" app="wind.ui">
        <!-- Todas as variaveis declaradas, precisam estar nessa lista JSON. Caso você não informe um valor a variavel "name" ao renderizar o componente, por exemplo, o seu valor padrão será usado, que é "Name". Aqui você tem o poder de definir valores padrões para as variaveis do seu código HTML. -->
        {
            "name":"Name"
        }
    </json>

    <htmll type="text/html" app="wind.ui">

        <!-- O código HTML do nosso componente vai aqui dentro desse nó. -->
        <div class="componentHelloWorldRootDiv" onmouseover="HelloWorld.changeColorOnMouseOver(this);">
            <!-- no código HTML, as variaveis precisam ter 2 underlines do lado direito e esquerdo do nome da variavel. Assim o Wind UI saberá que se trata de uma variavel. Quando você for renderizar esse componente, e você passar um valor para a variavel "name", o valor será colocado no lugar de "__name__". Se você não passar nenhum valor, o valor padrão da variavel, definido no JSON acima, será usado. -->
            Hello World __name__!
        </div>

    </htmll>
</component>
'
), false);
?>
Isso é tudo.

<h3>Vamos ver o resultado final disso</h3>

Primeiro, vamos renderizar o componente que criamos, sem passar nenhum valor para a variavel "name", com o código abaixo...
<?php 
    WindUiPhp::renderComponentHere("CodeBlock", (object)array(
    "language"=>"php",
    "codeToShow"=>
'WindUiPhp::renderComponentHere("HelloWorld", (object)array(), false);
'
), false);
?>
E o resultado será esse...

<br>
<br>

<?php WindUiPhp::renderComponentHere("HelloWorld", (object)array(), false); ?>

<br>
<br>

Como o valor padrão da variavel "name" é "Name" e não passamos nenhum nome, então o valor padrão foi usado. Agora vamos renderizar o mesmo componente, só que passando 3 nomes para a variavel "name" durante a renderização, com o seguinte codigo...
<?php 
    WindUiPhp::renderComponentHere("CodeBlock", (object)array(
    "language"=>"php",
    "codeToShow"=>
'WindUiPhp::renderComponentHere("HelloWorld", (object)array(
    "name"=>"Rachel",
), false);

WindUiPhp::renderComponentHere("HelloWorld", (object)array(
    "name"=>"Michael",
), false);

WindUiPhp::renderComponentHere("HelloWorld", (object)array(
    "name"=>"Marcos",
), false);
'
), false);
?>
E o resultado será esse...

<br>
<br>

<?php
WindUiPhp::renderComponentHere("HelloWorld", (object)array(
    "name"=>"Rachel",
), false);

WindUiPhp::renderComponentHere("HelloWorld", (object)array(
    "name"=>"Michael",
), false);

WindUiPhp::renderComponentHere("HelloWorld", (object)array(
    "name"=>"Marcos",
), false);
?>

<br>
<br>

O limite para os componentes, é sua imaginação!

<h3>Puxando um recurso de imagem ou outro tipo de arquivo, que esteja na pasta "resources"</h3>

Algumas vezes, precisamos definir uma imagem padrão para algum lugar do nosso componente, caso ao renderiza-lo, não seja informado o caminho para nenhuma imagem. As variaveis presentes no JSON do XML do seu componente
 possuem o poder de se referenciarem a alguma imagem ou outro recurso que esteja na pasta "resources" do seu app. Para isso, você só precisa usar a variavel global "(__WindUiPhp::getResourcePath__)". Veja um exemplo de uso abaixo.
<?php 
    WindUiPhp::renderComponentHere("CodeBlock", (object)array(
    "language"=>"css",
    "codeToShow"=>
'<?xml version="1.0" ?>
<component>
    <json type="text/json" app="wind.ui">
        {
            "src":"(__WindUiPhp::getResourcePath__)/pasta/imagem.png"
        }
    </json>

    <htmll type="text/html" app="wind.ui">

        <img src="__src__" style="width: 100%;" />

    </htmll>
</component>
'
), false);
?>
Isso é tudo. Nós acessamos a "imagem.png" que esta dentro da pasta "pasta" que por sua vez está dentro da pasta "resources" do app. A variavel "(__WindUiPhp::getResourcePath__)" faz uma referência direta a pasta raiz de "resources". Então
 caso ao renderizar esse componente de exemplo, não seja informado nenhum valor para a variável "src", a "imagem.png" será colocada como padrão.

<br>
<br>

Isso é o básico que você precisa saber para criar e trabalhar com componentes no Wind UI! Aproveite!

<!-- End of fragment modifiable content and visible area -->
<?php
    //End of fragment renderization.
    WindUiFragmentRenderer::finishFragment();
?>