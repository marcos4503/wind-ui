<?php
    //Import core files and start fragment renderization.
    include_once("../../../../../.core/base/fragment/wind-ui-fragment-prepare.php");
    WindUiFragmentRenderer::startFragment(__DIR__);
?>
<!-- Start of fragment content modifiable and visible to user area -->


<center>
    <h1>Instalando o Wind UI Em Sua Hospedagem</h1>
</center>

Para que você comece a utilizar o Wind UI, em sua hospedagem, antes você deve fazer a instalação dela. Acompanhe os próximos tópicos para saber como.

<h3>Baixando e Instalando a Última Distribuição do Wind UI</h3>

Acesse o repositório do Wind UI no GitHub clicando <a href="https://github.com/marcos4503/wind-ui" target="_blank">aqui</a> e faça o download. Em seguida,
 copie a pasta "wind.ui.public" para dentro da pasta raiz da sua hospedagem. Então, acesse o app "Wind UI" que está incluso dentro do Wind UI que você baixou
 e instalou na sua hospeagem. Para acessa-lo basta acessar o link similar a esse... https://seudominio.com/wind.ui.public/apps/_wind-ui/client.php.

<br>

Ao acessar esse link, você entrará no app Wind UI, no fragmento inicial. Esse app contém a documentação e Painel de Controle do seu Framework Wind UI.

<h3>Ativando o Painel de Controle do Seu Wind UI</h3>

O app Wind UI possui um painel de controle para que você gerencie o seu Framework instalado no seu servidor. Através desse Painel de Controle básico, você pode
 criar um novo app dentro do seu Wind UI, Criar Fragmentos, Deletar um app existente, Criar novos componentes e etc. Tudo é feito e configurado automaticamente
 se você usar o CPanel do Wind UI. Isso agiliza a criação de seus apps, fragmentos, componentes e etc.

<br>
<br>

<?php
    WindUiPhp::renderComponentHere("AdaptativeImage", (object)array(
        "src"=>WindUiPhp::getResourcePath("images/wind-ui-cpanel.png")
    ), false);
?>

<br>
<br>

Quando você acessou o app Wind UI que está no pacote que você baixou, você deve ter notado em seu servidor, que uma pasta chamada "wind.ui.data" foi criada no mesmo diretório
 da pasta "wind.ui.public". Dentro da pasta "wind.ui.data" existe um arquivo chamado "management-key.txt". Se você abrir esse arquivo TXT, você verá que existe um Hash MD5 dentro
 deste arquivo. Esse Hash é a senha que será usada sempre que você for fazer alguma modificação no seu Framework Wind UI, como criar um app, criar um fragmento e etc. Tudo te solicitará
 essa senha. Nos agora, vamos configurar este arquivo.

<br>
<br>

Primeiro você precisa escolher uma senha de sua preferência. Então, vamos conveter essa sua senha, para um hash MD5. O hash MD5 é uma versão criptografada da sua senha. Uma versão ao qual, mesmo
 que vejam esse hash, nunca saberão qual é sua real senha. Essa senha hash, será usada para acessar o CPanel, e a senha padrão será usada sempre que você for fazer alguma alteração no seu Wind UI.
 Bom, use o campo de texto abaixo para ter o hash de sua senha. Conforme você for digitando sua senha, o hash correspondente aparecerá ao lado. Depois de terminar de digitar a senha, copie o hash gerado
 e cole dentro do arquivo "management-key.txt". Certifique-se de cola-lo sem nenhum espaço ou algo assim. Lembre-se, evite senhas simples como "1234" ou senhas muito curtas.

<br>
<br>

<div style="width: 80%; max-width: 350px; margin-left: auto; margin-right: auto;">
    <div>
        <?php
            WindUiPhp::renderComponentHere("StringField", (object)array(
                "id"=>"hashInput",
                "label"=>"Digite sua senha em texto",
                "onchangecontent"=>"generateHash();"
            ), false);
        ?>
    </div>
    <div>
        <center>
            <h3>O Hash MD5 correspondente a senha digitada é</h3>
            <div id="hash" style="width: 100%;">Por favor, digite algo...</div>
        </center>
    </div>
</div>

<br>
<br>

Depois de pegar o hash gerado acima e colar no arquivo "management-key.txt", agora vamos acessar o app Wind UI, novamente, mas agora, com privilégios de edição. Para isso, acesse novamente a URL do seu app
 Wind UI, e forneça o parâmetro "password=" contendo a sua senha Hash MD5. Exemplo: https://seudominio.com/wind.ui.public/apps/_wind-ui/client.php?password=2954c15abe836f332c488bb95a6b7df6.

<br>

Se o hash informado na URL, bater com o Hash que está no "management-key.txt", você verá algumas opções novas de CPanel aparecendo no menu do seu app Wind UI. Elas só aparecerão se for informado o hash correto, assim
 somente o administrador do servidor poderá ver essas opções e ver as ferramentas de criação e modificação do Wind UI.

<br>
<br>

Anote também, a senha em texto que foi criada o hash, pois você precisará informar a senha correspondente ao hash, porém, em texto normal, sempre que for realizar qualquer modificação no seu Wind UI, usando uma das opções
 do CPanel do seu Wind UI.

<!-- End of fragment modifiable content and visible area -->
<?php
    //End of fragment renderization.
    WindUiFragmentRenderer::finishFragment();
?>