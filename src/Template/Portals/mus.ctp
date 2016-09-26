<h1>Last Mus</h1>
<table>
    <tr>
        <th>Agent</th>
        <th>Mus</th>
    </tr>

    <!-- Here is where we loop through our $posts array, printing out post info -->

    <?php foreach ($g as $muus): ?>
    <tr>
        <td><?php echo $muus->agent; ?></td>
        <td><?php echo $muus->mus; ?></td>
    </tr>
    <?php endforeach; ?>

</table>
