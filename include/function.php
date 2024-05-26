<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class func
{
    function isLogin()
    {
        $checkLogin = false;
        if (getSession('loginToken'))
        {
            $tokenLogin = getSession('loginToken');
            $db = new Database();
            //Kiểm tra token có giống trong database không
            $queryToken = $db->oneRaw("SELECT admin_id FROM adminToken WHERE token = '$tokenLogin'");
            if (!empty($queryToken))
            {
                $checkLogin = true;
            } else
            {
                removeSession("loginToken");
            }
        }
        return $checkLogin;
    }

    public function layout($layoutName = 'head', $data = [])
    {
        require_once _WEB_PATH_TEMPLATE . '/layout/' . $layoutName . '.php';
    }
    public function isPOST()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST")
        {
            return true;
        }
        return false;
    }
    public function isGET()
    {
        if ($_SERVER['REQUEST_METHOD'] == "GET")
        {
            return true;
        }
        return false;
    }
    function filter()
    {
        $filterArr = [];
        if ($this->isGET())
        {
            if (!empty($_GET))
            {
                foreach ($_GET as $key => $value)
                {
                    $key = strip_tags($key);
                    if (is_array($value))
                    {
                        $filterArr[$key] = filter_input(INPUT_GET, $key, FILTER_SANITIZE_SPECIAL_CHARS, FILTER_REQUIRE_ARRAY);
                    } else
                    {
                        $filterArr[$key] = filter_input(INPUT_GET, $key, FILTER_SANITIZE_SPECIAL_CHARS);
                    }
                }
            }
        }

        if ($this->isPOST())
        {
            if (!empty($_POST))
            {
                foreach ($_POST as $key => $value)
                {
                    if (is_array($value))
                    {
                        $filterArr[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS, FILTER_REQUIRE_ARRAY);
                    } else
                    {
                        $filterArr[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);
                    }
                }
            }
        }
        return $filterArr;
    }
    // public function redirect($path = 'index.php')
    // {
    //     header("location: $path");
    //     exit;
    // }
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

    public function getSmg($smg, $type = 'success')
    {
        echo '<div class="alert alert-' . $type . '">';
        echo $smg;
        echo '</div>';
    }
    public function old($filename, $oldData, $default = null)
    {
        return (!empty($oldData[$filename])) ? $oldData[$filename] : $default;
    }
    public function sendMail($to, $subject, $content)
    {

        //Create an instance; passing `true` enables exceptions
        $mail = new PHPMailer(true);

        try
        {
            //Server settings
            $mail->SMTPDebug = SMTP::DEBUG_OFF;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth = true;                                   //Enable SMTP authentication
            $mail->Username = 'thevyshop.contact@gmail.com';                     //SMTP username
            $mail->Password = 'tlan nljd syxr nkrg';                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom('from@example.com', 'Muasach.vn');
            $mail->addAddress($to);     //Add a recipient 


            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = $subject;
            $mail->Body = $content;
            $mail->CharSet = 'UTF-8'; // Set charset to UTF-8
            $mail->send();
            return true;
        } catch (Exception $e)
        {
            // echo "Gửi mail thất bại. Mailer Error: {$mail->ErrorInfo}";
            return false;
        }
    }
    public function formError($filename, $beforeHtml = '', $afterHtml = '', $errors)
    {
        return (!empty($errors[$filename])) ? $beforeHtml . reset($errors[$filename]) . $afterHtml : null;
    }
    //Hàm kiểm tra số nguyên
    public function isNumberInt($number)
    {
        return filter_var($number, FILTER_VALIDATE_INT);
    }
    //Hàm kiểm tra số thực
    public function isNumberFloat($number)
    {
        return filter_var($number, FILTER_VALIDATE_FLOAT);
    }
    //Hàm kiểm tra số điện thoại
    public function isPhone($phone)
    {
        //điều kiện ký tự đầu tiên là số 0
        $checkZero = false;
        if ($phone[0] == 0)
        {
            $checkZero = true;
            $phone = substr($phone, 1);
        }
        // đằng sau nó có 9 số
        $checkNumber = false;
        if ($this->isNumberInt($phone) && (strlen($phone) == 9))
        {
            $checkNumber = true;
        }
        if ($checkZero && $checkNumber)
            return true;
        return false;
    }
    public function upload($filenameupload, $path = '')
    {
        $check = true;
        if ($path === '')
        {
            $target_dir = _PATH_ASSETS . '/images/product/';
        } else
        {
            // Đảm bảo đường dẫn tùy chỉnh bắt đầu bằng dấu gạch chéo và kết thúc bằng dấu gạch chéo
            $target_dir = rtrim(_PATH_ASSETS, '/') . '/' . trim($path, '/') . '/';
        }

        // Kiểm tra và thay đổi quyền nếu cần thiết
        if (!is_writable($target_dir))
        {
            // Cố gắng thay đổi quyền thư mục thành writable (0775)
            if (!chmod($target_dir, 0775))
            {
                $this->getSmg('Không thể thay đổi quyền thư mục. Vui lòng kiểm tra lại.', 'danger');
                return "noimage.jpg";
            }
        }

        $target_file = $target_dir . basename($_FILES[$filenameupload]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $new_filename = time() . '.' . $imageFileType;
        $allow_file_upload = array("jpg", "jpeg", "png", "gif", "jfif");

        // Kiểm tra nếu không có file được chọn
        if (!isset($_FILES[$filenameupload]) || $_FILES[$filenameupload]['error'] == UPLOAD_ERR_NO_FILE)
        {
            $this->getSmg('Không có file nào được chọn.', 'danger');
            return "noimage.jpg";
        }

        // Kiểm tra nếu file có phải là hình ảnh thật hay không
        $checkImage = getimagesize($_FILES[$filenameupload]["tmp_name"]);
        if ($checkImage === false)
        {
            $this->getSmg('File upload không phải là hình ảnh!', 'danger');
            return "noimage.jpg";
        }

        // Kiểm tra định dạng file
        if (!in_array($imageFileType, $allow_file_upload))
        {
            $this->getSmg('Định dạng file không hợp lệ! Chỉ chấp nhận JPG, JPEG, PNG, GIF, JFIF.', 'danger');
            return "noimage.jpg";
        }

        // Kiểm tra kích thước file (ví dụ: giới hạn 5MB)
        if ($_FILES[$filenameupload]["size"] > 5000000)
        {
            $this->getSmg('File upload quá lớn! Giới hạn 5MB.', 'danger');
            return "noimage.jpg";
        }

        // Kiểm tra nếu file đã tồn tại (tránh ghi đè file)
        if (file_exists($target_dir . $new_filename))
        {
            $this->getSmg('File đã tồn tại.', 'danger');
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
            $this->getSmg('Có lỗi xảy ra khi upload file của bạn.', 'danger');
            return "noimage.jpg";
        }
    }

    public function image_exists($filename, $path = '')
    {
        $defaultImage = _HOST_ASSETS . '/images/noimage/noimage.png'; // Đường dẫn tới ảnh mặc định
        if (empty($filename))
        {
            return $defaultImage;
        }
        $imagePath = _PATH_ASSETS . '/images/product/' . $filename; // Đường dẫn tới ảnh cần kiểm tra

        if (file_exists($imagePath))
        {
            return _HOST_ASSETS . '/images/product/' . $filename;
        } else
        {
            return $defaultImage;
        }
    }
    public function slider_exists($filename)
    {
        $defaultImage = _HOST_ASSETS . '/images/noimage/noimage.png'; // Đường dẫn tới ảnh mặc định
        if (empty($filename))
        {
            return $defaultImage;
        }
        $imagePath = _PATH_ASSETS . '/images/slider/' . $filename; // Đường dẫn tới ảnh cần kiểm tra

        if (file_exists($imagePath))
        {
            return _HOST_ASSETS . '/images/slider/' . $filename;
        } else
        {
            return $defaultImage;
        }
    }
}