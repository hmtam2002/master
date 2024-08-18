<?php
if ($func->isPOST())
{
    $filterAll = $func->filter();
    $id = $filterAll['id'];
    $data_update = [
        'slug' => $filterAll['slug'],
        'title' => $filterAll['title'],
        'description' => $filterAll['description'],
        'content' => $_POST['content'],
        'seo_title' => $filterAll['seo_title'],
        'seo_keywords' => $filterAll['seo_keywords'],
        'seo_desc' => $filterAll['seo_description'],
    ];
    $image = $func->upload('imageUpload', 'upload');
    if ($image != 'noimage.jpg')
    {
        $data_update['image'] = $image;
    }
    $db->update('news', $data_update, "id='$id'");
    setFlashData('smg', 'Chỉnh sửa thành công');
    // $func->redirect("?com=new&act=edit&id=$id");
}
$filterAll = $func->filter();
$id = $filterAll['id'];
$new = $db->oneRaw("SELECT * FROM news WHERE id = '$id'");
$type = $filterAll['type'];
switch ($type)
{
    case 'tin-tuc':
        $vietsub = 'Tin Tức';
        break;
    case 'khuyen-mai':
        $vietsub = 'Khuyến Mãi';
        break;
    case 'chinh-sach':
        $vietsub = 'Chính Sách';
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
                    <h3 class="mb-0">Chỉnh sửa bài viết <?= $vietsub ?></h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="index.php">Bảng điều khiển</a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Chỉnh sửa bài viết <?= $vietsub ?>
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
                <div class="row">
                    <div class="col-12 col-md-8">
                        <div class="card card-primary card-outline mb-4">
                            <!--begin::Header-->
                            <div class="card-header">
                                <div class="card-title">Tiêu đề bài viết <span class="text-danger text-sm">(vui lòng
                                        không nhập trùng tiêu đề)</span></div>
                            </div>
                            <!--end::Header-->
                            <!--begin::Form-->
                            <div class="card-body">
                                <div class="row">
                                    <div class="mb-3 col-12">
                                        <label id="slugLabel" for="company_name" class="form-label fw-bold">Đường dẫn
                                            mẫu: <?= $http . $_SERVER['HTTP_HOST'] ?></label>
                                        <input id="slugInput" type="text" name="slug" class="form-control" required
                                            value="<?= $new['slug'] ?>">
                                    </div>
                                    <div class="mb-3 col-12">
                                        <label for="company_name" class="form-label fw-bold">Tiêu đề:</label>
                                        <input id="title" type="text" name="title" class="form-control" required
                                            value="<?= $new['title'] ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card card-primary card-outline mb-4">
                            <!--begin::Header-->
                            <div class="card-header">
                                <div class="card-title">Nội dung bài viết</div>
                            </div>
                            <!--end::Header-->
                            <!--begin::Form-->
                            <div class="card-body">
                                <div class="row">
                                    <div class="mb-3 col-12">
                                        <label id="slugLabel" for="company_name" class="form-label fw-bold">Mô
                                            tả:</label>
                                        <textarea name="description" style="min-height: 120px;"
                                            class="form-control"><?= $new['description'] ?></textarea>
                                    </div>
                                    <div class="mb-3 col-12">
                                        <label for="company_name" class="form-label fw-bold">Nội dung:</label>
                                        <textarea name="content" id="editor" style="min-height: 120px;"
                                            class="form-control"><?= $new['content'] ?></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="card card-primary card-outline mb-4">
                            <div class="card-header">
                                <div class="card-title">
                                    Hình ảnh bài viết
                                </div>
                            </div>
                            <div class="card-body">
                                <input type="file" class="form-control" name="imageUpload" id="imageUpload"
                                    accept="image/*">
                                <img id="previewImage" src="../assets/images/upload/<?= $new['image'] ?>"
                                    onerror="this.src='../assets/images/noimage/noimage.png'" alt="Ảnh xem trước"
                                    style="width: 100%; height: 200px; margin-top: 20px; object-fit: cover">
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="card card-primary card-outline mb-4">
                            <div class="card-header">
                                <div class="card-title">Thiết lập SEO</div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="mb-3 col-12">
                                        <label for="seo_title" class="form-label fw-bold">SEO Title:</label>
                                        <input type="text" name="seo_title" class="form-control"
                                            value="<?= $new['title'] ?>">
                                    </div>
                                    <div class="mb-3 col-12">
                                        <label for="seo_keywords" class="form-label fw-bold">SEO Keywords:</label>
                                        <input type="text" name="seo_keywords" class="form-control"
                                            value="<?= $new['seo_keywords'] ?>">
                                    </div>
                                    <div class="mb-3 col-12">
                                        <label for="seo_description" class="form-label fw-bold">SEO Description:</label>
                                        <textarea type="text" name="seo_description" class="form-control"
                                            style="height: 120px;"><?= $new['seo_description'] ?></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="type" value="<?= $type ?>">
                        <button type="submit" class="btn btn-primary">
                            Lưu
                        </button>
                    </div>
                    <!--begin::Footer-->

                </div>
            </form>
            <!--end::Form-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::App Content-->
</main>
<!--end::App Main-->