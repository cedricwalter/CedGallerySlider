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

class cedGallerySliderNavigator
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
        $document->addStyleSheet("media/com_cedgalleryslider/css/navigator/jssort$skin.css");

        $html = "";
        $width = intval($params->get('width', 800));
        $height = intval($params->get('height', 456));

        if ($skin == '01') {
            $html .= '<div u="thumbnavigator" class="jssort01" style="position: absolute; width: ' . $width . 'px; height: 100px; left:0px; bottom: 0px;">
                            <div u="slides" style="cursor: move;">
                                <div u="prototype" class="p" style="position: absolute; width: 72px; height: 72px; top: 0; left: 0;">
                                    <div class=w><thumbnailtemplate style="width: 100%; height: 100%; border: none;position:absolute; top: 0; left: 0;"></thumbnailtemplate></div>
                                    <div class=c>
                                    </div>
                                </div>
                            </div>
                        </div>';
        }
        if ($skin == '02') { //TODO why top:50px
            $html .= '<div u="thumbnavigator" class="jssort02" style="position: absolute; width: 240px; height: ' . $height . 'px; left:0px; bottom: 0px; top: 50px;">
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
        if ($skin == '04') {
            $html .= '<div u="thumbnavigator" class="jssort04" style="position: absolute; width: ' . ($width - 200) . 'px; height: 60px; right:0px; bottom: 0px;">
                          <div u="slides" style="bottom: 25px; right: 30px;">
                            <div u="prototype" class="p" style="POSITION: absolute; WIDTH: 62px; HEIGHT: 32px; TOP: 0; LEFT: 0;">
                                <div class=w><ThumbnailTemplate style=" WIDTH: 100%; HEIGHT: 100%; border: none;position:absolute; TOP: 0; LEFT: 0;"></ThumbnailTemplate></div>
                                <div class=c style="POSITION: absolute; BACKGROUND-COLOR: #000; TOP: 0; LEFT: 0">
                                </div>
                            </div>
                          </div>
                      </div>';

        }
        if ($skin == '05') {
            $html .= '<div u="thumbnavigator" class="jssort05" style="position: absolute; width: ' . $width . 'px; height: 100px; left:0px; bottom: 0px;">
                                <div u="slides" style="cursor: move;">
                                    <div u="prototype" class="p" style="position: absolute; width: 72px; height: 72px; top: 0; left: 0;">
                                        <div class="o" style="position:absolute;top:1px;left:1px;width:72px;height:72px;overflow:hidden;">
                                            <ThumbnailTemplate class="b" style="width:72px;height:72px; border: none;position:absolute; TOP: 0; LEFT: 0;"></ThumbnailTemplate>
                                            <div class="i"></div>
                                            <ThumbnailTemplate class="f" style="width:72px;height:72px;border: none;position:absolute; TOP: 0; LEFT: 0;"></ThumbnailTemplate>
                                        </div>
                                    </div>
                                </div>
                     </div>';

        }
        if ($skin == '06') { //TODO why top:50px
            $html .= '<div u="thumbnavigator" class="jssort06" style="position: absolute; width: 240px; height: ' . $height . 'px; right:0px; bottom: 0px; top: 50px;">
                        <div u="slides" style="cursor: move;">
                            <div u="prototype" class="p" style="position: absolute; width: 99px; height: 66px; top: 0; left: 0;">
                                <div class="o" style="position:absolute;top:0px;left:0px;width:99px;height:66px;overflow:hidden;">
                                    <thumbnailtemplate class="b" style="width:99px;height:66px; border: none;position:absolute; top: 0; left: 0;"></thumbnailtemplate>
                                    <div class="i"></div>
                                    <thumbnailtemplate class="f" style="width:99px;height:66px;border: none;position:absolute; top: 0; left: 0;"></thumbnailtemplate>
                                </div>
                            </div>
                        </div>
                      </div>';
        }
        if ($skin == '07') {
            $html .= '<div u="thumbnavigator" class="jssort07" style="position: absolute; width: ' . $width . 'px; height: 100px; left:0px; bottom: 0px;">
                        <div u="slides" style="cursor: move;">
                            <div u="prototype" class="p" style="POSITION: absolute; WIDTH: 72px; HEIGHT: 72px; TOP: 0; LEFT: 0;">
                                <ThumbnailTemplate class="i" style="position:absolute;"></ThumbnailTemplate>
                                <div class="o">
                                </div>
                            </div>
                        </div>
                      </div>';
        }
        if ($skin == '08') {
            $html .= '<div u="thumbnavigator" class="jssort08" style="position: absolute; width: ' . ($width - 360) . 'px; height: 100px; left: 180px; bottom: 0px;">
                        <div u="slides" style="cursor: move;">
                            <div u="prototype" class="p" style="position: absolute; width: 50px; height: 50px; top: 0; left: 0;">
                                <thumbnailtemplate class="i" style="position:absolute;"></thumbnailtemplate>
                                <div class="o">
                                </div>
                            </div>
                        </div>
                      </div>';
        }

        return $html;
    }


    public static function getContainerStyle(&$params)
    {
        $skin = self::getThumbnailsSkinId($params);
        $width = intval($params->get('width', 800));
        $height = intval($params->get('height', 456));

        if ($skin == '01') {
            $color = $params->get('background-color', '#24262e');

            return 'position: relative; top: 0px; left: 0px; width: ' . $width . 'px;height: ' . $height . 'px; background: ' . $color . '; overflow: hidden;';
        }
        if ($skin == '02' || $skin == '05' || $skin == '06' || $skin == '07' || $skin == '08') {
            $color = $params->get('background-color', '#24262e');

            return 'position: relative; padding: 0px; margin: 0 auto; top: 0px; left: 0px; width: ' . $width . 'px;height: ' . $height . 'px; background: ' . $color . ';';
        }
        if ($skin == '03') {
            return 'position: relative; top: 0px; left: 0px; width: ' . $width . 'px;height: ' . $height . 'px;';
        }
        if ($skin == '04') {
            return 'position: relative; margin: 0 auto; top: 0px; left: 0px; width: ' . $width . 'px; height: ' . $height . 'px;';
        }

        return $skin;
    }

    public static function getSliderStyle(&$params)
    {
        return 'cursor: move; position: absolute; left: 0px; top: 0px; width: ' . self::getCalculatedWidth($params) . 'px; height: ' . self::getCalculatedHeight($params) . 'px; overflow: hidden;';
    }

    public static function getCalculatedWidth($params) {
        $skin = self::getThumbnailsSkinId($params);
        $width = intval($params->get('width', 800));

        if ($skin == '02' || $skin == '06') {
            return ($width - 240);
        }

        if ($skin == '08') {
            return ($width - 360);
        }

        return $width;
    }

    public static function getCalculatedHeight($params) {
        $skin = self::getThumbnailsSkinId($params);
        $height = intval($params->get('height', 456));
        $useNavigator = $params->get('thumbnail-navigator', 1);

        if ($skin == '01' || $skin == '05' || $skin == '07') {
            $itsHeight = $useNavigator ? ($height - 100) : $height;
            return $itsHeight;
        }
        if ($skin == '08') {
            return $height - 150;
        }

        return $height;
    }

    public static function getOptions(&$params)
    {
        $skin = self::getThumbnailsSkinId($params);
        $chanceToShow = intval($params->get('thumbnail-navigator-show', 2));
        $displayPieces = intval($params->get('thumbnail-navigator-displayPieces', 10));
        $actionMode = intval($params->get('thumbnail-navigator-action', 3));

        $some = "";
        //see http://www.jssor.com/development/reference-options.html#thumbnailNavigatorOptions

        //TODO action mode display pieces fct of size?
        if ($skin == '01') {
            $some = '$SpacingX: 8,$ParkingPosition: 360';
        }
        if ($skin == '02') {
            $some = '$Lanes: 2,$SpacingX: 14,$SpacingY: 12,$ParkingPosition: 156,$Orientation: 2';
        }
        if ($skin == '03') {
            $some = '$AutoCenter: 3,$Lanes: 1,$SpacingX: 3,$SpacingY: 3,$DisplayPieces: 9,$ParkingPosition: 260,$Orientation: 1,$DisableDrag: false';
        }
        if ($skin == '04') {
            $some = '$AutoCenter: 0,$Lanes: 1,$SpacingX: 3,$SpacingY: 3,$ParkingPosition: 260,$Orientation: 1,$DisableDrag: false';
        }
        if ($skin == '05') {
            $some = '$SpacingX: 8,$ParkingPosition: 360';
        }
        if ($skin == '06') {
            $some = '$Lanes: 2,$SpacingX: 14,$SpacingY: 12,$ParkingPosition: 156,$Orientation: 2';
        }
        if ($skin == '07') {
            $some = '$SpacingX: 8,$ParkingPosition: 360';
        }
        if ($skin == '08') {
            $some = '$SpacingX: 23,$SpacingY: 23,$ParkingPosition: 219';
        }

        return '$ThumbnailNavigatorOptions: {
                            $Class: $JssorThumbnailNavigator$,
                            $ActionMode: ' . $actionMode . ',
                            $ChanceToShow: ' . $chanceToShow . ',
                            ' . $some . ',
                            $DisplayPieces: ' . $displayPieces . '}';
    }

}