<?php
$lienhe = $db->oneRaw("SELECT * FROM news WHERE type = 'lien-he'")['content'];
$smg = getFlashData('smg');
?>
<div class="py-3 bg-light">
    <div class="wrap-content px-3">
        <a style="font-size: 14px;" class="text-decoration-none" href="./">Trang chủ</a>
        <span style="font-size: 14px;"> / Liên hệ</span>
    </div>
</div>
<div class="wrap-content px-3 my-4">
    <div class="row mb-5">
        <p class="title-lienhe">Liên hệ</p>
        <div class="col-md-6">
            <div class="lienhe-content">
                <?= $lienhe ?>
            </div>
        </div>
        <div class="col-md-6">
            <?php
            if (!empty($smg))
            {
                $func->getSmg($smg);
            }
            ?>
            <form method="post">
                <div class="row">
                    <div class="col-sm-6 mb-3">
                        <input type="text" class="form-control" id="ten" name="ten" placeholder="Họ tên" required>
                        <div class="invalid-feedback">Vui lòng nhập họ và tên</div>
                    </div>
                    <div class=" col-sm-6 mb-3">
                        <input type="number" class="form-control" id="dienthoai" name="dienthoai"
                            placeholder="Số điện thoại" required>
                        <div class="invalid-feedback">Vui lòng nhập số điện thoại</div>
                    </div>
                    <div class="col-sm-12 mb-3">
                        <input type="text" class="form-control" id="diachi" name="diachi" placeholder="Địa chỉ"
                            required>
                        <div class="invalid-feedback">Vui lòng nhập địa chỉ</div>
                    </div>
                    <div class="col-sm-12 mb-3">
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                        <div class="invalid-feedback">Vui lòng nhập địa chỉ email</div>
                    </div>
                </div>
                <textarea style="height: 200px;" class="form-control mb-3" id="noidung" name="noidung"
                    placeholder="Nội dung" required=""></textarea>
                <div class="invalid-feedback">Vui lòng nhập nội dung</div>
                <button type="submit" class="btn btn-primary">Gửi</button>
                <input type="reset" class="btn btn-secondary" value="Nhập lại">
            </form>
        </div>
    </div>
    <!-- Google map -->
    <?= $setting_info[5]['setting_value'] ?>
</div>