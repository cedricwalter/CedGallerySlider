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

// no direct access
defined("_JEXEC") or die;
?>

<div class="custom<?php echo $moduleclass_sfx ?>"
<!-- Copyright (C) 2013-2016 galaxiis.com All rights reserved. -->
<?php echo $module->content; ?>

<div style="text-align: center;">
    <a href="https://www.galaxiis.com/cedgallery-showcase/"
       style="font: normal normal normal 10px/normal arial; color: rgb(187, 187, 187); border-bottom-style: none; border-bottom-width: inherit; border-bottom-color: inherit; text-decoration: none; "
       onmouseover="this.style.textDecoration='underline'" onmouseout="this.style.textDecoration='none'"
       target="_blank"><strong>cedgalleryslider</strong></a>
</div>

<?php if ($backLink == 'true') { ?>
    <div style="text-align: center;">
        <a href="https://www.galaxiis.com/cedgallery-showcase/"
           style="font: normal normal normal 10px/normal arial; color: rgb(187, 187, 187); border-bottom-style: none; border-bottom-width: inherit; border-bottom-color: inherit; text-decoration: none; "
           onmouseover="this.style.textDecoration='underline'" onmouseout="this.style.textDecoration='none'"
           target="_blank"><strong>powered by CedGallerySlider</strong></a>
    </div>
<?php } ?>

</div>
