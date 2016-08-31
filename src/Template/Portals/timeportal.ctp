<h1>Last Captured</h1>
<table>
    <tr>
        <th>Captured</th>
        <th>Agent</th>
    </tr>

    <!-- Here is where we loop through our $posts array, printing out post info -->

    <?php foreach ($g as $data): ?>
    <tr>
        <td><?php echo $data->id; ?></td>
        <td><?php echo $data->nick; ?></td>
    </tr>
    <?php endforeach; ?>

</table>
