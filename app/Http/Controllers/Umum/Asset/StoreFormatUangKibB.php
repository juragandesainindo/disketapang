<?php

$input['nilai_brg'] = str_replace('.', '', $input['nilai_brg']);
if ($input['nilai_surut'] == '') {
    $input['nilai_surut'] = 0;
} else {
    $input['nilai_surut'] = str_replace('.', '', $input['nilai_surut']);
}


if ($input['nilai_surut'] == '') {
    $input['nilai_perolehan'] = $input['nilai_brg'] * $pegawai - $input['nilai_surut'];
} else {
    $input['nilai_perolehan'] = $input['nilai_brg'] * $pegawai - $input['nilai_surut'];
}