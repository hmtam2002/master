<?php
$doitac_list = $db->getRaw("SELECT * FROM images WHERE type = 'doi-tac'");
?>
<section id="doitac" class="px-3">
    <div class="wrap-content">
        <div class="doitac-list">
            <?php
            foreach ($doitac_list as $doitac): ?>
                <div class="d-flex justify-content-center">
                    <div class="doitac-item">
                        <img src="assets/images/upload/<?= $doitac['image'] ?>"
                            onerror="this.src = 'assets/images/noimage/noimage.png'" alt="đối tác">
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>