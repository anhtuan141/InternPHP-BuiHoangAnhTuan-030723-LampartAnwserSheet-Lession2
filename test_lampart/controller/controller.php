<?php
class controller
{
    function _404()
    {
        $this->render('view/system/404', [], 'emptylayout_404');
    }

    function render($view, $data = [], $layout = 'layout')
    {
        if (is_array($data)) {
            extract($data);
        }
        include 'view/' . $layout . '.php';
    }

    function set_error($data = [])
    {
        foreach ($data as $key => $value) {
            $_SESSION['_error_' . $key] = $value;
        }
    }

    function get_error($key)
    {
        $value = '';
        if (isset($_SESSION['_error_' . $key])) {
            $value = $_SESSION['_error_' . $key];
            unset($_SESSION['_error_' . $key]);
        }
        return $value;
    }
}
