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

class cedGallerySliderArrow
{

    function __construct()
    {
    }

    private static function getSkinId(&$params)
    {
        $skin = explode("-", $params->get('arrow-navigator-skin', 'ta-01'))[1];

        return $skin;
    }

    public static function getMarkup(&$params)
    {
        $skin = self::getSkinId($params);
        $document = JFactory::getDocument();
        $document->addStyleSheet("media/com_cedgalleryslider/css/arrow/jssora$skin.css");
        $fromTop = round(intval($params->get('height', 456)) / 2);

        switch ($skin) {
            case '01' :
                return '<span u="arrowleft" class="jssora01l" style="width: 45px; height: 45px; top: ' . $fromTop . 'px; left: 8px;"></span>
                      <span u="arrowright" class="jssora01r" style="width: 45px; height: 45px; top: ' . $fromTop . 'px; right: 8px"><span>';
                break;
            case '02' :
                return '<span u="arrowleft" class="jssora02l" style="width: 55px; height: 55px; top: ' . $fromTop . 'px; left: 8px;"></span>
                      <span u="arrowright" class="jssora02r" style="width: 55px; height: 55px; top: ' . $fromTop . 'px; right: 8px"></span>';
                break;
            case '03' :
                return '<span u="arrowleft" class="jssora03l" style="width: 55px; height: 55px; top: ' . $fromTop . 'px; left: 8px;"></span>
                      <span u="arrowright" class="jssora03r" style="width: 55px; height: 55px; top: ' . $fromTop . 'px; right: 8px"></span>';
                break;


            default:

        }

    }

    public static function isVertical(&$params)
    {
        $skinId = self::getSkinId($params);

        return $skinId == '08';
    }

    public static function getOptions(&$params)
    {
        $chanceToShow = intval($params->get('arrow-navigator-show', 2));

        $skinId = self::getSkinId($params);
        if ($skinId == '08') {
            return '$ArrowNavigatorOptions: {
                            $Class: $JssorArrowNavigator$,
                            $AutoCenter: 1,
                            $Steps: 1,
                            $ChanceToShow: ' . $chanceToShow . ' }';
        }

        return '$ArrowNavigatorOptions: {
                            $Class: $JssorArrowNavigator$,
                            $AutoCenter: 2,
                            $Steps: 1,
                            $ChanceToShow: ' . $chanceToShow . ' }';
    }

}