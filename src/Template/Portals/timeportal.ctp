<h1>Last Captured</h1>
<table>
    <tr>
        <th>Captured</th>
        <th>Agent</th>
    </tr>

    <!-- Here is where we loop through our $posts array, printing out post info -->

    <?php foreach ($g as $time): ?>
    <tr>
        <td><?php echo date("Y/m/d H:i:s",$time->captured/1000); ?></td>
        <td><?php echo $time->agent; ?></td>
    </tr>
    <?php endforeach; ?>

</table>
