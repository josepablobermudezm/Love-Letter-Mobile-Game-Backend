<?php
$cartas= array('rey','baron','guardia','princesa','canciller',
                'condesa','guardia','espia','doncella', 'guardia','principe',
                'espia','canciller','sacerdote','guardia','doncella','principe',
                'guardia','baron','guardia','sacerdote');
shuffle($cartas);
$Response['cartas'] = $cartas;
echo json_encode($Response);
?>