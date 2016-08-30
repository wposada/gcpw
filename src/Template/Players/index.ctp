<?php  
$this->Paginator->options(array('url' => array("?"=>array("filtering"=>$_f))));
?>
<div class="users index">
	<div class="filter"><?php 
			echo $this->Html->script('https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js');
		//echo $this->Form->create('Filter', array('url' => array('controller' => 'players','button' => 'filter','class'=>'filter')));
		//echo $this->Form->input('filtering',array('url' => "bit2.wiil.co/gcpw",'class'=>'filter','value'=>$filterPlayer,'label'=>'Filter:')); 
		//echo $this->Form->end(array("label" => "Search", "class" => "submit small button")); 
		echo $this->Form->label('Filter:');
		echo $this->Form->create(null, ['url' => ['controller' => 'Players', 'action' => 'index']]);
		echo $this->Form->text('filtering', ['class' => 'n','value' => $_f]);
		echo $this->Form->button('Submit Form', ['type' => 'submit']);
		$this->Form->end();
		?>
		
		
	</div>
	<table cellpadding="0" cellspacing="0">
	<tr  class="row_head">
	
			<th><?php echo $this->Paginator->sort('id', 'ID'); ?></th>
			<th><?php echo $this->Paginator->sort('nick', 'nick'); ?></th>
			<th><?php echo "";//$this->Paginator->sort('address', 'Address'); ?></th>
			<th><?php echo "";//$this->Paginator->sort('agent', 'Agent'); ?></th>
			<th><?php echo "";//$this->Paginator->sort('lng', 'Lng'); ?></th>
			<th><?php echo "";//$this->Paginator->sort('lat', 'Lat'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	
	<?php foreach ($players as $player): ?>
	<tr>
		<td><?php echo h($player->id); ?>&nbsp;</td>
		<td><?php echo h($player->nick); ?>&nbsp;</td>
		<td><?php //echo h($portal->address); ?>&nbsp;</td>
		<td><?php //echo h($portal->agent); ?>&nbsp;</td>
		<td><?php //echo h($portal->lng); ?>&nbsp;</td>
		<td><?php //echo h($portal->lat); ?>&nbsp;</td>		
		<td><?php echo "p";//$this->Html->link('link', "https://www.ingress.com/intel?ll=".$portal->lat.",".$portal->lng."&z=17&pll=".$portal->lat.",".$portal->lng,array('target' => '_blank'));?></td>
	</tr>
<?php endforeach; ?>
	</table>
	<div class="paging">
	<?php
	
		echo $this->Paginator->prev('< ' . __('ant'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('sig') . ' >', array(), null, array('class' => 'next disabled'));
		echo $this->Paginator->counter(
    'Page {{page}} of {{pages}}, showing {{current}} records out of
     {{count}} total, starting on record {{start}}, ending on {{end}}'
);
	?>
	</div>
</div>
<script type="text/javascript">
$(document).ready(function(){
	$('#FilterFiltering').parent().addClass('filter');
});
</script>
