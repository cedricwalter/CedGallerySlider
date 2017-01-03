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

class cedGallerySliderBullet
{

    function __construct()
    {
    }

    private static function getSkinId(&$params)
    {
        $skin = explode("-", $params->get('bullet-navigator-skin', 'tb-01'))[1];

        return $skin;
    }

    public static function getMarkup(&$params)
    {
        $skin = self::getSkinId($params);
        $document = JFactory::getDocument();
        $document->addStyleSheet("media/com_cedgalleryslider/css/bullet/jssorb$skin.css");

        if ($skin == '01') {
           return  '<div u="navigator" class="jssorb01" style="position: absolute; bottom: 16px; right: 10px;">
                        <div u="prototype" style="POSITION: absolute; WIDTH: 12px; HEIGHT: 12px;"></div>
                      </div>';
        }

    }

    public static function getOptions(&$params)
    {
        $skin = self::getSkinId($params);
        $chanceToShow = intval($params->get('bullet-navigator-show', 2));

        if ($skin == '21' || $skin == '20' || $skin == '03') {
            return '$BulletNavigatorOptions: {
                    $Class: $JssorBulletNavigator$,
                    $ChanceToShow: '.$chanceToShow.',
                    $AutoCenter: 1,
                    $Steps: 1,
                    $Lanes: 1,
                    $SpacingX: 8,
                    $SpacingY: 8,
                    $Orientation: 1
                }';
        }

        return '$BulletNavigatorOptions: {
                    $Class: $JssorBulletNavigator$,
                    $ChanceToShow: '.$chanceToShow.',
                    $AutoCenter: 1,
                    $Steps: 1,
                    $Lanes: 1,
                    $SpacingX: 10,
                    $SpacingY: 10,
                    $Orientation: 1
                }';
    }

}