<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
IncludeTemplateLangFile(__FILE__);
?>
<?$APPLICATION->IncludeComponent("hungry:main.feedback", "feedbackForm", Array(
    "EMAIL_TO" => "miskusitel@gmail.com",	// E-mail, на который будет отправлено письмо
    "EVENT_MESSAGE_ID" => array(	// Почтовые шаблоны для отправки письма
        0 => "7",
    ),
    "OK_TEXT" => "Спасибо, ваше сообщение принято.",	// Сообщение, выводимое пользователю после отправки
    "REQUIRED_FIELDS" => array(	// Обязательные поля для заполнения
        0 => "NAME",
        1 => "EMAIL",
    ),
    "USE_CAPTCHA" => "Y",	// Использовать защиту от автоматических сообщений (CAPTCHA) для неавторизованных пользователей
),
    false
);?>


<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3016.839531947367!2d14.441117114778649!3d40.875395635541274!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x133bafb98245d643%3A0x28b132111f33221e!2sHungry%20people!5e0!3m2!1sru!2sru!4v1673620354738!5m2!1sru!2sru" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
<div id="footer">
    <div class="grey_text">© Copyright <b>Mindblister</b>  2019</div>
</div>
<? $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH."/js.js"); ?>
</body>
</html>