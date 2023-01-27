<?php

use Bitrix\Main\Localization\Loc;

if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
{
	die();
}

/**
 * @global CMain $APPLICATION
 * @var array $arParams
 * @var array $arResult
 * @var CBitrixComponent $component
 * @var CBitrixComponentTemplate $this
 * @var string $templateName
 * @var string $componentPath
 * @var string $templateFolder
 */

$this->setFrameMode(true);
if ($arResult['SECTIONS_COUNT'] > 0)
{
	?>
    <div class="row">
			<?php
			$sectionEdit = CIBlock::GetArrayByID($arParams['IBLOCK_ID'], 'SECTION_EDIT');
			$sectionDelete = CIBlock::GetArrayByID($arParams['IBLOCK_ID'], 'SECTION_DELETE');
			$sectionDeleteParams = [
				'CONFIRM' => Loc::getMessage('CT_BCSL_ELEMENT_DELETE_CONFIRM'),
			];

			foreach ($arResult['SECTIONS'] as &$section)
			{
                $langName = LANGUAGE_ID === "ru" ? 'NAME' : "UF_NAME_" . mb_strtoupper(LANGUAGE_ID);
				$this->addEditAction($section['ID'], $section['EDIT_LINK'], $sectionEdit);
				$this->addDeleteAction($section['ID'], $section['DELETE_LINK'], $sectionDelete, $sectionDeleteParams);
				?>
					<!--<a href="<?/*=$section['SECTION_PAGE_URL']*/?>" class="catalog-sections-list-menu-item-link">-->
                        <div id="<?=$this->getEditAreaId($section['ID'])?>" class="menu_block"><?=$section[$langName];?></div>
				<?php
			}
			unset($section);
			?>
	</div>
	<?php
}
?>