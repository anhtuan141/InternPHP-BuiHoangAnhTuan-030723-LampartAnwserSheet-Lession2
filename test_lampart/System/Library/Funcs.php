<?php
//Hàm chuyển trang
function changePage($url)
{
    header('location:' . $url);
    exit();
}

function href($controller = 'system', $action = 'index', $ext = [])
{
    $strext = '';
    foreach ($ext as $key => $value) {
        $value = trim($value);
        $strext .= "&$key=$value";
    }
    return "index.php?controller={$controller}&action={$action}{$strext}";
}

function myUpload($file, $folder, &$er = '', $maxsize = 1, $type = ['.jpg', '.png', '.jpeg', '.svg'], $name = 'file_')
{
    //Kiểm tra tập tin đã được đưa lên server thành công chưa
    if ($file['error'] == 0) {
        //Kiểm tra kích thước file
        $size = $maxsize * 1024 * 1024; //Chuyển sang Kb
        if ($file['size'] > 0 && $file['size'] <= $size) {
            //Kiểm tra loại file có hợp lệ không
            $ext = strtolower(substr($file['name'], strrpos($file['name'], '.'))); //=>đuôi file: .png
            if (in_array($ext, $type)) {
                //Tiền xử lý đưa tập tin lên server để dùng
                //Xử lý tên không trùng
                $filename = $name . time() . $ext; //=>file_23542342342.png
                $fullpath = $folder . '/' . $filename;
                if (move_uploaded_file($file['tmp_name'], $fullpath)) {
                    return $fullpath;
                } else {
                    $er = 'An Error Occurred From The Server';
                    return false;
                }
            } else {
                $er = 'Only Upload: ' . implode(',', $type);
                return false;
            }
        } else {
            $er = 'Upload Max ' . $maxsize . ' MB';
            return false;
        }
    } else {
        $er = 'Error';
        return false;
    }
}

//Check
function get($key, $default = null)
{
    if (isset($_GET[$key]) && $_GET[$key]) {
        return is_string($_GET[$key]) ? trim($_GET[$key]) : $_GET[$key];
    } else {
        return $default;
    }
}

function post($key, $default = null)
{
    if (isset($_POST[$key]) && $_POST[$key]) {
        return is_string($_POST[$key]) ? trim($_POST[$key]) : $_POST[$key];
    } else {
        return $default;
    }
}

function ss($key, $default = null)
{
    if (isset($_SESSION[$key]) && $_SESSION[$key]) {
        return is_string($_SESSION[$key]) ? trim($_SESSION[$key]) : $_SESSION[$key];
    } else {
        return $default;
    }
}

function ck($key, $default = null)
{
    if (isset($_COOKIE[$key]) && $_COOKIE[$key]) {
        return is_string($_COOKIE[$key]) ? trim($_COOKIE[$key]) : $_COOKIE[$key];
    } else {
        return $default;
    }
}
