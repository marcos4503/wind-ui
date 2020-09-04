<?php
    class WindUiAppSessions{
        //This class can create sessions, manage and destroy them. When creating a session it will be completely validated by Wind UI,
        //facilitating the process of saving user data on the server and login for example, in addition, Wind UI provides a Cookie for
        //the user when creating a session.
        private function __construct() {}

        public static function isCurrentSessionOfReceivedCookiesValid(bool $stopPhpIfInvalid, bool $destroySessionIfInvalid){
            //Check if the session is valid. If the session have all "sessionsRequiredDefinedVariablesToSessionBeValid" defined, the session is valid
            
            /*
             * For this function to work, it is necessary for the developer to define an array of necessary variables that are defined, for the
             * session to be valid. This array must be placed in the "app-settings.json" file.
             * 
             * Example: { "sessionsRequiredDefinedVariablesToSessionBeValid": ["id", "login", "password"] }
             *
             * For example: If a cookie sent by a user's browser does not contain the "id, login and password" variables defined in the
             * corresponding server session, the session will not be considered valid and will be automatically deleted (if desired). If the user is
             * logged in, it will be necessary for him to reconnect. If the cookie sent by the user's browser contains only the variable "id"
             * defined in its corresponding session, the session will not be considered invalid, since the variables "login" and "password"
             * will still be missing.
            */

            //Initialize sessions
            if(session_status() == PHP_SESSION_NONE)
                session_start();

            //Store the is current session valid variable
            $currentSessionIsValid = true;
            
            //Get all required variables to session is valid
            $requierdDefinedVariables = WindUiAppPrefs::$sessionsRequiredDefinedVariablesToSessionBeValid;

            //Check if all required variables, is defined in the session, if not, the session is not valid
            for($i = 0; $i < count($requierdDefinedVariables); $i++)
                if(isset($_SESSION[$requierdDefinedVariables[$i]]) == false)
                    $currentSessionIsValid = false;
            //If session is valid, check if IP that created the session, is same of this request (if this feature is enabled in this app)
            if($currentSessionIsValid == true && WindUiAppPrefs::$sessionsValidateSessionWithIp == true)
                if($_SESSION["created_by_ip"] != $_SERVER['REMOTE_ADDR'])
                    $currentSessionIsValid = false;
                
            //If session is invalid
            if($currentSessionIsValid == false){
                //Destroy session, if is desired
                if($destroySessionIfInvalid == true)
                    session_destroy();
                //Stop PHP script runtime, if desired
                if($stopPhpIfInvalid == true)
                    exit();
            }

            //Return the session validation
            return $currentSessionIsValid;
        }

        public static function createNewSessionAndProvideCookies(){
            //Create a new session
            session_start();
            $_SESSION["session_type"] = "wind.ui.session.appcode=" . WindUiAppPrefs::$appCode;

            //Save the IP that created this session (if this feature is enabled in this app)
            if(WindUiAppPrefs::$sessionsValidateSessionWithIp == true)
                $_SESSION["created_by_ip"] = $_SERVER['REMOTE_ADDR'];
        }

        public static function isSessionCreatedByThisApp(){
            //Return true if curren session was created by this app
            
            //Check
            if(isset($_SESSION["session_type"]) == true && $_SESSION["session_type"] == "wind.ui.session.appcode=" . WindUiAppPrefs::$appCode)
                return true;

            return false;
        }

        public static function destroyCurrentSessionAndCookies(){
            //Destroy the current session, if have a valid session

            //Destroi a sessão
            session_destroy();
        }
        
        public static function saveValueInCurrentSession(string $valueName, $value){
            //Save a value in this session, if have a valid session
            if(self::isCurrentSessionOfReceivedCookiesValid(false, false) == true){
                //Save the value
                $_SESSION[$valueName] = $value;
            }
            else{
                echo("<b>Wind UI:</b> There is no valid session currently in effect, so you can store data.");
            }
        }

        public static function readValueOfCurrentSession(string $valueName){
            //Read and return a value in this session, if have a valid session
            if(self::isCurrentSessionOfReceivedCookiesValid(false, false) == true){
                //Return the value the value
                return $_SESSION[$valueName];
            }
            else{
                echo("<b>Wind UI:</b> There is no valid session currently in effect, so you can read data.");
            }
        }

        public static function valueOfCurrentSessionExists(string $valueName){
            //Check if a value exists in this session, if have a valid session
            if(self::isCurrentSessionOfReceivedCookiesValid(false, false) == true){
                //Return true if the value exists
                return isset($_SESSION[$valueName]);
            }
            else{
                echo("<b>Wind UI:</b> There is no valid session currently in effect, so you can read data.");
            }
        }
    }
?>