<?php
/**
 * @var array $data data array returned from OGParser
 */
?>
<div class="SearchBlock">
    <h3 title="Но это не точно">В поисковых системах</h3>
    <div class="SearchBlock__Icon">
        <img src="https://anatolykulikov.ru/wp-content/themes/anatolykulikov/favicon.ico">
    </div>
    <div class="SearchBlock__Informations">
        <h4 class="SearchBlock__Informations__Title">
            <a href="<?= $data['url']; ?>" target="_blank" title="<?= $data['title']; ?>">
                <?= $data['title']; ?>
            </a>
        </h4>
        <a class="SearchBlock__Informations__Link" href="<?= $data['url']; ?>" target="_blank" title="<?= $data['title']; ?>">
            <?= $data['baseUrl']; ?>
        </a>
        <small class="SearchBlock__Informations__Description"><?= $data['description']; ?></small>
    </div>
</div>