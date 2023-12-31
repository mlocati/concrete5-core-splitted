<?php
defined('C5_EXECUTE') or die("Access Denied.");

use Concrete\Block\CoreContainer\Controller as ContainerBlockController;

/* @var Area $a */

$btl = new BlockTypeList();
$blockTypes = $btl->get();
$handles = '';
$ap = new Permissions($a);
$class = 'ccm-area';
if ($a->isGlobalArea()) {
    $class .= ' ccm-global-area';
} else if ($a instanceof \Concrete\Core\Area\SubArea) {
    $block = $a->getSubAreaBlockObject();
    if ($block->getController() instanceof ContainerBlockController) {
        $class .= ' ccm-container-area';
    } else {
        $class .= ' ccm-layout-area';
    }
}

$c = Page::getCurrentPage();
$css = $c->getAreaCustomStyle($a);
if (is_object($css)) {
    $class .= ' ' . $css->getContainerClass();
}

foreach ($blockTypes as $bt) {
    if ($ap->canAddBlockToArea($bt)) {
        $handles .= $bt->getBlockTypeHandle() . ' ';
    }
}

if ($ap->canAddLayout()) {
    $handles .= BLOCK_HANDLE_LAYOUT_PROXY . ' ';
    $handles .= BLOCK_HANDLE_CONTAINER_PROXY . ' ';
}

if ($ap->canAddStack()) {
    $handles .= 'stack ';
}



$c = Page::getCurrentPage();
if ($c->isMasterCollection()) {
    $handles .= BLOCK_HANDLE_PAGE_TYPE_OUTPUT_PROXY . ' ';
}

$pt = $c->getCollectionThemeObject();
$gf = $pt->getThemeGridFrameworkObject();
?>
<div id="a<?= $a->getAreaID() ?>" data-maximum-blocks="<?= $a->getMaximumBlocks() ?>"
     data-accepts-block-types="<?= trim($handles) ?>"
     data-area-id="<?= $a->getAreaID() ?>"
     data-cID="<?= $a->getCollectionID() ?>"
     data-area-handle="<?= h($a->getAreaHandle()) ?>"
     data-area-display-name="<?= h($a->getAreaDisplayName()) ?>"
     data-area-menu-handle="<?= $a->getAreaID() ?>"
     data-area-enable-grid-container="<?= $a->isGridContainerEnabled() ?>"
     data-launch-area-menu="area-menu-a<?= $a->getAreaID() ?>"
     data-area-custom-templates='<?=json_encode($a->getAreaCustomTemplates(), ENT_QUOTES)?>'
     class="<?= $class ?>">

    <?php unset($class); ?>
    <script type="text/template" role="area-block-wrapper">
        <?php
        if ($pt->supportsGridFramework() && $a->isGridContainerEnabled()) {
            echo $gf->getPageThemeGridFrameworkContainerStartHTML();
            echo $gf->getPageThemeGridFrameworkRowStartHTML();
            printf(
                '<div class="%s">',
                $gf->getPageThemeGridFrameworkColumnClassesForSpan($gf->getPageThemeGridFrameworkNumColumns())
            );
            ?>
            <div class='block'></div>
            </div>
            <?php
            echo $gf->getPageThemeGridFrameworkRowEndHTML();
            echo $gf->getPageThemeGridFrameworkContainerEndHTML();
        } else {
            ?>
            <div class='block'></div>
            <?php

        }
        ?>
    </script>
    <div class="ccm-area-block-list">
