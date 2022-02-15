<?php
global $APPLICATION;
$moduleId = 'mfg.fbcapi';
$request = \Bitrix\Main\Context::getCurrent()->getRequest();

$arAllOptions = array(
    'pixelId' => \Bitrix\Main\Localization\Loc::getMessage('PIXEL_ID'),
    'accessToken' => \Bitrix\Main\Localization\Loc::getMessage('ACCESS_TOKEN'),
);

$aTabs = array(
    array(
        "DIV" => "edit1",
        "TAB" => \Bitrix\Main\Localization\Loc::getMessage('MAIN_TAB_SET'),
        "ICON" => "main_settings",
        "TITLE" => \Bitrix\Main\Localization\Loc::getMessage('MAIN_TAB_SET'),
    ),
);

$tabControl = new CAdminTabControl("tabControl", $aTabs);
$tabControl->Begin();
?>
    <form method="POST" action="<?echo $APPLICATION->GetCurPage()?>?mid=<?=htmlspecialcharsbx($moduleId)?>&amp;lang=<?echo LANG?>">
<?
bitrix_sessid_post();
$tabControl->BeginNextTab();
foreach ($arAllOptions as $option => $lang):
    $value = Bitrix\Main\Config\Option::get($moduleId, $option);
    ?>
        <tr>
            <td>
                <label for="<?=$option?>"><?=$lang?></label>
            </td>
            <td>
                <input type="text" name="<?=$option?>" value="<?=$value?>"/>
            </td>
        </tr>
    <?
endforeach;

$tabControl->Buttons();
?>
<input class="btn btn-success"
       type="submit" name="save"
       value="Сохранить" />
<?
$tabControl->End();
?>
    </form>
<?

if($request->isPost())
{
    $toSave = ['pixelId', 'accessToken'];
    $options = $request->toArray();

    foreach ($options as $key => $value)
    {
        if(!in_array($key, $toSave))
            continue;

        \Bitrix\Main\Config\Option::set($moduleId, $key, $value);
    }
}