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
    public function redirect($path = 'index.php')
    {
        header("location: $path");
        exit;
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
    public function upload($filenameupload)
    {
        $check = true;
        $target_dir = "upload/";
        $target_file = $target_dir . basename($_FILES[$filenameupload]["name"]);//"upload/1.jpg"
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));//jpg
        $new_filename = time() . '.' . $imageFileType;//4534534523.jpg
        $allow_file_upload = array("jpg", "png", "gif", "jfif");
        if (!in_array($imageFileType, $allow_file_upload))
            $check = false;
        if ($check == true)
        {
            if (move_uploaded_file($_FILES[$filenameupload]["tmp_name"], $target_dir . $new_filename))
                return $new_filename;
            else
                return "noimage.jpg";
        } else
            $this->messager('File upload không hợp lệ!');
    }
    public function messager($text = '')
    {
        global $cmd;
        $_SESSION['flash'] = '<div class="alert alert-success" role="alert">' . $text . '</div>';
        echo "<script>document.location.href='index.php?cmd=" . $cmd . "'</script>";
    }
    function createSlug($str)
    {
        $slug = strtolower(trim($str));
        $slug = preg_replace('/[^a-z0-9-]/', '-', $slug); // Loại bỏ các ký tự không phải chữ cái, số hoặc dấu gạch ngang
        $slug = preg_replace('/-+/', "-", $slug); // Loại bỏ các dấu gạch ngang liên tiếp
        return $slug;
    }
}