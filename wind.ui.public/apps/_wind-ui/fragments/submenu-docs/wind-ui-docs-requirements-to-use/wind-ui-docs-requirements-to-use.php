<?php
    //Import core files and start fragment renderization.
    include_once("../../../../../.core/base/fragment/wind-ui-fragment-prepare.php");
    WindUiFragmentRenderer::startFragment(__DIR__);
?>
<!-- Start of fragment content modifiable and visible to user area -->


<center>
    <h1>Requisitos Para Que Seja Possível Usar o Wind UI<h1>
</center>

O Wind UI possui alguns requisitos minimos para que seja possível usa-lo em sua hospedagem, e para que seja possível que seus usuários utilize
 seus apps criados com o Wind UI. Veja abaixo.

<ul>
    <li>A hospedagem deve ter suporte a Sessões e Cookies.</li>
    <li>O Browser dos usuários também deve suportar Cookies, por isso sempre que um usuário acessa o site pela primeira vez, um aviso de Cookies é exibido automaticamente.
        Não se preocupe, o Wind UI não faz rastreamento ou coleta dados do usuário. Esse suporte é necessário para que as APIs de Cookies e Sessões do Wind UI, funcionem.</li>
    <li>O Browser do usuário deve obrigatoriamente suportar JavaScript e não pode estar com o JavaScript desativado.</li>
    <li>O Wind UI pode não funcionar bem em navegadores Internet Explorer. Entretanto, o Wind UI deve funcionar bem em qualquer navegador que funciona com o motor Webkit/Blink
        como o Google Chrome, MS Edge Chromium, Opera, Vivaldi, Safari e etc. O Wind UI também deve funcionar no Mozilla Firefox sem problemas.</li>
    <li>A hospedagem deve suportar o PHP 7.1 ou superior.</li>
    <li>Conhecimentos básicos em HTML, CSS, JavaScript, JSON e PHP para criar seu app.</li>
    <li>O FOpen do PHP de sua hospedagem deve estar habilitado.</li>
</ul>

Esses são todos os requisitos mínimos para que seja possível usar o Wind UI.


<!-- End of fragment modifiable content and visible area -->
<?php
    //End of fragment renderization.
    WindUiFragmentRenderer::finishFragment();
?>