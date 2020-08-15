<?php
    //Import core files and start fragment renderization.
    include_once("../../../../../.core/base/fragment/wind-ui-fragment-prepare.php");
    WindUiFragmentRenderer::startFragment(__DIR__);
?>
<!-- Start of fragment content modifiable and visible to user area -->

<center>
    <h1>API JavaScript Frontend: Requisições via HTTP/HTTPS Com Ajax</h1>
</center>

O Wind UI funciona com bibliotecas Backend e Frontend com várias ferramentas e recursos para que você crie seu aplicativo. Uma dessas
 ferramentas é a API Frontend JavaScript do Wind UI. Com a API Frontend em JavaScript, você tem métodos rápidos para efetuar ações que
 desenvolvedores Web geralmente precisam muito.

<br>
<br>

Aqui você encontra todos os métodos Backend PHP do Wind UI, porém, estes métodos são somente métodos para serem utilizados em requisições
 HTTP ou HTTPS com Ajax.

<br>
<br>

Por favor, note que todos os métodos listados aqui são utilizáveis, e todos os códigos encontrados aqui são para referência, para que
 você saiba como utiliza-los e possa entender como eles funcionam e ter um código de exemplo para cada um.

<br>
<br>

<!-- loadNewAjaxHttpRequestOnApi(ajaxHttpApiName, postData, onDone) -->
<?php 
    WindUiPhp::renderComponentHere("JsMethodName", (object)array(
        "methodname"=>"loadNewAjaxHttpRequestOnApi(ajaxHttpApiName, postData, onDone)"
    ), false);
?>
Este método acessa um arquivo PHP que esteja dentro da pasta "ajax-http-apis" de seu app Wind UI, o executa e em seguida lhe informa se essa requisição
 foi um sucesso, se ocorreu um erro, e se foi um sucesso, retorna também a resposta em texto do arquivo PHP. Seu arquivo pode retornar uma resposta em
<<<<<<< HEAD
<<<<<<< HEAD
 texto ou JSON.
=======
 texto, JSON ou XML.
>>>>>>> 4311b5564d08e846da9da9d6e1f506ad76ade9f5
=======
 texto, JSON ou XML.
>>>>>>> 4311b5564d08e846da9da9d6e1f506ad76ade9f5
<ul>
    <li>
        <b>ajaxHttpApiName (String)</b> - Uma URI que aponte para algum arquivo PHP que esteja dentro da sua pasta "ajax-http-apis" do seu app Wind UI.
        Você não precisa incluir a extensão ".php" nesta URI. Apenas inclua o diretório até o arquivo e o nome do arquivo PHP, sem a extensão ".php".
    </li>
    <li>
        <b>postData (FormData)</b> - Uma instancia de um objeto FormData que contenha os dados que você queira passar por POST. Caso não queira passar
        nenhum dado, apenas deixe em "null".
    </li>
    <li>
        <b>onDone (JS Function)</b> - Uma função que será executada assim que a requisição acabar, esta função você quem escreve e ela receberá variáveis
        que a informarão se a requisição foi bem sucedida, junto da resposta do arquivo PHP. Se não quiser registrar nenhuma função, apenas deixe em "null".
    </li>
</ul>
<?php 
    WindUiPhp::renderComponentHere("CodeBlock", (object)array(
    "language"=>"javascript",
    "codeToShow"=>
'//Faz uma requisição ao arquivo "dadosDoUsuario.php", informando o ID do usuário no banco de dados. Este arquivo PHP irá consultar o banco de dados e puxar os dados do usuário atráves da ID informada pelo método POST (Este arquivo está dentro da pasta "ajax-http-apis")
var form = new FormData();
    form.append("id", "23");
WindUiJs.loadNewAjaxHttpRequestOnApi("dadosDoUsuario", form, 
<<<<<<< HEAD
<<<<<<< HEAD
    function(isSuccess, responseText, responseJson){
        //Ao concluir a requisição, o código aqui dentro será executado
        //isSucess - retorna um valor booleano que indica se a requisição foi bem sucedida ou não
        //responseText - retorna a resposta que o arquivo PHP deu, em texto puro
        //responseJson - retorna a resposta que o arquivo PHP deu, convertido para JSON (se for possivel converter a resposta para um objeto JSON)
        //Note que caso isSuccess seja false, responseText e responseJson serão null.
        //Note também que: Se não for possível converter a resposta para Json, "responseJson" será null.
=======
=======
>>>>>>> 4311b5564d08e846da9da9d6e1f506ad76ade9f5
    function(isSuccess, responseText, responseXml, responseJson){
        //Ao concluir a requisição, o código aqui dentro será executado
        //isSucess - retorna um valor booleano que indica se a requisição foi bem sucedida ou não
        //responseText - retorna a resposta que o arquivo PHP deu, em texto puro
        //responseXml - retorna a resposta que o arquivo PHP deu, convertido para XML (se for possivel converter a resposta para XML)
        //responseJson - retorna a resposta que o arquivo PHP deu, convertido para JSON (se for possivel converter a resposta para JSON)
        //Note que caso isSuccess seja false, responseText, responseXml e responseJson serão null.
        //Note também que: Se não for possível converter a resposta para Json, respons
<<<<<<< HEAD
>>>>>>> 4311b5564d08e846da9da9d6e1f506ad76ade9f5
=======
>>>>>>> 4311b5564d08e846da9da9d6e1f506ad76ade9f5

        //Caso tenha dado tudo certo
        if(isSuccess == true){
            //Como o "dadosDoUsuario.php" retorna os dados do usuário formatados em JSON, apenas pegamos a resposta já convertida em JSON e lemos a variável "nome"!
            //Esta foi a resposta em texto do "dadosDoUsuario.php": \'{"nome":"Eduardo Santos", "idade":"25"}\'. Sendo assim, como o Wind UI viu que a resposta retornada é um JSON, ele foi automaticamente convertido e a versão convertida para JSON foi colocada em "responseJson"
            console.log("Tudo ocorreu bem, o nome do usuário é: " + responseJson.nome);
        }
        //Caso tenha dado algo errado
        if(isSuccess == false){
            console.log("Ocorreu um erro de rede.");
        }
    });

//Executando uma requisição sem se importar com o que é retornado
WindUiJs.loadNewAjaxHttpRequestOnApi("incrementarContadorDeVisitas", null, null);
'
), false);
?>


<!-- uploadNewFileOnAjaxHttpRequestInApi(ajaxHttpApiName, postData, ajaxHttpApiFileReceptorVarName, inputFileElement, inputFileElementFileToUploadIndex, onStartLoad, onProgressUpdate, onDoneLoad, onError, onAbort, onDoneGetResponse) -->
<?php 
    WindUiPhp::renderComponentHere("JsMethodName", (object)array(
        "methodname"=>"uploadNewFileOnAjaxHttpRequestInApi(ajaxHttpApiName, postData, ajaxHttpApiFileReceptorVarName, inputFileElement, inputFileElementFileToUploadIndex, onStartLoad, onProgressUpdate, onDoneLoad, onError, onAbort, onDoneGetResponse)"
    ), false);
?>
Este método acessa um arquivo PHP que esteja dentro da pasta "ajax-http-apis" de seu app Wind UI, envia um arquivo para ele, o executa e em seguida lhe informa
 se essa requisição foi um sucesso, se ocorreu um erro, e se foi um sucesso, retorna também a resposta em texto do arquivo PHP. Seu arquivo pode retornar uma resposta em
<<<<<<< HEAD
<<<<<<< HEAD
 texto ou JSON. Apesar dessa função ser muito longa, ela fornece vários manipuladores para que você registre eventos para serem executados quando o envio
=======
 texto, JSON ou XML. Apesar dessa função ser muito longa, ela fornece vários manipuladores para que você registre eventos para serem executados quando o envio
>>>>>>> 4311b5564d08e846da9da9d6e1f506ad76ade9f5
=======
 texto, JSON ou XML. Apesar dessa função ser muito longa, ela fornece vários manipuladores para que você registre eventos para serem executados quando o envio
>>>>>>> 4311b5564d08e846da9da9d6e1f506ad76ade9f5
 começar, terminar e até mesmo função para ser executada sempre que o envio sofrer um progresso, para que você exiba por exemplo, uma barra de progresso. Além disso, esse
 método retorna um objeto "windUiJsAjaxUploadOperation" para que você possa usa-lo no próximo método e cancelar um envio em andamento.
<ul>
    <li>
        <b>ajaxHttpApiName (String)</b> - Uma URI que aponte para algum arquivo PHP que esteja dentro da sua pasta "ajax-http-apis" do seu app Wind UI.
        Você não precisa incluir a extensão ".php" nesta URI. Apenas inclua o diretório até o arquivo e o nome do arquivo PHP, sem a extensão ".php".
    </li>
    <li>
        <b>postData (FormData)</b> - Uma instancia de um objeto FormData que contenha os dados que você queira passar por POST. Caso não queira passar
        nenhum dado, apenas deixe em "null".
    </li>
    <li>
        <b>ajaxHttpApiFileReceptorVarName (String)</b> - O nome da variável PHP ($_FILES) que receberá o arquivo enviado. Se no seu arquivo PHP você tem uma variável
        "$_FILES('arquivo')", então forneça para "ajaxHttpApiFileReceptorVarName" o valor "arquivo".
    </li>
    <li>
        <b>inputFileElement (Element)</b> - O elemento que referencia uma tag &ltinput type="file"&gt.
    </li>
    <li>
        <b>inputFileElementFileToUploadIndex (Int)</b> - O ID do arquivo que está dentro da lista de arquivos selecionados na tag &ltinput type="file"&gt e que será enviado.
    </li>
    <li>
        <b>onStartLoad (JS Function)</b> - Uma função JavaScript que será executada assim que o envio começar. Você pode registrar aqui, coisas que serão feitas na interface por
        exemplo, para indicar o começo do envio.
    </li>
    <li>
        <b>onProgressUpdate (JS Function)</b> - Uma função JavaScript que será executada sempre que o progresso do envio aumentar. Essa função retornará uma variável float
        que indica o progresso.
    </li>
    <li>
        <b>onDoneLoad (JS Function)</b> - Uma função JavaScript que será executada quando o envio tiver sido concluído.
    </li>
    <li>
        <b>onError (JS Function)</b> - Uma função JavaScript que será executada caso ocorra um erro de rede.
    </li>
    <li>
        <b>onAbort (JS Function)</b> - Uma função JavaScript que será executada caso o envio seja cancelado por outro método.
    </li>
    <li>
        <b>onDoneGetResponse (JS Function)</b> - Uma função JavaScript que será executada assim que o envio tiver sido concluído, além disso, essa função retornará variaveis indicando
        se tudo ocorreu bem, e também a resposta em texto, XML ou JSON do arquivo PHP. (O funcionamento desta função é bem similar ao evento "onDone" do método anterior a este.).
    </li>
</ul>
<?php 
    WindUiPhp::renderComponentHere("CodeBlock", (object)array(
    "language"=>"javascript",
    "codeToShow"=>
'//Busca o <input type="file" id="avatarUpoad">, onde o usuário já selecionou 1 imagem que será enviada
//Como o usuário selecionou apenas 1 arquivo de imagem, o ID do arquivo que será enviado vai ser 0.
var uploadInput = document.getElementById("avatarUpload");

//Envia uma imagem para o arquivo "receberAvatar.php" que está dentro da pasta "http-ajax-apis". Este por sua vez, contem uma variável $_FILES[\'avatar\'];
var form = new FormData();
    form.append("idDoUsuario", "23");
var windUiJsAjaxUploadOperation = WindUiJs.uploadNewFileOnAjaxHttpRequestInApi("receberAvatar", form, "avatar", uploadInput, 0,
    function(){
        //Ao iniciar upload
        console.log("Upload iniciado.");
    },
    function(value){
        //Ao atualizar progresso
        //value - armazena o progresso atual do upload. O valor pode variar de 0.0 até 1.0, sendo que 0.0 sigifica 0% e 1.0 significa 100%.
        console.log("Progresso: " + (value * 100.0).toString() + "%");
    },
    function(){
        //Ao concluir upload
        console.log("Concluído.");
    },
    function(){
        //Ao ocorrer um erro de rede
        console.log("Ocorreu um erro de rede.");
    },
    function(){
        //Ao upload ser abortado
        console.log("O upload foi abortado.");
    },
<<<<<<< HEAD
<<<<<<< HEAD
    function(isSuccess, responseText, responsJson){
        //Ao obter a resposta do arquivo PHP
        //Note que caso isSuccess seja false, responseText e responseJson serão null.
=======
    function(isSuccess, responseText, responseXml, responsJson){
        //Ao obter a resposta do arquivo PHP
        //Note que caso isSuccess seja false, responseText, responseXml e responseJson serão null.
>>>>>>> 4311b5564d08e846da9da9d6e1f506ad76ade9f5
=======
    function(isSuccess, responseText, responseXml, responsJson){
        //Ao obter a resposta do arquivo PHP
        //Note que caso isSuccess seja false, responseText, responseXml e responseJson serão null.
>>>>>>> 4311b5564d08e846da9da9d6e1f506ad76ade9f5
        //Note também que: Se não for possível converter a resposta para Json, responseJson será null.

        //Caso ocorra tudo bem e seja retornada uma resposta do PHP
        if(isSuccess == true){
            console.log("Ocorreu tudo bem. Resposta: " + responseText);
        }
        //Caso ocorra algo de errado e não se tenha uma resposta do PHP
        if(isSuccess == false){
            console.log("Ocorreu algum erro. Não foi obtida resposta do PHP.");
        }
    });

//Executando um envio, sem se preocupar com progresso ou resposta
WindUiJs.uploadNewFileOnAjaxHttpRequestInApi("receberAvatar", null, "avatar", uploadInput, 0, null, null, null, null, null, null);
'
), false);
?>


<!-- abortUploadOfNewFileOnAjaxHttpRequestInApi(windUiJsAjaxUploadOperation) -->
<?php 
    WindUiPhp::renderComponentHere("JsMethodName", (object)array(
        "methodname"=>"abortUploadOfNewFileOnAjaxHttpRequestInApi(windUiJsAjaxUploadOperation)"
    ), false);
?>
Este método simplesmente cancela um upload que esteja em progresso, pelo "uploadNewFileOnAjaxHttpRequestInApi".
<ul>
    <li>
        <b>windUiJsAjaxUploadOperation (XMLHttpRequest)</b> - Um objeto retornado pelo método "uploadNewFileOnAjaxHttpRequestInApi" ao iniciar o upload.
    </li>
</ul>
<?php 
    WindUiPhp::renderComponentHere("CodeBlock", (object)array(
    "language"=>"javascript",
    "codeToShow"=>
'//Cancela o upload do método anterior (acima)
WindUiJs.abortUploadOfNewFileOnAjaxHttpRequestInApi(windUiJsAjaxUploadOperation);
'
), false);
?>


<!-- changeStateOfButtonToLoadingAjaxHttpRequest(buttonElement) -->
<?php 
    WindUiPhp::renderComponentHere("JsMethodName", (object)array(
        "methodname"=>"changeStateOfButtonToLoadingAjaxHttpRequest(buttonElement)"
    ), false);
?>
Este método elimina o conteúdo de um botão alvo (mantendo sua formatação de tamanho e cor), e em seguida, insere um GIF spinner de carregamento neste botão,
 e também o bloqueia para que o usuário não possa mais clicar nele, eliminando assima necessidade de que você tenha que mexer no CSS do botão. Isso é útil
 para mostrar ao usuário que uma requisição está em andamento. Quando este método termina de mexer no botão ele retorna um objeto "originalStateJson" que pode
 ser usado pelo próximo método para restaurar o estado do botão para o original, antes de chamar este método.
<ul>
    <li>
        <b>buttonElement (Element)</b> - Um objeto do tipo Input Button.
    </li>
</ul>
<?php 
    WindUiPhp::renderComponentHere("CodeBlock", (object)array(
    "language"=>"javascript",
    "codeToShow"=>
'//Primeiramente procuramos o botão (vamos assumir que temos um <input type="button" id="botao">)
var botao = document.getElementById("botao");

//Agora alteramos o estado dele para carregamento e armazenamos o estado original na variavel "estadoOriginal" para o restaurarmos mais tarde.
var estadoOriginal = WindUiJs.changeStateOfButtonToLoadingAjaxHttpRequest(botao);
'
), false);
?>


<!-- restoreOriginalStateOfButtonNow(buttonElement, originalState) -->
<?php 
    WindUiPhp::renderComponentHere("JsMethodName", (object)array(
        "methodname"=>"restoreOriginalStateOfButtonNow(buttonElement, originalState)"
    ), false);
?>
Este método restaura o botão para seu estado original, antes do método anterior modifica-lo.
<ul>
    <li>
        <b>buttonElement (Element)</b> - Um objeto do tipo Input Button.
    </li>
</ul>
<ul>
    <li>
        <b>originalState (String)</b> - Um objeto do tipo "originalState" contendo os dados do estado original do botão.
    </li>
</ul>
<?php 
    WindUiPhp::renderComponentHere("CodeBlock", (object)array(
    "language"=>"javascript",
    "codeToShow"=>
'//Primeiramente procuramos o botão (vamos assumir que temos um <input type="button" id="botao">)
var botao = document.getElementById("botao");

//Agora restauraremos o estado dele para o original
WindUiJs.restoreOriginalStateOfButtonNow(botao, estadoOriginal);
'
), false);
?>


<!-- enableBlockOnLoadNewFragmentWhileAjaxHttpRequestIsRunning(onTryToLoadNewFragmentWhileExistsAjaxHttpRequestsRunning) -->
<?php 
    WindUiPhp::renderComponentHere("JsMethodName", (object)array(
        "methodname"=>"enableBlockOnLoadNewFragmentWhileAjaxHttpRequestIsRunning(onTryToLoadNewFragmentWhileExistsAjaxHttpRequestsRunning)"
    ), false);
?>
Este método irá proibir que um novo fragmento seja carregado, enquanto houverem requisições ajax em progresso (ou seja, que ainda não foram concluídas). Isso
 é especialmente útil quando no fragmento atual, estão sendo executadas requisições, aos quais você quer fazer o seu usário aguardar até suas conclusões, o
 possibilitando de navegar por outros fragmentos, somente após o fim dessas requisições.
<ul>
    <li>
        <b>onTryToLoadNewFragmentWhileExistsAjaxHttpRequestsRunning (JavaScript Function)</b> - Uma função que será chamada sempre que o carregamento de um
        novo fragmento for bloqueado. Você pode usar esta função para notificar o usuário, para que ele precise aguardar, por exemplo.
    </li>
</ul>
<?php 
    WindUiPhp::renderComponentHere("CodeBlock", (object)array(
    "language"=>"javascript",
    "codeToShow"=>
'//Bloqueia o carregamento de novos fragmentos
WindUiJs.enableBlockOnLoadNewFragmentWhileAjaxHttpRequestIsRunning(function(){
    console.log("Por favor, aguarde as requisições concluirem.");
});
'
), false);
?>


<!-- disableBlockOnLoadNewFragmentWhileAjaxHttpRequestIsRunning() -->
<?php 
    WindUiPhp::renderComponentHere("JsMethodName", (object)array(
        "methodname"=>"disableBlockOnLoadNewFragmentWhileAjaxHttpRequestIsRunning()"
    ), false);
?>
Este método irá permitir novamente que novos fragmento sejam carregados.
<?php 
    WindUiPhp::renderComponentHere("CodeBlock", (object)array(
    "language"=>"javascript",
    "codeToShow"=>
'//Desbloqueia o carregamento de novos fragmentos
WindUiJs.disableBlockOnLoadNewFragmentWhileAjaxHttpRequestIsRunning();
'
), false);
?>


<!-- isBlockOnLoadNewFragmentWhileAjaxHttpRequestIsRunningEnabled() -->
<?php 
    WindUiPhp::renderComponentHere("JsMethodName", (object)array(
        "methodname"=>"isBlockOnLoadNewFragmentWhileAjaxHttpRequestIsRunningEnabled()"
    ), false);
?>
Este método retorna true se atualmente o carregamento de novos fragmentos estiver bloqueado.
<?php 
    WindUiPhp::renderComponentHere("CodeBlock", (object)array(
    "language"=>"javascript",
    "codeToShow"=>
'//Atualmente os carregamentos de novos fragmentos estão bloqueados?
console.log(WindUiJs.isBlockOnLoadNewFragmentWhileAjaxHttpRequestIsRunningEnabled());
'
), false);
?>


<!-- getCountOfAjaxHttpRequestsRunningNow() -->
<?php 
    WindUiPhp::renderComponentHere("JsMethodName", (object)array(
        "methodname"=>"getCountOfAjaxHttpRequestsRunningNow()"
    ), false);
?>
Este método retorna um inteiro com a contagem total de requisições Http Ajax que estão sendo executadas atualmente pelo framework Wind UI.
<?php 
    WindUiPhp::renderComponentHere("CodeBlock", (object)array(
    "language"=>"javascript",
    "codeToShow"=>
'//Exibe a quantidade de requisições em andamento
console.log(WindUiJs.getCountOfAjaxHttpRequestsRunningNow());
'
), false);
?>


<!-- isNetworkAvailableOnBrowserNow() -->
<?php 
    WindUiPhp::renderComponentHere("JsMethodName", (object)array(
        "methodname"=>"isNetworkAvailableOnBrowserNow()"
    ), false);
?>
Este método retorna true se a conexão a internet do dispositivo está disponível agora. Este método é útil para checar se a conexão a Internet do usuário
 está funcionando, de maneira rápida.
<?php 
    WindUiPhp::renderComponentHere("CodeBlock", (object)array(
    "language"=>"javascript",
    "codeToShow"=>
'//A conexão a Internet do usuário, esta funcionando?
console.log(WindUiJs.isNetworkAvailableOnBrowserNow());
'
), false);
?>

<!-- End of fragment modifiable area -->
<?php
    //End of fragment renderization.
    WindUiFragmentRenderer::finishFragment();
?>