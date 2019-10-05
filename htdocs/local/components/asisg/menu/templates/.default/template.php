<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();?>
<div class="collapse navbar-collapse nav-collapse">
    <div class="menu-container">
        <ul class="nav navbar-nav navbar-nav-right">  
            <? foreach ($arResult['ITEMS'] as $value) { ?>
                <li class="js_nav-item nav-item">
                    <a class="nav-item-child nav-item-hover" href="#<?=$value['CODE']?>"><?=$value['NAME']?></a>
                </li>
            <?}?>
                
            <li class="js_nav-item nav-item">
                <? foreach ($arResult['LANG'] as $value) {?>
                    <a class="<?=(($value['CHACKED'] == 'Y')? 'action-lang' : '' );?>" href="<?=$value['URL'];?>"><?=ucfirst($value['CODE']);?></a>
                <?}?>
            </li>
        </ul>
    </div>
</div>