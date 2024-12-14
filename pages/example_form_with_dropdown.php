<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
    $postfields = [
        'name' => $_POST['name'],
        'description' => $_POST['description'],
        'locale' => 'nl_NL',
        'currency' => 'EUR'
    ];

    $new_event = $openticket->post("location/" . $_POST['location']."/event", $postfields );
    
    if( isset( $new_event->guid ) )
    {
        echo "<div class='alert alert-success'>New event created! GUID: ".$new_event->guid."</div>";
    } else {
        echo "<div class='alert alert-warning'>Error creating new event.</div>";
        echo "<pre>";
        print_r( $new_event );
        echo "</pre>";
    }
}
?>

<p class="opacity-75">This is an example with a form and a dropdown. In this case, a new event will be created in a location you select.</p>

<form method="post" action="index.php?p=example_form_with_dropdown">
    <div class="mb-3">
        <label for="name" class="form-label">Event name</label>
        <input type="text" class="form-control" id="name" name="name" />
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <input type="text" class="form-control" id="description" name="description" />
    </div>
    <div class="mb-3">
        <label for="location" class="form-label">Event location</label>
        <select class="form-select" name="location">
        <?php
        $locations = $openticket->get("location" );
        foreach( $locations AS $location )
        {
            echo "<option value='".$location->guid."'>".$location->name."</option>";
        }
        ?>
        </select>
    </div>
    
    <button type="submit" class="btn btn-primary">Create event</button>
</form>