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

require_once(dirname(__FILE__) .'/navigator.php');
require_once(dirname(__FILE__) .'/arrow.php');
require_once(dirname(__FILE__) .'/bullet.php');
require_once(dirname(__FILE__) .'/transition.php');
require_once(dirname(__FILE__) .'/loading.php');


class cedGallerySliderRenderer
{

    public static function render(&$params, $models)
    {
        self::addLibrary();

        $uuid = uniqid();
        $displayCaption = $params->get('display-caption' , 0);

        $html = "<div id=\"slider-$uuid\" style=\"".cedGallerySliderNavigator::getContainerStyle($params)."\">";
        $html .= "<!-- Copyright (C) 2013-2016 galaxiis.com All rights reserved. -->";
        $html .= cedGallerySliderLoading::getMarkup($params);
        $html .= "<div u=\"slides\" style=\"".cedGallerySliderNavigator::getSliderStyle($params)."\">";
        foreach ($models as $model) {
            $caption = $displayCaption ? $model->caption : '';

            $html .= "<div>
             <img u=\"image\" src=\"$model->originalFileRoot\" title=\"$model->title\" />
             <img u=\"thumb\" src=\"$model->thumbnailsRoot\" />
             <div u=\"thumb\">$caption</div>
             </div>";
        }
        $html .= "</div>";

        if ($params->get('arrow-navigator', 1)) {
            $html .= cedGallerySliderArrow::getMarkup($params);
        }

        $useBullet = $params->get('bullet-navigator', 0);
        $useNavigator = $params->get('thumbnail-navigator', 1);

        //bullet have higher prority than navigator
        if ($useBullet && $useNavigator || $useBullet) {
            $html .= cedGallerySliderBullet::getMarkup($params);
        }  else if ($useNavigator) {
            $html .= cedGallerySliderNavigator::getMarkup($params);
        }
        $html .= "</div>";

        $options = self::getOptions($params);

        $responsive = intval($params->get('responsive', 0));
        $responsiveCode = '';
        if (false) {
            $responsiveCode = '
            function ScaleSlider() {
                var parentWidth = jssor_slider1.$Elmt.parentNode.clientWidth;
                if (parentWidth)
                    jssor_slider1.$SetScaleWidth(Math.min(parentWidth, 600));
                else
                    window.setTimeout(ScaleSlider, 30);
            }


            ScaleSlider();

            if (!navigator.userAgent.match(/(iPhone|iPod|iPad|BlackBerry|IEMobile)/)) {
                $(window).bind("resize", ScaleSlider);
            }

                        ';
        }

        $transition = cedGallerySliderTransition::getVariable($params);

        $document = JFactory::getDocument();
        $document->addScriptDeclaration("
                    jQuery(document).ready(function ($) {
                        ".$transition."
                        var options = {
                        " . implode(",", $options) . "
                        };
                        var jssor_slider1 = new \$JssorSlider\$(\"slider-$uuid\", options);
                        '.$responsiveCode.'
                    });");

        return $html;
    }

    private static function addLibrary()
    {
        $document = JFactory::getDocument();
        $document->addScript(JUri::root() . "media/com_cedgalleryslider/js/jssor.slider.mini.js");
    }

    private static function getOptions(&$params)
    {
        $options = array();

        if ($params->get('autoplay', 1)) {
            $options[] = '$AutoPlay: true';
        }
        if ($params->get('pause-on-hover', 0)) {
            $options[] = '$PauseOnHover: ' . $params->get('pause-on-hover', 0);
        }
        if ($params->get('fill-mode', 0)) {
            $options[] = '$FillMode: ' . $params->get('fill-mode', 0);
        }
        if ($params->get('lazy-loading', 1)) {
            $options[] = '$LazyLoading: ' . $params->get('lazy-loading', 1);
        }

        $options[] = '$SlideDuration: '.intval($params->get('slideduration', 500));

        if (cedGallerySliderArrow::isVertical($params)) {
            $options[] = '$PlayOrientation: 2';
            $options[] = '$DragOrientation: 2';
        }

        $options[] = '$SlideSpacing: 0';
        $options[] = '$ShowLink: false';

        //Best Performance Slider
        $options[] = '$SlideWidth: '. cedGallerySliderNavigator::getCalculatedWidth($params);
        $options[] = '$SlideHeight: '. cedGallerySliderNavigator::getCalculatedHeight($params);

        $transition = cedGallerySliderTransition::getOptions($params);
        if (strlen($transition) > 0) {
            $options[] = $transition;
        }

        $useBullet = $params->get('bullet-navigator', 0);
        $useNavigator = $params->get('thumbnail-navigator', 1);
        if ($useBullet && $useNavigator || $useBullet) {
            $options[] = cedGallerySliderBullet::getOptions($params);
        }  else if ($useNavigator) {
            $options[] = cedGallerySliderNavigator::getOptions($params);
        } else {
            $options[] = cedGallerySliderBullet::getOptions($params);
        }

        if ($params->get('arrow-navigator', 1)) {
            $options[] = cedGallerySliderArrow::getOptions($params);
        }

        return $options;
    }


}