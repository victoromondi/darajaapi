<?php
include 'dbconnection.php';
header("Content-Type: application/json");
$stkCallbackResponse = file_get_contents('php://input');
$logFile = "Mpesastkresponse.json";
$log = fopen($logFile, "a");
fwrite($log, $stkCallbackResponse);
fclose($log);

$data = json_decode($stkCallbackResponse, true); // Convert JSON to an associative array

// Check if the transaction was successful and store details in the database
if ( $data->Body->stkCallback->ResultCode == 0 ) {
    
    // Initialize the associative array
    $callbackData = [
        'MerchantRequestID' => $data['Body']['stkCallback']['MerchantRequestID'],
        'CheckoutRequestID' => $data['Body']['stkCallback']['CheckoutRequestID'],
        'ResultCode' => $data['Body']['stkCallback']['ResultCode'],
        'ResultDesc' => $data['Body']['stkCallback']['ResultDesc']
    ];
    
    // Extract the items from CallbackMetadata
    $items = $data['Body']['stkCallback']['CallbackMetadata']['Item'];
    
    // Use array_column to extract values by name
    $names = array_column($items, 'Name');
    $values = array_column($items, 'Value');
    
    // Combine the names and values into the associative array
    $itemData = array_combine($names, $values);
    
    // Merge item data into the callbackData array
    $callbackData = array_merge($callbackData, $itemData);    
    
    // Variables for SQL query
    $MerchantRequestID = $callbackData['MerchantRequestID'];
    $CheckoutRequestID = $callbackData['CheckoutRequestID'];
    $ResultCode = $callbackData['ResultCode'];
    $ResultDesc = $callbackData['ResultDesc'];
    $Amount = isset($callbackData['Amount']) ? $callbackData['Amount'] : null;
    $MpesaReceiptNumber = isset($callbackData['MpesaReceiptNumber']) ? $callbackData['MpesaReceiptNumber'] : null;
    $TransactionDate = isset($callbackData['TransactionDate']) ? $callbackData['TransactionDate'] : null;
    $PhoneNumber = isset($callbackData['PhoneNumber']) ? $callbackData['PhoneNumber'] : null;  
    
    // Store the transaction details in the database
    $query = "INSERT INTO transactions (MerchantRequestID, CheckoutRequestID, ResultCode, Amount, MpesaReceiptNumber, TransactionDate, PhoneNumber) 
            VALUES ('$MerchantRequestID', '$CheckoutRequestID', '$ResultCode', '$Amount', '$MpesaReceiptNumber', '$TransactionDate', '$PhoneNumber')";
    
    if (mysqli_query($db, $query)) {
        echo "Transaction stored successfully.";
    } else {
        echo "Error: " . mysqli_error($db);
    }
}
