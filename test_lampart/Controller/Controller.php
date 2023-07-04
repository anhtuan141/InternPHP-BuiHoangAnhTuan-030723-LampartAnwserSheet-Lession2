<?php
class Controller
{
    public function _404()
    {
        $this->render('view/system/404', [], 'emptylayout_404');
    }

    public function render($view, $data = [], $layout = 'layout')
    {
        if (is_array($data)) {
            extract($data);
        }
        include 'view/' . $layout . '.php';
    }

    public function setError($data = [])
    {
        foreach ($data as $key => $value) {
            $_SESSION['_error_' . $key] = $value;
        }
    }

    public function getError($key)
    {
        $value = '';
        if (isset($_SESSION['_error_' . $key])) {
            $value = $_SESSION['_error_' . $key];
            unset($_SESSION['_error_' . $key]);
        }
        return $value;
    }
}
