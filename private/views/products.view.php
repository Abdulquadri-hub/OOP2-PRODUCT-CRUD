<?php $this->view('includes/header')?>
<?php $this->view('includes/nav')?>
    <div class="container-fluid shadow" style="max-width: 1000px;">
    <h1>Products CRUD</h1>

<p>
    <a href="products/add">
        <button class="btn btn-success">Create Product</button>
    </a>
</p>
<?php if($rows): ?>
<form action="" method="post">
<div class="input-group">
<input type="text" class="form-control" placeholder="Search for products" value="" name="search">
<div class="input-group-append">
    <button class="btn btn-outline-secondary" type="submit" >Search</button>
</div>
</div>
</form>
<table class="table">
<thead>
<tr>
<th scope="col">#</th>
<th scope="col">Image</th>
<th scope="col">Title</th>
<th scope="col">Price</th>
<th scope="col">Created_at</th>
<th scope="col">Action</th>
</tr>
</thead>
<?php foreach($rows as $key => $row):?>
<tbody>
<tr>
    <th scope="row"><?= $key + 1?></th>
    <td>
        <img src="<?=esc($row->image)?>" style="width:50px;" alt="image">
    </td>
    <td><?=esc($row->title)?></td>
    <td><?=esc($row->price)?></td>
    <td><?=get_date($row->date)?></td>
<td>
<a href="<?=BASE?>products/edit/<?=$row->id?>">
    <button class="btn btn-sm btn-outline-secondary">Edit</button>
</a>

<a href="<?=BASE?>products/delete/<?=$row->id?>">
    <button type="submit" name="delete" class="btn btn-sm btn-outline-danger">Delete</button>
</a>

</td>
</tr>
</tbody>
<?php endforeach; ?>
</table>
<?php else:?>
    <h5 class="text-center">NO PRODUCT FOUND !</h5>
<?php endif;?>

    </div>

<?php $this->view('includes/footer')?>
