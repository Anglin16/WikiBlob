<html>
    <head>
        <link rel="stylesheet" type="text/css" href="main.css"/>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="script/edit_page.js"></script>
    </head>
    <body>
        <div>
            <div id="wrapper">
                <div id="header">
                    <ul id="header-items">
                        <li><a href="A" id="logo"><img src="EnochMadeThis2.png"/></a></li>
                        <li><em>A Microsoft Azure based Wikipedia implementation</em></li>
                    </ul>

                </div>
                <div id="content">
                    <article>
                        <h1>Create/Update a page</h1>
                        <br>
                        Title: <input type="text" id="title" value = <?php 
                            $url = $_SERVER['PATH_INFO'];
                            $noSlash =  '"' .substr($url, 1) . '"';
                                      echo $noSlash
                                      ?>> <br> <br>
                        Content: <br>
                        <textarea rows="30"id="content"><?php
                        require_once 'vendor\autoload.php';
                        use WindowsAzure\Common\ServicesBuilder;          

                        $connectionString='DefaultEndpointsProtocol=https;AccountName=dbt330;AccountKey=ixV/NG4/Jy8P9Pk3pByAE3hD8cTfgD7Mb0Anredi0rktSd/NZddt0e63VPfjQW8vCrIc4vapgHeJph3ALkaudQ==';
                        $url = $_SERVER['PATH_INFO'];
                        $noSlash =  substr($url, 1);
                        $blobRestProxy = ServicesBuilder::getInstance()->createBlobService($connectionString);
                        $getRekt = (parse_url($url, PHP_URL_PATH));
                        try {
                            $blob = $blobRestProxy->getBlob("wiki2",$noSlash);
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

                    ?></textarea>
                        <br> <br>
                        <div id="submit_wrapper">
                            <input type="submit" id="submit">
                        </div>
                    </article>
                </div>
                <div id="footer">
                    <p> &copy; 2015 Team FINLEYBERRYBLAKEANGLIN</p>
                </div>
            </div>
        </div>
    </body>
</html>


