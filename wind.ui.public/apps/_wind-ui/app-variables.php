<?php
    class WindUiAppVariables{
        //In this class you can define your own session variables and you can also define public and static variables.
        private function __construct() {}

        /*
         * Public and Static Variables
         * 
         * All the variables present below, can be accessed from any part of your Wind Ui app, they will be accessible through their
         * fragments, ajax-http-apis or client.php.
         * Just use "WindUiAppVariables::$yourVarName"
         * 
         * Just declare your custom and static variables, below.
        */

        //Your custom static variables
        public static $yourVarName = "Some Value";
    }
?>