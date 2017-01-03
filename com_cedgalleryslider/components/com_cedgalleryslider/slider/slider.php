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

class cedGallerySliderSlider
{

    function __construct()
    {
    }

    private static function getThumbnailsSkinId(&$params)
    {
        $skin = explode("-", $params->get('thumbnail-navigator-skin', 'tt-01'))[1];

        return $skin;
    }

    public static function getMarkup(&$params)
    {
        $skin = self::getThumbnailsSkinId($params);
        $document = JFactory::getDocument();
        $document->addStyleSheet("media/com_cedgalleryslider/css/jssort$skin.css");

        $html = "";
        $width = intval($params->get('width', 800));
        $height = intval($params->get('height', 456));

        if ($skin == '01') {
            $html .= '<div u="thumbnavigator" class="jssort01" style="position: absolute; width: ' . $width . 'px; height: ' . ($height / 4) . 'px; left:0px; bottom: 0px;">
                            <div u="slides" style="cursor: move;">
                                <div u="prototype" class="p" style="position: absolute; width: 72px; height: 72px; top: 0; left: 0;">
                                    <div class=w><thumbnailtemplate style="width: 100%; height: 100%; border: none;position:absolute; top: 0; left: 0;"></thumbnailtemplate></div>
                                    <div class=c>
                                    </div>
                                </div>
                            </div>
                        </div>';
        }
        if ($skin == '02') {
            $html .= '<div u="thumbnavigator" class="jssort02" style="position: absolute; width: ' . ($width / 4) . 'px; height: ' . $height . 'px; left:0px; bottom: 0px;">
                            <div u="slides" style="cursor: move;">
                                <div u="prototype" class="p" style="position: absolute; width: 99px; height: 66px; top: 0; left: 0;">
                                    <div class=w><thumbnailtemplate style=" width: 100%; height: 100%; border: none;position:absolute; top: 0; left: 0;"></thumbnailtemplate></div>
                                    <div class=c>
                                    </div>
                                </div>
                            </div>
                        </div>';

        }
        if ($skin == '03') {
            $html .= '<div u="thumbnavigator" class="jssort03" style="position: absolute; width: ' . $width . 'px; height: 60px; left:0px; bottom: 0px;">
                        <div style=" background-color: #000; filter:alpha(opacity=30); opacity:.3; width: 100%; height:100%;"></div>
                        <div u="slides" style="cursor: move;">
                            <div u="prototype" class="p" style="POSITION: absolute; WIDTH: 62px; HEIGHT: 32px; TOP: 0; LEFT: 0;">
                                <div class=w><ThumbnailTemplate style=" WIDTH: 100%; HEIGHT: 100%; border: none;position:absolute; TOP: 0; LEFT: 0;"></ThumbnailTemplate></div>
                                <div class=c style="POSITION: absolute; BACKGROUND-COLOR: #000; TOP: 0; LEFT: 0">
                                </div>
                            </div>
                        </div>
                    </div>';

        }

        return $html;
    }


    public static function getSliderStyle(&$params)
    {
        $skin = self::getThumbnailsSkinId($params);
        $width = intval($params->get('width', 800));
        $height = intval($params->get('height', 456));

        if ($skin == '01') {
            return 'position: relative; top: 0px; left: 0px; width: ' . $width . 'px;height: ' . $height . 'px; background: #24262e; overflow: hidden;';
        }
        if ($skin == '02') {
            return 'position: relative; padding: 0px; margin: 0 auto; top: 0px; left: 0px; width: ' . $width . 'px;height: ' . $height . 'px; background: #24262e;';
        }
        if ($skin == '03') {
            return 'position: relative; top: 0px; left: 0px; width: ' . $width . 'px;height: ' . $height . 'px;';
        }

        return $skin;
    }

    public static function getContainerStyle(&$params)
    {
        $skin = self::getThumbnailsSkinId($params);
        $width = round(intval($params->get('width', 800)));
        $height = round(intval($params->get('height', 456)));

        if ($skin == '01') {
            return 'cursor: move; position: absolute; left: 0px; top: 0px; width: ' . $width . 'px; height: ' . $height . 'px; overflow: hidden;';
        }
        if ($skin == '02') {
            return 'cursor: move; position: absolute; left: 240px; top: 0px; width: ' . ($width -240) . 'px; height: ' . $height . 'px; overflow: hidden;';
        }
        if ($skin == '03') {
            return 'cursor: move; position: absolute; left: 0px; top: 0px; width: ' . $width . 'px; height: ' . $height . 'px; overflow: hidden;';
        }

        return $skin;
    }

}