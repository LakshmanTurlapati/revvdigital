<?php

require_once __DIR__ . '/vendor/autoload.php';

putenv('GOOGLE_APPLICATION_CREDENTIALS=/path/to/your/credentials.json');

$client = new Google_Client();
$client->useApplicationDefaultCredentials();
$client->setScopes(['https://www.googleapis.com/auth/spreadsheets']);

$service = new Google_Service_Sheets($client);
$spreadsheetId = 'your-spreadsheet-id';

// Get the data from the form
$name = $_POST['name'];
$email = $_POST['email'];
$contact = $_POST['contact'];
$serviceType = $_POST['serviceType'];
$message = $_POST['message'];

$values = [
    [$name, $email, $contact, $serviceType, $message],
];

$body = new Google_Service_Sheets_ValueRange([
    'values' => $values
]);

$params = [
    'valueInputOption' => 'RAW'
];

$result = $service->spreadsheets_values->append(
    $spreadsheetId,
    'Sheet1!A1:E1',
    $body,
    $params
);

if (!$result) {
    die('Error: Could not write data to sheet.');
} else {
    echo 'Data written to sheet successfully!';
}

?>
