<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$w = 1200; $h = 630;
$bg = [17, 17, 17];
$white = [255, 255, 255];

$title = $_GET['t'] ?? 'Data Card';
$data_name_1 = $_GET['dn1'] ?? '–';
$data_value_1 = $_GET['dv1'] ?? '–';
$data_name_2 = $_GET['dn2'] ?? '–';
$data_value_2 = $_GET['dv2'] ?? '–';

$im = imagecreatetruecolor($w, $h);
$bgCol = imagecolorallocate($im, ...$bg);
$whiteCol = imagecolorallocate($im, ...$white);

imagefill($im, 0, 0, $bgCol);

$font = __DIR__ . '/fonts/Inter-Regular.otf';
$lineY = 260;

imagettftext($im, 40, 0, 80, $lineY, $whiteCol, $font, $title);
imagettftext($im, 40, 0, 80, $lineY + 90, $whiteCol, $font, $data_name_1 . ': ' . $data_value_1);
imagettftext($im, 40, 0, 80, $lineY + 160, $whiteCol, $font, $data_name_2 . ': ' . $data_value_2);
imagettftext($im, 20, 0, 380, 600, $whiteCol, $font, (new DateTime())->format('Y-m-d H:i:s') . ' UTC');

header('Content-Type: image/png');
header('Cache-Control: no-cache, must-revalidate');
imagepng($im);
imagedestroy($im);