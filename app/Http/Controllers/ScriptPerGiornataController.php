<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ScriptPerGiornataController extends Controller
{
    function scriptPerGiornata()
    {
        $result = DB::select("SELECT date(cronstamp) as Giorno,nome_script as Nome_Script, count(*) as Passaggi,sum(risultato) as Orders , sum(risultatoorderitems) as Products FROM passaggio_script WHERE cronstamp between '2020-01-01' and '2020-12-31' group by date(cronstamp),nome_script order by giorno");

        $table["status"] = "success";
        $table["id"] = "script-per-giornata";
        $table["title"] = "Script Per Giornata";

        foreach ($result as $key => $value) 
        {
            if($key == 0)
            {
                foreach($value as $k => $v)
                {
                    $header[] = $k;
                }
            }
            $values[] = $value;
        }
        
        $table["header"] = $header;
        $table["values"] = $values;

        return $table;
    }

}