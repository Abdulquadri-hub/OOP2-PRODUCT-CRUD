<?php

/*
* main Controller class: this have all the common function for all controlllers
*/

class Controller 
{
/*
* view method
*/

    public function view($view,$data = array()){
        extract($data);

        if(file_exists(ROOT."/private/views/".$view. ".view.php"))
        {
            require(ROOT."/private/views/".$view. ".view.php");
        }else{
            require(ROOT."/private/views/404.view.php");
        }
    }

/*
* redirect method location: ROOT."/hfhj";
*/
    public function redirect($redirect){
        header("Location: ".BASE . trim($redirect, "/"));
        die;
    }

}
