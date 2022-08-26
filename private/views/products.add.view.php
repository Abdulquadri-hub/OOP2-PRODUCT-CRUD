<?php $this->view('includes/header')?>
<?php $this->view('includes/nav')?>

    <div class="container-fluid">
    <form action="" method="post" enctype="multipart/form-data">
            <div class="p-4 mx-auto shadow rounded" style="width:100%;max-width:600px;">
            <h3>Add New Product</h3>

            <!-- Errors section -->
        <?php if(count($errors) > 0): ?>
        <div class="alert alert-warning alert-dismissible fade show p-2" role="alert">
        <strong>Errors</strong>
        <?php foreach($errors as $error):?>
        <br> <?=$error?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        <?php endforeach; ?>
        </div>
        <?php endif; ?>


        <div class="form-group mb-2">
            <label>Product Image</label>
            <br>
            <input type="file" value="" name="image">
        </div>

        <div class="form-group mb-2">
            <input type="text" name="title" class="form-control" value="<?=get_val("title")?>" placeholder="Product Title">
        </div>

        <div class="form-group mb-2">
            <input type="number" name="price" class="form-control" value="<?=get_val("price")?>" placeholder="Product Price">
        </div>

        <div class="form-group mb-2">
            <textarea class="form-control" name="description" placeholder="Product Description"><?=get_val("description")?></textarea>
        </div>

        <!-- buttons -->
        <input class="btn btn-primary float-end" name="" type="submit" value="Create">

        <a href="<?=BASE?>products">
        <input class="btn btn-secondary text-white" type="button" value="Go Back">
        </a>
    </div>
    </form>
    </div>

    </div>

<?php $this->view('includes/footer')?>