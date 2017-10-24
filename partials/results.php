<?php
/**
 * @var array $data data array returned from OGParser
 */
?>
<!doctype html>
<html>
<head>
    <title>OpenGraph Viewer</title>
    <link type="text/css" rel="stylesheet" href="/style.css">
</head>
<body>
<div class="MainWrapper">
    <div class="Wrapper">
        <form method="get" action="/parser.php">
            <input title="URL сайта" name="url" type="url" placeholder="URL сайта" value="<?= $data['url'] ?>">
            <input type="submit" value="Выполнить">
        </form>
        <section class="Section">
            <div class="Full">
                <?php include "search.php";?>
            </div>
            <div class="Full">
                <?php
                include "vk.php";
                include "fb.php";
                ?>
            </div>
        </section>
    </div>
</div>
</body>
</html>