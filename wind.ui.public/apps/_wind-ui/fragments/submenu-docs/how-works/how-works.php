<?php
    //Import core files and start fragment renderization.
    include_once("../../../../../.core/base/fragment/wind-ui-fragment-prepare.php");
    WindUiFragmentRenderer::startFragment((__DIR__ . "/../../../"));
?>

<!-- Fragment manifest and parameters area -->
<!-- Do not type plain text in this area and do not open PHP or HTML tags. Just edit the JSON content. -->
<!-- Make sure to always maintain a correct JSON syntax, otherwise the Wind UI will not be able to process your fragment's metadata. -->

<json id="windUiJsonFragmentManifest" type="text/json" app="wind.ui">
{
    "fragmentOgMetaTagTitle": "Como Funciona",
    "fragmentOgMetaTagDescription": "Página inicial do Wind UI App.",
    "fragmentOgMetaTagImage": "/resources/images/startup-loading.png",
    "fragmentOgMetaTagImageType": "image/png",
    "fragmentOgMetaTagImageWidth": "512",
    "fragmentOgMetaTagImageHeight": "512",
    "fragmentOgMetaTagType": "website",
    "fragmentOgArticleAuthor": "",
    "fragmentOgArticleSection": "",
    "fragmentOgArticleTags": "",
    "fragmentOgArticlePublishTime": ""
}
</json>

<!-- Start of fragment content modifiable and visible to user area -->
<!-- Here you can type plain text and open PHP or HTML tags. -->

Abordar todos os pontos para criação de um aplicativo básico com o Wind UI

<br>
<br>

<center>
    <h1>Como funciona o Wind UI?</h1>
</center>

O Wind UI é uma Framework para criação de aplicativos Web (ou sites) dinâmicos, aos quais não possuem carregamentos, mas todo o conteúdo
 é atualizado dinamicamente. Esse aplicativo Web "Wind UI Learn" foi criado usando o Wind UI. Quando você clicou na opção "Como Funciona" no menu
 ao lado, você deve ter notado que não houve recarregamentos da página, mas somente o conteúdo foi atualizado. Isso que você testemunhou, foi
 o client deste aplicativo, trocando o fragmento anterior para o fragmento "Como Funciona". Continue lendo para entender mais.

<br>
<br>

<h3>1. Página principal ou "client.php"</h3>

É na página principal do seu app, que tudo acontece. Note que, sempre que falamos "Página principal", na verdade nos referimos a página
 "client.php" que está no diretório raiz do seu app. Quando o seu usuário acessa seu app, ele deve sempre ser redirecionado para a página "client.php"
 do seu app. Por padrão, caso algum usuário acesse a URL de um fragmento, ao invés de acessar a URL do "client.php" do seu app, ele será redirecionado
 automaticamente para o "client.php" do seu app, e automaticamente o fragmento que ele tentou acessar, será carregado dentro do "client.php".

<br>
<br>

A página "client.php" pode ser criada ao seu gosto e com o layout que você desejar. Todos os fragmentos serão renderizados pelo navegador do usuário
 dentro de uma janela (div) chamada "FragmentsViewer". Depois que o código do seu "client.php" está pronto, você pode renderizar o FragmentsViewer
 usando a API PHP do Wind UI. Após fazer isso, seu cliente já estará pronto para renderizar diferentes fragmentos.

<br>
<br>

<?php 
    WindUiPhp::renderComponentHere("AdaptativeImage", (object)array(
        "imageSrc"=>WindUiPhp::getResourcePath("images/client-example.png"),
        "style"=>"max-height: 350px;"
    ), false);
?>

<br>
<br>

Na representação acima, toda o conteúdo da área marcada em vermelho, é o client do nosso aplicativo de exemplo. A área marcada em verde é o
 FragmentsViewer renderizado dentro do nosso client. Todos os conteúdos dos nossos Fragmentos só serão exibidos dentro dessa área marcada em verde.
 
<br>
<br>

- Eis um exemplo de uma URL para acessar o client.php de sua aplicação
<br>
https://seusite.com/wind.ui.public/apps/NomeDoSeuApp/client.php

<h3>2. Fragmentos</h3>

Fragmentos são literalmente, fragmentos de páginas. O Wind UI exibirá o código dos seus fragmentos, dentro de um FragmentsViewer que estiver
 presente no seu "client.php". Conforme o usuário navega por sua aplicação, os fragmentos apenas são trocados dinâmicamente. Veja acima, a área
 marcada em verde, é o FragmentsViewer do nosso "client.php". Quando o usuário acessa o "client.php" de sua aplicação, sem especificar um fragmento
 na URL, o fragmento padrão será carregado. Para que você tenha uma noção, o texto que está lendo agora, é o conteúdo de um Fragmento, um
 fragmento chamado "Como Funciona".

<br>
<br>

Fragmentos funcionam como pedaços de páginas, sendo assim, você pode por exemplo, criar um fragmento de login, um fragmento de registro e um
 fragmento que será o fragmento inicial. Caso o usuário clique no botão de login, o "client.php" simplesmente trocará o conteudo do FragmentsViewer
 pelo fragmento de login. Um outro exemplo, seria um portal de notícias. Cada notícia pode ser um fragmento por exemplo.

<br>
<br>

- Eis um exemplo de uma URL para acessar um fragmento chamado "noticias" de sua aplicação
<br>
https://seusite.com/wind.ui.public/apps/NomeDoSeuApp/client.php?fragment=noticias

<h3>3. Componentes</h3>

Um componente do Wind UI foi pensado para ser um código HTML altamente reaproveitável. Ou seja. Você pode criar seus próprios componentes e
 renderiza-los quantas vezes precisar, dentro dos seus fragmentos usando a API PHP do Wind UI. Se você cria sites com seu próprio HTML e CSS, já
 deve ter se reparado com situações onde por exemplo, você criou diversos campos de texto em suas páginas e no futuro precisou dar uma manutenção
 ou modificação em todos os campos de texto. Provavelmente, você teve de editar o HTML e CSS de cada um dos seus campos de texto e isso realmente
 é algo muito chato de se fazer, além de que pode trazer o risco de algum bug ou algo assim.

<br>
<br>

Com o Wind UI você pode criar seus próprios componentes e renderiza-los quantas vezes precisar, e com conteudos diferentes, reaproveitando totalmente
 o código HTML e eliminando a necessidade de copiar e colar os códigos para criar vários componentes... Voltando ao exemplo do campo de texto
 se você usar o Wind UI, você só precisará criar seu próprio componente de campo de texto (coisa muito simples) e então, é só usar a API PHP do Wind UI
 para renderizar quantos campos de texto precisar, em seus fragmentos. Você pode renderizar um mesmo botão com diferentes conteúdos e o melhor é
 que no futuro, se precisar efetuar uma manutenção, ou modificação em seu componente de campo de texto, só precisará editar o código do seu componente
 e todos os campos de texto de todos os fragmentos serão modificados também!

<br>
<br>

Veja abaixo, alguns exemplos de componentes...

<br>
<br>

<?php 
    WindUiPhp::renderComponentHere("AdaptativeImage", (object)array(
        "imageSrc"=>WindUiPhp::getResourcePath("images/example-image-1.jpg"),
        "style"=>"max-height: 350px;"
    ), false);
?>

<?php 
    WindUiPhp::renderComponentHere("AdaptativeImage", (object)array(
        "imageSrc"=>WindUiPhp::getResourcePath("images/example-image-2.jpg"),
        "style"=>"max-height: 350px;"
    ), false);
?>

<?php 
    WindUiPhp::renderComponentHere("AdaptativeImage", (object)array(
        "imageSrc"=>WindUiPhp::getResourcePath("images/example-image-3.jpg"),
        "style"=>"max-height: 350px;"
    ), false);
?>

<br>
<br>

Cada uma dessas imagens na verdade são um componente chamado "AdaptativeImage" que eu criei, e este componente tem o objetivo de exibir imagens
 formatadas para suportarem dispositivos móveis ou computadores, alterando a largura de exibição automaticamente. Eu renderizei este componente 3
 vezes, porém, com imagens diferentes! Se no futuro eu precisar editar a forma ao qual este componente trabalha, basta que eu o edite.

<br>
<br>

Esses são os 3 pilares de funcionamento do Wind UI. A fusão desses 3 tópicos resultam em como o Wind UI funciona e assim você entenderá melhor como
 os sites dinâmicos criados com o Wind UI, funcionam.

<!-- End of fragment modifiable area -->
<?php
    //End of fragment renderization.
    WindUiFragmentRenderer::finishFragment();
?>