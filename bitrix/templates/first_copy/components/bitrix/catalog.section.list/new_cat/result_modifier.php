<?php

foreach($arResult['SECTIONS'] as $key => $section) {
    if($section['UF_SAYT_PAPKA_TIP'] != 2) {

        if ($section['DEPTH_LEVEL'] == 1) {
            $one = $key;
            $i = 0;
        }

        if ($section['DEPTH_LEVEL'] == 2) {
            $two = $i;
            $arResult['SECTIONS'][$one]['SECTION_1'][] = $section;
            $i++;
        }

        if ($section['DEPTH_LEVEL'] == 3) {
            $arResult['SECTIONS'][$one]['SECTION_1'][$two]['SECTION_2'][] = $section;
        }
    }

}

