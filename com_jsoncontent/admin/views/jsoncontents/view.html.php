<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');
 
// import Joomla view library
jimport('joomla.application.component.view');
 
/**
 * Jsoncontents View
 */
class JsoncontentViewJsoncontents extends JView
{
	/**
	 * Ramens/Servings view display method
	 * @return void
	 */
	function display($tpl = null) 
	{
		// Get data from the model
		$state	= $this->get('State');
		$items = $this->get('Items');
		$pagination = $this->get('Pagination');
         
		// Check for errors.
		if (count($errors = $this->get('Errors'))) 
		{
			JError::raiseError(500, implode('<br />', $errors));
			return false;
		}
		// Assign data to the view
		$this->items = $items;
		$this->pagination = $pagination;
		$this->state = $state;
		
		//Sort Ordering
		$this->sortDirection = $state->get('filter_order_Dir');
        $this->sortColumn = $state->get('filter_order');
		
		// Levels filter.
		$options	= array();
		$options[]	= JHtml::_('select.option', '1', JText::_('J1'));
		$options[]	= JHtml::_('select.option', '2', JText::_('J2'));
		$options[]	= JHtml::_('select.option', '3', JText::_('J3'));
		$options[]	= JHtml::_('select.option', '4', JText::_('J4'));
		$options[]	= JHtml::_('select.option', '5', JText::_('J5'));
		$options[]	= JHtml::_('select.option', '6', JText::_('J6'));
		$options[]	= JHtml::_('select.option', '7', JText::_('J7'));
		$options[]	= JHtml::_('select.option', '8', JText::_('J8'));
		$options[]	= JHtml::_('select.option', '9', JText::_('J9'));
		$options[]	= JHtml::_('select.option', '10', JText::_('J10'));

		$this->f_levels = $options;
		
		// Set the toolbar
		$this->addToolBar();
 
		// Display the template
		parent::display($tpl);
		
		// Set the document
		$this->setDocument();
	}
	
   /**
	 * Setting the toolbar
	 */
	protected function addToolBar() 
	{		
	    $canDo = JsoncontentHelper::getActions();
		JToolBarHelper::title(JText::_('COM_JSONCONTENT_MANAGER_JSONCONTENT'), 'jsoncontent');
		if ($canDo->get('core.create')) 
		{
			JToolBarHelper::addNew('jsoncontent.add', 'JTOOLBAR_NEW');
		}
		if ($canDo->get('core.edit')) 
		{
			JToolBarHelper::editList('jsoncontent.edit', 'JTOOLBAR_EDIT');
		}
		if ($canDo->get('core.delete')) 
		{
			JToolBarHelper::deleteList('', 'jsoncontents.delete', 'JTOOLBAR_DELETE');
		}
		if ($canDo->get('core.admin')) 
		{
			JToolBarHelper::divider();
			JToolBarHelper::preferences('com_jsoncontent');
		}
		
		    JToolBarHelper::publish('jsoncontents.publish', 'JTOOLBAR_PUBLISH', true);
			JToolBarHelper::unpublish('jsoncontents.unpublish', 'JTOOLBAR_UNPUBLISH', true);
			JToolBarHelper::divider();
			JToolBarHelper::archiveList('jsoncontents.archive');
	}
	
/**
	 * Method to set up the document properties
	 *
	 * @return void
	 */
	protected function setDocument() 
	{
		$document = JFactory::getDocument();
		$document->setTitle(JText::_('COM_JSONCONTENT_ADMINISTRATION'));
	}
}