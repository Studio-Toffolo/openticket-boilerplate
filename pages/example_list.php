<p class="opacity-75">This is an example where you can show a list. In this case, upcoming events are shown.</p>

<table class="table">
<?php
$upcoming_events = $openticket->get( "event/upcoming" );
foreach( $upcoming_events AS $event )
{
?>
<tr>
    <td>
        <code class="opacity-25"><?php echo $event->guid; ?></code>
    </td>    
    <td>
        <strong><?php echo $event->name; ?></strong>
    </td>
    <td><?php echo $event->start; ?></td>
    <td><?php echo $event->end; ?></td>
</tr>
<?php
}
?>
</table>