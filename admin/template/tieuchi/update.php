<?php
if ($func->isPOST())
{
    $filterAll = $func->filter();
    $type = $filterAll['type'];
    $data_update = [
        'title' => $filterAll['title'],
        'description' => $filterAll['description']
    ];
    $image = $func->upload('imageUpload', 'upload');
    if ($image != 'noimage.jpg')
    {
        $data_update['image'] = $image;
    }
    $db->update('news', $data_update, "type = '$type'");
    setFlashData('smg', 'Cập nhật thành công');
}


$type = $func->filter()['type'];
$tieuchi = $db->oneRaw("SELECT * FROM news WHERE type = '$type'");
switch ($type)
{
    case 'tieu-chi-1':
        $vietsub = 'Tiêu Chí 1';
        break;
    case 'tieu-chi-2':
        $vietsub = 'Tiêu Chí 2';
        break;
    case 'tieu-chi-3':
        $vietsub = 'Tiêu Chí 3';
        break;
    case 'tieu-chi-4':
        $vietsub = 'Tiêu Chí 4';
        break;
}
$smg = getFlashData('smg');
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
            <form method="post" enctype="multipart/form-data">

                <div class="col-12 col-md-9 col-lg-6">
                    <div class="card card-primary card-outline mb-4">
                        <!--begin::Header-->
                        <div class="card-header">
                            <div class="card-title">Nội Dung <?= $vietsub ?></div>
                        </div>
                        <!--end::Header-->
                        <!--begin::Form-->
                        <div class="card-body">
                            <div class="mb-4">
                                <label for="imageUpload" class="form-label fw-bold">Hình ảnh:</label>
                                <input type="file" class="form-control" name="imageUpload" id="imageUpload"
                                    accept="image/*">
                                <img id="previewImage" src="../assets/images/upload/<?= $tieuchi['image'] ?>"
                                    onerror="this.src='../assets/images/noimage/noimage.png'" alt="Ảnh xem trước"
                                    style="max-width: 100%; height: 100px; margin-top: 20px; object-fit: cover">
                            </div>
                            <div class="mb-4">
                                <label class="form-label fw-bold">Tiêu đề:</label>
                                <input type="text" class="form-control" name="title" value="<?= $tieuchi['title'] ?>">
                            </div>
                            <div class="mb-4">
                                <label class="form-label fw-bold">Mô tả:</label>
                                <input type="text" class="form-control" name="description"
                                    value="<?= $tieuchi['description'] ?>">
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
                </div>
            </form>
            <!--end::Form-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::App Content-->
</main>
<!--end::App Main-->