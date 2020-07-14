<?php
    //Start Wind UI Client Core
    include_once("../../.core/base/client/wind-ui-client-prepare.php");
    WindUiClientRenderer::startClient((__DIR__));
?>
<!-- /////////////////////////////////////////////////// Start of client.php modifiable area /////////////////////////////////////////////////// -->

<!-- Topbar -->
<div class="bodyHeader">
    <div class="bodyHeaderLogo" onclick="WindUiJs.loadNewFragment('home', null); closeAppMenu();">
        <img src="<?php echo(WindUiPhp::getResourcePath("images/wind-white.png")); ?>" style="height: 34px; margin-top: 5px; border-radius: 6px; cursor: pointer; margin-left: 4px;" />
        <div class="bodyHeaderLogoText">
            <div style="font-size: 26px; line-height: 26px;">Wind UI</div>
            <div style="font-size: 12px;">Framework</div>
        </div>
    </div>
    <div style="width: calc(100% - 10px); height: 42px;">
        <div class="bodyOpenMenuButton" onclick="openAppMenu();"></div>
        <div class="bodyDownloadOnGitHub" onclick="window.open('https://github.com/marcos4503/wind-ui', '_blank');"></div>
    </div>
</div>

<!-- Menu Black Background -->
<div id="bodyMenuBackground" class="bodyMenuBackground" onclick="closeAppMenu();"></div>

<!-- Menu -->
<div id="bodyMenuBase" class="bodyMenuBase">
    <div class="bodyMenuHeader">
        <div style="line-height: 42px; font-weight: bold; font-size: 18px;">Menu do Aplicativo Wind UI</div>
        <div style="42px; height: 42px;">
            <div class="bodyCloseMenuButton" style="transform: rotate(180deg);" onclick="closeAppMenu();">
            </div>
        </div>
    </div>
    <hr class="bodyMenuSeparator" style="margin-bottom: 16px;" />
    <!-- Página Inicial -->
    <div class="bodyMenuItem" style="margin-left: 0px; width: 100%;" fragmentOfThisButton="home" onclick="WindUiJs.loadNewFragment('home', null); closeAppMenu();">
        <div class="bodyMenuItemIcon"><img src="<?php echo(WindUiPhp::getResourcePath("menu/home.png")); ?>" style="width: 100%;" /></div>
        <div class="bodyMenuItemText">Página Inicial</div>
    </div>

    <!-- SubMenu: CPanel -->
    <div class="bodyMenuSubMenu">Wind UI CPanel</div>
    <!-- Criar app -->
    <div class="bodyMenuItem" fragmentOfThisButton="submenu-cpanel/create-app" onclick="WindUiJs.loadNewFragment('submenu-cpanel/create-app', null); closeAppMenu();">
        <div class="bodyMenuItemIcon"><img src="<?php echo(WindUiPhp::getResourcePath("menu/create-app.png")); ?>" style="width: 100%;" /></div>
        <div class="bodyMenuItemText">Criar Novo Aplicativo Wind UI</div>
    </div>
    <!-- Criar fragmento para app -->
    <div class="bodyMenuItem" fragmentOfThisButton="create-fragment" onclick="WindUiJs.loadNewFragment('submenu-cpanel/create-fragment', null); closeAppMenu();">
        <div class="bodyMenuItemIcon"><img src="<?php echo(WindUiPhp::getResourcePath("menu/create-fragment.png")); ?>" style="width: 100%;" /></div>
        <div class="bodyMenuItemText">Criar Novo Fragmento Para Um App</div>
    </div>
    <!-- Criar componente para app -->
    <div class="bodyMenuItem" fragmentOfThisButton="submenu-cpanel/create-component" onclick="WindUiJs.loadNewFragment('submenu-cpanel/create-component', null); closeAppMenu();">
        <div class="bodyMenuItemIcon"><img src="<?php echo(WindUiPhp::getResourcePath("menu/create-component.png")); ?>" style="width: 100%;" /></div>
        <div class="bodyMenuItemText">Criar Novo Componente Para Um App</div>
    </div>
    <!-- Reparar um app -->
    <div class="bodyMenuItem" fragmentOfThisButton="submenu-cpanel/repair-app" onclick="WindUiJs.loadNewFragment('submenu-cpanel/repair-app', null); closeAppMenu();">
        <div class="bodyMenuItemIcon"><img src="<?php echo(WindUiPhp::getResourcePath("menu/repair-app.png")); ?>" style="width: 100%;" /></div>
        <div class="bodyMenuItemText">Reparar Um App</div>
    </div>

    <!-- SubMenu: Documentação -->
    <div class="bodyMenuSubMenu">Documentação</div>
    <!-- Página Inicial -->
    <div class="bodyMenuItem" fragmentOfThisButton="home" onclick="WindUiJs.loadNewFragment('home', null); closeAppMenu();">
        <div class="bodyMenuItemIcon"><img src="<?php echo(WindUiPhp::getResourcePath("menu/home.png")); ?>" style="width: 100%;" /></div>
        <div class="bodyMenuItemText">Página Inicial</div>
    </div>
    <!-- Como funciona -->
    <div class="bodyMenuItem" fragmentOfThisButton="how-works" onclick="WindUiJs.loadNewFragment('how-works', null); closeAppMenu();">
        <div class="bodyMenuItemIcon"><img src="<?php echo(WindUiPhp::getResourcePath("menu/how-work.png")); ?>" style="width: 100%;" /></div>
        <div class="bodyMenuItemText">Como Funciona o Wind UI</div>
    </div>
    <!-- Criando seu app -->
    <div class="bodyMenuItem" fragmentOfThisButton="making-app" onclick="WindUiJs.loadNewFragment('making-app', null); closeAppMenu();">
        <div class="bodyMenuItemIcon"><img src="<?php echo(WindUiPhp::getResourcePath("menu/making-app.png")); ?>" style="width: 100%;" /></div>
        <div class="bodyMenuItemText">O Básico Para Criar um App Wind UI</div>
    </div>

    <!-- Parametros para criar o client.php -->
    <div class="bodyMenuItem" fragmentOfThisButton="making-app" onclick="WindUiJs.loadNewFragment('making-app', null); closeAppMenu();">
        <div class="bodyMenuItemIcon"><img src="<?php echo(WindUiPhp::getResourcePath("menu/making-app.png")); ?>" style="width: 100%;" /></div>
        <div class="bodyMenuItemText">Parâmetros do Client.php</div>
    </div>
    <!-- Criando um Fragmento -->
    <div class="bodyMenuItem" fragmentOfThisButton="making-app" onclick="WindUiJs.loadNewFragment('making-app', null); closeAppMenu();">
        <div class="bodyMenuItemIcon"><img src="<?php echo(WindUiPhp::getResourcePath("menu/making-app.png")); ?>" style="width: 100%;" /></div>
        <div class="bodyMenuItemText">Criando um Fragmento</div>
    </div>
    <!-- Criando seu próprio componente -->
    <div class="bodyMenuItem" fragmentOfThisButton="making-app" onclick="WindUiJs.loadNewFragment('making-app', null); closeAppMenu();">
        <div class="bodyMenuItemIcon"><img src="<?php echo(WindUiPhp::getResourcePath("menu/making-app.png")); ?>" style="width: 100%;" /></div>
        <div class="bodyMenuItemText">Criando Seu Próprio Componente</div>
    </div>
    <!-- Renderizando um componente em um Fragmento -->
    <div class="bodyMenuItem" fragmentOfThisButton="making-app" onclick="WindUiJs.loadNewFragment('making-app', null); closeAppMenu();">
        <div class="bodyMenuItemIcon"><img src="<?php echo(WindUiPhp::getResourcePath("menu/making-app.png")); ?>" style="width: 100%;" /></div>
        <div class="bodyMenuItemText">Renderizando Componentes Nos Fragmentos</div>
    </div>
    <!-- Toda API Backend PHP do Wind UI -->
    <div class="bodyMenuItem" fragmentOfThisButton="making-app" onclick="WindUiJs.loadNewFragment('making-app', null); closeAppMenu();">
        <div class="bodyMenuItemIcon"><img src="<?php echo(WindUiPhp::getResourcePath("menu/making-app.png")); ?>" style="width: 100%;" /></div>
        <div class="bodyMenuItemText">API Backend PHP do Wind UI</div>
    </div>
    <!-- Toda API Frontend JS do Wind UI -->
    <div class="bodyMenuItem" fragmentOfThisButton="making-app" onclick="WindUiJs.loadNewFragment('making-app', null); closeAppMenu();">
        <div class="bodyMenuItemIcon"><img src="<?php echo(WindUiPhp::getResourcePath("menu/making-app.png")); ?>" style="width: 100%;" /></div>
        <div class="bodyMenuItemText">API Frontend JavaScript do Wind UI</div>
    </div>
    <!-- Armazenando recursos e os exibindo -->
    <div class="bodyMenuItem" fragmentOfThisButton="making-app" onclick="WindUiJs.loadNewFragment('making-app', null); closeAppMenu();">
        <div class="bodyMenuItemIcon"><img src="<?php echo(WindUiPhp::getResourcePath("menu/making-app.png")); ?>" style="width: 100%;" /></div>
        <div class="bodyMenuItemText">Armazenando Recursos e Exibindo-os</div>
    </div>
    <!-- Incluindo bibliotecas de terceiros -->
    <div class="bodyMenuItem" fragmentOfThisButton="making-app" onclick="WindUiJs.loadNewFragment('making-app', null); closeAppMenu();">
        <div class="bodyMenuItemIcon"><img src="<?php echo(WindUiPhp::getResourcePath("menu/making-app.png")); ?>" style="width: 100%;" /></div>
        <div class="bodyMenuItemText">Incluindo Bibliotecas de Terceiros no Seu App</div>
    </div>
    <!-- Configurando preferencias do app -->
    <div class="bodyMenuItem" fragmentOfThisButton="making-app" onclick="WindUiJs.loadNewFragment('making-app', null); closeAppMenu();">
        <div class="bodyMenuItemIcon"><img src="<?php echo(WindUiPhp::getResourcePath("menu/making-app.png")); ?>" style="width: 100%;" /></div>
        <div class="bodyMenuItemText">Configuração de Preferências do App</div>
    </div>
    <!-- Configurando variaveis globais e estáticas -->
    <div class="bodyMenuItem" fragmentOfThisButton="making-app" onclick="WindUiJs.loadNewFragment('making-app', null); closeAppMenu();">
        <div class="bodyMenuItemIcon"><img src="<?php echo(WindUiPhp::getResourcePath("menu/making-app.png")); ?>" style="width: 100%;" /></div>
        <div class="bodyMenuItemText">Configurando Variáveis Globais e Estáticas no App</div>
    </div>
    <!-- Eventos do frontend do Wind UI -->
    <div class="bodyMenuItem" fragmentOfThisButton="notifications" onclick="WindUiJs.loadNewFragment('notifications', null); closeAppMenu();">
        <div class="bodyMenuItemIcon"><img src="<?php echo(WindUiPhp::getResourcePath("menu/bell.png")); ?>" style="width: 100%;" /></div>
        <div class="bodyMenuItemText">Eventos JavaScript Frontend do Wind UI</div>
    </div>
    <!-- Notificações frontend -->
    <div class="bodyMenuItem" fragmentOfThisButton="submenu-docs/notifications" onclick="WindUiJs.loadNewFragment('submenu-docs/notifications', null); closeAppMenu();">
        <div class="bodyMenuItemIcon"><img src="<?php echo(WindUiPhp::getResourcePath("menu/bell.png")); ?>" style="width: 100%;" /></div>
        <div class="bodyMenuItemText">API de Notificações Frontend</div>
    </div>
    <div style="width: 100%; height: 16px;"></div>
</div>

<!-- Body of Client -->
<div class="bodyContent">
    <?php WindUiPhp::renderFragmentsViewerHere(); ?>
</div>

<!-- Footer -->
<div class="bodyFooter">
    <center>
        <small>
            Wind UI <?php echo(date("Y")); ?> - Created With ❤ by Marcos Tomaz
        </small>
    <center>
</div>

<!-- /////////////////////////////////////////////////// End of client.php modifiable area /////////////////////////////////////////////////// -->
<?php
    //End Wind UI Client Core
    WindUiClientRenderer::finishClient(); 
?>