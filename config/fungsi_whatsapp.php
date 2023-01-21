<?php

function send_wa_text($devid, $nohp, $pesan)
{
    $url = 'https://wa.cbtcandy.com/api/send';
    $ch = curl_init($url);
    $data = array(
        'device_id' => $devid,
        'number' => $nohp,
        'message' => $pesan,
    );
    $payload = $data;
    curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $result = curl_exec($ch);
    curl_close($ch);
    return $result;
}
function send_wa_file($devid, $nohp, $pesan, $file)
{
    $url = 'https://wa.cbtcandy.com/api/send';
    $ch = curl_init($url);
    $data = array(
        'device_id' => $devid,
        'number' => $nohp,
        'message' => $pesan,
        'file' => $file
    );
    $payload = $data;
    curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $result = curl_exec($ch);
    curl_close($ch);
    return $result;
}
