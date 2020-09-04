<?php
    //Import core files and start fragment renderization.
    include_once("../../../../../.core/base/fragment/wind-ui-fragment-prepare.php");
    WindUiFragmentRenderer::startFragment(__DIR__);
?>
<!-- Start of fragment content modifiable and visible to user area -->


<center>
    <h1>Criando, Consumindo e Efetuando Requisições Ajax Em Seu App</h1>
</center>

Como sabemos, as requisições Ajax são uma parte importante dos apps Web dinâmicos. São essas requisições que permitem um site atualizar somente algumas
 áreas da Interface, com novos dados obtidos da Web, sem necessidade de atualizar toda a página. Com o Wind UI, seus apps tem suporte padrão para isso e até
 mesmo mais facilitado. Veja agora, como criar uma requisição Ajax dentro do seu app.

<br>
<br>

Você pode usar o CPanel do Wind UI modo de adminstrador, para criar uma API para seu app, de maneira rápida e fácil. Para isso, acesse o app Wind UI
 do seu Framework Wind UI em sua hospedagem, no modo administrador e clique em "Criar Nova API Consumível Para Um App". Então basta selecionar o app que receberá a nova API,
 preencher todas as informações e a API será criada no local onde você escolher!

<br>
<br>

No final da criação, a API será colocado dentro da pasta "ajax-http-apis", no diretório que você selecionou e no app que você selecionou. Então, é só ser feliz, começar a editar
 o código fonte da sua API e carrega-la ou consumi-la com os métodos Frontend do Wind UI!

<br>
<br>

Uma API Ajax, nada mais é do que um arquivo PHP que fica dentro do diretório "ajax-http-apis". Esse arquivo PHP tem acesso normal a API Backend do Wind UI, podendo usar todos os métodos normalmente.
 A sua API Ajax PHP pode ter o código PHP que você quiser, pode receber dados por POST, realizar operações num banco de dados por exemplo, e retornar respostas em forma de texto. Essas respostas podem
 ser apenas texto simples, código HTML, ou valores organizados em uma string JSON. O que você precisa ter ciência é que a sua API Ajax PHP só existe com o próposito de ser consumida, ela será acessada e ela deve retornar
 uma resposta para quem a acessa, durante o acesso, quem acessa pode também enviar valores para sua API, por POST por exemplo.

<br>
<br>

Ao criar seu app, ele virá com os diretórios "ajax-http-apis/returns-html" e "ajax-http-apis/returns-json". A recomendação aqui é que, para maior organização, se sua API retorna texto simples ou código HTML, coloque-a
 em "ajax-http-apis/returns-html" e se retorna um código JSON, deixe-a em "ajax-http-apis/returns-json".

<br>
<br>

<?php
    WindUiPhp::renderComponentHere("AdaptativeImage", (object)array(
        "src"=>WindUiPhp::getResourcePath("images/api-descritive-example.png")
    ), false);
?>

<br>
<br>

No exemplo acima, vemos uma hierarquia de arquivos do diretório "ajax-http-apis" de um app. Agora... Vamos ver o conteúdo da API "api-two.php", uma API que retorna um código JSON. A função dessa API é, receber 2 valores, soma-los
 e retornar o resultado dessa soma! Vamos ver...

<?php 
    WindUiPhp::renderComponentHere("CodeBlock", (object)array(
    "language"=>"php",
    "codeToShow"=>
'<?php
    //Import core files and start ajax-http-api request processing.
    include_once("../../../.core/base/http-api/wind-ui-ajax-http-api-prepare.php");
    WindUiAjaxHttpApi::startAjaxHttpApiRequestProcessing(__DIR__);
?>

//Inicio do código PHP da API
$valor1 = $_POST["valor1"];
$valor2 = $_POST["valor2"];

//Prepara a resposta JSON
$resposta = new stdClass;
$resposta->resultado = 0;

//Soma os valores
$resposta->resultado = $valor1 + $valor2;

//Converte o objeto stdClass em uma string Json e a retorna para quem acessou a API
echo(json_encode($resposta));
'
), false);
?>

E digamos que acessei essa API, enviando 2 dados, o "valor1" é igual a 4 e o "valor2" do POST é igual a 3. Isso é o que a API me retornou...

<?php 
    WindUiPhp::renderComponentHere("CodeBlock", (object)array(
    "language"=>"html",
    "codeToShow"=>
'{"resultado":7}
'
), false);
?>

Um código JSON que foi preparado e retornado pela API conforme você viu no código dela. Agora, vamos ver o código fonte da api "api-one.php".

<?php 
    WindUiPhp::renderComponentHere("CodeBlock", (object)array(
    "language"=>"php",
    "codeToShow"=>
'<?php
    //Import core files and start ajax-http-api request processing.
    include_once("../../../.core/base/http-api/wind-ui-ajax-http-api-prepare.php");
    WindUiAjaxHttpApi::startAjaxHttpApiRequestProcessing(__DIR__);
?>

//Consulta um banco de dados para obter uma lista de nomes...
//Finja que aqui temos um código de consulta obtendo uma lista de nomes...

<table>
    <th>
        <td>Nome</td>
        <td>Idade</td>
    </th>
    <tr>
        <td>echo($nome[$i]);</td>
        <td>echo($idade[$i])</td>
    </tr>
    //... o loop continua até imprimir todos os nomes obtidos do banco de dados...
</table>
'
), false);
?>

Então, essa API só retorna um texto, ou código HTML da lista de nomes, se preferir.

<h3>Acessando uma API e a consumindo</h3>

Ok, agora, como faço para que meu APP acesse uma API presente dentro do diretório "ajax-http-apis" do meu app, a consuma e obtenha o conteúdo retornado pela API? É simples! Usamos um método da API Frontend do Wind UI para isso. Repare novamente a
 hierarquai de APIs do app...

<br>
<br>

<?php
    WindUiPhp::renderComponentHere("AdaptativeImage", (object)array(
        "src"=>WindUiPhp::getResourcePath("images/api-descritive-example.png")
    ), false);
?>

<br>
<br>

Vamos acessar a API "api-two.php" e obter a resposta JSON dela. Para isso, usamos o seguinte código JavaScript...

<?php 
    WindUiPhp::renderComponentHere("CodeBlock", (object)array(
    "language"=>"javascript",
    "codeToShow"=>
'//Preparamos os valores que serão enviados
var form = new FormData();
    form.append("valor1", "21");
    form.append("valor2", "20");
WindUiJs.loadNewAjaxHttpRequestOnApi("returns-json/api-two", form, 
    function(isSuccess, responseText, responseJson){
        //Caso tenha dado tudo certo
        if(isSuccess == true){
            //Como sabemos que a API que estamos acessando aqui, retorna um código JSON, podemos ler a variável "responseJson" e extrair a variavel "resultado" do JSON retornado pela API...
            //A API retornou a resposta "{"resultado":41}"
            document.getElementById("mostraResultado").innerHTML = "O resultado é " + responseJson.resultado;
        }
        //Caso tenha dado algo errado
        if(isSuccess == false){
            console.log("Ocorreu um erro de rede.");
        }
    });
'
), false);
?>

E se fosse a API "api-one.php"? Simples!

<?php 
    WindUiPhp::renderComponentHere("CodeBlock", (object)array(
    "language"=>"javascript",
    "codeToShow"=>
'//Preparamos os valores que serão enviados
WindUiJs.loadNewAjaxHttpRequestOnApi("returns-html/api-one", null, 
    function(isSuccess, responseText, responseJson){
        //Caso tenha dado tudo certo
        if(isSuccess == true){
            //Simplesmente exibidos o código HTML exibido pela API, já que sabemos que se trata de um HTML, o código será corretamente formatado e exibido pelo navegador do usuário.
            document.getElementById("mostraResultado").innerHTML = responseText;
        }
        //Caso tenha dado algo errado
        if(isSuccess == false){
            console.log("Ocorreu um erro de rede.");
        }
    });
'
), false);
?>

Veja bem, na API JavaScript do Wind UI, nos precisamos informar o caminho até o arquivo PHP da API que queremos acessar, só não precisamos informar a extensão .php nesse caminho. É assim que selecionamos
 qual API o código deve consumir. Para mais informações sobre a API de requisições Ajax JavaScript do Wind UI, clique <a onclick="WindUiJs.loadNewFragment('submenu-docs/frontend-api-ajax', null);">aqui</a>! É muito
 importante ler essas informações adicionais, pois você entenderá como funciona, quais são os parâmetros e como funciona os métodos de requisições Ajax do Wind UI. Você pode até mesmo usar um método de requisição
 ajax, para enviar arquivos!

<br>
<br>

Isso é o básico que você precisa sobre criação de APIs, consumo e requisições Ajax com o Wind UI.

<!-- End of fragment modifiable content and visible area -->
<?php
    //End of fragment renderization.
    WindUiFragmentRenderer::finishFragment();
?>