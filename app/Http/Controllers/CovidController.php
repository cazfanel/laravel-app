<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class CovidController extends Controller
{
    public function worlwide()
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://coronavirus-monitor.p.rapidapi.com/coronavirus/cases_by_country.php",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "x-rapidapi-host: coronavirus-monitor.p.rapidapi.com",
                "x-rapidapi-key: eda4c86a7dmsh1ff1a6239bde317p10eab0jsn3add09fdaf01"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            $this->toTable(json_decode($response));
        }
    }

    public function toTable($resultArray)
    {
        echo '<table width="100%" style="border: solid 1px #000;">';
        echo '<thead><tr>';
        echo '<th>Country</th>';
        echo '<th>Cases</th>';
        echo '<th>Deaths</th>';
        echo '<th>Recovered</th>';
        echo '<th>New Deaths</th>';
        echo '<th>Critical</th>';
        echo '<th>Active</th>';
        echo '<th>Total per 1m Population</th>';
        echo '</tr></thead>';
        foreach ($resultArray->countries_stat as $result) {
            echo '<tr">';
            echo '<td>'. $result->country_name.'</td>';
            echo '<td>'. $result->cases.'</td>';
            echo '<td>'. $result->deaths.'</td>';
            echo '<td>'. $result->total_recovered.'</td>';
            echo '<td>'. $result->new_deaths.'</td>';
            echo '<td>'. $result->serious_critical.'</td>';
            echo '<td>'. $result->active_cases.'</td>';
            echo '<td>'. $result->total_cases_per_1m_population.'</td>';
            echo '</tr>';
        }
        echo '</table>';
    }
}
