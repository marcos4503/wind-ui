<?php
    //Start Wind UI Client Core
    include_once("../../.core/base/client/wind-ui-client-prepare.php");
    WindUiClientRenderer::startClient(__DIR__);
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
        <div class="bodyMenuItemIcon"><img src="<?php echo(WindUiPhp::getResourcePath("menu-icons/home.png")); ?>" style="width: 100%;" /></div>
        <div class="bodyMenuItemText">Página Inicial</div>
    </div>

    <!-- SubMenu: CPanel -->
    <div class="bodyMenuSubMenu">Wind UI CPanel</div>
    <!-- Render all menu items found in "menu-items-cpanel.json" -->
    <?php
        $content = file_get_contents(WindUiPhp::getResourcePath("menu-items-cpanel.json"));
        $data = json_decode($content);
        for($i = 0; $i < count($data->menuItems); $i++){
            echo('
                <div class="bodyMenuItem" style="margin-left: 0px; width: 100%;" fragmentOfThisButton="'.$data->menuItems[$i]->fragmentName.'" onclick="WindUiJs.loadNewFragment(\''.$data->menuItems[$i]->fragmentName.'\', null); closeAppMenu();">
                    <div class="bodyMenuItemIcon"><img src="'.WindUiPhp::getResourcePath("menu-icons/" . $data->menuItems[$i]->iconName).'" style="width: 100%;" /></div>
                    <div class="bodyMenuItemText">'.$data->menuItems[$i]->visibleName.'</div>
                </div>
            ');
        }
    ?>

    <!-- SubMenu: Gerenciamento de Cookies e Sessões -->
    <div class="bodyMenuSubMenu">Gerenciamento de Cookies e Sessões</div>
    <!-- Render all menu items found in "menu-items-sessions.json" -->
    <?php
        $content = file_get_contents(WindUiPhp::getResourcePath("menu-items-sessions.json"));
        $data = json_decode($content);
        for($i = 0; $i < count($data->menuItems); $i++){
            echo('
                <div class="bodyMenuItem" style="margin-left: 0px; width: 100%;" fragmentOfThisButton="'.$data->menuItems[$i]->fragmentName.'" onclick="WindUiJs.loadNewFragment(\''.$data->menuItems[$i]->fragmentName.'\', null); closeAppMenu();">
                    <div class="bodyMenuItemIcon"><img src="'.WindUiPhp::getResourcePath("menu-icons/" . $data->menuItems[$i]->iconName).'" style="width: 100%;" /></div>
                    <div class="bodyMenuItemText">'.$data->menuItems[$i]->visibleName.'</div>
                </div>
            ');
        }
    ?>

    <!-- SubMenu: Referência a API Backend PHP do Wind UI -->
    <div class="bodyMenuSubMenu">Referência a API Backend PHP do Wind UI</div>
    <!-- Render all menu items found in "menu-items-php-reference.json" -->
    <?php
        $content = file_get_contents(WindUiPhp::getResourcePath("menu-items-php-reference.json"));
        $data = json_decode($content);
        for($i = 0; $i < count($data->menuItems); $i++){
            echo('
                <div class="bodyMenuItem" style="margin-left: 0px; width: 100%;" fragmentOfThisButton="'.$data->menuItems[$i]->fragmentName.'" onclick="WindUiJs.loadNewFragment(\''.$data->menuItems[$i]->fragmentName.'\', null); closeAppMenu();">
                    <div class="bodyMenuItemIcon"><img src="'.WindUiPhp::getResourcePath("menu-icons/" . $data->menuItems[$i]->iconName).'" style="width: 100%;" /></div>
                    <div class="bodyMenuItemText">'.$data->menuItems[$i]->visibleName.'</div>
                </div>
            ');
        }
    ?>

    <!-- SubMenu: Referência a API Frontend JavaScript do Wind UI -->
    <div class="bodyMenuSubMenu">Referência a API Frontend JavaScript do Wind UI</div>
    <!-- Render all menu items found in "menu-items-js-reference.json" -->
    <?php
        $content = file_get_contents(WindUiPhp::getResourcePath("menu-items-js-reference.json"));
        $data = json_decode($content);
        for($i = 0; $i < count($data->menuItems); $i++){
            echo('
                <div class="bodyMenuItem" style="margin-left: 0px; width: 100%;" fragmentOfThisButton="'.$data->menuItems[$i]->fragmentName.'" onclick="WindUiJs.loadNewFragment(\''.$data->menuItems[$i]->fragmentName.'\', null); closeAppMenu();">
                    <div class="bodyMenuItemIcon"><img src="'.WindUiPhp::getResourcePath("menu-icons/" . $data->menuItems[$i]->iconName).'" style="width: 100%;" /></div>
                    <div class="bodyMenuItemText">'.$data->menuItems[$i]->visibleName.'</div>
                </div>
            ');
        }
    ?>

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