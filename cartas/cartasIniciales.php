<?php
$cartas= array('rey','baron','guardia','princesa','canciller',
                'condesa','guardia','espia','doncella', 'guardia','principe',
                'espia','canciller','guardia','doncella','principe',
                'guardia','baron','guardia');
shuffle($cartas);
$Response['cartas'] = $cartas;
echo json_encode($Response);
?>