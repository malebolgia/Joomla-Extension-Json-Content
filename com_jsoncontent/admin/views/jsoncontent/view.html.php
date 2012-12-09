<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');
 
// import Joomla view library
jimport('joomla.application.component.view');
 
/**
 * Jsoncontent View
 */
class JsoncontentViewJsoncontent extends JView
{
	/**
	 * View form
	 *
	 * @var		form
	 */
	protected $form = null;
	
	/**
	 * display method of Jsoncontent view
	 * @return void
	 */
	public function display($tpl = null) 
	{
		// get the Data
		$form = $this->get('Form');
		$item = $this->get('Item');
		$script = $this->get('Script');
 
		// Check for errors.
		if (count($errors = $this->get('Errors'))) 
		{
			JError::raiseError(500, implode('<br />', $errors));
			return false;
		}
		// Assign the Data
		$this->form = $form;
		$this->item = $item;
		$this->script = $script;
 
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
		                                                   
	    $input = JFactory::getApplication()->input;
		$input->set('hidemainmenu', true);
		$user = JFactory::getUser();
		$userId = $user->id;
		$isNew = $this->item->id == 0;
		$canDo = JsoncontentHelper::getActions($this->item->id);
		JToolBarHelper::title($isNew ? JText::_('COM_JSONCONTENT_MANAGER_JSONCONTENT_NEW')
		                             : JText::_('COM_JSONCONTENT_MANAGER_JSONCONTENT_EDIT'), 'jsoncontent');
		// Built the actions for new and existing records.
		if ($isNew) 
		{
			// For new records, check the create permission.
			if ($canDo->get('core.create')) 
			{
				JToolBarHelper::apply('jsoncontent.apply', 'JTOOLBAR_APPLY');
				JToolBarHelper::save('jsoncontent.save', 'JTOOLBAR_SAVE');
				JToolBarHelper::custom('jsoncontent.save2new', 'save-new.png', 'save-new_f2.png',
				                       'JTOOLBAR_SAVE_AND_NEW', false);
			}
			JToolBarHelper::cancel('jsoncontent.cancel', 'JTOOLBAR_CANCEL');
		}
		else
		{
			if ($canDo->get('core.edit'))
			{
				// We can save the new record
				JToolBarHelper::apply('jsoncontent.apply', 'JTOOLBAR_APPLY');
				JToolBarHelper::save('jsoncontent.save', 'JTOOLBAR_SAVE');
 
				// We can save this record, but check the create permission to see
				// if we can return to make a new one.
				if ($canDo->get('core.create')) 
				{
					JToolBarHelper::custom('jsoncontent.save2new', 'save-new.png', 'save-new_f2.png',
					                       'JTOOLBAR_SAVE_AND_NEW', false);
				}
			}
			if ($canDo->get('core.create')) 
			{
				JToolBarHelper::custom('jsoncontent.save2copy', 'save-copy.png', 'save-copy_f2.png',
				                       'JTOOLBAR_SAVE_AS_COPY', false);
			}
			JToolBarHelper::cancel('jsoncontent.cancel', 'JTOOLBAR_CLOSE');
		}                                                   
	}
	
    /**
	 * Method to set up the document properties
	 *
	 * @return void
	 */
	protected function setDocument() 
	{
		$isNew = ($this->item->id < 1);
		$document = JFactory::getDocument();
		$document->setTitle($isNew ? JText::_('COM_JSONCONTENT_JSONCONTENT_CREATING')
		                           : JText::_('COM_JSONCONTENT_JSONCONTENT_EDITING'));
		$document->addScript(JURI::root() . $this->script);
		$document->addScript(JURI::root() . "/administrator/components/com_jsoncontent"
		                                  . "/views/jsoncontent/submitbutton.js");
		JText::script('COM_JSONCONTENT_JSONCONTENT_ERROR_UNACCEPTABLE');                                                             
	}
}