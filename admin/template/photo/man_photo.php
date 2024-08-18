<?php
$type = $func->filter()['type'];
$list_image = $db->getRaw("SELECT * FROM images WHERE type = '$type'");
switch ($type)
{
    case 'slide':
        $vietsub = 'Slideshow';
        break;
    case 'video':
        $vietsub = 'Video';
        break;
    case 'doi-tac':
        $vietsub = 'Đối tác';
        break;
}
$smg = getFlashData('smg');
$smg_type = getFlashData('smg_type');
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
                    <h3 class="mb-0">Chi tiết <?= $vietsub ?></h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="index.php">Bảng điều khiển</a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Chi tiết <?= $vietsub ?>
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
                $func->getSmg($smg, $smg_type);
            }
            ?>
            <div class="card card-primary card-outline">
                <!--begin::Header-->
                <div class="card-header">
                    <a href="?com=photo&act=add_photo&type=<?= $type ?>" class="btn btn-success">Thêm mới</a>
                </div>
                <!--end::Header-->
                <!--begin::Form-->
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <th width="5%">STT</th>
                            <th width="20%">Hình</thư>
                            <th>Link</th>
                            <th width="10%" class="text-center">Thao tác</th>
                        </thead>
                        <tbody>
                            <?php
                            // foreach ($listBook as $item)
                            $count = 0;
                            foreach ($list_image as $item)
                            {
                                ?>
                                <tr>
                                    <td><?= $count += 1 ?></td>
                                    <td>
                                        <img style="height: 80px; width:100px; object-fit:cover;"
                                            onerror="this.src='../assets/images/noimage/noimage.png'"
                                            src="../assets/images/upload/<?= $item['image'] ?>" alt="Ảnh xem trước">
                                    </td>
                                    <td>
                                        <?= $item['link'] ?>
                                    </td>
                                    <td class="text-center">
                                        <a href="?com=photo&act=delete&type=<?= $type ?>&id=<?= $item['id'] ?>"
                                            data_id="<?= $item['id'] ?>" class="btn btn-danger btn-sm btn-delete">
                                            <i class="fa fas fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                    </table>
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