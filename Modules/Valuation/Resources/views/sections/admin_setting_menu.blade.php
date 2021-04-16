
@php

    $openValuationMainMenu = (isset($openValuationMainMenu))?$openValuationMainMenu:false;
    $modules = (isset($modules) && !empty($modules))?$modules:array();
    echo getValuationSettingMenu($modules, $openValuationMainMenu)
@endphp

