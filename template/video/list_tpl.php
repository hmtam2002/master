<?php
$list_video = $db->getRaw("SELECT * FROM images WHERE type = 'video'");
$title = 'Video';
$active = 'video';
if (empty($list_video))
{
    setFlashData('smg', 'Nội dung đang được cập nhật');
    setFlashData('smg_type', 'danger');
}
$smg = getFlashData('smg');
$smg_type = getFlashData('smg_type');
?>
<div class="py-3 bg-light">
    <div class="wrap-content px-3">
        <a style="font-size: 14px;" class="text-decoration-none" href="./">Trang chủ</a>
        <span style="font-size: 14px;"> / Video</span>
    </div>
</div>
<div class="wrap-content my-4 px-3">
    <div class="title-main">
        <h2 class="title-lienhe">Video</h2>
    </div>
    <?php
    if (!empty($smg))
    {
        $f->getSmg($smg, $smg_type);
    } ?>
    <div class="wrap-content row">
        <?php
        foreach ($list_video as $video): ?>
            <div class="col-md-3 p-1">
                <iframe class="w-100" src="https://www.youtube.com/embed/<?= $f->getYouTubeVideoId($video['link']) ?>"
                    frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen></iframe>
            </div>
        <?php endforeach; ?>
    </div>
</div>