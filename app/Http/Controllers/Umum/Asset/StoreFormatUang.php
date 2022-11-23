<?php

$input['nilai_brg'] = str_replace('.', '', $input['nilai_brg']);
if ($input['nilai_surut'] == '') {
    $input['nilai_surut'] = 0;
} else {
    $input['nilai_surut'] = str_replace('.', '', $input['nilai_surut']);
}