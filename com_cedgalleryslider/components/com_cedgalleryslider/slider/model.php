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

JLoader::import('joomla.filesystem.folder');

require_once(JPATH_SITE . '/components/com_cedgalleryslider/helpers/exif.php');
require_once(JPATH_SITE . '/components/com_cedgalleryslider/helpers/iptc.php');
require_once(JPATH_SITE . '/components/com_cedgalleryslider/sorting/sortingfactory.php');
require_once(JPATH_SITE . '/components/com_cedgalleryslider/helpers/imageresizer.php');

class cedGallerySliderModel
{
    const fileExtensions = '\.png$|\.gif$|\.jpg$|\.jpeg$|\.PNG$|\.GIF$|\.JPG$|\.JPEG$';

    var $models = array();
    var $id = 0;
    var $albumId = 0;
    var $resize = 0;
    var $scanFolder;
    var $defaultThumbnail;


    function __construct($params, $cachePath)
    {
        $this->resize = new cedGallerySliderResizer($params, $cachePath);
        $folder = $params->get('folder');
        $this->scanFolder = JPATH_SITE . "/images/" . $folder . "/";
        $this->defaultThumbnail = JUri::root() . $params->get('default-thumbnail');
    }

    public function getModel()
    {
        $model = array();

        foreach (scandir($this->scanFolder) as $node) {
            if ($node == '.' || $node == '..') continue;

            $filename = $this->scanFolder . '/' . $node;

            $entry = new stdClass();
            $entry->dir = $this->scanFolder;
            $entry->name = $node;
            $entry->id = $this->id++;

            if (is_dir($filename)) {
            } else {
                $relativeFilePath = str_replace(JPATH_SITE, "", $filename);
                $entry->originalFileRoot = JUri::root() . $this->cleanUrl($relativeFilePath);

                $internationalPressTelecommunicationsCouncil = new cedGallerySliderIPTC($filename);
                $title = $internationalPressTelecommunicationsCouncil->getTitle();
                if (!isset($title)) {
                    $exchangeableImageFileFormat = new cedGallerySliderExif($filename);
                    $title = $exchangeableImageFileFormat->getTitle();
                }
                if (!isset($title)) {
                    $title = basename($filename);
                }
                $entry->title = $title;

                $caption = $internationalPressTelecommunicationsCouncil->getCaption();
                if (!isset($caption)) {
                    //todo can not read it is little endian iso encoded and reverted!
                    //$caption = $exif->getXPComment();
                }
                $entry->caption = isset($caption) ? $caption : "";

                $entry->thumbnailsRoot = $this->resize->resize($filename);

                $entry->fileName = $filename;

                $model[] = $entry;
            }
        }

        return $model;
    }

    /**
     * @return stdClass
     */
    public function createEmptyModel()
    {
        $model = new stdClass();
        $model->type = "";
        $model->title = "";
        $model->originalFileRoot = "";
        $model->thumbnailsRoot = $this->defaultThumbnail;
        $model->caption = "";
        $model->id = "";
        $model->albumId = "";
        $model->originalFilePath = "";

        return $model;
    }

    public function cleanUrl($path, $ds = "/")
    {
        if (!is_string($path) && !empty($path)) {
            throw new UnexpectedValueException('JPath::clean: $path is not a string.');
        }

        $path = trim($path);

        if (empty($path)) {
            $path = JPATH_SITE;
        }
        // Remove double slashes and backslashes and convert all slashes and backslashes to DIRECTORY_SEPARATOR
        // If dealing with a UNC path don't forget to prepend the path with a backslash.
        elseif (($ds == '\\') && ($path[0] == '\\') && ($path[1] == '\\')) {
            $path = "\\" . preg_replace('#[/\\\\]+#', $ds, $path);
        } else {
            $path = preg_replace('#[/\\\\]+#', $ds, $path);
        }

        return $path;
    }

}