<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
IncludeTemplateLangFile(__FILE__);
?>
<div id="four_block" class="column">
    <div class="column">
        <div class="logo">CONTACT</div>
        <div class="yellow_block"></div><br>
        <div class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis at velit maximus, molestie est a, tempor magna.</div>
    </div>
    <form class="new_form column">
        <div class="row nf_first">
            <input type="text" name="" id="form_block_one" placeholder="Name" class="necessarily" >
            <input type="text" name="" id="form_block_two" placeholder="Email">
            <input type="text" name="" id="form_block_tree" placeholder="Phone">
        </div>
        <div class="row nf_next">
            <input class="necessarily" type="text" name="" id="form_block_four" placeholder="Message">
        </div>
        <div class="row nf_first">
            <img src="<?= SITE_TEMPLATE_PATH ?>/png/number.png" alt="" class="img_number">
            <input type="submit" class="top_btn_new event_two" value="SEND MESSAGE">
        </div>
    </form>
</div>

<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3016.839531947367!2d14.441117114778649!3d40.875395635541274!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x133bafb98245d643%3A0x28b132111f33221e!2sHungry%20people!5e0!3m2!1sru!2sru!4v1673620354738!5m2!1sru!2sru" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
<div id="footer">
    <div class="grey_text">© Copyright <b>Mindblister</b>  2019</div>
</div>
<? $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH."/js.js"); ?>
</body>
</html>