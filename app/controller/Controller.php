<?php

class Controller
{
    protected function render($view, $render_data = array())
    {
        if (!empty($render_data)) {
            extract($render_data);
        }
        include("app/view/header.php");

        if (isset($info)) {
            $this->info($info);
        }
        if (isset($alert)) {
            $this->alert($alert);
        }
        if (isset($error)) {
            $this->error($error);
        }
        include("app/view/$view.php");
        include("app/view/footer.php");
    }

    public function auth()
    {
        if (isset($_SESSION['name'])) {
            return User::exist($_SESSION["name"]);
        }
        return false;
    }

    public function checkAction($action) {
        return isset($_POST["action"]) && $_POST["action"] == $action;
    }

    public function checkForm($needles) {
        $input = $_POST;
        foreach ($needles as $needle) {
            $found = false;
            foreach ($input as $key => $value) {
                if ($needle == $key) {
                    $found = (!is_null($value) && $value != "");
                    break;
                }
            }
            if (!$found) {
                return false;
            }
        }
        return true;
    }

    protected function info($msg)
    {
        echo "<div id='message' class='alert alert-success'>$msg</div>";

    }

    protected function alert($msg)
    {
        echo "<div id='message' class='alert alert-warning'>$msg</div>";
    }

    protected function error($msg)
    {
        echo "<div id='message' class='alert alert-danger'>$msg</div>";
    }

    public function errorPage($render_data)
    {
        extract($render_data);

        include("app/view/header.php");
        include("app/view/error.php");
        include("app/view/footer.php");
    }
}