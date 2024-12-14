<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
    $postfields = [
        'name' => $_POST['name'],
        'description' => $_POST['description']
    ];
    $new_shop = $openticket->post('shop', $postfields );

    if( isset( $new_shop->guid ) )
    {
        echo "<div class='alert alert-success'>New shop created! GUID: ".$new_shop->guid."</div>";
    } else {
        echo "<div class='alert alert-warning'>Error creating new shop.</div>";
        echo "<pre>";
        print_r( $new_shop );
        echo "</pre>";
    }
}
?>

<p class="opacity-75">This is an example with a form. In this case, a new shop will be created.</p>

<form method="post" action="index.php?p=example_form">
    <div class="mb-3">
        <label for="name" class="form-label">Shop name</label>
        <input type="text" class="form-control" id="name" name="name" />
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Shop Beschrijving</label>
        <input type="text" class="form-control" id="description" name="description" />
    </div>
    
    <button type="submit" class="btn btn-primary">Create shop</button>
</form>