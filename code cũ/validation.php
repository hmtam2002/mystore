<?php
if (empty($filterAll['password']))
{
    $errors['password']['required'] = 'Mật khẩu bắt buộc phải nhập';
} else
{
    $password = $filterAll['password'];
    $errorMessages = [];

    // Kiểm tra độ dài tối thiểu
    if (strlen($password) < 8)
    {
        $errorMessages[] = 'Mật khẩu phải lớn hơn hoặc bằng 8 ký tự';
    }

    // Kiểm tra có chứa ít nhất một chữ cái viết hoa
    if (!preg_match('/[A-Z]/', $password))
    {
        $errorMessages[] = 'Mật khẩu phải chứa ít nhất một chữ cái viết hoa';
    }

    // Kiểm tra có chứa ít nhất một chữ cái viết thường
    if (!preg_match('/[a-z]/', $password))
    {
        $errorMessages[] = 'Mật khẩu phải chứa ít nhất một chữ cái viết thường';
    }

    // Kiểm tra có chứa ít nhất một chữ số
    if (!preg_match('/[0-9]/', $password))
    {
        $errorMessages[] = 'Mật khẩu phải chứa ít nhất một chữ số';
    }

    // Kiểm tra có chứa ít nhất một ký tự đặc biệt
    if (!preg_match('/[\W_]/', $password))
    { // \W là ký tự không phải chữ và số, _ là để bao gồm dấu gạch dưới
        $errorMessages[] = 'Mật khẩu phải chứa ít nhất một ký tự đặc biệt';
    }

    if (!empty($errorMessages))
    {
        $errors['password']['validation'] = $errorMessages;
    }
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


