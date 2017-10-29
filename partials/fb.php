<?php
/**
 * @var array $data data array returned from OGParser
 */
?>
<div class="preview preview_fb">
    <h3 class="preview__title">Facebook</h3>
    <div class="preview__container">
        <div class="preview__picture">
            <img class="preview__image" src="<?= $data['image']; ?>" alt="<?= $data['title']; ?>">
        </div>
        <div class="preview__info info">
            <h4 class="info__title">Красивый адрес для YouTube-канала</h4>
            <div class="info__description">
                <?= $data['description']; ?>
            </div>
            <div class="preview__link" href="<?= $data['url']; ?>" title="<?= $data['title']; ?>">
                <div><?= $data['baseUrl'] ?></div>
            </div>
        </div>
    </div>
    <a class="preview__link_full" href="<?= $data['url'] ?>"></a>
</div>