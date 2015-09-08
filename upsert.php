<?php
require_once 'vendor\autoload.php';

use WindowsAzure\Common\ServicesBuilder;
use WindowsAzure\Common\ServiceException;

// Create blob REST proxy.
$blobRestProxy = ServicesBuilder::getInstance()->createBlobService($connectionString);


$toUpsertTitle = $_GET['Title'];
$toUpsertContent = $_GET['Content'];

try {
    //Upload blob
    $blobRestProxy->createBlockBlob("wiki2", $toUpsertTitle, $toUpsertContent);
}
catch(ServiceException $e){
    // Handle exception based on error codes and messages.
    // Error codes and messages are here:
    // http://msdn.microsoft.com/library/azure/dd179439.aspx
        echo "<p id='error'><b>Error 404:</b> The specified page was not found to be deleted</p>";
            echo $e->getMessage();
}


?>