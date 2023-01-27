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
?>
        <div class="food">
            <div class="column items-list">
                <div class="row item-content">

	<?//foreach($arResult["ITEMS"] as $arElement) { ?>
    <? for ($i = 0; $i < count($arResult["ITEMS"]); $i++) { ?>
        <?
        $arElement = $arResult["ITEMS"][$i];
        $this->AddEditAction($arElement['ID'], $arElement['EDIT_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_EDIT"));
        $this->AddDeleteAction($arElement['ID'], $arElement['DELETE_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BCS_ELEMENT_DELETE_CONFIRM')));
        ?>
        <div id="<?= $this->GetEditAreaId($arElement['ID']); ?>">

            <div class="food_block">
                <div class="row"><?= $arElement["NAME"] ?>

                    <pre></pre>
                    <? foreach ($arResult["PRICES"] as $code => $arPrice): ?>

                        <? if ($arPrice = $arElement["PRICES"][$code]): ?>
                            <?= $arPrice["PRINT_VALUE"]."р." ?>
                        <? endif; ?>

                    <? endforeach; ?>
                </div>
                <? if (!empty($arElement["PROPERTIES"]["DESC"]["VALUE"])) { ?>
                    <div class="grey_text"><?= $arElement["PROPERTIES"]["DESC"]["VALUE"] ?></div>
                <? } ?>
            </div>
        </div>
        <? if (($i+1) % 3 == 0) { ?>
                </div>
                    <div class="row item-content">
                        <? }
        /*echo "<pre>";
print_r($arElement);
echo "</pre>"; */ ?>
    <? } ?>

</div>
</div>
</div>
<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
    <p id="pag"><?=$arResult["NAV_STRING"]?></p>
<?endif?>
