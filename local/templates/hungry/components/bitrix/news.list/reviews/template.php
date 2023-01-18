<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
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
    $rating = "";
    $ratingMax = "/5";
    $langName = LANGUAGE_ID === "ru" ? "" : "_" . mb_strtoupper(LANGUAGE_ID);
    ?>
    <div id="tree_block">
        <div class="tb_block">
            <? $APPLICATION->IncludeComponent(
                "bitrix:main.include",
                "",
                array(
                    "AREA_FILE_SHOW" => "file",
                    "EDIT_TEMPLATE" => "",
                    "PATH" => SITE_TEMPLATE_PATH . "/lang/" . LANGUAGE_ID . "/reviews.php",
                )
            ); ?>
        </div>
        <div class="row">
            <div class="carousel">
                <div class="carousel-box">
                    <? foreach ($arResult["ITEMS"] as $arItem) { ?>
                        <?
                        $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
                        $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));

                        if (!empty($arItem["NAME"])) {
                            $name = $arItem["NAME"];
                        }
                        if (!empty($arItem["DISPLAY_ACTIVE_FROM"])) {
                            $date = $arItem["DISPLAY_ACTIVE_FROM"];
                        }
                        if (!empty($arItem["PROPERTIES"]["REVIEWS" . $langName]["VALUE"])) {
                            $review = $arItem["PROPERTIES"]["REVIEWS" . $langName]["VALUE"];
                        }
                        if (!empty($arItem["PROPERTIES"]["RATING"]["VALUE"])) {
                            $rating = $arItem["PROPERTIES"]["RATING"]["VALUE"];
                        } ?>
                        <div id="<?= $this->GetEditAreaId($arItem['ID']); ?>" class="carousel-box__item"
                             data-name="<?= $name . " - " . $rating . $ratingMax ?>" data-who="<?= $date ?>"
                             data-review="<?= $review ?>">
                            <div class="carousel-box__item_img">
                                <? if (!empty($arItem["PREVIEW_PICTURE"])) {
                                    $img = CFile::ResizeImageGet($arItem["PREVIEW_PICTURE"], array('width' => 300, 'height' => 520), BX_RESIZE_IMAGE_PROPORTIONAL, true)["src"]; ?>
                                    <i style="background-image: url(<?= $img ?>);"></i>
                                <? } else { ?>
                                    <i style="background-image: url(<?= SITE_TEMPLATE_PATH . '/png/no-image.png' ?>);"></i>
                                <? } ?>
                            </div>
                            <span class="carousel-box__item_desc">
                                <? if (!empty($arItem["NAME"])) {
                                    echo $name;
                                } ?>
                            </span>
                        </div>
                    <? } ?>
                </div>
                <div class="carousel-content">
                    <div class="carousel-content__name"><?= $arResult["ITEMS"][0]['NAME'] . " - " . $arResult["ITEMS"][0]["PROPERTIES"]["RATING"]["VALUE"] ?>
                        <?= $ratingMax ?>
                    </div>
                    <div class="carousel-content__who"><?= $arResult["ITEMS"][0]['DISPLAY_ACTIVE_FROM'] ?></div>
                    <div class="carousel-content__review"><?= $arResult["ITEMS"][0]["PROPERTIES"]["REVIEWS" . $langName]["VALUE"] ?></div>
                </div>
                <div class="carousel-arrow">
                    <span class="carousel-arrow__next"></span>
                    <span class="carousel-arrow__prev"></span>
                </div>
            </div>
        </div>
    </div>
    <?php
    $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . "/js/reviews.js");
} ?>

