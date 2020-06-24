<?php
    //Import core files and start fragment renderization.
    include_once("../../../../.core/base/fragment/wind-ui-fragment-prepare.php");
    WindUiFragmentRenderer::setParameters((object)
    array(
        "thisAppRootDir"=>(__DIR__) . "/../../",
        "thisFragmentTitle"=>"Wind UI Learn"
    ));
    WindUiFragmentRenderer::startFragment();
?>
<!-- Start of fragment modifiable area -->

<center>
    <h1>Wind UI Framework Learn</h1>
</center>


Este aplicativo foi desenvolvido para rodar com o Wind UI. O objetivo deste aplicativo é mostrar como o Wind UI funciona, assim
 quem desejar utilizar o Wind UI, poderá aprender vendo os códigos para ter uma boa noção. Além disso, esse aplicativo funciona como
 uma documentação para o Wind UI.

<br>
<br>

<?php 
    WindUiPhp::renderComponentHere("AdaptativeImage", (object)array(
        "imageSrc"=>WindUiPhp::getResourcePath("images/framework.png"),
        "style"=>"max-height: 200px;"
    ), false);
?>

<br>
<br>

Utilize o menu ao lado para navegar atráves deste aplicativo! Este aplicativo também tem o objetivo de mostrar como a API PHP (backend) e
 JavaScript (frontend) do Wind UI funciona. Existem vários métodos, recursos e funções do Wind UI aos quais seu aplicativo pode acessar,
  tanto no back quanto no front de sua aplicação. Tudo isso para facilitar a criação de suas aplicações Web!

<br>
<br>

<h3>O que é o Wind UI?</h3>

Wind UI é uma Framework PHP que tem o objeto de facilitar a criação de aplicações Web que utilizam apenas uma página e apenas o conteúdo dessa
 única página é atualizado, sem necessidade de carregar outras páginas. O Wind UI possui Componentes e Fragmentos. Wind UI possui métodos PHP
 para desenhar componentes numa página, além de métodos JavaScript como Ajax e outras soluções. Com o Wind UI fica mais fácil aplicar mudanças
 em cada componente do site, visto que todos usarão um único código. Com o Wind UI é possível fazer mais ao mesmo passo que se escreve menos.
 Não se preocupe, é possível criar seus próprios Componentes e Fragmentos.

<br>
<br>

A Framework Wind UI foi criada para extrema facilidade de implementação, facilidade de funcionar em qualquer hospedagem e rodar em qualquer
 browser que suporte JavaScript. O Wind UI foi criado para quem quer criar um site de apenas 1 página, um site que apenas altera o seu conteúdo
 dinamicamente, sem carregar uma nova página do zero, no navegador, verdadeiras aplicações dinâmicas Web.

<h3>Quando devo usar o Wind UI?</h3>

Você basicamente pode usar o Wind UI para qualquer site que deseja criar. Porém, se você deseja criar uma aplicação Web, completamente dinâmica,
 com apenas uma página que terá seu conteúdo atualizado conforme o usuário navega (um site que funcione como um Aplicativo, ou como a página
 do Facebook), e ao mesmo tempo que cria um site assim, você deseja ter total controle dos códigos PHP, JavaScript e etc, o Wind UI é para você.

<br>
<br>

O objetivo do Wind UI é fornecer uma base e diversos recursos para que você deixe sua aplicação Web dinâmica pronta em até 10 minutos. Você
 literalmente só precisará se preocupar em criar sua página principal (que terá o conteúdo atualizado) e os seus Fragmentos (páginas que serão
 incluidas dentro da página principal. A medida que o usuário navega, os fragmentos apenas são trocados). O Wind UI pode ser de grande ajuda para
 prototipar páginas ou para criar aplicações para o usuário final.

<br>
<br>

<h3>Requisitos básicos para usar o Wind UI</h3>

O Wind UI possui alguns requisitos minimos e fundamentais...

<ul>
    <li>Conhecimentos (pelo menos superficiais) em PHP, HTML, CSS e JavaScript.</li>
    <li>A sua hospedagem deve suportar PHP 7.1 ou superior.</li>
    <li>O navegador do usuário de sua futura aplicação, deve suportar JavaScript e Cookies.</li>
    <li>O FOpen PHP de sua hospedagem, deve estar totalmente ativo.</li>
</ul>

O Wind UI é projetado para suportar totalmente, os navegadores baseados em Chromium, ou seja, o Wind UI suporta oficialmente os navegadores 
 Chromium, Google Chrome, Microsoft Edge Chromium, Opera, Android WebView, Safari e etc. O Wind UI também oferece suporte ao Mozilla Firefox,
 embora não tenha todas as suas funções, 100% testadas nele.

<h3>Pilares do Wind UI</h3>

O Wind UI possui alguns Pilares, e os Pilares são itens que fazem tudo funcionar. Para entender como o Wind UI funciona, você precisa entender
 o que cada um desses Pilares faz. Quando todos esses Pilares são unificados, surge o Wind UI.

<ul>
    <li>
        <b>Componentes:</b> Os componentes foram pensados para serem códigos HTML reutilizaveis, ou seja, você pode renderizar vários componentes
        dentro de um mesmo fragmento, porém, com conteúdos diferentes. Por exemplo, digamos que você deseje renderizar vários botões, porém, não quer
        só copiar e colar o código diversas vezes, com conteúdos diferentes. Tudo que você precisa fazer é criar um novo componente Wind UI, dentro
        deste componente você insere o código HTML do seu botão e então, é só usar a API PHP do Wind UI para renderizar o mesmo componente diversas
        vezes, com conteúdos diferentes. No futuro se você precisar editar este botão, você não terá que modificar um monte de código, mas apenas
        modificar o código HTML do seu componente, assim todos os fragmentos que renderizam ele, vão começar a renderiza-los com as novas mudanças.
    </li>
    <li>
        <b>Fragmentos:</b> São "subpáginas" que serão renderizados dentro do FragmentsViewer na página principal de sua aplicação Wind UI. Conforme o
        usuário navega pelo seu aplicativo Wind UI, os fragmentos são trocados, dando a impressão que somente o conteúdo da página é trocado, sem
        necessidade de carregamentos do zero.
    </li>
    <li>
        <b>FragmentsViewer:</b> O FragmentsViewer é um componente exclusivo da página principal (página que será carregada e que exibirá diferentes
        conteúdos conforme o usuário navega) de sua aplicação Wind UI. Este componente só pode ser criado uma única vez. Este componente é responsável
        por exibir diferentes Fragmentos e todos os códigos dos seus Fragmentos serão exibidos dentro deste componente, dentro desta "janela". Conforme
        os Fragmentos são trocados, o conteúdo do FragmentsViewer também é trocado.
    </li>
</ul>

<h3>Alguns avisos sobre o Wind UI</h3>

É importante que você evite fazer algumas coisas. Dentre elas...

<ul>
    <li>
        Não altere o nome de nenhum arquivo ou pasta dentro da ".core".
    </li>
    <li>
        Não altere o nome de nenhum arquivo ou pasta dentro da pasta do seu app (por exemplo "wind.ui.pulic/apps/seuApp")
    </li>
    <li>
        Dentro do seu app, você pode modificar o conteúdo das pastas "ajax-http-apis", "components", "fragments", "resources" ou "thirdparty-libs".
    </li>
</ul>

<h3>Estrutura de arquivos e pastas do Wind UI</h3>

O Wind UI possui uma hierarquia de pastas e arquivos para garantir a melhor organização e bom funcionamento de tudo. Veja abaixo.

<ul>
    <li><b>wind.ui.public</b> - Esta é a pasta raiz do Wind UI. O sufixo do Wind UI, indica a versão do Wind UI. O Wind UI é portátil, isto é, você
    só armazenará os arquivos do Wind UI dentro de uma pasta, inclusive seus apps. Por isso, você pode mudar o sufixo do seu Wind UI para "public" ou
    "private". Você pode ter duas dessas pastas contendo o Wind UI, se preferir.</li>
    <ul>
        <li><b>.core</b> - Armazena todas as pastas e arquivos do núcleo do Wind UI. É o cerébro do Wind UI.</li>
        <li><b>apps</b> - Armazena todos os seus apps criados com o Wind UI.</li>
        <ul>
            <li><b>seuApp1</b> - Essa é a pasta do seu app. A pasta deve levar o nome do seu app. Essa pasta conterá tudo que faz seu app
             funcionar</li>
                <ul>
                    <li><b>ajax-http-apis</b> - Armazena os seus scrips PHP, scripts que serão acessados pelo seu app usando a API Ajax do Wind
                     UI no Frontend.</li>
                    <li><b>components</b> - Armazena todos os componentes que poderão ser renderizados pelo seu app.</li>
                    <li><b>fragments</b> - Armazena todos os fragmentos que serão acessados pelos seus usuários enquanto navegam pelo seu app
                     Wind UI.</li>
                    <li><b>resources</b> - Guarda os recursos do seu app Wind UI, recursos como imagens, sons e etc. Os recursos presentes aqui
                     podem ser acessados pelos seus componentes, fragmentos ou client.</li>
                    <li><b>thirdparty-libs</b> - Guarda as bibliotecas criadas por terceiros, que serão acessadas pelo seu app Wind UI,
                     bibliotecas CSS ou JavaScript por exemplo. Qualquer biblioteca que não tenha sido criada por você pode ser armazenada aqui
                     e todos os arquivos JS ou CSS da biblitoeca serão incorporados no client.</li>
                    <li><b>app-settings.php</b> - Este arquivo armazena todas as configurações, preferências e definições do seu app.</li>
                    <li><b>client.php</b> - Esta é a página principal do seu app, a página que contém o FragmentsViewer e exibirá diferentes
                     fragmentos, conforme o usuário navega pelo seu app! Esta pode ser editada ao seu gosto, o design, layout e etc pode ser
                     editado conforme seu gosto e preferência. A janela FragmentsViewer pode fica onde você desejar. Essa é a página que o seu
                     usuário sempre acessará e não sairá mais dela, apenas verá fragmentos diferentes.</li>
                </ul>
            <li><b>seuApp2</b> - Esse é outro app seu.</li>
        </ul>
    </ul>
</ul>

<h3>Instalado e começando a utilizar o Wind UI em sua hospedagem</h3>

Primeiramente, você precisa fazer o download do Framework Wind UI a partir do GitHub. Lá você pode baixa-lo e como o Wind UI é código aberto, você
 pode modifica-lo, redistribui-lo e fazer tudo que a licensa que esta no GitHub lhe permite.

<br>
<br>

Depois de baixado o Wind UI, você deve arrastar a pasta "wind.ui.public" para a sua hospedagem. Depois disso, basta criar uma pasta com o nome de seu
 app, dentro da pasta "apps" do "wind.ui.public". Você pode renomear a pasta alterando seu sufixo para criar diferentes versões do Framework, em
 uma mesma hospedagem. Por exemplo, você pode ter "wind.ui.public" para que usuários acessem e "wind.ui.private" para testes internos. Ao criar
 a pasta de seu app, você pode simplesmente copiar o app "_learn" que já vem incluso para demonstração e estudo. Todos os seus apps serão dependentes
 da pasta ".core", por isso não altere a hierarquia de pastas e arquivos, nem renomeie os arquivos. Consulte o tópico acima para saber onde você pode
 modificar para criar seu app. Você pode duplicar o app "_learn" e renomear a pasta para o nome do seu futuro app, então é só começar a modificar
 este app duplicado para criar o seu próprio!

<br>
<br>

Dentro do seu novo app, você pode editar o arquivo "app-settings.php" para deixar seu app com suas preferências. É muito importante modifica-lo
 corretamente, ou seja, como se trata de um arquivo PHP, não deixe este arquivo com erros de sintaxe ou coisas parecidas. Agora o seu novo app já
 deve estar pronto e o Wind UI já está em sua hospedagem. Continue lendo este aplicativo para entender como criar seu app com sucesso!

<br>
<br>

Isso é tudo que você precisa saber para ter uma introdução ao Wind UI. Utilize o Menu no canto superior direito deste app para navegar por outras
 seções e aprender mais sobre o Wind UI!

<!-- End of fragment modifiable area -->
<?php
    //End of fragment renderization.
    WindUiFragmentRenderer::finishFragment();
?>