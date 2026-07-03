<?php
error_reporting(0);
ini_set('display_errors', 0);

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

// API expiry
$expiryDate = strtotime('2027-05-06');
$currentDate = time();

if ($currentDate > $expiryDate) {
    echo json_encode([
        "success" => false,
        "message" => "API Expired! Contact owner for renewal",
        "credit" => "@FREDDY_X_NETWORKBOT",
        "channel" => "https://t.me/FREDDY_X_NETWORK"
    ]);
    exit;
}

$remainingDays = floor(($expiryDate - $currentDate) / 86400);

$rc = $_GET['rc'] ?? $_GET['number'] ?? null;

if (!$rc) {
    echo json_encode([
        "success" => false,
        "message" => "Please provide RC number (e.g. ?rc=KA01AB1234)",
        "credit" => "@FREDDY_X_NETWORKBOT",
        "channel" => "https://t.me/FREDDY_X_NETWORK",
        "api_valid_until" => "May 6, 2027",
        "days_remaining" => $remainingDays
    ]);
    exit;
}

// Clean RC number
$rc = strtoupper(preg_replace('/[^A-Z0-9]/', '', $rc));

$apiUrl = "https://sbsakib.eu.cc/apis/vehicle_advance?key=Test&rc=" . $rc;

$ch = curl_init();
curl_setopt_array($ch, [
    CURLOPT_URL => $apiUrl,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_SSL_VERIFYPEER => false,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_USERAGENT => 'Mozilla/5.0'
]);

$response = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

if ($response === false || $httpCode !== 200) {
    echo json_encode([
        "success" => false,
        "message" => "Failed to fetch data",
        "credit" => "@FREDDY_X_NETWORKBOT",
        "channel" => "https://t.me/FREDDY_X_NETWORK",
        "api_valid_until" => "May 6, 2027",
        "days_remaining" => $remainingDays
    ]);
    exit;
}

$data = json_decode($response, true);

if (!$data || !isset($data['status']) || $data['status'] !== 'success') {
    echo json_encode([
        "success" => false,
        "message" => "No data found or Invalid RC",
        "credit" => "@FREDDY_X_NETWORKBOT",
        "channel" => "https://t.me/FREDDY_X_NETWORK",
        "api_valid_until" => "May 6, 2027",
        "days_remaining" => $remainingDays
    ]);
    exit;
}

// Final Clean Output
$output = [
    "success" => true,
    "credit" => "@FREDDY_X_NETWORKBOT",
    "channel" => "https://t.me/FREDDY_X_NETWORK",
    "api_valid_until" => "May 6, 2027",
    "days_remaining" => $remainingDays,
    "query_rc" => $rc,
    "result" => $data['data'] ?? []
];

echo json_encode($output, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
?>