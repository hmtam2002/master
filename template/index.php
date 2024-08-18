<!DOCTYPE html>
<html lang="<?= LANG ?>">

<head>
    <!-- Head -->
    <?php require_once TEMPLATE . LAYOUT . "head.php" ?>

    <!-- Css -->
    <?php require_once TEMPLATE . LAYOUT . "css.php" ?>

</head>

<body>
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v20.0"
        nonce="c6V3KUnf"></script>
    <!-- Header -->
    <?php require_once TEMPLATE . LAYOUT . "header.php" ?>

    <!-- Nội dung web -->
    <?= $noidung ?>

    <!-- Footer -->
    <?php require_once TEMPLATE . LAYOUT . "footer.php" ?>

    <!-- Js all -->
    <?php require_once TEMPLATE . LAYOUT . "js.php" ?>

</body>

</html>