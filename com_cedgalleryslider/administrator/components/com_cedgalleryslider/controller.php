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

jimport('joomla.application.component.controller');

class CedGallerySliderController extends JControllerLegacy
{
    protected $default_view = 'frontpage';

    public function display($cachable = false, $urlparams = false)
    {
        $view = JFactory::getApplication()->input->get('view');
        if (!isset($view)) {
            JFactory::getApplication()->input->set('view', 'frontpage');
        }
        return parent::display();
    }

}
