<?php
    //Import core files and start fragment renderization.
    include_once("../../../../../.core/base/fragment/wind-ui-fragment-prepare.php");
    WindUiFragmentRenderer::startFragment(__DIR__);
?>
<!-- Start of fragment content modifiable and visible to user area -->

<center>
    <h1>API PHP Backend: Manipulação e Gerenciamento de Arquivos</h1>
</center>

O Wind UI funciona com bibliotecas Backend e Frontend com várias ferramentas e recursos para que você crie seu aplicativo. Uma dessas
 ferramentas é a API Backend PHP do Wind UI. Com a API Backend em PHP, você tem métodos rápidos para efetuar ações que desenvolvedores
 Web geralmente precisam muito.

<br>
<br>

Aqui você encontra todos os métodos Backend PHP do Wind UI, porém, estes métodos são somente métodos básicos para manipulação e ou
 gerenciamento de arquivos.

<br>
<br>

Por favor, note que todos os métodos listados aqui são utilizáveis, e todos os códigos encontrados aqui são para referência, para que
 você saiba como utiliza-los e possa entender como eles funcionam e ter um código de exemplo para cada um.

<br>
<br>

<!-- getCurrentScriptName() -->
<?php 
    WindUiPhp::renderComponentHere("PhpMethodName", (object)array(
        "methodname"=>'getCurrentScriptName()'
    ), false);
?>
Este método retorna o nome completo do script PHP que o chamou.
<?php 
    WindUiPhp::renderComponentHere("CodeBlock", (object)array(
    "language"=>"php",
    "codeToShow"=>
'//Retornará "example.php"
echo(WindUiPhp::getCurrentScriptName());
'
), false);
?>


<!-- getListOfFilesInDir($dir) -->
<?php 
    WindUiPhp::renderComponentHere("PhpMethodName", (object)array(
        "methodname"=>'getListOfFilesInDir($dir)'
    ), false);
?>
Este método retornará uma lista (array PHP) contendo o nome (com extensão) de todos os arquivos contidos em um diretório.
<ul>
    <li>
        <b>$dir (String)</b> - Neste argumento deve-se passar um diretório alvo.
    </li>
</ul>
<?php 
    WindUiPhp::renderComponentHere("CodeBlock", (object)array(
    "language"=>"php",
    "codeToShow"=>
'//Irá retornar array([0]=>"file1.bin", [1]=>"file2.exe", [2]=>"file.png"...)
print_r(WindUiPhp::getListOfFilesInDir("folder/target/dir"));
'
), false);
?>


<!-- getListOfFoldersInDir($dir) -->
<?php 
    WindUiPhp::renderComponentHere("PhpMethodName", (object)array(
        "methodname"=>'getListOfFoldersInDir($dir)'
    ), false);
?>
Este método retornará uma lista (array PHP) contendo o nome de todas as pastas contidas em um diretório.
<ul>
    <li>
        <b>$dir (String)</b> - Neste argumento deve-se passar um diretório alvo.
    </li>
</ul>
<?php 
    WindUiPhp::renderComponentHere("CodeBlock", (object)array(
    "language"=>"php",
    "codeToShow"=>
'//Irá retornar array([0]=>"Folder1", [1]=>"folder2", [2]=>"Folder_3"...)
print_r(WindUiPhp::getListOfFoldersInDir("folder/target/dir"));
'
), false);
?>


<!-- getExtensionOfFile($fileDir) -->
<?php 
    WindUiPhp::renderComponentHere("PhpMethodName", (object)array(
        "methodname"=>'getExtensionOfFile($fileDir)'
    ), false);
?>
Este método retornará uma string contendo a extensão de um arquivo alvo, que você desejar.
<ul>
    <li>
        <b>$fileDir (String)</b> - Neste argumento deve-se passar um caminho para um arquivo alvo.
    </li>
</ul>
<?php 
    WindUiPhp::renderComponentHere("CodeBlock", (object)array(
    "language"=>"php",
    "codeToShow"=>
'//Irá retornar "exe"
echo(WindUiPhp::getExtensionOfFile("full/path/to/file/file.exe"));
'
), false);
?>


<!-- copyDirContentToAnotherDir(string $sourceDir, string $targetDir) -->
<?php 
    WindUiPhp::renderComponentHere("PhpMethodName", (object)array(
        "methodname"=>'copyDirContentToAnotherDir(string $sourceDir, string $targetDir)'
    ), false);
?>
Este método copia todos os arquivos que estiverem dentro de um diretório e os cola em um outro diretório que você preferir. Este método
 é recursivo, ou seja, se ele achar uma pasta dentro do diretório ao qual ele está copiando, ele irá copiar todos os arquivos dentro desta pasta
 também, e se achar uma pasta dentro dessa mesma pasta, ele irá copiar todos os arquivos e pastas também, de forma ifinita até copiar 100% das pastas
 e arquivos dentro do diretório que você deseja.
<ul>
    <li>
        <b>$sourceDir (String)</b> - Pasta que terá seu conteúdo copiado.
    </li>
    <li>
        <b>$targetDir (String)</b> - Pasta que receberá os arquivos copiados.
    </li>
</ul>
<?php 
    WindUiPhp::renderComponentHere("CodeBlock", (object)array(
    "language"=>"php",
    "codeToShow"=>
'//Copia os arquivos da pasta Teste para a pasta Exemplo.
WindUiPhp::copyDirContentToAnotherDir("php/Teste", "php/Exemplo");
'
), false);
?>


<!-- deleteDirContent(string $targetDir) -->
<?php 
    WindUiPhp::renderComponentHere("PhpMethodName", (object)array(
        "methodname"=>'deleteDirContent(string $targetDir)'
    ), false);
?>
Este método deleta todos os arquivos que estiverem dentro de um diretório. Este método é recursivo, ou seja, se ele achar uma pasta dentro do diretório
 ao qual ele está deletando, ele irá copiar todos os arquivos dentro desta pasta também.
<ul>
    <li>
        <b>$targetDir (String)</b> - Pasta que terá todos os seus arquivos deletados.
    </li>
</ul>
<?php 
    WindUiPhp::renderComponentHere("CodeBlock", (object)array(
    "language"=>"php",
    "codeToShow"=>
'//Deleta todos os arquivos e pastas dentro de um diretório específico.
WindUiPhp::deleteDirContent("php/Teste");
'
), false);
?>

<!-- End of fragment modifiable area -->
<?php
    //End of fragment renderization.
    WindUiFragmentRenderer::finishFragment();
?>