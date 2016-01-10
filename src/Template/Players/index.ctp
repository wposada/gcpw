<div class="users index">
	<div class="filter"><?php 
			echo $this->Html->script('jquery-2.1.0');

		echo $this->Form->create('Filter', array('url' => array('controller' => 'players','button' => 'filter','class'=>'filter')));
		echo $this->Form->input('filtering',array('url' => $base_url,'class'=>'filter','value'=>$filterPlayer,'label'=>'Filter:')); 
		echo $this->Form->end(array("label" => __('Search'), "class" => "submit small button")); ?>
	</div>
	<table cellpadding="0" cellspacing="0">
	<tr  class="row_head">
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('nick'); ?></th>
			<th><?php echo $this->Paginator->sort('guid'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	
	<?php foreach ($users as $user): ?>
	<tr>
		<td><?php echo h($player['Player']['id']); ?>&nbsp;</td>
		<td><?php echo h($player['Player']['nick']); ?>&nbsp;</td>
		<td><?php echo h($player['Player']['guid']); ?>&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<script type="text/javascript">
$(document).ready(function(){
	$('#FilterFiltering').parent().addClass('filter');
});
</script>
