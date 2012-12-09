<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted Access');
?>
<?php foreach($this->items as $i => $item): ?>
	<tr class="row<?php echo $i % 2; ?>">
		<td>
			<?php echo $item->id; ?>
		</td>
		<td>
			<?php echo JHtml::_('grid.id', $i, $item->id); ?>
		</td>
		<td>
           <a href="<?php echo JRoute::_('index.php?option=com_jsoncontent&task=jsoncontent.edit&id='.$item->id);?>">
			<?php echo $item->title; ?>
           </a> 
		</td>
		<td>
        <img src="<?php echo JURI::root();?>images/joosoonmenus/<?php echo $item->imgPath; ?>" width = "150px">			
		</td>
		<td>
			<?php echo "$" .$item->price; ?>
		</td>
		<td class="center">
						<?php echo JHtml::_('jgrid.published', $item->published, $i, 'jsoncontent.', 1);?>
		</td>
		<td>
			<?php echo $item->username; ?>
		</td>
		<td>
			<?php echo $item->created; ?>
		</td>
		<td>
			<?php echo $item->modified; ?>
		</td>
	</tr>
<?php endforeach; ?>