<?php
/**
 * @var array $data data array returned from OGParser
 */
?>
<div class="Half">
    <h3>ВКонтакте</h3>
    <div class="SocialBlock">
        <!-- TODO: image should be replaced to dynamic -->
        <img src="https://anatolykulikov.ru/wp-content/uploads/2017/10/Youtubechannel.png" alt="<?= $data['title']; ?>">
        <div class="SocialBlock__Information">
            <h4><?= $data['title']; ?></h4>
            <a class="vk" href="<?= $data['url']; ?>" target="_blank" title="<?= $data['title']; ?>"><?= $data['baseUrl']; ?></a>
        </div>
    </div>
</div>