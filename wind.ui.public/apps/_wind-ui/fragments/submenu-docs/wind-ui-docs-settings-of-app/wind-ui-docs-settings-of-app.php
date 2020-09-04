<?php
    //Import core files and start fragment renderization.
    include_once("../../../../../.core/base/fragment/wind-ui-fragment-prepare.php");
    WindUiFragmentRenderer::startFragment(__DIR__);
?>
<!-- Start of fragment content modifiable and visible to user area -->


<center>
    <h1>Editando as Configurações do Seu App</h1>
</center>

O seu app possui um arquivo chamado "app-settings.json", que está na pasta raiz do seu app. Trata-se de um arquivo JSON que contém varias variaveis com diferentes
 valores. Esse conjunto de variavies é o arquivo de configuração do seu app. Cada app pode ter uma configuração diferente, onde você pode por exemplo, definir informações
 sobre seu app, alterar textos padrões exibidos pelo Wind UI no seu app e etc. Para editar esse arquivo, é necessário que você tenha conhecimentos em JSON e você só precisa
 ir adicionando as variaveis aos quais você quer configurar e etc. Variaveis que não estiverem no arquivo, o Wind UI irá aplicar valores padrões. Veja abaixo, uma tabela
 completa, com todas as variaveis que você pode adicionar ao seu arquivo de configurações...

<br>
<br>

<h3>Configurações base</h3>

<table>
    <tr>
        <th style="width: 30%;">Variável</th>
        <th style="width: 20%;">Tipo</th>
        <th>Descrição</th>
    </tr>
    <tr>
        <td>appTitle</td>
        <td>String</td>
        <td>O título do seu app.</td>
    </tr>
    <tr>
        <td>appCode</td>
        <td>String</td>
        <td>O código exclusivo do seu app. Pode ser qualquer identificador que você quiser, isso será usado para separar os dados do seu app, de outros apps.</td>
    </tr>
    <tr>
        <td>appLang</td>
        <td>String</td>
        <td>Lingua do seu app, no formato ISO, por exemplo "pt-br" ou "en-us".</td>
    </tr>
    <tr>
        <td>appCharSet</td>
        <td>String</td>
        <td>O sistema de caracteres do seu app. Por padrão, é UTF-8.</td>
    </tr>
    <tr>
        <td>appDefaultFavicon</td>
        <td>String</td>
        <td>Um caminho para um arquivo de ícone PNG do seu app. Esse será o ícone padrão do seu app. Exemplo: "/resources/icone.png"</td>
    </tr>
    <tr>
        <td>appWitdNotificationsFavicon</td>
        <td>String</td>
        <td>Um caminho para um arquivo de ícone PNG do seu app. Esse será o ícone exibido sempre que houverem notificações na tela. Exemplo: "/resources/iconeComNotificacao.png"</td>
    </tr>
    <tr>
        <td>appBrowserColor</td>
        <td>String</td>
        <td>A cor do cabeçalho que o seu site terá, quando aberto em navegadores Google Chrome Mobile. O valor aqui, deve ser uma cor HEX.</td>
    </tr>
    <tr>
        <td>appPhpTimeZone</td>
        <td>String</td>
        <td>A localização/fuso horário do seu app, no formato PHP. Por exemplo: "America/Sao_Paulo"</td>
    </tr>
    <tr>
        <td>appPreventDragImages</td>
        <td>Bool</td>
        <td>Caso seja true, o usuário não conseguirá arrastar imagens no seu site.</td>
    </tr>
    <tr>
        <td>appTextSelectionHighlight</td>
        <td>Bool</td>
        <td>Caso seja true, o usuário não conseguirá selecionar nenhum texto em seu site.</td>
    </tr>
    <tr>
        <td>appShowNotificationOnJsLogs</td>
        <td>Bool</td>
        <td>Caso seja true, os logs JavaScript serão exibidos em notificações no seu app.</td>
    </tr>
    <tr>
        <td>appAlwaysShowYScrollBar</td>
        <td>Bool</td>
        <td>Caso seja true, as barras de rolagem serão sempre visiveis, mesmo que não haja conteúdo o suficiente para que seja necessário uma barra de rolagem.</td>
    </tr>
    <tr>
        <td>appDelayBeforeLoadFragment</td>
        <td>Int</td>
        <td>Um tempo em ms que se passará antes do app começar a carregar um fragmento, de fato. O minimo possível é 150ms.</td>
    </tr>
    <tr>
        <td>appDelayBeforeLoadAjaxRequest</td>
        <td>Int</td>
        <td>Um tempo em ms que se passará antes do app começar a consumir uma API Ajax de fato. O minimo possível é de 100ms.</td>
    </tr>
    <tr>
        <td>appDefaultFragmentToLoad</td>
        <td>String</td>
        <td>Caminho para um fragmento padrão que será carregado sempre que o usuário acessar seu app, sem especificar um fragmento na URL. Exemplo: "home" ou "folder/aFragment"</td>
    </tr>
    <tr>
        <td>appFragmentNotFoundMessage</td>
        <td>String</td>
        <td>A mensagem que será exibida em forma de notificação quando o usuário acessar seu app, especificando um fragmento que não existe ou é inválido.</td>
    </tr>
</table>









<h3>Bibliotecas externas</h3>

<table>
    <tr>
        <th style="width: 30%;">Variável</th>
        <th style="width: 20%;">Tipo</th>
        <th>Descrição</th>
    </tr>
    <tr>
        <td>clientExternalJsLibs</td>
        <td>Array de String</td>
        <td>Uma array contendo somente strings, cada string deve ser uma URL que aponta para um biblioteca JavaScript em outro site. Exemplo: "["https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js", "https://ajax.googleapis.com/ajax/libs/jquery/3.5.0/jquery.min.js"]". Essa biblioteca será incorporada no seu app automaticamente, no cabeçalho do seu app.</td>
    </tr>
    <tr>
        <td>clientExternalCssLibs</td>
        <td>Array de String</td>
        <td>Uma array contendo somente strings, cada string deve ser uma URL que aponta para um biblioteca CSS em outro site. Exemplo: "["https://algumsite.com/biblioteca.css", "https://algumsite.com/outraBiblioteca.css"]". Essa biblioteca será incorporada no seu app automaticamente, no cabeçalho do seu app.</td>
    </tr>
    <tr>
        <td>clientThirdPartyBeforeBodyCloseJsLibs</td>
        <td>Array de String</td>
        <td>Uma array contendo somente strings, cada string deve apontar para um arquivo JavaScript que está no diretório "thirdparty-libs/js". Digamos que você tenha 3 arquivos JavaScript dentro deste diretório, os arquivos "one.js", "two.js" e "script.js". Para adiciona-los ao seu app, basta adicionar a seguinte array a esta variável: "["one.js", "two.js", "script.js"]". As bibliotecas adicionadas a esta variavel, serão incorporadas em seu app, antes do encerramento da tag BODY do seu app.</td>
    </tr>
    <tr>
        <td>clientThirdPartyOnHeadJsLibs</td>
        <td>Array de String</td>
        <td>Uma array contendo somente strings, cada string deve apontar para um arquivo JavaScript que está no diretório "thirdparty-libs/js". Digamos que você tenha 3 arquivos JavaScript dentro deste diretório, os arquivos "one.js", "two.js" e "script.js". Para adiciona-los ao seu app, basta adicionar a seguinte array a esta variável: "["one.js", "two.js", "script.js"]". As bibliotecas adicionadas a esta variavel, serão incorporadas em seu app, no cabeçalho.</td>
    </tr>
    <tr>
        <td>clientThirdPartyCssLibs</td>
        <td>Array de String</td>
        <td>Uma array contendo somente strings, cada string deve apontar para um arquivo CSS que está no diretório "thirdparty-libs/css". Digamos que você tenha 3 arquivos CSS dentro deste diretório, os arquivos "one.css", "two.css" e "style.css". Para adiciona-los ao seu app, basta adicionar a seguinte array a esta variável: "["one.css", "two.css", "style.js"]". As bibliotecas adicionadas a esta variavel, serão incorporadas em seu app, no cabeçalho.</td>
    </tr>
</table>










<h3>Configurações de estilo do app</h3>

<table>
    <tr>
        <th style="width: 30%;">Variável</th>
        <th style="width: 20%;">Tipo</th>
        <th>Descrição</th>
    </tr>
    <tr>
        <td>styleBodyBackgroundColor</td>
        <td>String</td>
        <td>A cor de fundo do seu app. A cor deve ser no formato HEX.</td>
    </tr>
    <tr>
        <td>styleBodyPrimaryFontFamily</td>
        <td>String</td>
        <td>O atributo de fonte primária do seu app.</td>
    </tr>
    <tr>
        <td>styleBodySecondaryFontFamily</td>
        <td>String</td>
        <td>O atributo de fonte secundária do seu app. Esta será usada, caso seja possível, se não for, a primária sera usada então.</td>
    </tr>
    <tr>
        <td>styleBodyFontSizePx</td>
        <td>String</td>
        <td>O tamanho padrão dos textos do seu site, em PX, exemplo: "14".</td>
    </tr>
    <tr>
        <td>styleBodyFontColor</td>
        <td>String</td>
        <td>A cor das letras do seu app. A cor deve ser no formato HEX.</td>
    </tr>
    <tr>
        <td>styleLinkFontColor</td>
        <td>String</td>
        <td>A cor dos links do seu app. A cor deve ser no formato HEX.</td>
    </tr>
    <tr>
        <td>styleLinkHoverFontColor</td>
        <td>String</td>
        <td>A cor dos links do seu app, quando o mouse estiver em cima deles. A cor deve ser no formato HEX.</td>
    </tr>
    <tr>
        <td>styleLinkVisitedFontColor</td>
        <td>String</td>
        <td>A cor dos links visitados do seu app. A cor deve ser no formato HEX.</td>
    </tr>
</table>












<h3>Configurações da barra de carregamento do canto superior do app</h3>

<table>
    <tr>
        <th style="width: 30%;">Variável</th>
        <th style="width: 20%;">Tipo</th>
        <th>Descrição</th>
    </tr>
    <tr>
        <td>loadBarHeight</td>
        <td>String</td>
        <td>A altura da barra de carregamento do canto superior do seu app. A altura é dada em pixels. Exemplo: "2".</td>
    </tr>
    <tr>
        <td>loadBarColor</td>
        <td>String</td>
        <td>A cor da barra de carregamento. A cor deve estar no formato HEX.</td>
    </tr>
    <tr>
        <td>loadBarShowOnEachAjaxRequest</td>
        <td>Bool</td>
        <td>Se for true, a barra de carregamento aparecerá sempre que uma requisição Ajax for feita também.</td>
    </tr>
</table>






<h3>Configurações de estilo das scrollbars</h3>

<table>
    <tr>
        <th style="width: 30%;">Variável</th>
        <th style="width: 20%;">Tipo</th>
        <th>Descrição</th>
    </tr>
    <tr>
        <td>scrollBarWidthPx</td>
        <td>String</td>
        <td>A largura das barras de rolagem do seu app. É dada em pixels, exemplo: "8".</td>
    </tr>
    <tr>
        <td>scrollBarTrackColor</td>
        <td>String</td>
        <td>A cor da area arrastável das barras de rolagem do seu app. Deve estar no formato de cor HEX.</td>
    </tr>
    <tr>
        <td>scrollBarThumbColor</td>
        <td>String</td>
        <td>A cor da area de fundo das barras de rolagem do seu app. Deve estar no formato de cor HEX.</td>
    </tr>
</table>







<h3>Configurações de aviso de Cookies</h3>

<table>
    <tr>
        <th style="width: 30%;">Variável</th>
        <th style="width: 20%;">Tipo</th>
        <th>Descrição</th>
    </tr>
    <tr>
        <td>cookieWarningPopUpMessage</td>
        <td>String</td>
        <td>A mensagem que aparecerá no primeiro acesso do usuário, e caso ele ainda não tenha concordado com o uso de Cookies por seu app.</td>
    </tr>
    <tr>
        <td>cookieWarningPopUpAcceptButton</td>
        <td>String</td>
        <td>A mensagem que aparecerá dentro do botão de aviso de Cookies.</td>
    </tr>
</table>







<h3>Configurações da tela de carregamento inicial</h3>

<table>
    <tr>
        <th style="width: 30%;">Variável</th>
        <th style="width: 20%;">Tipo</th>
        <th>Descrição</th>
    </tr>
    <tr>
        <td>loadScreenEnabled</td>
        <td>String</td>
        <td>Caso seja false, a tela de carregamento inicial do seu app, não será exibida.</td>
    </tr>
    <tr>
        <td>loadScreenBackgroundColor</td>
        <td>String</td>
        <td>A cor de fundo da tela de carregamento do seu app. A cor deve ser dada em HEX.</td>
    </tr>
    <tr>
        <td>loadScreenLogoResource</td>
        <td>String</td>
        <td>O caminho para a imagem de logotipo que aparecerá na tela de carregamento inicial. Exemplo: "/resources/logo.png"</td>
    </tr>
    <tr>
        <td>loadScreenSpinnerResource</td>
        <td>String</td>
        <td>O caminho para a imagem de carregamento spinner que aparecerá na tela de carregamento inicial. Exemplo: "/resources/spinner.png"</td>
    </tr>
    <tr>
        <td>loadScreenSpinnerSizePx</td>
        <td>String</td>
        <td>O tamanho da imagem spinner em PX. Exemplo "18"</td>
    </tr>
    <tr>
        <td>loadScreenLoadingMessage</td>
        <td>String</td>
        <td>A mensagem de carregamento que aparecerá. Exemplo "Carregando...". Você pode deixar isso vazio se quiser.</td>
    </tr>
    <tr>
        <td>loadScreenLoadingMessageFontSizePx</td>
        <td>String</td>
        <td>O tamanho em pixels, da mensagem de carregamento. Exemplo "14".</td>
    </tr>
</table>







<h3>Configurações do Fragments Viewer</h3>

<table>
    <tr>
        <th style="width: 30%;">Variável</th>
        <th style="width: 20%;">Tipo</th>
        <th>Descrição</th>
    </tr>
    <tr>
        <td>fragmentsViewerSpinnerResource</td>
        <td>String</td>
        <td>A imagem de spinner que será exibida enquanto um fragmento é carregado. Exemplo: "/resources/spinner.gif"</td>
    </tr>
    <tr>
        <td>fragmentsViewerSpinnerSizePx</td>
        <td>String</td>
        <td>O tamanho em pixels, da imagem de spinner de carregamento de fragmento. Exemplo: "18".</td>
    </tr>
    <tr>
        <td>fragmentsViewerErrorResource</td>
        <td>String</td>
        <td>A imagem que aparecerá quando ocorrer um erro de rede ao carregar um fragmento. Exemplo: "/resources/networkError.png"</td>
    </tr>
    <tr>
        <td>fragmentsViewerErrorSizePx</td>
        <td>String</td>
        <td>O tamanho em pixels, da imagem de erro de carregamento de fragmento. Exemplo: "350".</td>
    </tr>
    <tr>
        <td>fragmentsViewerErrorMessage</td>
        <td>String</td>
        <td>A mensagem de erro que aparecerá abaixo da imagem de erro, quando ocorrer um erro de rede ao carregar um fragmento.</td>
    </tr>
    <tr>
        <td>fragmentsViewerMinHeightPx</td>
        <td>String</td>
        <td>O tamanho minimo em pixels, do FragmentsViewer. Exemplo "450". Esse será o tamanho minimo do FragmentsViewer, mesmo que não haja conteúdo que faça-o aumentar ou preencha-o.</td>
    </tr>
    <tr>
        <td>fragmentsViewerLoadingMessage</td>
        <td>String</td>
        <td>Mensagem de carregamento que aparecerá enquanto um Fragmento é carregado. Exemplo "Carregando Fragmento..."</td>
    </tr>
    <tr>
        <td>fragmentsViewerLoadingMessageSizePx</td>
        <td>String</td>
        <td>Tamanho da mensagem de carregamento em pixels. Exemplo "14"</td>
    </tr>
    <tr>
        <td>fragmentsViewerNotFoundResource</td>
        <td>String</td>
        <td>Imagem que aparecerá quando o fragmento desejado para ser carregado, não existe, ou é inválido.</td>
    </tr>
    <tr>
        <td>fragmentsViewerNotFoundTitleMessage</td>
        <td>String</td>
        <td>Titulo da página de erro que aparecerá quando o fragmento desejado não existe ou é inválido.</td>
    </tr>
    <tr>
        <td>fragmentsViewerNotFoundMessage</td>
        <td>String</td>
        <td>Mensagem da página de erro que aparecerá quando o fragmento desejado não existe ou é inválido.</td>
    </tr>
</table>





<h3>Configurações de notificações</h3>

<table>
    <tr>
        <th style="width: 30%;">Variável</th>
        <th style="width: 20%;">Tipo</th>
        <th>Descrição</th>
    </tr>
    <tr>
        <td>notificationBackgroundColor</td>
        <td>String</td>
        <td>A cor de fundo das caixas de notificação do seu app. A cor deve ser dada em HEX.</td>
    </tr>
     <tr>
        <td>notificationTextFontColor</td>
        <td>String</td>
        <td>A cor do texto das caixas de notificação do seu app. A cor deve ser dada em HEX.</td>
    </tr>
     <tr>
        <td>notificationTextFontSizePx</td>
        <td>String</td>
        <td>O tamanho em pixels do texto das caixas de notificação do seu app. Exemplo: "14".</td>
    </tr>
     <tr>
        <td>notificationButtonTextFontColor</td>
        <td>String</td>
        <td>A cor do texto dos botões nas caixas de notificação do seu app. A cor deve ser dada em HEX.</td>
    </tr>
     <tr>
        <td>notificationButtonTextFontSizePx</td>
        <td>String</td>
        <td>O tamanho em pixels do texto dos botões nas caixas de notificação do seu app. Exemplo: "14".</td>
    </tr>
     <tr>
        <td>notificationOggSoundFile</td>
        <td>String</td>
        <td>Caminho para um arquivo de audio que será tocado ao chegar uma notificação para o usuário, que deve reproduzir um som. Esse deve ser o som em formato OGG. Exemplo: "/resources/notificationSound.ogg"</td>
    </tr>
     <tr>
        <td>notificationMp3SoundFile</td>
        <td>String</td>
        <td>Caminho para um arquivo de audio que será tocado ao chegar uma notificação para o usuário, que deve reproduzir um som. Esse deve ser o som em formato MP3. Exemplo: "/resources/notificationSound.mp3"</td>
    </tr>
     <tr>
        <td>notificationCloseIcon</td>
        <td>String</td>
        <td>Caminho para uma imagem de fechar, para as caixas de notificação do seu app. Exemplo: "/resources/closeNotification.png"</td>
    </tr>
</table>






<h3>Configurações de estilo dos botões no estado de consumindo Ajax</h3>

<table>
    <tr>
        <th style="width: 30%;">Variável</th>
        <th style="width: 20%;">Tipo</th>
        <th>Descrição</th>
    </tr>
    <tr>
        <td>ajaxHttpRequestLoadingOnButtonSpinnerResource</td>
        <td>String</td>
        <td>Caminho para uma imagem de spinner que será colocada quando o estado de um botão do seu app, for alterado para o estado de carregamento, ao usar a API do Wind UI JavaScript para isso. Exemplo "/resources/buttonSpinner.gif"</td>
    </tr>
    <tr>
        <td>ajaxHttpRequestLoadingOnButtonSpinnerSizePx</td>
        <td>String</td>
        <td>O tamanho em pixels que a imagem de spinner no botão terá, exemplo "14".</td>
    </tr>
</table>








<h3>Configurações de sessões do seu app</h3>

<table>
    <tr>
        <th style="width: 30%;">Variável</th>
        <th style="width: 20%;">Tipo</th>
        <th>Descrição</th>
    </tr>
    <tr>
        <td>sessionsRequiredDefinedVariablesToSessionBeValid</td>
        <td>Array de String</td>
        <td>Uma array contendo o nome de todas as variavies que DEVEM estar definidas na sessão do usuário, para que a sessão dele seja considerada válida pelo método "WindUiAppSessions::isCurrentSessionOfReceivedCookiesValid()". Clique <a onclick="WindUiJs.loadNewFragment('submenu-docs/backend-api-cookies-api', null);">aqui</a> para ter mais detalhes sobre essa API Backend do Wind UI. Exemplo: "["nick", "id", "email"]", se alguma dessas variaveis não estiver definida na sessão do usuário, o método retornará que a sessão é inválida.</td>
    </tr>
    <tr>
        <td>sessionsValidateSessionWithIp</td>
        <td>Bool</td>
        <td>Caso seja true, ao usar a API de sessões do Wind UI para criar e validar a sessão do usuário, o Wind UI usará o IP que o usuário usa para acessar seu app, como um elemento validador. Se você deixar isso ativado e desativar, a sessão de todos os usuários que era validada com o IP se tornará inválida e vice-versa.</td>
    </tr>
</table>


<!-- End of fragment modifiable content and visible area -->
<?php
    //End of fragment renderization.
    WindUiFragmentRenderer::finishFragment();
?>