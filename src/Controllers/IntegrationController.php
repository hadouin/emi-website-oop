<?php

namespace Emi\Controllers;

class IntegrationController
{
    public function appService()
    {
        $ch = curl_init();
        curl_setopt(
            $ch,
            CURLOPT_URL,
            "http://projets-tomcat.isep.fr:8080/appService" . "?ACTION=" . $_GET['ACTION'] . "&TEAM=" . $_GET['TEAM']);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        $data = curl_exec($ch);
        curl_close($ch);
        echo "Raw Data:<br />";
        echo("$data");
    }

    public function test()
    {
        $url = "http://projets-tomcat.isep.fr:8080/appService" . "?ACTION=GETLOG&TEAM=G10D";
        $data = file_get_contents($url);

        if ($data === false) {
            // Handle error
            die('Error fetching data from the URL');
        }

        $data_tab = str_split($data, 33);
        echo "Tabular Data:<br />";
        echo "<table>
                <thead>
                    <th>trame</th>
                    <th>type</th>
                    <th>numéro de capteur</th>
                    <th>type de requête</th>
                    <th>type de capteur</th>
                    <th>numéro du capteur</th>
                    <th>Valeur</th>
                    <th>Numéro de trame</th>
                    <th>Checksum</th>
                    <th>Date</th>
                </thead>
                <tbody>";

        for ($i = 0, $size = count($data_tab); $i < $size; $i++) {
            $trame = $data_tab[$i];

            // décodage avec sscanf
            list($t, $o, $r, $c, $n, $v, $a, $x, $year, $month, $day, $hour, $min, $sec) =
                sscanf($trame, "%1s%4s%1s%1s%2s%4s%4s%2s%4s%2s%2s%2s%2s%2s");

            echo (
                "<tr>
                    <td>$i</td>
                    <td>$t</td>
                    <td>$o</td>
                    <td>$r</td>
                    <td>$c</td>
                    <td>$n</td>
                    <td>$v</td>
                    <td>$a</td>
                    <td>$x</td>
                    <td>$year-$month-$day $hour:$min:$sec</td>
                </tr>"
            );
        }

        echo "</tbody></table>";

    }
}