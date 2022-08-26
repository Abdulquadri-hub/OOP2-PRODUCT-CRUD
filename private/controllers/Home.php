<?php

/*
* Home controller class 
*/

class Home extends Controller 
{
    public function index($id = null)
    {
        $product = new Product();
        
        $this->view("home");
    }
}
