<!-- Client.php JavaScript -->
<script type="text/javascript">
    //This is acessible to all fragments and components

    function openAppMenu() {
        var bodyMenuBackground = document.getElementById("bodyMenuBackground");
        var bodyMenuBase = document.getElementById("bodyMenuBase");

        //Close the app menu
        bodyMenuBackground.style.opacity = "0.35";
        bodyMenuBackground.style.pointerEvents = "all";
        bodyMenuBase.style.right = "0%";
    }

    function closeAppMenu() {
        var bodyMenuBackground = document.getElementById("bodyMenuBackground");
        var bodyMenuBase = document.getElementById("bodyMenuBase");

        //Close the app menu
        bodyMenuBackground.style.opacity = "0";
        bodyMenuBackground.style.pointerEvents = "none";
        bodyMenuBase.style.right = "-100%";
    }

    //Register function to be runned after load a new fragment
    WindUiJs.setFunctionToBeRunnedAfterLoadANewFragment(function(){
        var allMenuItens = document.getElementsByClassName("bodyMenuItem");
        for(var i = 0; i < allMenuItens.length; i++){
            allMenuItens[i].classList.remove("bodyMenuItemCurrentSelected");
            //Set background color to selected, if this menu item is equal to current fragment requested
            if(allMenuItens[i].getAttribute("fragmentOfThisButton") == WindUiJs.getCurrentRequestedFragmentName())
                allMenuItens[i].classList.add("bodyMenuItemCurrentSelected");
        }

        //Colorize all <code><pre> blocks of Rainbow Sintax Highlighter third party library, after load a fragment
        Rainbow.color();
    });
</script>