<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Phalcon CMS Setup</title>
        <link rel="stylesheet" href="http://www.hard-ui.com/build/hard-ui.min.css">

        <style media="screen">
            a {
                font-weight: bold;
                text-decoration: underline;
            }
            ul li {
                margin: 1.4rem 1.0rem;
            }
        </style>
    </head>
    <body>
        <div class="hd-container">
            <div class="hd-center-float">
                <h1>PHP environment</h1>
                <ul>
                    <?php

                    // check php extensions
                    $error_flg = false;

                    if (!extension_loaded('Phalcon')) {
                        echo '<li><a href="https://phalconphp.com/" target="_blank">Phalcon</a> is not installed</li>';
                        $error_flg = true;
                    }

                    if (!extension_loaded('pdo_mysql')) {
                        echo '<li><a href="http://php.net/manual/en/ref.pdo-mysql.php" target="_blank">PDO_MySQL</a> is not installed</li>';
                        $error_flg = true;
                    }

                    // if (!extension_loaded('oci8')) {
                    //     echo '<li><a href="http://php.net/manual/en/ref.pdo-mysql.php" target="_blank">oci8</a> is not installed</li>';
                    //     $error_flg = true;
                    // }

                    ?>
                </ul>

                <?php if (!$error_flg): ?>
                    <div class="hd-message-success">
                        PHP environment for Phalcon-CMS is OK! <br>
                    </div>

                    <div class="hd-mg-2">
                        Next -> <a href="_/setup"><button type="link" name="button">Set Up Database</button></a>
                    </div>

                <?php else: ?>

                    <div class="hd-message-error">
                        Please fix PHP environment and reload this page.
                    </div>

                <?php endif; ?>

            </div>
        </div>


    </body>
</html>
