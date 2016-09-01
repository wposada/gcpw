<h1>Last Captured</h1>
<table>
    <tr>
        <th>captured</th>
        <th>agent</th>
        <th>lng</th>
        <th>lat</th>        
        
    </tr>

    <!-- Here is where we loop through our $posts array, printing out post info -->

    <?php foreach ($g as $data): ?>
    <tr>
        <td><?php echo $data["captura"]; ?></td>
        <td><?php echo $data["agente"]; ?></td>
        <td><?php echo $data["lng"]; ?></td>
        <td><?php echo $data["lat"]; ?></td>
    </tr>
    <?php endforeach; ?>

</table>
