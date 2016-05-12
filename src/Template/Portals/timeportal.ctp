<h1>Last Captureds</h1>
<table>
    <tr>
        <th>Id</th>
        <th>Title</th>
    </tr>

    <!-- Here is where we loop through our $posts array, printing out post info -->

    <?php foreach ($g as $time): ?>
    <tr>
        <td><?php echo $g['G']['agent']; ?></td>
        <td><?php echo "-".print_r($time); ?></td>
    </tr>
    <?php endforeach; ?>

</table>
