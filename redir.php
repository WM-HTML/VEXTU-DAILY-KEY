<?php
// Día actual
$dayNumber = floor(time() / (60*60*24));
$seed = $dayNumber;

// Generar key diaria
$chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
$keyPart = "";
$tempSeed = $seed;
for ($i = 0; $i < 10; $i++) {
    $tempSeed = ($tempSeed * 9301 + 49297) % 233280;
    $index = floor($tempSeed / 233280 * strlen($chars));
    $keyPart .= $chars[$index];
}
$dailyKey = "KEY-VXT-" . $keyPart;

// Generar link único diario
$randomNum = ($seed * 12345) % 10000;
$dailyLink = "https://vextudaylikey.netlify.app/key/$randomNum?k=$dailyKey"; // Cambia tu dominio aquí

// Redirigir al link diario
header("Location: $dailyLink");
exit();
?>