<?php
    //Import core files and start fragment renderization.
    include_once("../../../../../.core/base/fragment/wind-ui-fragment-prepare.php");
    WindUiFragmentRenderer::startFragment(__DIR__);
?>
<!-- Start of fragment content modifiable and visible to user area -->

<center>
    <h1>API PHP Backend: Validadores de Entradas POST/GET/FILES de Clients</h1>
</center>

O Wind UI funciona com bibliotecas Backend e Frontend com várias ferramentas e recursos para que você crie seu aplicativo. Uma dessas
 ferramentas é a API Backend PHP do Wind UI. Com a API Backend em PHP, você tem métodos rápidos para efetuar ações que desenvolvedores
 Web geralmente precisam muito.

<br>
<br>

Aqui você encontra todos os métodos Backend PHP do Wind UI, porém, estes métodos são somente métodos utilizáveis para validar dados
 enviados por clients através dos métodos POST e GET. Em toda aplicação que recebe dados de Clients "usuários como apps, sites e etc"
 que consomem uma API, é altamente recomendado que as APIs validem os dados que o usuário envia, no lado do servidor também, com o
 PHP por exemplo. Digamos que, sua aplicação espera receber um Nome, mas ao invés de enviar um nome, o usuário malicioso (ou não, ou um
 client hackeado) enviou foi um número com vários caracteres especiais. Por isso que sempre, antes de processar os dados recebidos
 por clients, você deve validar as informações para verificar se realmente se parecem com um nome. Mesmo que você valide a informação
 no Client (através de restrições com HTML ou JavaScript) por exemplo, o usuário ainda pode manipular o código fonte da página no
 navegador e alterar essas validações. Então, no fim das contas, a validação no lado do Client (navegador por exemplo) só serve
 para agilizar tudo e o usuário não precisar aguardar validação do servidor a cada alteração que ele fizer (além de reduzir o consumo
 de sua API e servidor). Então, quando o client diz enviar um Nome, você deve usar métodos para verificar se aquilo realmente se parece
 um nome, ou seja, verificar se tem letras, se não tem números e etc. Embora o PHP nativo possua vários métodos de validação como o
 super útil <b>mysqli_real_escape_string()</b>, pode ser muito chato ter que validar vários campos, ou até mesmo repetitivo. Por isso o Wind UI
 tem alguns métodos para que você valide dados recebidos de Clients em suas APIs Http-Ajax.

<br>
<br>

Por favor, note que todos os métodos listados aqui são utilizáveis, e todos os códigos encontrados aqui são para referência, para que
 você saiba como utiliza-los e possa entender como eles funcionam e ter um código de exemplo para cada um.

<br>
<br>

<!-- isValidContentOfClientInput($type, $parameters, $content) -->
<?php 
    WindUiPhp::renderComponentHere("PhpMethodName", (object)array(
        "methodname"=>'isValidContentOfClientInput($type, $parameters, $content)'
    ), false);
?>
Este método analisa o conteúdo de uma variável (pode ser int, float, string e etc) e retorna true, caso o conteúdo seja válido de acordo
 com os parâmetros que você definir. Por exemplo, ao chamar este método você precisa fornecer o tipo de entrada que ele deve possuir, se
 a entrada esperada é uma string, int, float ou date. Em seguida deve passar os parâmetros que aquele campo deve atender e por fim, o valor
 que deseja validar. É altamente recomendável que além de você utilizar este validador, também faça uso do <b>mysqli_real_escape_string()</b>
 do PHP nativo, para evitar ataques de injeção SQL em suas APIs. O <b>mysqli_real_escape_string()</b> tem a tarefa de colocar uma barra
 invertida em todas as aspas que a string passada tiver, evitando assim que aspas enviadas por usuários sejam processadas pelo PHP ou
 seu Banco de Dados.
<ul>
    <li>
        <b>$type (String)</b> - O tipo de conteúdo que é esperado que o usuário tenha inserido nesta variável. Pode ser string, int, float,
        bool ou date.
    </li>
    <li>
        <b>$parameters (stdClass)</b> - Os parâmetros que o conteúdo deve atender para que seja válido, por exemplo, pode conter caracteres 
        especiais? pode estar vazio? e etc.
    </li>
    <li>
        <b>$content (variavel POST ou GET)</b> - Uma variável que receberá o conteúdo enviado pelo usuário Client, deve ser uma variável
        POST ou GET.
    </li>
</ul>
<?php 
    WindUiPhp::renderComponentHere("CodeBlock", (object)array(
    "language"=>"php",
    "codeToShow"=>
'//Validando uma String

/*
 * Nesse caso, esperamos que a variável $_POST["nome"] receba uma STRING que não contenha números nem caracteres especiais.
 * Sendo assim, usaremos o seguinte código para valida-la.
*/

$nome = $_POST["nome"];
$nomeValido = WindUiPhp::isValidContentOfClientInput("string", (object)array(
                "minchars"=>1,
                "maxchars"=>30,
                "validationtype"=>"text",
                "allowespecialchars"=>false,
                "specialcharsallowed"=>"\',ç",
                "allownumbers"=>false,
                "allowempty"=>false        
            ), $nome)

//Com base acima, sabemos que o conteúdo da variável "nome" não será válido se...
//- contiver menos de 1 caracter
//- contiver mais de 30 caracteres
//- se for uma url, e-mail e etc
//- se contiver caracteres especiais (os unicos caracteres especiais permitidos são \' e ç)
//- se contiver números
//- se for vazio
//Exemplos
//- "Marcos Tomaz" (o método retornará true)
//- "Marcos-Tomaz" (o método retornará false)
//- "Marcos_Tomaz" (o método retornará false)
//- "Marcos343Tomaz" (o método retornará false)
//- "Marcos@Tomaz" (o método retornará false)

//Caso o nome seja um valor válido, continua a execução do script normalmente...
if($nomeValido == true){
    //código...
}

//Você não precisa fornecer todos estes parâmetros para validar suas variáveis, apenas precisa fornecer os parâmetos que você precisa.
//Veja uma lista com todos os parâmetros para validar strings e seus valores padrões.
//validationtype - Verifica se o conteúdo é algo, por exemplo, verifica se o conteúdo é uma URL, E-MAIL e etc. (valor padrão: "text") (Pode ser "text","url","email" ou "ip")
//minchars - Verifica a quantidade minima de caracteres necessários para que seja válido. (valor padrão: 0)
//maxchars - Verifica a quantidade máxima de caracteres necessários para que seja válido. (valor padrão: 0 (ilimitado))
//allowespecialchars - Caso seja false, a string não será válida caso tenha caracteres especiais. (valor padrão: true)
<<<<<<< HEAD
<<<<<<< HEAD
//specialcharsallowed - Caso "allowespecialchars" seja false, você pode definir aqui, os caracteres especiais que podem ser aceitos, então mesmo que a string contenha estes caracteres especiais, ela ainda será válida. (valor padrão: "") (Pode ser "!,@,#" ou "@") Utilize "comma" caso queira permitir virgulas no conteúdo. Exemplo: "@,comma,!,#"
=======
//specialcharsallowed - Caso "allowespecialchars" seja false, você pode definir aqui, os caracteres especiais que podem ser aceitos, então mesmo que a string contenha estes caracteres especiais, ela ainda será válida. (valor padrão: "") (Pode ser "!,@,#" ou "@")
>>>>>>> 4311b5564d08e846da9da9d6e1f506ad76ade9f5
=======
//specialcharsallowed - Caso "allowespecialchars" seja false, você pode definir aqui, os caracteres especiais que podem ser aceitos, então mesmo que a string contenha estes caracteres especiais, ela ainda será válida. (valor padrão: "") (Pode ser "!,@,#" ou "@")
>>>>>>> 4311b5564d08e846da9da9d6e1f506ad76ade9f5
//allownumbers - Caso seja false, a string não será válida se contiver números. (valor padrão: true)
//allowuppercase - Caso seja false, a string não será válida se contiver letras maiúsculas. (valor padrão: true)
//allowlowercase - Caso seja false, a string não será válida se contiver letras minúsculas. (valor padrão: true)
//allowempty - Caso seja false, a string não será válida se estiver vazia. (valor padrão: true)
//Note que: Caso você não forneça um parâmetro acima ao chamar o método isValidContentOfClientInput(), o valor padrão do parâmetro não informado, será utilizado.
//Em adição: Se você for validar uma string e escolher o "validationtype" como "text" e não passar mais nenhum parâmetro de validação, serão considerados válidos quaisquer entradas do usuário. Cabe a você decidir quais parâmetros deseja ou não passar.
'
), false);
?>
<?php 
    WindUiPhp::renderComponentHere("CodeBlock", (object)array(
    "language"=>"php",
    "codeToShow"=>
'//Validando um Int

/*
 * Nesse caso, esperamos que a variável $_POST["idade"] receba uma INT que não contenha letras nem caracteres especiais
 * Sendo assim, usaremos o seguinte código para valida-la.
*/

$idade = $_POST["idade"];
$idadeValida = WindUiPhp::isValidContentOfClientInput("int", (object)array(
                "allowzero"=>false,
                "allownegative"=>false,
                "minvalue"=>13,
                "allowempty"=>false        
            ), $idade)

//Com base acima, sabemos que o conteúdo da variável "idade" não será válido se...
//- for igual a 0
//- for menor que 0 (negativo)
//- se for um valor inferior a 13
//- se for vazio
//Exemplos
//- "23" (o método retornará true)
//- "0" (o método retornará false)
//- "" (o método retornará false)
//- "23a" (o método retornará false)
//- "23@" (o método retornará false)

//Caso a idade seja um valor válido, continua a execução do script normalmente...
if($idadeValida == true){
    //código...
}

//Você não precisa fornecer todos estes parâmetros para validar suas variáveis, apenas precisa fornecer os parâmetos que você precisa.
//Veja uma lista com todos os parâmetros para validar ints e seus valores padrões.
//minchars - Verifica a quantidade minima de caracteres necessários para que seja válido. (valor padrão: 0)
//maxchars - Verifica a quantidade máxima de caracteres necessários para que seja válido. (valor padrão: 0 (ilimitado))
//minvalue - Caso o valor inteiro seja menor do que o valor que você definir, a variável não será válida. (valor padrão: 0)
//maxvalue - Caso o valor inteiro seja maior do que o valor que você definir, a variável não será válida. (valor padrão: 0)
//allowzero - Caso seja false, o valor só será válido se for diferente de zero. (valor padrão: true)
//allownegative - Caso seja false, o valor só será válido se for maior do que zero. (valor padrão: true)
//allowempty - Caso seja false, o int não será válida se estiver vazia. (valor padrão: true)
//Note que: Caso você não forneça um parâmetro acima ao chamar o método isValidContentOfClientInput(), o valor padrão do parâmetro não informado, será utilizado.
//Em adição: Como você espera receber e irá validar um valor INT, se o client enviar um valor que contenha letras, ou que não seja um número, ou que seja um número FLOAT, automaticamente não será considerado válido pelo isValidContentOfClientInput(), mesmo que você não passe nenhum parâmetro.
'
), false);
?>
<?php 
    WindUiPhp::renderComponentHere("CodeBlock", (object)array(
    "language"=>"php",
    "codeToShow"=>
'//Validando um Float

/*
 * Nesse caso, esperamos que a variável $_POST["altura"] receba uma FLOAT que não contenha letras nem caracteres especiais
 * Sendo assim, usaremos o seguinte código para valida-la.
*/

$altura = $_POST["altura"];
$alturaValida = WindUiPhp::isValidContentOfClientInput("float", (object)array(
                "allowzero"=>false,
                "allownegative"=>false,
                "allowempty"=>false       
            ), $altura)

//Com base acima, sabemos que o conteúdo da variável "altura" não será válido se...
//- for igual a 0
//- for menor que 0 (negativo)
//- se for vazio
//Exemplos
//- "1.75" (o método retornará true)
//- "0" (o método retornará false)
//- "" (o método retornará false)
//- "1.54a" (o método retornará false)
//- "1.83@" (o método retornará false)

//Caso a altura seja um valor válido, continua a execução do script normalmente...
if($alturaValida == true){
    //código...
}

//Você não precisa fornecer todos estes parâmetros para validar suas variáveis, apenas precisa fornecer os parâmetos que você precisa.
//Veja uma lista com todos os parâmetros para validar float e seus valores padrões.
//minchars - Verifica a quantidade minima de caracteres necessários para que seja válido. (valor padrão: 0)
//maxchars - Verifica a quantidade máxima de caracteres necessários para que seja válido. (valor padrão: 0 (ilimitado))
//minvalue - Caso o valor inteiro seja menor do que o valor que você definir, a variável não será válida. (valor padrão: 0)
//maxvalue - Caso o valor inteiro seja maior do que o valor que você definir, a variável não será válida. (valor padrão: 0)
//allowzero - Caso seja false, o valor só será válido se for diferente de zero. (valor padrão: true)
//allownegative - Caso seja false, o valor só será válido se for maior do que zero. (valor padrão: true)
//allowempty - Caso seja false, o int não será válida se estiver vazia. (valor padrão: true)
//Note que: Caso você não forneça um parâmetro acima ao chamar o método isValidContentOfClientInput(), o valor padrão do parâmetro não informado, será utilizado.
//Em adição: Como você espera receber e irá validar um valor FLOAT, se o client enviar um valor que contenha letras, ou que não seja um número, automaticamente não será considerado válido pelo isValidContentOfClientInput(), mesmo que você não passe nenhum parâmetro.
'
), false);
?>
<?php 
    WindUiPhp::renderComponentHere("CodeBlock", (object)array(
    "language"=>"php",
    "codeToShow"=>
'//Validando um Bool

/*
 * Nesse caso, esperamos que a variável $_POST["concordaTermos"] receba uma BOOL
 * Sendo assim, usaremos o seguinte código para valida-la.
*/

$concordaTermos = $_POST["concordaTermos"];
$boolValida = WindUiPhp::isValidContentOfClientInput("bool", (object)array(), $concordaTermos);

//Exemplos
//- "true" (o método retornará true)
//- "0" (o método retornará true)
//- "" (o método retornará false)
//- "fdfeer" (o método retornará false)
//- "1.83@" (o método retornará false)
//- "3@" (o método retornará false)
//- "32.2@" (o método retornará false)

//Caso seja um valor válido, continua a execução do script normalmente...
if($boolValida == true){
    //código...
}

//A validação de booleanos não possui parâmetros.
//Em adição: Como você espera receber e irá validar um valor BOOL, se o client enviar um valor que contenha letras,numeros, ou que não seja um booleano, automaticamente não será considerado válido pelo isValidContentOfClientInput().
//Os únicos valores que podem ser considerados booleanos são "true", "false", "1" ou "0".
'
), false);
?>
<?php 
    WindUiPhp::renderComponentHere("CodeBlock", (object)array(
    "language"=>"php",
    "codeToShow"=>
'//Validando um Date

/*
 * Nesse caso, esperamos que a variável $_POST["nascimento"] receba uma DATE e que esteja formatada de acordo com o padrão ISO-8601
 * A ISO-8601 especifica uma formatação universal para representações de data/hora ou data e hora. Veja abaixo..
 * Para data
 * YYYY-MM-DD
 * Para hora
 * HH:MM
 * Para data e hora
 * YYYY-MM-DDTHH:MM (onde T é o separador que mostra onde começa a hora)
 * Sendo assim, usaremos o seguinte código para valida-la.
*/

$nascimento = $_POST["nascimento"];
$nascimentoValido = WindUiPhp::isValidContentOfClientInput("date", (object)array(
                "type"=>"date",
                "allowempty"=>false        
            ), $nascimento)

//Com base acima, sabemos que o conteúdo da variável "nascimento" não será válido se...
//- for diferente do formato YYYY-MM-DD
//- se for vazio
//Exemplos
//- "1999-05-03" (o método retornará true)
//- "1999/05/03" (o método retornará false)
//- "" (o método retornará false)
//- "dsfsf3434523" (o método retornará false)
//- "19990503" (o método retornará false)
//- "fdfdfds" (o método retornará false)
//- "18:50" (o método retornará false)
//- "1999-05-03T18:50" (o método retornará false)

//Caso a nascimento seja um valor válido, continua a execução do script normalmente...
if($nascimentoValido == true){
    //código...
}

//Você não precisa fornecer todos estes parâmetros para validar suas variáveis, apenas precisa fornecer os parâmetos que você precisa.
//Veja uma lista com todos os parâmetros para validar dates e seus valores padrões.
//type - O formato de data que você espera que seja o conteúdo. Você pode escolher entre... "date" (irá esperar uma data no formato YYYY-MM-DD, "time" (irá esperar uma data no formato HH:MM 24hrs ou 12hrs), ou "datetime-local" (irá esérar uma data no formato YYYY-MM-DDTHH:MM). Caso o valor não bata com o formato de seu desejo, a variável não será considerada válida. (valor padrão: "")
//allowempty - Caso seja false, o date não será válida se estiver vazia. (valor padrão: true)
//Note que: Caso você não forneça um parâmetro acima ao chamar o método isValidContentOfClientInput(), o valor padrão do parâmetro não informado, será utilizado.
//Em adição: Como você espera receber e irá validar um valor DATE, se o client enviar um valor que contenha letras, ou que não seja uma data, automaticamente não será considerado válido pelo isValidContentOfClientInput(), mesmo que você não passe nenhum parâmetro.
'
), false);
?>

<!-- receiveFileUploadedFromClientIfIsValid($fileReceptorVarName, $destinationDir, $destinationNameOfFile, $maxSizeInMebiBytes, $allowedExtensions) -->
<?php 
    WindUiPhp::renderComponentHere("PhpMethodName", (object)array(
        "methodname"=>'receiveFileUploadedFromClientIfIsValid($fileReceptorVarName, $destinationDir, $destinationNameOfFile, $maxSizeInMebiBytes, $allowedExtensions)'
    ), false);
?>
Este método recebe um arquivo enviado por um Client, o valida e caso seja válido de acordo com suas preferências, coloca o arquivo no diretório escolhido, com o nome
 que você desejar. Caso o arquivo enviado pelo Client seja válido, este método irá coloca-lo no diretório que você preferir e ainda irá retornar uma string contendo
 o caminho completo até o arquivo recebido. Caso o arquivo enviado não seja válido, o arquivo não será colocado em nenhum lugar e lhe será retornada uma string vazia.
<ul>
    <li>
        <b>$fileReceptorVarName (String)</b> - Nome da variável POST que receberá o arquivo enviado pelo client. Note que, você não precisa declarar um $_FILES["arquivo"]
        em seu script PHP, você só precisa informar aqui, o nome "arquivo" ao invés de declarar a variável $_FILES, pois o Wind UI cuidará da declaração e gerenciamento
        da variável para você. Apenas informe o nome do parâmetro POST ao qual os Clients enviarão arquivos.
    </li>
    <li>
        <b>$destinationDir (String)</b> - Diretório alvo para o qual o arquivo será colocado após o envio ser recebido e validado de acordo com os parâmetros que você definir.
    </li>
    <li>
        <b>$destinationNameOfFile (String)</b> - Nome (com extensão) do arquivo. Quando o recebimento tiver sido concluído e validado, o arquivo será colocado no diretório
        alvo, com o nome que você definir aqui.
    </li>
    <li>
        <b>$maxSizeInMebiBytes (Int)</b> - Tamanho máximo em (MebiBytes) que o arquivo pode ter. Caso queira permitir envios com qualquer tamanho, apenas passe o parêmtro 0
        aqui.
    </li>
    <li>
        <b>$allowedExtensions (String)</b> - Extensões permitidas para os arquivos enviados pelo Client. Separe as extensões com virgulas, por exemplo "mp4,exe,txt". Caso queira
        permitir quaisquer extensões, apenas informe uma string vazia aqui.
    </li>
</ul>
<?php 
    WindUiPhp::renderComponentHere("CodeBlock", (object)array(
    "language"=>"php",
    "codeToShow"=>
'//Inicio do código PHP
//O client enviará arquivos atráves do parâmetro "arquivo" atráves do método POST...

//Recebe o arquivo enviado pelo Client, no parâmetro "arquivo", coleta o resultado retornado pelo método
$caminhoParArquivoRecebido = WindUiPhp::receiveFileUploadedFromClientIfIsValid("arquivo", "folder/uploads", "file.txt", 10, "txt,rtf,doc,docx,md");

//Imprime o diretório do arquivo recebido
echo($caminhoParArquivoRecebido);
'
), false);
?>

<!-- End of fragment modifiable area -->
<?php
    //End of fragment renderization.
    WindUiFragmentRenderer::finishFragment();
?>