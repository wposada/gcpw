
<?php  
/*$options = array(
    'url' => array_merge($url, 'filtering', 'filtering'),
    'model' => $this->defaultModel);
$this->Paginator->options($options);*/
$this->Paginator->options(array(
  'convertKeys' => array('your', 'keys', 'here')
));

?>
<div class="users index">
	<div class="filter"><?php 
			echo $this->Html->script('https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js');

		//echo $this->Form->create('Filter', array('url' => array('controller' => 'players','button' => 'filter','class'=>'filter')));
		//echo $this->Form->input('filtering',array('url' => "bit2.wiil.co/gcpw",'class'=>'filter','value'=>$filterPlayer,'label'=>'Filter:')); 
		//echo $this->Form->end(array("label" => "Search", "class" => "submit small button")); 
		echo $this->Form->label('Filter:');
		echo $this->Form->create(null, ['url' => ['controller' => 'Players', 'action' => 'index']]);
		echo $this->Form->text('filtering', ['class' => 'n','value' => $filterPlayer]);
		$this->Form->button('Submit Form', ['type' => 'submit']);
		$this->Form->end();
		?>
		
		
	</div>
	<table cellpadding="0" cellspacing="0">
	<tr  class="row_head">
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('nick'); ?></th>
			<th><?php echo $this->Paginator->sort('guid'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	
	<?php foreach ($players as $player): ?>
	<tr>
		<td><?php echo h($player->id); ?>&nbsp;</td>
		<td><?php echo h($player->nick); ?>&nbsp;</td>
		<td><?php echo h($player->guid); ?>&nbsp;</td>
		<td>&nbsp;</td>
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
