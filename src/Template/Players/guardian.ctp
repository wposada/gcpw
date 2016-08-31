<h1>Last Captured</h1>
<table>
    <tr>
        <th>id</th>
        <th>Nick</th>
    </tr>

    <!-- Here is where we loop through our $posts array, printing out post info -->

    <?php foreach ($g as $data): ?>
    <tr>
        <td><?php echo $data["captura"]; ?></td>
        <td><?php echo $data["agente"]; ?></td>
    </tr>
    <?php endforeach; ?>

</table>
