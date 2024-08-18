<?php

if ($func->isPost() && isset($_POST['login']))
{
    $filterAll = $func->filter();
    $username = $filterAll['username'];
    $password = $filterAll['password'];
    $error = false;
    if (empty($username))
    {
        setFlashData('smg', 'Chưa nhập tên đăng nhập');
        setFlashData('smg_type', 'danger');
        $error = true;
    }
    if (empty($password))
    {
        setFlashData('smg', 'Chưa nhập mật khẩu');
        setFlashData('smg_type', 'danger');
        $error = true;
    }
    if (empty($password) && empty($username))
    {
        setFlashData('smg', 'Chưa nhập tên đăng nhập và mật khẩu');
        setFlashData('smg_type', 'danger');
        $error = true;
    }
    if (!$error)
    {
        $userQuery = $db->oneRaw("SELECT * FROM admin WHERE username = '$username'");
        if (!empty($userQuery))
        {
            $passwordHash = $userQuery['password'];
            $admin_id = $userQuery['id'];
            $fullname = $userQuery['fullname'];
            if (password_verify($password, $passwordHash))
            {
                //tạo token login
                $tokenLogin = sha1(uniqid() . time());
                //insert vào bảng loginToken
                $dataInsert = [
                    'admin_id' => $admin_id,
                    'token' => $tokenLogin,
                    'create_at' => date('Y-m-d H:i:s')
                ];
                $insertStatus = $db->insert('admin_token', $dataInsert);
                if ($insertStatus)
                {
                    //insert thành công
                    //lưu login token vào session
                    setSession('loginToken', $tokenLogin);
                    setSession('adminName', $fullname);
                    setSession('admin_id', $admin_id);
                    $func->redirect('index.php');
                } else
                {
                    setFlashData('smg', 'Không thể đăng nhập, vui lòng thử lại sau');
                    setFlashData('smg_type', 'danger');
                    setFlashData('old', $filterAll);
                }
            } else
            {
                setFlashData('smg', 'Mật khẩu sai');
                setFlashData('smg_type', 'danger');
                setFlashData('old', $filterAll);
            }

        } else
        {
            setFlashData('smg', 'Tài khoản không tồn tại');
            setFlashData('smg_type', 'danger');
            setFlashData('old', $filterAll);
        }
    }

}

$smg = getFlashData('smg');
$smg_type = getFlashData('smg_type');
?>
<div class="position-fixed left-0 top-0 w-100 h-100">
    <div class="bg-dark d-flex justify-content-center align-items-center py-2 mb-0">
        <a class="text-decoration-none text-light" href="../" target="_blank" style="font-size: 12px;">
            <i class="fa-solid fa-reply"></i>
            <span>Xem website</span>
        </a>
    </div>
    <div class="w-100 h-100 bg-light d-flex justify-content-center align-items-center pb-5">
        <div class="border p-4 rounded-3 bg-white shadow-lg mb-5" style="max-width: 450px;">
            <p class="text-center mb-3 fs-5">Đăng nhập Hệ thống</p>
            <form method="post">
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1"><i
                            class="fa-solid fa-user text-secondary"></i></i></span>
                    <input style="font-size: 14px;" name="username" type="text" class="form-control"
                        placeholder="Tài khoản *" aria-label="Username" aria-describedby="basic-addon1">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon2"><i
                            class="fa-solid fa-lock text-secondary"></i></span>
                    <input style="font-size: 14px;" name="password" type="password" class="form-control" id="password"
                        placeholder="Mật khẩu *" aria-label="Password" aria-describedby="basic-addon2">
                    <button type="button" class="input-group-text" id="toggle-password"><i
                            class="text-secondary fa-solid fa-eye"></i></button>
                </div>

                <button style="font-size: 14px;" type="submit" name="login" class="btn btn-danger w-100 p-2">Đăng
                    nhập</button>
            </form>
            <?php if (!empty($smg))
            {
                $func->getSmg($smg, $smg_type, 'text-center p-2 mt-2 mb-0');
            }
            ?>
        </div>
    </div>
</div>

<!-- hiện mật khẩu -->
<script>
    $(document).ready(function () {
        $('#toggle-password').click(function () {
            var passwordField = $('#password');
            var passwordFieldType = passwordField.attr('type');
            var icon = $(this).find('i');

            if (passwordFieldType === 'password') {
                passwordField.attr('type', 'text');
                icon.removeClass('fa-eye').addClass('fa-eye-slash');
            } else {
                passwordField.attr('type', 'password');
                icon.removeClass('fa-eye-slash').addClass('fa-eye');
            }
        });
    });
</script>