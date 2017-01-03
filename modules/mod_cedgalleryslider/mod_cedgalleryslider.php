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

require_once(JPATH_SITE . '/components/com_cedgalleryslider/slider/renderer.php');
require_once(JPATH_SITE . '/components/com_cedgalleryslider/slider/model.php');

$moduleclass_sfx = htmlspecialchars($params->get('moduleclass_sfx'));
$uuid = uniqid();

$backLink = $params->get('backlink', true);

$cachePath = "cache/CedGallerySliderModule-" . str_replace(" ", "-",JFile::makeSafe($module->title));

$model = new cedGallerySliderModel($params, $cachePath);

$models = $model->getModel();

$html = cedGallerySliderRenderer::render($params, $models);

$module->content = $html;

require JModuleHelper::getLayoutPath('mod_cedgalleryslider', $params->get('layout', 'default'));