<?php
if ($func->isPOST())
{
    $filterAll = $func->filter();
    $type = $filterAll['type'];
    $static_update = [
        'content' => $_POST['content']
    ];
    $db->update('news', $static_update, "type = '$type'");
    setFlashData('smg', 'Cập nhật thành công');
}

$type = $func->filter()['type'];
$static = $db->oneRaw("SELECT * FROM news WHERE type = '$type'");
$content = $static['content'];

switch ($type)
{
    case 'gioi-thieu':
        $vietsub = 'Giới Thiệu';
        break;
    case 'lien-he':
        $vietsub = 'Liên Hệ';
        break;
    case 'footer':
        $vietsub = 'Footer';
        break;
}
$smg = getFlashData('smg')
    ?>
<!--begin::App Main-->
<main class="app-main">

    <!--begin::App Content Header-->
    <div class="app-content-header">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Quản lý trang tĩnh</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="index.php">Bảng điều khiển</a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Quản lý trang tĩnh
                        </li>
                    </ol>
                </div>
            </div>
            <!--end::Row-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::App Content Header-->
    <!--begin::App Content-->
    <div class="app-content">
        <!--begin::Container-->
        <div class="container-fluid">
            <?php
            if (!empty($smg))
            {
                $func->getSmg($smg);
            }
            ?>
            <form method="post">

                <div class="card card-primary card-outline mb-4">
                    <!--begin::Header-->
                    <div class="card-header">
                        <div class="card-title">Nội Dung <?= $vietsub ?></div>
                    </div>
                    <!--end::Header-->
                    <!--begin::Form-->
                    <div class="card-body">
                        <div class="row">
                            <div class="mb-3 col-12">
                                <label for="content" class="form-label fw-bold">Mô tả:</label>
                                <textarea id="editor" name="content"><?= $content ?></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <input type="hidden" name="type" value="<?= $type ?>">
                        <!--begin::Footer-->
                        <button type="submit" class="btn btn-primary">
                            Cập nhật
                        </button>
                    </div>
                </div>
            </form>
            <!--end::Form-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::App Content-->
</main>
<!--end::App Main-->