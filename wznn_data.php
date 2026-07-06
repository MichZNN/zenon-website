<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$cacheFile = __DIR__ . '/zenon_price_cache.json';
$cacheDuration = 10 * 60; // cache 10 min

$pairs = [
    "wznn_weth" => "0xdac866a3796f85cb84a914d98faec052e3b5596d",
    "wqsr_wznn" => "0xe6c61425d0383c1cde02a49365945f48ebf0ea0c"
];

function get_pair_data($url, $chain, $pair) {
    $fullUrl = implode('/', [$url, $chain, $pair]);
    $ch = curl_init($fullUrl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 30);
    $response = curl_exec($ch);

    if (curl_errno($ch)) {
        curl_close($ch);
        return ["error" => curl_error($ch)];
    }

    curl_close($ch);

    $arr = json_decode($response, true);

    if (isset($arr['pairs'][0]['priceUsd']) && $arr['pairs'][0]['priceUsd'] !== null) {
        return ["priceUsd" => $arr['pairs'][0]['priceUsd']];
    }

    return ["error" => "No valid priceUsd found"];
}

$cache = [];
if (file_exists($cacheFile)) {
    $content = file_get_contents($cacheFile);
    $cache = json_decode($content, true);
    if (!is_array($cache)) {
        $cache = [];
    }
}

$prices = [];

foreach ($pairs as $name => $address) {
    $cached = $cache[$name] ?? null;
    $isFresh = $cached && isset($cached['timestamp']) && (time() - $cached['timestamp'] < $cacheDuration);

    if ($isFresh) {
        $prices[$name] = $cached['data']['priceUsd'];
    } else {
        $apiData = get_pair_data("https://api.dexscreener.com/latest/dex/pairs", "ethereum", $address);

        if (!isset($apiData["error"])) {
            $prices[$name] = $apiData["priceUsd"];
            $cache[$name] = [
                "timestamp" => time(),
                "data" => $apiData
            ];
        }
    }
}

// Cache
file_put_contents($cacheFile, json_encode($cache, JSON_PRETTY_PRINT));