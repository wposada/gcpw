<h1>Last Captureds</h1>
<table>
    <tr>
        <th>Id</th>
        <th>Title</th>
        <th>Created</th>
    </tr>

    <!-- Here is where we loop through our $posts array, printing out post info -->

    <?php foreach ($g as $time): ?>
    <tr>
        <td><?php echo $time['g']['agent']; ?></td>
        <td><?php echo $time['g']['captured']; ?></td>
    </tr>
    <?php endforeach; ?>

</table>
