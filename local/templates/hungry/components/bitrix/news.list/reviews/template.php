<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
if (!empty($arResult)) {
$name = "";
$date = "";
$review = "";
?>
<div id="tree_block">
    <div class="tb_block">SPECIALTIES</div>
    <div  class="row">
        <div class="carousel">
            <div class="carousel-box">
<?foreach($arResult["ITEMS"] as $arItem) { ?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));

    if(!empty($arItem["NAME"])) {
        $name = $arItem["NAME"];
    }
    if(!empty($arItem["DISPLAY_ACTIVE_FROM"])) {
        $date = $arItem["DISPLAY_ACTIVE_FROM"];
    }
    if(!empty($arItem["PREVIEW_TEXT"])) {
        $review = $arItem["PREVIEW_TEXT"];
    } ?>

        <!--<div class="carousel-counter">
            <?/*
            if (!empty($arItem["PROPERTIES"]["RATING"]["VALUE"])) {
                echo $arItem["PROPERTIES"]["RATING"]["VALUE"];
            }
            */?>
        </div>-->
        <div id="<?=$this->GetEditAreaId($arItem['ID']);?>" class="carousel-box__item" data-name="<?= $name ?>" data-who="<?= $name ?>" data-review="<?= $review ?>">
            <div class="carousel-box__item_img">
                <?if(!empty($arItem["PREVIEW_PICTURE"])) {
                    $img = CFile::ResizeImageGet($arItem["PREVIEW_PICTURE"], array('width'=>300, 'height'=>520), BX_RESIZE_IMAGE_PROPORTIONAL, true)["src"];?>
                    <i style="background-image: url(<?=$img?>);"></i>
                <? } else { ?>
                    <i style="background-image: url(<?= SITE_TEMPLATE_PATH . '/png/no-image.png' ?>);"></i>
                <? }?>
            </div>
            <span class="carousel-box__item_desc">
                <? if(!empty($arItem["NAME"])) {
                    echo $name;
                } ?>
            </span>
        </div>
<? } ?>
        </div>
            <div class="carousel-arrow">
                <span class="carousel-arrow__next"></span>
                <span class="carousel-arrow__prev"></span>
            </div>
        </div>
    </div>
</div>
    <script type="text/javascript">
        $(document).ready(function(){
            function liteCarousel(obj, block, item) {
                let parent = $(obj).parents(),
                    items  = parent.find(block + ' ' + item),
                    first  = parent.find(block + ' ' + item + ':eq(0)');
                options = {
                    speed: 500,
                };

                if(first.is(':animated')) {
                    return;
                }

                parent.find(block + ' ' + item).stop(true, true);

                if ($(obj).hasClass('carousel-arrow__prev')) {

                    elem = parent.find(block + ' ' + item + ':eq(0)');

                    elem.find('i').animate({
                        top: items.eq(1).find('i').css('top')
                    }, options.speed);

                    items.eq(1).find('i').animate({
                        top: items.eq(0).find('i').css('top')
                    }, options.speed);

                    elem.animate({
                        marginRight: 0 - elem.width()
                    }, options.speed, function() {
                        elem.css('margin-right', 0).appendTo(elem.parent());
                    });
                    curr = items.eq(1)[0].dataset;
                } else {

                    elem = items.last();

                    elem.find('i').animate({
                        top: items.eq(0).find('i').css('top')
                    }, options.speed);

                    items.eq(0).find('i').animate({
                        top: items.eq(1).find('i').css('top')
                    }, options.speed);

                    elem.prependTo(elem.parent()).css('margin-right','-'+elem.width()+'px').animate({marginRight:0}, options.speed);

                    curr = elem[0].dataset;
                }

                // меняем текст отзывов
                review = $(obj).parents('.carousel');
                $.each(curr, function( key, value ) {
                    review.find('.carousel-content__' + key).text(value);
                });

                items.each(function(i,elem) {
                    $(elem).attr('data-id',i+1);
                });

            }

            $(document).on('click', '.carousel-arrow__prev, .carousel-arrow__next', function(e) {
                liteCarousel(this,'.carousel-box','.carousel-box__item');
            });
        });
    </script>
<?php } ?>

