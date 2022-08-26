<?php
/*
* Products Model
*/

class Product extends Model
{
    // validation
    public function validation($DATA)
    {
        $this->errors = [];

        if (empty($DATA['title']) || !preg_match("/^[a-zA-z ]+$/", $DATA['title'])) 
        {
            $this->errors['title'] = "Title cannot be empty";
        }

        if (empty($DATA['description']) || !preg_match("/^[a-zA-z ]+$/", $DATA['description'])) 
        {
            $this->errors['description'] = "description cannot be empty";
        }

        // create product
        if (count($this->errors) === 0) 
        {
            return true;
        }
        return false;
    }

}