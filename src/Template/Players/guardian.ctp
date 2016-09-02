<h1>Last Captured</h1>
<table>
    <tr>
        <th>días</th>
        <th>captured</th>
        <th>agent</th>
        <th>lng</th>
        <th>lat</th>
        <th>link</th>
        
    </tr>

    <!-- Here is where we loop through our $posts array, printing out post info -->

    <?php foreach ($g as $data): ?>
    <tr>
        <td><?php 
        //echo $data["captura"];
        $hoy= new DateTime("now");
        //$dias	= (strtotime($hoy)-strtotime($data["captura"]))/86400;
	//    $dias 	= abs($dias); $dias = floor($dias);
	    echo $dias."días";
        
        ?></td>
        <td><?php echo $data["captura"]; ?></td>
        <td><?php echo $data["agente"]; ?></td>
        <td><?php echo $data["lng"]; ?></td>
        <td><?php echo $data["lat"]; ?></td>
        <td><?php echo "https://www.ingress.com/intel?ll=".$data["lat"].",".$data["lng"]."&z=17&pll=".$data["lat"].",".$data["lng"]; ?></td>
    </tr>
    <?php endforeach; ?>

</table>
