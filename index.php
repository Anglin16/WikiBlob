<html>
    <head>
        <link rel="stylesheet" type="text/css" href="main.css"/>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    </head>
    <body>
        <div>
            <div id="wrapper">
                <div id="header">
                    <ul id="header-items">
                        <li><a href="A"><img src="EnochMadeThis2.png"/></a></li>
                        <li><em>A Microsoft Azure based Wikipedia implementation</em></li>
                    </ul>
                    <ul id="edit">
                        <a href="__add"><i class="material-icons">note_add</i></a>
                        <a href="__edit"><i class="material-icons">mode_edit</i></a>
                        <a href="__delete"><i class="material-icons">delete</i></a>
                     </ul>
                </div>
                <div id="content">
                    <article>
                    <?php
                        require_once 'vendor\autoload.php';
                        use WindowsAzure\Common\ServicesBuilder;          

                        $connectionString='DefaultEndpointsProtocol=https;AccountName=dbt330;AccountKey=ixV/NG4/Jy8P9Pk3pByAE3hD8cTfgD7Mb0Anredi0rktSd/NZddt0e63VPfjQW8vCrIc4vapgHeJpSh3ALkaudQ==';
                        $url = $_SERVER['PATH_INFO'];
                        $blobRestProxy = ServicesBuilder::getInstance()->createBlobService($connectionString);
                        $getRekt = (parse_url($url, PHP_URL_PATH));
                        try {
                            $blob = $blobRestProxy->getBlob("wiki2", substr($getRekt, 1));
                            //echo "<p>";
                            fpassthru($blob->getContentStream());
                            //echo "</p>";
                        } catch (Exception $e) {
                            $code = $e->getCode();
                            if($e->getCode() ==404){
                                echo "<p id='error'><b>Error 404:</b> The specified page was not found</p>";
                            }
                            //$error_message = $e->getMessage();
                            //echo $code.": ".$error_message."<br />";
                        }

                    ?>
                    </article>
                </div>
                <div id="footer">
                    <p> &copy; 2015 Team FINLEYBERRYBLAKEANGLIN</p>
                </div>
            </div>
        </div>
    </body>
</html>


