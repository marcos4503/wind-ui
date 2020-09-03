<?php
    //Import core files and start fragment renderization.
    include_once("../../../../../.core/base/fragment/wind-ui-fragment-prepare.php");
    WindUiFragmentRenderer::startFragment(__DIR__);
?>
<!-- Start of fragment content modifiable and visible to user area -->

<center>
    <h1>O que é o Wind UI?<h1>
</center>

Explicando de maneira simples. O Wind UI, é uma Framework ou seja, um tipo de plataforma, para criar sites de apenas 1 página. Sites de uma única página
 são aqueles sites onde você entra e nunca sai daquela página, o conteúdo é carregado, trocado e exibido de forma dinâmica, conforme o usuário navega. Você
 pode notar isso, conforme navega por este app do Wind UI. Chamamos de app do Wind UI, qualquer site que foi criado em cima do Wind UI.

<br>
<br>

<?php
    WindUiPhp::renderComponentHere("AdaptativeImage", (object)array(
        "src"=>WindUiPhp::getResourcePath("images/static-websites.png")
    ), false);
?>

<br>
<br>

O Wind UI, não oferece só uma base para que você crie um site dinâmico rapidamente, mas também oferece uma API Backend e Frontend para que você possa ter acesso
 rápido a ferramentas úteis no Front e Back, sem que você precise escrever seus próprios métodos JavaScript e PHP para isso. Caso prefira, você também pode incorporar
 suas próprias bibliotecas ou de terceiros, como o JQuery e Bootstrap, sem problemas. Exemplo disso, é que o Wind UI, possui uma API para que você faça requisições Ajax
 de maneira rápida escrevendo menos código e de maneira confiável, para facilitar e agilizar a criação de áreas dinâmicas em seus sites.

<br>
<br>

<?php
    WindUiPhp::renderComponentHere("AdaptativeImage", (object)array(
        "src"=>WindUiPhp::getResourcePath("images/library.png")
    ), false);
?>

<br>
<br>

Com o Wind UI, você pode criar seu app rapidamente, em questão de minutos. Isso é ótimo para criar protótipos e sites pequenos de maneira rápida. Além disso, o Wind UI é de código aberto,
 ou seja, qualquer um pode baixa-lo, qualquer um pode modifica-lo as suas necessidades e qualquer um pode compartilha-lo. Sem problemas. Você pode ter mais informações sobre licensa no repositório
 do Wind UI, no GitHub. Você pode acessar o repositório, clicando <a href="https://github.com/marcos4503/wind-ui" target="_blank">aqui</a>.

<br>
<br>

<?php
    WindUiPhp::renderComponentHere("AdaptativeImage", (object)array(
        "src"=>WindUiPhp::getResourcePath("images/website-creation.png")
    ), false);
?>

<br>
<br>

Se você cria sites, já deve ter se deparado com momentos onde criou um código e como precisava usa-lo em outras áreas do site, você simplesmente o copiou e saiu colando em áreas do site. No futuro
 quando precisou fazer alterações nesse recurso, você precisou editar o código em todos os locais onde o colou na primeira vez. O Wind UI possui a mecânica de funcionamento, baseada em componentes.
 Ou seja, se você quer criar um campo de texto que se auto valida, você pode. Você não precisará copiar o mesmo código e cola-lo diversas vezes por ai, só precisará criar um componente com o código
 de campo de texto que se auto valida, e então, basta renderizar este mesmo componente quantas vezes for necessário pelo seu app do Wind UI. Se no futuro você precisar editar esse seu componente de
 campo de texto, só precisará editar o código do seu componente e ele também será alterado em todos os locais onde ele é renderizado. Sem problemas, sem bugs, sem perda de tempo e sem dor de cabeça.
 Os componentes do Wind UI podem ser criados por qualquer um, são criados simplesmente com CSS, JavaScript e HTML. Você pode compartilhar seu componente ou baixar componentes criados por terceiros e
 ninguém terá problemas com isso!

<br>
<br>

<?php
    WindUiPhp::renderComponentHere("AdaptativeImage", (object)array(
        "src"=>WindUiPhp::getResourcePath("images/components.png")
    ), false);
?>

<br>
<br>

Esta foi uma breve descrição do que é o Wind UI. Este app contém um Painel de Controle básico para que você possa criar seu primeiro App do Wind UI, e também possui uma documentação completa do
 Wind UI, para que você possa ler e entender como usar o Wind UI. Existe também uma referência a API Backend e Frontend do Widn UI, com todos os métodos documentados e com exemplos de código. Aproveite!

<!-- End of fragment modifiable content and visible area -->
<?php
    //End of fragment renderization.
    WindUiFragmentRenderer::finishFragment();
?>