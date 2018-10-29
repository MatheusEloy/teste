<html>
    <head>
        <?php require_once '../controller/tweetController.php';?>
        <?php require_once '../test/Test.php';?>
    </head>
    <body>
        <?php
            $view = new Test();
            print_r($view->testObject());
            print_r($view->testEmptyRelevants());
            print_r($view->testEmptyMentions());
        ?>
    </body>
</html>