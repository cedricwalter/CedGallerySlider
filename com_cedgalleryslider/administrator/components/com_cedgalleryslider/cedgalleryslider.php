<?php
/**
 * @package     CedGallerySlider
 * @subpackage  com_cedgalleryslider
 * http://www.gnu.org/licenses/gpl-3.0.html GNU/GPL 3.0</license>
 * @copyright   Copyright (C) 2013-2016 galaxiis.com All rights reserved.
 * @license     The author and holder of the copyright of the software is Cédric Walter. The licensor and as such issuer of the license and bearer of the
 *              worldwide exclusive usage rights including the rights to reproduce, distribute and make the software available to the public
 *              in any form is Galaxiis.com
 *              see LICENSE.txt
 */

// Don't allow direct access to the module.
defined('_JEXEC') or die('Restricted access');

require_once JPATH_COMPONENT_ADMINISTRATOR.'/liveupdate/liveupdate.php';
if( JFactory::getApplication()->input->get('view','') == 'liveupdate') {
    JToolBarHelper::preferences( 'com_cedgalleryslider' );
    LiveUpdate::handleRequest();

    return;
}

jimport('joomla.application.component.controller');
require_once(JPATH_COMPONENT . '/controller.php');

$document = JFactory::getDocument();
$document->addStyleSheet(JURI::root() . '/media/com_cedgalleryslider/css/cedgalleryslider.css');

$controller = JControllerLegacy::getInstance('CedGallerySlider');
$task = JFactory::getApplication()->input->get('task', 'default', 'string');
$controller->execute($task);
$controller->redirect();
