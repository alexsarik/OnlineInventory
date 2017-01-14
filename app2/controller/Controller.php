<?php

class Controller
{
    protected function render($view, $render_data = array())
    {
        if (!empty($render_data)) {
            extract($render_data);
        }
        include("app2/view/header.php");

        if (isset($info)) {
            $this->info($info);
        }
        if (isset($alert)) {
            $this->alert($alert);
        }
        if (isset($error)) {
            $this->error($error);
        }
        include("app2/view/$view.php");
        include("app2/view/footer.php");
    }

    public function auth()
    {
        if (isset($_SESSION['name'])) {
            return User::exist($_SESSION["name"]);
        }
        return false;
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

        include("app2/view/header.php");
        include("app2/view/error.php");
        include("app2/view/footer.php");
    }
}