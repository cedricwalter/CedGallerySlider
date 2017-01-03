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

defined('_JEXEC') or die('Restricted access');

// Load the javascript
JHtml::_('behavior.framework');
JHtml::_('behavior.modal', 'a.modal');
?>

<div class="tagpanel">

    <div style="float: left;">
        <div class="icon">
            <a href="index.php?option=com_cedgalleryslider&view=liveupdate"
               title="<?php echo JText::_('Live Update');?>"> <img
                    src="<?php echo JURI::root() ?>/media/com_cedgalleryslider/images/update_48x48.png"
                    alt="<?php echo JText::_('Live Update');?>"/>
                <span><?php echo JText::_('Live Update');?></span></a></div>
    </div>
    <div style="float: left;">
        <div class="icon"><a href="https://www.galaxiis.com/" target="_blank"
                             title="<?php echo JText::_('HOME PAGE');?>"> <img
                src="<?php echo JUri::root() ?>/media/com_cedgalleryslider/images/galaxiis3.jpg"/>
            <span><?php echo JText::_('HOME');?></span></a>
        </div>
    </div>
    <div style="float: left;">
        <div class="icon"><a
                href="https://www.galaxiis.com/cedthumbnails-download-doc/"
                target="_blank"
                title="<?php echo JText::_('MANUAL');?>"> <img
                src="<?php echo JURI::root() ?>/media/com_cedgalleryslider/images/manual.png"/>
            <span><?php echo JText::_('MANUAL');?></span></a>
        </div>
    </div>
    <div style="float: left;">
        <div class="icon"><a
                href="https://www.galaxiis.com/forums/"
                target="_blank"
                title="<?php echo JText::_('FORUM');?>"> <img
                src="<?php echo JURI::root() ?>/media/com_cedgalleryslider/images/forum.png"/>
            <span><?php echo JText::_('FORUM');?></span></a>
        </div>
    </div>
    <div style="float: left;">
        <div class="icon"><a
                href="https://confluence.galaxiis.com/display/GAL/SOFTWARE+LICENSE+AGREEMENT"
                target="_blank"
                title="<?php echo JText::_('LICENSE');?>"> <img
                src="<?php echo JURI::root() ?>/media/com_cedgalleryslider/images/license.png"/>
            <span><?php echo JText::_('LICENSE');?></span></a>
        </div>
    </div>


    <div style="float: left;">
        <div class="icon">
            <a href="http://extensions.joomla.org/extensions/news-display/articles-display/related-items/11491"
               target="_blank"
               title="<?php echo JText::_('JED VOTE');?>"> <img
                    src="<?php echo JURI::root() ?>/media/com_cedgalleryslider/images/jed.png"/>
                <span><?php echo JText::_('JED VOTE');?></span></a>
        </div>
    </div>
    <div style="float: left;">
        <div class="icon">
            <a href="https://www.galaxiis.com/cedthumbnails-download/"
               target="_blank"
               title="<?php echo JText::_('Download');?>"> <img
                    src="<?php echo JURI::root() ?>/media/com_cedgalleryslider/images/download.png"/>
                <span><?php echo JText::_('Download');?></span></a>
        </div>
    </div>
    <div style="float: left;">
        <div class="icon">
            <a href="https://www.facebook.com/galaxiiscom"
               target="_blank"
               title="<?php echo JText::_('Like on Facebook');?>"> <img
                    src="<?php echo JURI::root() ?>/media/com_cedgalleryslider/images/facebook.png"/>
                <span><?php echo JText::_('Like on Facebook');?></span></a>
        </div>
    </div>
    <div style="float: left;">
        <div class="icon">
            <a href="https://twitter.com/galaxiiscom"
               target="_blank"
               title="<?php echo JText::_('Follow Me on Twitter');?>"> <img
                    src="<?php echo JURI::root() ?>/media/com_cedgalleryslider/images/twitter.png"/>
                <span><?php echo JText::_('Follow Me on Twitter');?></span></a>
        </div>
    </div>
    <div style="float: left;">
        <div class="icon">
            <a href="https://plus.google.com/u/0/104558366166000378462"
               target="_blank"
               title="<?php echo JText::_('Follow Me on Google+');?>"> <img
                    src="<?php echo JURI::root() ?>/media/com_cedgalleryslider/images/google.png"/>
                <span><?php echo JText::_('Follow Me on Google+');?></span></a>
        </div>
    </div>
</div>

<div class="tagversion">

    <h1>CedGallery 1.4.1</h1>

        <h3>join now - get the licensed version of CedGallery and enjoy more customizations and features!</h3>
        <a href="https://www.galaxiis.com/subscribe.html" alt="join now" title="join now - get the licensed version of CedGallerySlider and enjoy more customizations and features!" target="_new"><img src="<?php echo JURI::root() ?>/media/com_cedgalleryslider/images/joinnow.png" /></a>
    <p>
        Copyright (C) 2013-2016 galaxiis.com All rights reserved.
    </p>
</div>