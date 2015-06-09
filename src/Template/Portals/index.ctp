<!-- File: /src/Template/Portals/index.ctp -->

<h1>Portales</h1>
<table>
    <tr>
        <th>name</th>
        <th>Created</th>
        <th>faction</th>
        <th>agent</th>
        <th>guid</th>
    </tr>

    <!-- Aquí es donde iteramos nuestro objeto de consulta $articles, mostrando en pantalla la información del artículo -->

    <?php foreach ($portals as $portal): ?>
    <tr>
       
        <td>
            <?= $this->Html->link($portal->name,
            ['controller' => 'Portals', 'action' => 'view', $portal->guid]) ?>
        </td>
         <td><?= $portal->agent ?></td>
        <td><?= $portal->date->format(DATE_RFC850) ?></td>
        <td><?= $portal->faction ?></td>
        <td><?= $portal->guid ?></td>
    </tr>
    <?php endforeach; ?>
</table>
