<?php
    //Import core files and start fragment renderization.
    include_once("../../../../../.core/base/fragment/wind-ui-fragment-prepare.php");
    WindUiFragmentRenderer::startFragment(__DIR__);
?>
<!-- Start of fragment content modifiable and visible to user area -->

<center>
    <h1>API PHP Backend: Métodos Essenciais</h1>
</center>

O Wind UI funciona com bibliotecas Backend e Frontend com várias ferramentas e recursos para que você crie seu aplicativo. Uma dessas
 ferramentas é a API Backend PHP do Wind UI. Com a API Backend em PHP, você tem métodos rápidos para efetuar ações que desenvolvedores
 Web geralmente precisam muito.

<br>
<br>

Aqui você encontra todos os métodos Backend PHP do Wind UI, porém, estes métodos são somente os métodos essenciais para se desenvolver
 aplicações Wind UI e serão bastante utilizados por você.

<br>
<br>

Por favor, note que todos os métodos listados aqui são utilizáveis, e todos os códigos encontrados aqui são para referência, para que
 você saiba como utiliza-los e possa entender como eles funcionam e ter um código de exemplo para cada um.

<br>
<br>


<!-- getResourcePath($resPath) -->
<?php 
    WindUiPhp::renderComponentHere("PhpMethodName", (object)array(
        "methodname"=>'getResourcePath($resPath)'
    ), false);
?>
Este método retorna o diretório completo para qualquer arquivo que esteja na pasta <b>resources</b> do seu app Wind UI. Funciona assim,
 ao chamar este método você só precisa passar para ele o nome do arquivo que está dentro da sua pasta <b>resources</b>, como por exemplo
 "imagem.png". Se seu arquivo estiver dentro de uma pasta que está dentro da pasta <b>resources</b> do seu app, basta passar o argumento
 contendo a pasta, como por exemplo "pasta/imagem.png". Então o método retornará um caminho completo para o seu arquivo desejado, e como
 você pode chamar este método a partir do seu client.php, fragmento ou api-ajax, você pode ter um referenciamento rápido para qualquer
 um de seus recursos.
<ul>
    <li>
        <b>$resPath (String)</b> - Neste argumento deve-se passar o caminho para o recurso desejado, que está na sua pasta "resources". Se você
        passar uma string vazia para este método, ele retornará apenas o diretório raiz da pasta "resources".
    </li>
</ul>
<?php 
    WindUiPhp::renderComponentHere("CodeBlock", (object)array(
    "language"=>"php",
    "codeToShow"=>
'//Exibe uma imagem na página. Esta imagem está dentro da pasta resources.
<img src="<?php echo(WindUiPhp::getResourcePath("image.png")); ?>" />

//Obtem o conteúdo de um arquivo TXT que está dentro da pasta resources
$content = file_get_contents(WindUiPhp::getResourcePath("text/notes.txt"));
echo($content);
'
), false);
?>


<!-- getPathToFragmentPhpFileBasingOnGetFragmentParamInUrl($fragmentGetParamInUrl) -->
<?php 
    WindUiPhp::renderComponentHere("PhpMethodName", (object)array(
        "methodname"=>'getPathToFragmentPhpFileBasingOnGetFragmentParamInUrl($fragmentGetParamInUrl)'
    ), false);
?>
Este método retorna o diretório completo para um arquivo PHP de um de seus fragmnetos. Digamos que você tenha um arquivo PHP de fragmento
 na pasta "fragments" do seu app, no diretório "fragments/submenu/meu-fragmento/meu-fragmento.php". Basta chamar este método passando o
 parâmetro "fragments/submenu/meu-fragmeto" e o método retornará o caminho completo para o arquivo PHP de seu fragmento.
<ul>
    <li>
        <b>$fragmentGetParamInUrl (String)</b> - Neste argumento deve-se passar o caminho para a pasta que armazena os arquivos de seu fragmento, ou
        seja, é como se fosse o conteúdo do parâmetro "fragment" que fica na URL do seu app.
    </li>
</ul>
<?php 
    WindUiPhp::renderComponentHere("CodeBlock", (object)array(
    "language"=>"php",
    "codeToShow"=>
'//Retorna o caminho completo para o fragmento home do meu app
echo(WindUiPhp::getPathToFragmentPhpFileBasingOnGetFragmentParamInUrl("home"));

//Retorna o caminho completo para o fragmento que está dentro da pasta "mais" dos meus fragmentos
echo(WindUiPhp::getPathToFragmentPhpFileBasingOnGetFragmentParamInUrl("mais/meu-fragmento"));
'
), false);
?>


<!-- getValueOfSpecificOgMetaTagFromFragmentJsonManifest($fragmentGetParamInUrl) -->
<?php 
    WindUiPhp::renderComponentHere("PhpMethodName", (object)array(
        "methodname"=>'getValueOfSpecificOgMetaTagFromFragmentJsonManifest($fragmentGetParamInUrl, $desiredOgMetaTag)'
    ), false);
?>
Este método lê o manifesto JSON de algum dos seus fragmentos e retorna a variável OgMetaTag que você desejar. Digamos que você quer ler
 a variável "fragmentOgMetaTagTitle" do manifesto de algum de seus fragmentos. Basta chamar este método passando o caminho para a pasta
 de um dos seus fragmentos (similar ao método acima) e passar o nome da variável ao qual você quer ler.
<ul>
    <li>
        <b>$fragmentGetParamInUrl (String)</b> - Neste argumento deve-se passar o caminho para a pasta que armazena os arquivos de seu fragmento, ou
        seja, é como se fosse o conteúdo do parâmetro "fragment" que fica na URL do seu app.
    </li>
    <li>
        <b>$desiredOgMetaTag (String)</b> - Neste argumento deve-se passar o nome da variável do manifesto JSON do fragmento, ao qual você quer ler. seu app.
    </li>
</ul>
<?php 
    WindUiPhp::renderComponentHere("CodeBlock", (object)array(
    "language"=>"php",
    "codeToShow"=>
'//Retorna o título que será exibido no browser do usuário, quando ele acessar o fragmento home
echo(WindUiPhp::getValueOfSpecificOgMetaTagFromFragmentJsonManifest("home", "fragmentOgMetaTagTitle"));

//Retorna a descrição que será exibida no browser do usuário, quando ele acessar o fragmento meu-fragmento
echo(WindUiPhp::getValueOfSpecificOgMetaTagFromFragmentJsonManifest("pasta/meu-fragmento", "fragmentOgMetaTagDescription"));
'
), false);
?>


<!-- renderFragmentsViewerHere() -->
<?php 
    WindUiPhp::renderComponentHere("PhpMethodName", (object)array(
        "methodname"=>'renderFragmentsViewerHere()'
    ), false);
?>
Este método irá desenhar o FragmentsViewer no local exato ou dentro do local exato ao qual você chama-lo. Após chamar este método o Backend
 do Wind UI irá criar o código da janela de visualização de fragmentos (FragmentsViewer) naquele local. Note que este método só pode ser chamado
 a partir do seu Client.php e somente uma vez. O FragmentsViewer possui uma formatação padrão ao qual sempre procura cobrir 100% do tamanho do
 local onde ele está. Então se você chama-lo dentro de uma <b>div</b> por exemplo, o FragmentsViewer irá ocupar todo o espaço que a div tiver.
<br>
<br>
<?php 
    WindUiPhp::renderComponentHere("CodeBlock", (object)array(
    "language"=>"php",
    "codeToShow"=>
'//Exemplo de página Client.php
<div>
        <div>
            <?php WindUiPhp::renderFragmentsViewerHere(); ?>
        </div>
</div>
'
), false);
?>


<!-- renderComponentHere($componentFolderName, $variables, $warnIfThisComponentHaveNotUsedVars) -->
<?php 
    WindUiPhp::renderComponentHere("PhpMethodName", (object)array(
        "methodname"=>'renderComponentHere($componentFolderName, $variables, $warnIfThisComponentHaveNotUsedVars)'
    ), false);
?>
Este método é o melhor meio de renderizar um de seus componentes que estão na pasta "components" do seu app. Ao chamar este método você precisa
 informar qual componente deseja renderizar, definir todas as váriaveis ou valores que você deseja passar para o componente ao renderiza-lo e
 então o componente será exibido exatamente onde este método for exibido. Você pode renderizar quantos componentes quiser, mas só pode fazer
 isso dentro de fragmentos. Você não pode renderizar componentes dentro do Client.php.
<ul>
    <li>
        <b>$componentFolderName (String)</b> - O nome do componente ao qual você deseja renderizar, ou seja, o nome da Pasta que armazena todos os
        arquivos de seu componente. Tal pasta deve estar dentro da pasta "components" do seu app.
    </li>
    <li>
        <b>$variables (stdClass)</b> - Os parâmetros inicias que o componente receberá, logo que ele for renderizado.
    </li>
    <li>
        <b>$warnIfThisComponentHaveNotUsedVars (Bool)</b> - Caso seja true, o Wind UI irá notifica-lo ao renderizar este componente e existir variáveis
        não utilizadas, ou seja, váriaveis que não possuem valores padrões definidos no código de seu componente e que não foram passadas ao renderizar
        este componente.
    </li>
</ul>
<?php 
    WindUiPhp::renderComponentHere("CodeBlock", (object)array(
    "language"=>"php",
    "codeToShow"=>
'//Renderizando um componente sem passar nenhum parâmetro
WindUiPhp::renderComponentHere("Button", (object)array(), false);

//Renderizando o componente StringField e passando alguns parâmetros... Não é obrigatório fornecer valores a todas as variáveis que existirem no componente. As variáveis que não forem
//usadas ao renderizar o componente, receberão os valores padrões que podem ser configurados no código XML do componente.
WindUiPhp::renderComponentHere("StringField", (object)array(
    "id"=>"idDoComponent",
    "label"=>"Seu Nome",
    "placeholder"=>"Por favor, digite aqui..."
), false);
'
), false);
?>

<!-- End of fragment modifiable area -->
<?php
    //End of fragment renderization.
    WindUiFragmentRenderer::finishFragment();
?>