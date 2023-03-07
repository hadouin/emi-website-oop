<?php
$ch = curl_init();

$endpoint = "https://projets-tomcat.isep.fr:8080/appService";
// ?ACTION=GETLOG&TEAM=G10D
$params = array('ACTION' => 'GETLOG','TEAM' => 'G10D');
$url = $endpoint . '?' . http_build_query($params);
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);

$data = curl_exec($ch);
if(curl_error($ch)) {
    echo curl_error($ch);
    echo "<br/>";
}
curl_close ($ch);

echo "Raw Data:<br />";
echo("$data");
