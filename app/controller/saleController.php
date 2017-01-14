<?php

/**
 * Created by PhpStorm.
 * User: markc
 * Date: 14/01/2017
 * Time: 13:57
 */
class saleController extends Controller
{
    public function list_sales()
    {
        $render_data['title'] = "Ventas";
        $render_data['sales'] = Sale::readAll();
        //var_dump($render_data);
        if (isset($data)) {
            $render_data = array_merge($render_data, $data);

        }
        $this->render('sales/list_sales', $render_data);
    }

}