<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrdiniPerGiornoMondoTopController extends Controller
{
    function ordiniPerGiornoMondoTop ()
    {
        $result = DB::select("SELECT WEEKDAY(`purchase-date`) as giorno,count(*) as nprodotti from orders group by WEEKDAY(`purchase-date`)");

        $days = array('Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday');

        $chart["status"] = "success";
        $chart["id"] = "ordini-per-giorno-mondo-top";
        $chart["type"] = "bar";
        $chart["title"] = "Ordini Per Giorno Mondo Top";
        
        foreach ($result as $categoria) {
            foreach ($categoria as $key => $value) {
                if($key == 'giorno'){
                    $label[] = $days[$value];
                } else{
                    $datagrafico[] = $value;
                }
            }
        }
        $graficoValue['Ordine per giorno'] = $datagrafico;
        
        $chart["label"] = $label;
        $chart["values"] = $graficoValue;

        return $chart;
    }
}
