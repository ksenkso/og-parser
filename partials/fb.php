<?php
/**
 * @var array $data data array returned from OGParser
 */
?>
<div class="Half">
    <h3>Facebook</h3>
    <div class="SocialBlock">
        <img src="<?= $data['image']; ?>" alt="<?= $data['title']; ?>">
        <div class="SocialBlock__Information">
            <h4>Красивый адрес для YouTube-канала</h4>
            <p>
                <?= $data['description']; ?>
            </p>
            <a class="facebook" href="<?= $data['url']; ?>" target="_blank" title="<?= $data['title']; ?>">anatolykulikov.ru</a>
        </div>
    </div>
</div>