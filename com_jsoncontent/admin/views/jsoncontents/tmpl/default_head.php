<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted Access');
?>
<tr>
	<th width="5">
    <?php echo JHTML::_( 'grid.sort', 'COM_JSONCONTENT_JSONCONTENT_HEADING_ID', 'j.id', $this->sortDirection, $this->sortColumn); ?>
	</th>
	<th width="20">
		<input type="checkbox" name="toggle" value="" onclick="checkAll(<?php echo count($this->items); ?>);" />
	</th>			
	<th>
    <?php echo JHTML::_( 'grid.sort', 'COM_JSONCONTENT_JSONCONTENT_HEADING_TITLE', 'j.title', $this->sortDirection, $this->sortColumn); ?>
	</th>
	<th>
		<?php echo JText::_('COM_JSONCONTENT_JSONCONTENT_HEADING_IMAGE'); ?>
	</th>
	<th>
    <?php echo JHTML::_( 'grid.sort', 'COM_JSONCONTENT_JSONCONTENT_HEADING_PRICE', 'j.price', $this->sortDirection, $this->sortColumn); ?>
	</th>
	<th>
		<?php echo JText::_('COM_JSONCONTENT_JSONCONTENT_HEADING_STATE'); ?>
	</th>
	<th>
		<?php echo JText::_('COM_JSONCONTENT_JSONCONTENT_HEADING_USER'); ?>
	</th>
	<th>
		<?php echo JText::_('COM_JSONCONTENT_JSONCONTENT_HEADING_CREATED'); ?>
	</th>
	<th>
		<?php echo JText::_('COM_JSONCONTENT_JSONCONTENT_HEADING_MODIFIED'); ?>
	</th>
</tr>