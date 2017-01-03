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

class cedGallerySliderTransition
{


    function __construct()
    {
    }


    public static function getMarkup(&$params)
    {

    }

    public static function getOptions(&$params)
    {
        if (strlen(self::getVariable($params)) > 0) {
            return '$SlideshowOptions: {
                    $Class: $JssorSlideshowRunner$,
                    $Transitions: _SlideshowTransitions,
                    $TransitionsOrder: 1,
                    $ShowLink: true
                }';
        }

        return '';
    }

    public static function getVariable($params)
    {
        $keys = self::getKeys();

        $transitions = array();
        foreach ($keys as $key) {
            $var = $params->get($key);
            if ($var != null) {
                if (is_array($var)) {
                    $transitions = array_merge($transitions, $var);
                } else {
                    $transitions[] = $var;
                }
            }
        }

        $transition = "";
        if (sizeof($transitions) != 0) {
            $transition = 'var _SlideshowTransitions = [ ' . implode(",", $transitions) . ' ];';
        }

        return $transition;
    }

    /**
     * @return array
     */
    private static function getKeys()
    {
        static $keys = null;

        if (!isset($keys)) {
            $keys = array();
            $keys[] = "transition-twins-effect";
            $keys[] = "transition-fade-effect";
            $keys[] = "transition-swing-effect";
            $keys[] = "transition-swing-inside-effect";
            $keys[] = "transition-dodge-dance-outside-effect";
            $keys[] = "transition-dodge-dance-inside-effect";
            $keys[] = "transition-dodge-pet-outside-effect";
            $keys[] = "transition-dodge-pet-inside-effect";
            $keys[] = "transition-dodge-inside-effect";
            $keys[] = "transition-flutter-outside-effect";
            $keys[] = "transition-flutter-inside-effect";
            $keys[] = "transition-zoom-effect";
            $keys[] = "transition-collapse-effect";
            $keys[] = "transition-coupound-effect";
            $keys[] = "transition-expand-effect";
            $keys[] = "transition-stripe-effect";
            $keys[] = "transition-waveout-effect";
            $keys[] = "transition-wavein-effect";
            $keys[] = "transition-jumpout-effect";
            $keys[] = "transition-jumpin-effect";
            $keys[] = "transition-parabola-effect";
            $keys[] = "transition-float-effect";
            $keys[] = "transition-fly-effect";
            $keys[] = "transition-stone-effect";
        }

        return $keys;
    }

}