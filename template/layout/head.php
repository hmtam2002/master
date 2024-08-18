<?php
$favicon = $db->oneRaw("SELECT * FROM images WHERE type = 'favicon'")['image'];
?>
<!-- charset -->
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<!-- title -->
<title><?= !empty($title) ? $title : 'tên công ty' ?></title>
<?php $favicon = $db->oneRaw("SELECT * FROM images WHERE type = 'favicon'")['image'] ?>
<!-- icon -->
<link rel="icon" href="assets/images/upload/<?= $favicon ?>" type="image/x-icon" />