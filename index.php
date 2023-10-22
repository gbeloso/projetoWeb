<?php
// Get IP address
$ip = $_SERVER['REMOTE_ADDR'];

// Get date and time
$date = date('Y-m-d');
$time = date('H:i:s');

// Get location (using an API - replace YOUR_API_KEY with an actual API key)
$apiKey = '';
$apiUrl = "http://ip-api.com/json/201.92.94.165?fields=status,message,country,countryCode,region,regionName,city,zip,lat,lon,timezone,isp,org,as,query";
$locationData = json_decode(file_get_contents($apiUrl), true);

// Display information
echo "<h1>IP Information</h1>";
echo "<p><strong>IP Address:</strong> {$ip}</p>";
echo "<p><strong>Date:</strong> {$date}</p>";
echo "<p><strong>Time:</strong> {$time}</p>";

if ($locationData && $locationData['status'] === 'success') {
    echo "<p><strong>Location:</strong> {$locationData['city']}, {$locationData['regionName']}, {$locationData['country']}</p>";
} else {
    echo "<p><strong>Location:</strong> Unable to retrieve location information</p>";
}
?>
