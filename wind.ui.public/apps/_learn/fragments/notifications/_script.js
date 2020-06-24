/*
 / This is the script.js of your Fragment. It is highly recommended that all your fragment's JavaScript be inserted here! So the buttons,
 / components and elements of your Fragment, can access the variables and methods present here, without problems. The script contained here,
 / also has full access to the Wind UI Js API. The script contained here, will be loaded automatically by Wind UI BEFORE your fragment is
 / loaded. Your snippet will only be loaded after this script has finished loading.
*/

//Armazena a ultima notificação criada
var ultimaNotificacaoCriada = null;

function checarSeNotificacaoGerenciavelEstaAtiva() {
    //Return if notification is active
    var active = WindUiJs.isNotificationCurrentlyInScreen(ultimaNotificacaoCriada);

    if (active == true)
        WindUiJs.showSimpleNotification('Notificação ativa', 3000, true, null);
    if (active == false)
        WindUiJs.showSimpleNotification('Notificação não ativa', 3000, true, null);
}

function alterarConteudoDaNotificacao() {
    checarSeNotificacaoGerenciavelEstaAtiva();
    WindUiJs.changeTextContentOfNotification(ultimaNotificacaoCriada, 'Conteúdo desta notificação acabou de ser alterado, porém, não é possível alterar a função passada para os botões de ação, ou o nome dos botões.');
}

WindUiJs.setFunctionToBeRunnedOnBeforeLoadANewFragment(function () {
    WindUiJs.showSimpleNotification('Carregando Novo Fragmento! Esta função foi chamada automaticamente pois o último Fragmento carregado a definiu para ser executada quando um novo Fragmento fosse requisitado para ser carregado.', 0, true, null);
});