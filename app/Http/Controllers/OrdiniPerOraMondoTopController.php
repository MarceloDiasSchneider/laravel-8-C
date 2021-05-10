<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrdiniPerOraMondoTopController extends Controller
{
    function ordiniPerOraMondoTop()
    {
        $result = DB::select("SELECT SUBSTRING(`purchase-date`, 12, 2)as ora,count(*) as nordini from orders group by SUBSTRING(`purchase-date`, 12, 2)");

        $chart["status"] = "success";
        $chart["id"] = "ordini-per-ora-mondo-top";
        $chart["type"] = "line";
        $chart["title"] = "Ordini Per Ora Mondo Top";
        
        foreach ($result as $categoria) {
            foreach ($categoria as $key => $value) {
                if($key == 'ora'){
                    $label[] = $value;
                } else{
                    $datagrafico[] = $value;
                }
            }
        }
        $graficoValue['Ordine per ora'] = $datagrafico;
        
        $chart["label"] = $label;
        $chart["values"] = $graficoValue;

        return $chart;
    }
}
