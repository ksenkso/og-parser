<!doctype html>
<html>
<head>
<title>OpenGraph Viewer</title>
<link type="text/css" rel="stylesheet" href="style.css">
</head>

<body>
<?php
/**
 * @var array $title
 * @var array $description
 */
$website_url = 'https://anatolykulikov.ru/lesson/beautiful-address-for-your-youtube-channel/';
require_once 'parser.php';
?>
<div class="MainWrapper">
    <div class="Wrapper">
        <form>
            <input type="url" value="<?php echo $website_url; ?>" placeholder="URL сайта">
            <input type="submit" value="Выполнить">
        </form>

        <section class="Section">
            <!-- Блок на поиске -->
            <div class="Full">
                
                <div class="SearchBlock">
                    <h3 title="Но это не точно">В поисковых системах</h3>
                    <div class="SearchBlock__Icon">
                        <img src="https://anatolykulikov.ru/wp-content/themes/anatolykulikov/favicon.ico">
                    </div>
                    <div class="SearchBlock__Informations">
                        <h4 class="SearchBlock__Informations__Title">
                            <a href="<?php echo $website_url; ?>" target="_blank" title="<?php echo $title[1]; ?>">
                                <?php echo $title[1]; ?>
                            </a>
                        </h4>
                        <a class="SearchBlock__Informations__Link" href="<?php echo $website_url; ?>" target="_blank" title="<?php echo $title[1]; ?>">
                            <?php echo $website_url; ?>
                        </a>
                        <small class="SearchBlock__Informations__Description"><?php echo $description[1]; ?></small>
                    </div>
                </div>
            </div>
            <!-- Блоки Социальных сетей -->
            <div class="Full">
                <!-- Блок ВКонтакте -->
                <div class="Half">
                    <h3>ВКонтакте</h3>
                    <div class="SocialBlock">
                        <img src="https://anatolykulikov.ru/wp-content/uploads/2017/10/Youtubechannel.png" alt="<?php echo $title[1]; ?>">
                        <div class="SocialBlock__Information">
                            <h4>Красивый адрес для YouTube-канала</h4>
                            <a class="vk" href="<?php echo $website_url; ?>" target="_blank" title="<?php echo $title[1]; ?>">anatolykulikov.ru</a>
                        </div>
                    </div>
                </div>
                <!-- Блок Facebook -->
                <div class="Half">
                    <h3>Facebook</h3>
                    <div class="SocialBlock">
                        <img src="https://anatolykulikov.ru/wp-content/uploads/2017/10/Youtubechannel.png" alt="<?php echo $title[1]; ?>">
                        <div class="SocialBlock__Information">
                            <h4>Красивый адрес для YouTube-канала</h4>
                            <p>
                                <?php echo $description[1]; ?>
                            </p>
                            <a class="facebook" href="<?php echo $website_url; ?>" target="_blank" title="<?php echo $title[1]; ?>">anatolykulikov.ru</a>
                        </div>
                    </div>
                </div>

            </div>
        </section>
    </div>
</div>
</body>
</html>