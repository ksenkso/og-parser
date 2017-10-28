<?php
/**
 * @var array $data data array returned from OGParser
 */
?>
<div class="Half">
    <h3>ВКонтакте</h3>
    <div class="SocialBlock">
        <div class="SocialBlock__image">
            <img src="<?= $data['image']; ?>" alt="<?= $data['title']; ?>">
        </div>
        <div class="SocialBlock__Information">
            <h4><?= $data['title']; ?></h4>
            <a class="vk" href="<?= $data['url']; ?>" target="_blank" title="<?= $data['title']; ?>"><?= $data['baseUrl']; ?></a>
        </div>
    </div>
</div>