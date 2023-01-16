<?
if(!defined("B_PROLOG_INCLUDED")||B_PROLOG_INCLUDED!==true)die();
/**
 * Bitrix vars
 *
 * @var array $arParams
 * @var array $arResult
 * @var CBitrixComponentTemplate $this
 * @global CMain $APPLICATION
 * @global CUser $USER
 */
if (!empty($arResult)) {
?>
<div id="four_block" class="column">
    <div class="column">
        <div class="logo">
            <?$APPLICATION->IncludeComponent(
                "bitrix:main.include",
                "",
                Array(
                    "AREA_FILE_SHOW" => "file",
                    "EDIT_TEMPLATE" => "",
                    "PATH" => SITE_TEMPLATE_PATH."/lang/".LANGUAGE_ID."/con_title.php",
                )
            );?>
        </div>
        <div class="yellow_block"></div><br>
        <div class="text">
            <?$APPLICATION->IncludeComponent(
                "bitrix:main.include",
                "",
                Array(
                    "AREA_FILE_SHOW" => "file",
                    "EDIT_TEMPLATE" => "",
                    "PATH" => SITE_TEMPLATE_PATH."/lang/".LANGUAGE_ID."/con_description.php",
                )
            );?>
        </div>
        <?if(!empty($arResult["ERROR_MESSAGE"]))
        {
            foreach($arResult["ERROR_MESSAGE"] as $v)
                ShowError($v);
        }
        if(!empty($arResult["OK_MESSAGE"]))
        {
            ?><br><div class="text"><?=$arResult["OK_MESSAGE"]?></div><?
        }
        ?>
    </div>
    <form action="<?=POST_FORM_ACTION_URI?>" method="POST" class="new_form column">
        <?=bitrix_sessid_post()?>
        <div class="row nf_first">
            <div class="mf-text">
                <?if(empty($arParams["REQUIRED_FIELDS"]) || in_array("NAME", $arParams["REQUIRED_FIELDS"])) { ?><span class="mf-req"></span><? } ?>
            </div>
            <input id="form_block_one" class="necessarily" type="text" name="user_name" placeholder="<?=GetMessage("MFT_NAME")?>" value="<?=$arResult["AUTHOR_NAME"]?>">
            <div class="mf-text">
                <?if(empty($arParams["REQUIRED_FIELDS"]) || in_array("EMAIL", $arParams["REQUIRED_FIELDS"])) { ?><span class="mf-req"></span><? } ?>
            </div>
            <input type="text" name="user_email" id="form_block_two" placeholder="<?=GetMessage("MFT_EMAIL")?>" value="<?=$arResult["AUTHOR_EMAIL"]?>">
            <div class="mf-text">
                <?if(empty($arParams["REQUIRED_FIELDS"]) || in_array("PHONE", $arParams["REQUIRED_FIELDS"])) { ?><span class="mf-req"></span><? } ?>
            </div>
            <input id="form_block_tree" type="tel" name="PHONE" placeholder="<?=GetMessage("MFT_PHONE")?>" value="<?=$arResult["PHONE"]?>">
        </div>
        <div class="row nf_next">
            <div class="mf-text">
                <?if(empty($arParams["REQUIRED_FIELDS"]) || in_array("MESSAGE", $arParams["REQUIRED_FIELDS"])) { ?><span class="mf-req"></span><? } ?>
            </div>
            <textarea class="necessarily" id="form_block_four" placeholder="<?=GetMessage("MFT_MESSAGE")?>" name="MESSAGE" rows="5" cols="40"><?=$arResult["MESSAGE"]?></textarea>
        </div>
    <?if($arParams["USE_CAPTCHA"] == "Y") { ?>
        <div class="mf-captcha">
            <div class="mf-text"><?=GetMessage("MFT_CAPTCHA")?></div>
            <input type="hidden" name="captcha_sid" value="<?=$arResult["capCode"]?>">
            <img src="/bitrix/tools/captcha.php?captcha_sid=<?=$arResult["capCode"]?>" width="180" height="40" alt="CAPTCHA">
            <div class="mf-text"><?=GetMessage("MFT_CAPTCHA_CODE")?><span class="mf-req">*</span></div>
            <input type="text" name="captcha_word" size="30" maxlength="50" value="">
        </div>
    <? } ?>
        <input type="hidden" name="PARAMS_HASH" value="<?=$arResult["PARAMS_HASH"]?>">
    <input type="submit" name="submit" class="top_btn_new event_two" value="<?=GetMessage("MFT_SUBMIT")?>">
</form>
</div>
<?php } ?>