<?php

/*
* Products controller class 
*/

class Products extends Controller 
{
    public function index($id = null)
    {
        $product = new Product();
        
        $rows = $product->findAll();

        $this->view("products",[
            'rows'=>$rows,
        ]);
    }

/*
* add method 
*/
    public function add($id = null)
    {
        $errors = [];

        if (isset($_FILES['image']) && count($_POST) > 0)
        {

            $product = new Product();

            if ($product->validation($_POST)) 
            {
                $destination = "";
                $image_name = $_FILES['image']['name'];
                $image_error = $_FILES['image']['error'];
                $image_tmp = $_FILES['image']['tmp_name'];
        
                if ($image_name && $image_error == 0) 
                {
                    $folder = "images/";
                    if (!is_dir($folder)) 
                    {
                        mkdir($folder,0777,true);
                    }
                    $destination = $folder . randomString(8) . "/" . $image_name;
                    mkdir(dirname($destination));
                    move_uploaded_file($image_tmp, $destination);
                }

                    $arr['title'] = esc($_POST['title']);
                    $arr['description'] = esc($_POST['description']);
                    $arr['price'] = $_POST['price'];
                    $arr['image'] = $destination;
                    $product->insert($arr);
                    $this->redirect("products");

            }else {
                $errors = $product->errors;
            }
        }

        $this->view("products.add",[
            'errors'=>$errors
        ]);
    }

/*
* upload method 
*/
    public function edit($id = null)
    {
        $errors = [];

        $product = new Product();

        if ($product->validation($_POST)) 
        {
            $destination = "";
            $image_name = $_FILES['image']['name'];
            $image_error = $_FILES['image']['error'];
            $image_tmp = $_FILES['image']['tmp_name'];
    
            if ($image_name && $image_error == 0) 
            {
                $folder = "images/";
                if (!is_dir($folder)) 
                {
                    mkdir($folder,0777,true);
                }
                $destination = $folder . randomString(8) . "/" . $image_name;
                mkdir(dirname($destination));
                move_uploaded_file($image_tmp, $destination);
            }

                $arr['title'] = esc($_POST['title']);
                $arr['description'] = esc($_POST['description']);
                $arr['price'] = $_POST['price'];
                $arr['image'] = $destination;
                $product->update($id, $arr);
                $this->redirect("products");
        }else {
            $errors = $product->errors;
        }

        $product = $product->where('id',$id);

        $this->view("products.edit", ['errors'=>$errors, 'product'=>$product]);
    }

/*
* delete method 
*/
    public function delete($id = null)
    {
        $product = new Product();

        if (count($_POST) > 0)
        {
            $product->delete($id);
            $this->redirect('products');  
        }

        $productId = $product->where('id',$id);
        
        $this->view("products.delete", ['product'=>$productId]);
    }
}
