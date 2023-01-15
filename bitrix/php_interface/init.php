<?
AddEventHandler("mail", "OnBeforeEventSend", "ModifySaleMails");

function ModifySaleMails(&$arFields, &$arTemplate)
{
    //получим сообщение
    $mess = $arTemplate["PHONE"];
    foreach($arFields as $keyField => $arField) {
        $mess = str_replace('#' . $keyField . '#', $arField, $mess); //подставляем значения в шаблон
    }
}
?>