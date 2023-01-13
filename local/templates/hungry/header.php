<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
IncludeTemplateLangFile(__FILE__);
?>
<!DOCTYPE html>
<html lang="<?= LANGUAGE_ID ?>">
<head>
    <? global $APPLICATION; ?>
    <?$APPLICATION->ShowHead();?>
    <meta charset="utf-8">
    <title><?$APPLICATION->ShowTitle(false);?></title>
    <? $APPLICATION->AddHeadScript("https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"); ?>
    <? $APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH."/style.css"); ?>
</head>
<body>
<?$APPLICATION->ShowPanel();?>
<!--ШАПКА-->
<div id="header">
    <div id="bar">
        <div class="first_menu">
            <p class="href"><a class="a" href="">HOME</a></p>
            <p class="href"><a class="a" href="">ABOUT</a></p>
            <p class="href"><a class="a" href="">TEAM</a></p>
            <p class="href"><a class="a" href="">BOOKING</a></p>
        </div>
        <a href=""><p class="vektor"><img src="<?= SITE_TEMPLATE_PATH ?>/png/Vector.png" alt=""></p></a>
        <div class="first_menu">
            <p class="href"><a class="a" href="">MENU</a></p>
            <p class="href"><a class="a" href="">GALERIE</a></p>
            <p class="href"><a class="a" href="">EVENTS</a></p>
            <p class="href"><a class="a" href="">CONTACT</a></p>
        </div>
    </div>
    <div id="first_content">
        <div class="one">
            Mon - Fri: 8PM - 10PM, Sat - Sun: 8PM - 3AM
        </div>
        <div class="two two-column">
            <div>
                RESTAURANT
            </div>
            <h1 class="main-logo">
                HUNGRY PEOPLE
            </h1>
            <div class="yellow_block"></div>
            <div class="column">
                <div class="row">
                    <button class="top_btn book_table">BOOK TABLE</button>
                    <button class="top_btn explore">EXPLORE</button>
                </div>
                <button class="bottom_btn"><img src="<?= SITE_TEMPLATE_PATH ?>/png/bottom_btn.png"></button>
            </div>
        </div>
        <div class="column tree">
            <a href="http://.ru" class="face"><div class="icon"><img src="<?= SITE_TEMPLATE_PATH ?>/png/face.png" alt=""></div></a>
            <a href="http://.ru" class="twit"><div class="icon"><img src="<?= SITE_TEMPLATE_PATH ?>/png/twit.png" alt=""></div></a>
            <a href="https://www.instagram.com/ze_best_kotic/?hl=ru" class="inst"><div class="icon"><img src="<?= SITE_TEMPLATE_PATH ?>/png/inst.png" alt=""></div></a>
        </div>
    </div>
</div>