<?php
// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Get the form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $contact = $_POST['Contact'];
    $service = $_POST['Service'];
    $message = $_POST['message'];

    // Create an array of data
    $data = array(
        $name,
        $email,
        $contact,
        $service,
        $message
    );

    // Open the CSV file for writing
    $file = fopen('data.csv', 'a');

    // Add the data to the CSV file
    fputcsv($file, $data);

    // Close the file
    fclose($file);
}
?>
