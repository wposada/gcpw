<h1>Last Mus</h1>
<?php print_r($g->sum); ?>
<table>
    <tr>
        <th>sum</th>
        <th>agent</th>
    </tr>

    <!-- Here is where we loop through our $posts array, printing out post info -->

    <?php foreach ($g as $muus): ?>
    <tr>
        <td><?php ($muus);//echo $muus->sum; ?></td>
        <td><?php //echo $muus->sum; ?></td>
    </tr>
    <?php endforeach; ?>

</table>
