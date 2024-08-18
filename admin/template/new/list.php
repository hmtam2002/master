<?php


$type = $func->filter()['type'];
$new_list = $db->getRaw("SELECT * FROM news WHERE type = '$type'");
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
                    <h3 class="mb-0">Quản lý bài viết <?= $vietsub ?></h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="index.php">Bảng điều khiển</a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Quản lý bài viết <?= $vietsub ?>
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
            <div class="card card-primary card-outline mb-4">
                <!--begin::Header-->
                <div class="card-header">
                    <a href="?com=new&act=add&type=<?= $type ?>" class="btn btn-success">Thêm mới</a>
                </div>
                <!--end::Header-->
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th width="4%" class="text-center">STT</th>
                                <th width="15%" class="text-center">Hình</th>
                                <th>Tiêu đề</th>
                                <th width="8%" class="text-center">Nổi bật</thư>
                                <th width="8%" class="text-center">Hiển thị</th>
                                <th width="10%" class="text-center">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $dem = 1;
                            foreach ($new_list as $item): ?>
                                <tr>
                                    <td class="text-center"><?= $dem++ ?></td>
                                    <td class="text-center">
                                        <img style="width: 100px; height: 80px; object-fit: cover;"
                                            src="../assets/images/upload/<?= $item['image'] ?>" alt="<?= $item['image'] ?>"
                                            onerror="this.src='../assets/images/noimage/noimage.png'">
                                    </td>
                                    <td>
                                        <a href="?com=new&act=edit&type=<?= $item['type'] ?>&id=<?= $item['id'] ?>"
                                            class="text-decoration-none text-black">
                                            <?= $item['title'] ?>
                                        </a>
                                    </td>
                                    <td class="text-center">
                                        <input type="checkbox" name="" class="form-check-input">
                                    </td>
                                    <td class="text-center">
                                        <input type="checkbox" name="" class="form-check-input">
                                    </td>
                                    <td class="text-center">
                                        <a href="?com=new&act=edit&type=<?= $item['type'] ?>&id=<?= $item['id'] ?>"
                                            class="btn btn-warning btn-sm">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>
                                        <a href="?com=new&act=delete&type=<?= $item['type'] ?>&id=<?= $item['id'] ?>"
                                            class="btn btn-danger btn-sm">
                                            <i class="fa-solid fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!--end::Container-->
    </div>
    <!--end::App Content-->
</main>
<!--end::App Main-->