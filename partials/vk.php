<?php
/**
 * @var array $data data array returned from OGParser
 */
?>
<div class="preview preview_vk">
    <h3 class="preview__title">ВКонтакте</h3>
    <div class="preview__container">
        <a href="<?= $data['url']; ?>"></a>
        <div class="preview__picture">
            <img class="preview__image" src="<?= $data['image']; ?>" alt="<?= $data['title']; ?>">
        </div>
        <div class="preview__info info">
            <h4 class="info__title"><?= $data['title']; ?></h4>
            <a class="preview__link" href="<?= $data['url']; ?>" target="_blank" title="<?= $data['title']; ?>">
                <div><?= $data['baseUrl']; ?></div>
            </a>
        </div>
    </div>
</div>