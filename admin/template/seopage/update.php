<?php
if ($func->isPOST())
{
    $filterAll = $func->filter();
    $type = $filterAll['type'];
    $seo_title = $filterAll['seo_title'];
    $seo_keywords = $filterAll['seo_keywords'];
    $seo_description = $filterAll['seo_description'];
    $seo_update = [
        'seo_title' => $seo_title,
        'seo_keywords' => $seo_keywords,
        'seo_description' => $seo_description
    ];
    $db->update('seo', $seo_update, "type = '$type'");
    setFlashData('smg', 'Cập nhật thành công');
}


$type = $func->filter()['type'];
$seo = $db->oneRaw("SELECT * FROM seo WHERE type = '$type'");
$seo_title = $seo['seo_title'];
$seo_keywords = $seo['seo_keywords'];
$seo_description = $seo['seo_description'];
switch ($type)
{
    case 'san-pham':
        $vietsub = 'Sản Phẩm';
        break;
    case 'tin-tuc':
        $vietsub = 'Tin Tức';
        break;
    case 'lien-he':
        $vietsub = 'Liên Hệ';
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
                    <h3 class="mb-0">SEO page - <?= $vietsub ?></h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="index.php">Bảng điều khiển</a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                            SEO page - <?= $vietsub ?>
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
                        <div class="card-title">Thông Tin SEO Page - <?= $vietsub ?></div>
                    </div>
                    <!--end::Header-->
                    <!--begin::Form-->
                    <div class="card-body">
                        <div class="row">
                            <div class="mb-3 col-12">
                                <label for="seo_title" class="form-label fw-bold">SEO Title:</label>
                                <input type="text" name="seo_title" class="form-control" value="<?= $seo_title ?>">
                            </div>
                            <div class="mb-3 col-12">
                                <label for="seo_keywords" class="form-label fw-bold">SEO Keywords:</label>
                                <input type="text" name="seo_keywords" class="form-control"
                                    value="<?= $seo_keywords ?>">
                            </div>
                            <div class="mb-3 col-12">
                                <label for="seo_description" class="form-label fw-bold">SEO Description:</label>
                                <textarea type="text" name="seo_description" class="form-control"
                                    style="height: 120px;"><?= $seo_description ?></textarea>
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