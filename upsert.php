<?php
require_once 'vendor\autoload.php';

use WindowsAzure\Common\ServicesBuilder;
use WindowsAzure\Common\ServiceException;

$connectionString='DefaultEndpointsProtocol=https;AccountName=dbt330;AccountKey=ixV/NG4/Jy8P9Pk3pByAE3hD8cTfgD7Mb0Anredi0rktSd/NZddt0e63VPfjQW8vCrIc4vapgHeJph3ALkaudQ==';

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
    //echo $toUpsertTitle;
    //echo $toUpsertContent;
    echo $e->getMessage();
    
}


?>