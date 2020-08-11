<?php
    //Import core files and start fragment renderization.
    include_once("../../../../../.core/base/fragment/wind-ui-fragment-prepare.php");
    WindUiFragmentRenderer::startFragment(__DIR__);
?>
<!-- Start of fragment content modifiable and visible to user area -->

<center>
    <h1>Criação, gerenciamento e destruição de Sessões e Cookies</h1>
</center>

Antes de entender como efetuar o gerenciamento, validação de sessões de usuários e gerenciamento de login dos usuários e etc, talvez você não
 saiba, mas precisa entender como funcionam os Cookies de navegador e Sessões do PHP. Se você já sabe como isso funciona, basta pular para a
 referência a API PHP de gerenciamento de Cookies e Sessões do PHP.

<h3>Para que usar Cookies e Sessões?</h3>

Cookies e Sessões são usadas para armazenar dados do usuário, temporariamente no servidor, para criar sistemas de login, preferências e etc. Um
 bom exemplo disso é um sistema de login. Quando o usuário faz login, você pode criar uma sessão, armazenar dados importantes de sua conta (como
 um sistema de cache), como por exemplo, armazenar o seu login, e-mail e ID. Então sempre que o usuário precisar acessar uma página protegida, que
 necessite login, esses dados serão usados, para que não seja necessário informar todos os dados do usuário a cada consulta.

<br>
<br>

<h3>O que são Sessões?</h3>

As Sessões PHP são como "Cofres" que ficam guardados no seu servidor. Cada um desses "Cofres" armazenam dados para um usuário e podem ser configurados
 para serem automaticamente destruidos depois de um tempo sem interação do usuário, ou depois de algum tempo. Esses "Cofres" na verdade são arquivos de texto
 criados pelo PHP, para armazenar dados do usuário. Estes arquivos, nos chamamos de Sessões. Na Sessão do usuário, podemos armazenar dados que serão
 persistentes, até que o usuário resolva sair e etc. Dentre esses dados, podemos armazenar IDs, Senha do usuário, Login, Preferências do usuário e etc. Assim
 podemos salvar esses dados na sessão, e então resgatar estes dados mais tarde. Uma boa utilidade das Sessões é a de proteger certas páginas do site,
 sendo possível acessar determinada página somente se o usuário tiver uma Sessão atualmente em vigor. Caso o usuário não tenha a Sessão em vigor, ele
 será redirecionado para uma página de login (onde fará o login e se tiver tudo certo, terá sua Sessão criada) e caso o usuário já tenha uma Sessão,
 continuará navegar normalmente. Assim, a página que só pode ser acessada caso o usuário tenha um Sessão, poderá resgatar os dados que estão na Sessão
 do usuário e exibi-los, ou utiliza-los em consultas MySQL por exemplo, sem necessidade do usuário precisar ficar fazendo login.

<h3>O que são Cookies?</h3>

Se as Sessões são como "Cofres" como dito anteriormente, os Cookies são como "Chaves" que permitem acesso total a esses "Cofres". Quando o site cria uma
 Sessão, automaticamente o site pede que o Browser crie um "Cookie" no computador do usuário. Este Cookie por sua vez, contém uma ID que referencia-se a
 Sessão que está no servidor e este Cookie ficará guardado no computador do usuário até que o usuário o apague, feche o navegador ou após um período
 de tempo (de acordo com a configuração). Acontece que, enquanto o usuário tiver um Cookie em sua máquina, sempre que o Browser for fazer qualquer solicitação
 ao seu servidor, automaticamente ele enviará o Cookie (Chave) para acessar a Sessão (Cofre) daquele usuário. Por isso, se o usuário excluir seus Cookies
 enquanto estiver logado e com uma Sessão ativa no servidor, ele ficará deslogado, e será necessário refazer o login, e então o servidor criará outra Sessão
 e fornecerá outro Cookie para aquele usuário. Por isso, Cookies e Sessões são uma das maneiras mais recomendadas de criar sessões persistentes de login
 e armazenar dados sensíveis do usuário, como senhas, e-mail, login e etc. Como as Sessões ficam no servidor, não há perigo que qualquer pessoa possa
 alterar o conteúdo das Sessões, como os Cookies ficam no Browser do usuário, qualquer um pode modificar o conteúdo dos Cookies. Ao usar um Cookie
 para apenas armazenar um ID que se referencia a uma Sessão, não há a possibilidade que alguém possa alterar a Sessão ou ler dados sensíveis do Cookie.

<h3>Cuidados adicionais com Cookies e Sessões</h3>

É lei. Nunca confie nas coisas que o usuário envia para suas APIs/Servidor. Por mais que a maioria dos usuários não tenham más intenções, podem haver
 pessoas que enviam dados com segundas intenções, por isso, é bom efetuar validação dos dados enviados por formulários as suas APIs e etc, e além disso, por mais
 que a "Chave" que se referencia a uma Sessão do seu servidor, seja armazenada num Cookie, um outro usuário pode editar seu Cookie alterando o conteúdo para
 simular uma chave de outro usuário. Sendo assim, é bom validar se o Cookie enviado pelo usuário, pertence realmente a ele. Uma maneira de fazer isso é: Ao criar
 a sessão do usuário e da-lo o Cookie, é bom armazenar o seu IP dentro da sessão, então todas as vezes que ele enviar um Cookie, verifique se o IP da sessão
 bate com o IP que o usuário está acessando atualmente. Caso seja diferente, a chance de que seja outra pessoa falsificando a chave, é grande. Isso elimina
 99,9% dos problemas de segurança que sobraram ao usar Cookies + Sessões.

<h3>O Wind UI e sua API de criação e gerenciamento de Cookies e Sessões</h3>

Sabendo da necessidade de uso de Sessões e armazenamento de dados dos usuários, o Wind UI oferece uma API completa para trabalhar com sessões em seu App. Agilizando
 o processo de validação e criação de Sessões. Com a API do Wind UI, você pode proteger suas páginas PHP para serem acessadas somente por usuários que tenham
 uma sessão válida ativa. Como por exemplo, veja abaixo...

<!-- isCurrentSessionOfReceivedCookiesValid($stopPhpIfInvalid, $destroySessionIfInvalid, $printMessageIfIsInvalid, $printMessageIfIsValid) -->
<?php 
    WindUiPhp::renderComponentHere("PhpMethodName", (object)array(
        "classname"=>'WindUiAppSessions',
        "methodname"=>'isCurrentSessionOfReceivedCookiesValid($stopPhpIfInvalid, $destroySessionIfInvalid, $printMessageIfIsInvalid, $printMessageIfIsValid)'
    ), false);
?>
<?php 
    WindUiPhp::renderComponentHere("CodeBlock", (object)array(
    "language"=>"php",
    "codeToShow"=>
'//Recebe o cookie do usuário, verifica a sessão e verifica se esta é valida. Somente se a sessão for válida é que o script continuará a ser executada.
$sessaoValida = WindUiAppSessions::isCurrentSessionOfReceivedCookiesValid(true, true, false, false);

//o resto do script....
'
), false);
?>

Como pode ver, o método <b>isCurrentSessionOfReceivedCookiesValid()</b> só permitirá que o resto do código PHP seja executado se a Sessão conectada ao Cookie
 do usuário, for válida.

<!-- End of fragment modifiable area -->
<?php
    //End of fragment renderization.
    WindUiFragmentRenderer::finishFragment();
?>