<?php
                        require_once 'vendor\autoload.php';
                        use WindowsAzure\Common\ServicesBuilder;          

                        $connectionString='DefaultEndpointsProtocol=https;AccountName=dbt330;AccountKey=ixV/NG4/Jy8P9Pk3pByAE3hD8cTfgD7Mb0Anredi0rktSd/NZddt0e63VPfjQW8vCrIc4vapgHeJph3ALkaudQ==';
                        $url = $_SERVER['PATH_INFO'];
                        $blobRestProxy = ServicesBuilder::getInstance()->createBlobService($connectionString);
                        $getRektArg = (parse_url($url, PHP_URL_QUERY));
                        try{                                              //this getRekt is the string it looks for in the wiki2 collection
                            $blobRestProxy->deleteBlob("wiki2",explode("=",$getRekt)[1]);
                        } catch(Exception $e){
                                echo "<p id='error'><b>Error 404:</b> The specified page was not found to be deleted</p>";
                        }
?>