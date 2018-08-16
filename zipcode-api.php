<?php
    // Set up your API auth id and token
    $auth_id = 'xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx';
    $auth_token = 'xxxxxxxxxxxxxxxxxxxx';


$auth_id = '6d7e4236-5497-d58a-d5bc-6ab2c968f439';
$auth_token = 'E15H58eEGA2v2Xy80Gzh';

    // Choose a state name
    $state = "CA";

    // Parse city names from the plain text file below
    $filename = 'cities.txt';
    $cityNames = file($filename, FILE_IGNORE_NEW_LINES);

    //
    // Smarty Streets curl call which returns JSON result
    //
    // MORE INFO:
    // https://smartystreets.com/products/apis/us-zipcode-api
    //
    $ch = curl_init();
    $http_header = [
        "content-type: application/json",
    ];
    curl_setopt($ch, CURLOPT_HTTPHEADER, $http_header);

    // Do not auto-print results!
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);

    echo "\r\n" . "************************************************" . "\r\n";

    foreach ($cityNames as $city) {
        // Print current City name:
        echo $city . "\r\n";

        // Replace all spaces with `+` signs
        $city =  str_replace(' ', '+', $city);

        // Set up the API url and required params
        $base_url = "https://us-zipcode.api.smartystreets.com/lookup?";
        $params = [
            'auth-id'    => $auth_id,
            'auth-token' => $auth_token,
            'city'       => $city,
            'state'      => $state,
        ];

        // Builds full url.
        // First decodes the URL-encoded string, otherwise the `+` signs get jacked up.
        $url = $base_url . urldecode(http_build_query($params));
        
        // Setup the cURL call
        curl_setopt($ch, CURLOPT_URL, $url);
        $htmlResponse = curl_exec($ch);
        
        // Decode JSON response
        $resultArray = json_decode($htmlResponse, true);

        // Print out zipcodes associated with city name
        foreach ($resultArray[0]['zipcodes'] as $chunk) {
            echo($chunk['zipcode'] . ', ');
        }

        echo "\r\n" . "************************************************" . "\r\n";
    } // End foreach loop through city names
?>