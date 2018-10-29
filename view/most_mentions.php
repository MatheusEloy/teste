<html>
    <head>
        <?php require_once '../controller/tweetController.php';?>
    </head>
    <body>
        <?php
            $view = new tweetController();
            print_r($view->returnMost_mentions());
        ?>
    </body>
</html>