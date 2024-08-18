<?php
$slider_list = $db->getRaw("SELECT * FROM images WHERE type = 'slide'");
$effects = [
    'animate__fadeIn',
    'animate__zoomIn',
    'animate__slideInLeft',
    'animate__slideInRight',
    'animate__flipInX',
    'animate__bounceIn',
    'animate__rotateIn',
    'animate__jackInTheBox',
    'animate__rollIn'
];
?>
<section id="section-slider">
    <div id="slider-page" class="carousel slide" data-bs-ride="carousel" data-bs-interval="2000">
        <div class="carousel-indicators">
            <?php for ($i = 0; $i < count($slider_list); $i++): ?>
                <button type="button" data-bs-target="#slider-page" data-bs-slide-to="<?= $i ?>" <?= $i == 0 ? 'class="active" aria-current="true"' : '' ?> aria-label="Slide <?= $i ?>"></button>
            <?php endfor; ?>
        </div>
        <div class="carousel-inner">
            <?php for ($i = 0; $i < count($slider_list); $i++): ?>
                <div class="carousel-item <?= $i == 0 ? 'active' : '' ?>">
                    <img class="w-100 animate__animated <?= $effects[$i % count($effects)] ?>"
                        src="./assets/images/upload/<?= $slider_list[$i]['image'] ?>"
                        onerror="this.src='assets/images/noimage/noimage.png'" class="d-block w-100" alt="slider">
                </div>
            <?php endfor; ?>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#slider-page" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#slider-page" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</section>