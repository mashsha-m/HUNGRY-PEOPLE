<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
    /**
    * Bitrix vars
    *
    * @var array $arParams
    * @var array $arResult
    */
use Bitrix\Main\Localization\Loc;
Loc::loadMessages(__FILE__);

if($arResult["NavPageCount"] > 1):?>

    <?if ($arResult["NavPageNomer"]+1 <= $arResult["nEndPage"]):?>
        <?
        $plus = $arResult["NavPageNomer"]+1;
        $url = $arResult["sUrlPathParams"] . "PAGEN_".$arResult["NavNum"]."=".$plus;
        ?>
        <button data-url="<?=$url?>" class="top_btn color-black load-more-items"><?= Loc::getMessage('load-more'); ?></button>

    <?endif?>

<?endif?>