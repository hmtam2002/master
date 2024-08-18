<?php
$tieuchi_list = $db->getRaw("SELECT * FROM news WHERE type LIKE 'tieu-chi%'");
?>
<section id="tieuchi">
    <div class="wrap-content">
        <div class="tieuchi-list">
            <?php
            foreach ($tieuchi_list as $tieuchi): ?>
                <div class="tieuchi-item">
                    <img class="tieuchi-image" src="./assets/images/upload/<?= $tieuchi['image'] ?>"
                        onerror="this.src='assets/images/noimage/noimage.png'" alt="tieuchi">
                    <div class="tieuchi-item-info">
                        <p class="tieuchi-item-title"><?= $tieuchi['title'] ?></p>
                        <p class="tieuchi-item-desc"><?= $tieuchi['description'] ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>