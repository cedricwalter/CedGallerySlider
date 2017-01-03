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

defined('JPATH_PLATFORM') or die;

class JFormFieldCedGallerySliderOriginal extends JFormField
{

	protected $type = 'cedgalleryslideroriginal';
    protected $source = '';

	protected function getInput()
	{
		return '<img src="'.JUri::root().'/media/com_cedgalleryslider/images/scaling/original.jpg" >' ;
	}
}
