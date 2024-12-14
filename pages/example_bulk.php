<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
    foreach (explode("\n", trim($_POST['ticket_guids'])) AS $guid)
    {
        $guid = trim($guid); // Delete whitespace

        if (!empty($guid))
        {
            $postfields = [
                'min_price' => $_POST['price']
            ];

            $update_ticket = $openticket->put( "ticket/".$guid, $postfields );

            if( isset( $update_ticket->guid ) )
            {
                echo "<div class='alert alert-success'>Ticket guid: ".$guid." has new price: ".$_POST['price'].".</div>";
            } else {
                echo "<div class='alert alert-warning'>Error updating ticket ".$guid."</div>";
                echo "<pre>";
                print_r( $update_ticket );
                echo "</pre>";
            }
        }
    }
}
?>

<p class="opacity-75">This is an example where you can update ticket prices using multiple ticket guids.</p>

<form method="post" action="index.php?p=example_bulk">
    <div class="mb-3">
        <label for="ticket_guids" class="form-label">Ticket GUIDs (one per line)</label>
        <textarea class="form-control" id="ticket_guids" name="ticket_guids" rows="5" placeholder="Ticket guids go here...."></textarea>
    </div>
    <div class="mb-3">
        <label for="price" class="form-label">New price (in cents)</label>
        <input type="number" class="form-control" id="price" name="price" value="1000" />
    </div>
    <button type="submit" class="btn btn-primary">Update price</button>
</form>