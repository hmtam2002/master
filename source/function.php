<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class func
{
    public function isPOST()
    {
        return $_SERVER['REQUEST_METHOD'] === 'POST';
    }
    public function isGET()
    {
        return $_SERVER['REQUEST_METHOD'] === 'GET';
    }
    public function filter()
    {
        $filterArr = [];

        // Lọc các tham số từ phương thức GET
        if ($this->isGET())
        {
            $filterArr += filter_input_array(INPUT_GET, FILTER_SANITIZE_SPECIAL_CHARS);
        }

        // Lọc các tham số từ phương thức POST
        if ($this->isPOST())
        {
            $filterArr += filter_input_array(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS);
        }

        return $filterArr;
    }

    public function redirect($path = 'index.php')
    {
        if (!headers_sent())
        {
            header("location: $path");
            exit;
        } else
        {
            echo "<script>window.location.href='$path';</script>";
            exit;
        }

    }

    public function getSmg($smg, $type = 'success', $class = '')
    {
        echo '<div class="my-alert alert alert-' . $type . ' ' . $class . '" role="alert">';
        echo $smg;
        echo '</div>';
    }

    public function upload($filenameupload, $path = '')
    {
        $check = true;

        // Đảm bảo đường dẫn tùy chỉnh bắt đầu bằng dấu gạch chéo và kết thúc bằng dấu gạch chéo
        $target_dir = rtrim(_PATH_ASSETS, '/') . '/images/' . trim($path, '/') . '/';

        // Kiểm tra và thay đổi quyền nếu cần thiết
        if (!is_writable($target_dir))
        {
            // Cố gắng thay đổi quyền thư mục thành writable (0775)
            if (!chmod($target_dir, 0775))
            {
                // $this->getSmg('Không thể thay đổi quyền thư mục. Vui lòng kiểm tra lại.', 'danger');
                return "noimage.jpg";
            }
        }

        $target_file = $target_dir . basename($_FILES[$filenameupload]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $new_filename = time() . '.' . $imageFileType;
        $allow_file_upload = ["jpg", "jpeg", "png", "gif", "jfif", "webp"];

        // Kiểm tra nếu không có file được chọn
        if (!isset($_FILES[$filenameupload]) || $_FILES[$filenameupload]['error'] == UPLOAD_ERR_NO_FILE)
        {
            // $this->getSmg('Không có file nào được chọn.', 'danger');
            return "noimage.jpg";
        }

        // Kiểm tra nếu file có phải là hình ảnh thật hay không
        $checkImage = getimagesize($_FILES[$filenameupload]["tmp_name"]);
        if ($checkImage === false)
        {
            // $this->getSmg('File upload không phải là hình ảnh!', 'danger');
            return "noimage.jpg";
        }

        // Kiểm tra định dạng file
        if (!in_array($imageFileType, $allow_file_upload))
        {
            // $this->getSmg('Định dạng file không hợp lệ! Chỉ chấp nhận JPG, JPEG, PNG, GIF, JFIF.', 'danger');
            return "noimage.jpg";
        }

        // Kiểm tra kích thước file (ví dụ: giới hạn 5MB)
        if ($_FILES[$filenameupload]["size"] > 5000000)
        {
            // $this->getSmg('File upload quá lớn! Giới hạn 5MB.', 'danger');
            return "noimage.jpg";
        }

        // Kiểm tra nếu file đã tồn tại (tránh ghi đè file)
        if (file_exists($target_dir . $new_filename))
        {
            // $this->getSmg('File đã tồn tại.', 'danger');
            return "noimage.jpg";
        }

        // In ra đường dẫn và tên file để kiểm tra
        // echo "Đường dẫn file tạm: " . $_FILES[$filenameupload]["tmp_name"] . "<br>";
        // echo "Đường dẫn đích: " . $target_dir . $new_filename . "<br>";

        // Thực hiện upload file
        if (move_uploaded_file($_FILES[$filenameupload]["tmp_name"], $target_dir . $new_filename))
        {
            return $new_filename;
        } else
        {
            // In ra lỗi cụ thể nếu có
            $error = error_get_last();
            echo "Error: " . $error['message'] . "<br>";
            // $this->getSmg('Có lỗi xảy ra khi upload file của bạn.', 'danger');
            return "noimage.jpg";
        }
    }

    public function image_exists($filename, $path = '')
    {
        $defaultImage = '../assets/images/noimage/noimage.png'; // Đường dẫn tới ảnh mặc định
        if (empty($filename))
        {
            return $defaultImage;
        }
        $imagePath = _PATH_ASSETS . '/images/' . $path . '/' . $filename; // Đường dẫn tới ảnh cần kiểm tra

        if (file_exists($imagePath))
        {
            return 'assets/images/' . $path . '/' . $filename;
        } else
        {
            return $defaultImage;
        }
    }

    public function getYouTubeVideoId($url)
    {
        $pattern = '/(?:https?:\/\/)?(?:www\.)?(?:youtube\.com\/(?:[^\/\n\s]+\/\S+\/|(?:v|e(?:mbed)?)\/|\S*?[?&]v=)|youtu\.be\/)([a-zA-Z0-9_-]{11})/';
        preg_match($pattern, $url, $matches);
        return isset($matches[1]) ? $matches[1] : null;
    }
}