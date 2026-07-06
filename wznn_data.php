<?php
// error_reporting(E_ALL);
// ini_set('display_errors', 1);

$cacheFile = __DIR__ . '/zenon_price_cache.json';
$cacheDuration = 10 * 60;

function get_wznn_data($url = "https://api.dexscreener.com/latest/dex/pairs/ethereum/0xdac866a3796f85cb84a914d98faec052e3b5596d") {
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 30);
    $response = curl_exec($ch);

    if (curl_errno($ch)) {
        $error = curl_error($ch);
        curl_close($ch);
        return ["error" => $error];
    }

    curl_close($ch);

    $arr = json_decode($response, true);

    if (isset($arr['pairs']) && isset($arr['pairs'][0]['priceUsd']) && $arr['pairs'][0]['priceUsd'] !== null) {
        return ["priceUsd" => $arr['pairs'][0]['priceUsd']];
    }
    
    return ["error" => "No pairs or price found"];
}

$data = null;
$cachedData = null;
if (file_exists($cacheFile)) {
    $cache = json_decode(file_get_contents($cacheFile), true);

    if ($cache && isset($cache['data'])) {
        $cachedData = $cache['data'];
    }

    if ($cache && isset($cache['timestamp']) && (time() - $cache['timestamp'] < $cacheDuration)) {

        $data = $cache['data'];
    }
}

if ($data === null) {
    $apiData = get_wznn_data();

    if (isset($apiData["error"])) {
        $data = $cachedData;
    } else {
        $data = $apiData;

        $cache = [
            'timestamp' => time(),
            'data' => $data
        ];
        
        $result = file_put_contents($cacheFile, json_encode($cache));
        if ($result === false) {
            # Couldn't write to file
        }
        if (!chmod($cacheFile, 0666)) {
            // print("Chmod failed");
        }
    }
}

if (isset($data["priceUsd"])) {
    $wznn_price_usd = $data["priceUsd"];
}
?>
