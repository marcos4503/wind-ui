<?php
    //Import core files and start fragment renderization.
    include_once("%DIR_TO_CORE_FOLDER%/.core/base/fragment/wind-ui-fragment-prepare.php");
    WindUiFragmentRenderer::startFragment(__DIR__);
?>
<!-- Start of fragment content modifiable and visible to user area -->


<!-- Code HTML or PHP of your fragment, goes here -->
%ADITIONAL_CONTENT_CODE%


<!-- End of fragment modifiable content and visible area -->
<?php
    //End of fragment renderization.
    WindUiFragmentRenderer::finishFragment();
?>