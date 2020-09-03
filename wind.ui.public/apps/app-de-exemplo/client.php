<?php
    //Start Wind UI Client Core
    include_once("../../.core/base/client/wind-ui-client-prepare.php");
    WindUiClientRenderer::startClient(__DIR__);
?>
<!-- /////////////////////////////////////////////////// Start of client.php modifiable area /////////////////////////////////////////////////// -->

<div class="clientBody">
    <center>
        <h1>Your Wind UI "<?php echo(WindUiAppPrefs::$appTitle); ?>" App Was Created!</h1>
        Your app "<?php echo(WindUiAppPrefs::$appTitle); ?>" created with Wind UI is ready! Now, just modify this app and create your new app, your way,
         with your code, while taking advantage of all the features and functionality of the Wind UI Framework.
    </center>
    <br>
    <br>
    <div class="clientFragmentViewer">
        <?php WindUiPhp::renderFragmentsViewerHere(); ?>
    </div>
    * Red area represents the Fragment Viewer of this Client.php of your app.
    <br>
    <br>
    <center>
        <input type="button" value="Load Example Fragment 1" onclick="loadFragment1();" />
        <input type="button" value="Load Example Fragment 2" onclick="loadFragment2();" />
    </center>
</div>

<!-- /////////////////////////////////////////////////// End of client.php modifiable area /////////////////////////////////////////////////// -->
<?php
    //End Wind UI Client Core
    WindUiClientRenderer::finishClient(); 
?>