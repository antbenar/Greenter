<?php
require_once("dbConection.php"); 

$sql="SELECT codigo, CONCAT(day(fecha),'/',month(fecha),'/',year(fecha)) AS fecha,
	(CASE     
        WHEN vigente = -1 THEN 'Sin Resumen Diario'
        WHEN vigente = -2 THEN 'Con Resumen Diario'
        WHEN vigente = 1 THEN 'Anulación de la operación'
        WHEN vigente = 2 THEN 'Anulación por error en el RUC'
        WHEN vigente = 3 THEN 'Corrección por error en la descripción'
        WHEN vigente = 6 THEN 'Devolución total'
        WHEN vigente = 7 THEN 'Devolución por ítem'
        WHEN vigente = 9 THEN 'Disminución en el valor'

        WHEN vigente = 11 THEN 'Intereses por mora'
        WHEN vigente = 12 THEN 'Aumento en el valor'
        WHEN vigente = 13 THEN 'Penalidades/ otros conceptos'
    END) AS vigente, 
	(CASE     
        WHEN tipoDoc = 'B' THEN 'Boleta'
        WHEN tipoDoc = 'F' THEN 'Factura'
    END) AS tipoDoc, 
    CONCAT(serie,'-',correlativo) AS 'serie-correlativo', 
    /*opGravadas, opExoneradas, montoIGV, */
    (opGravadas+opExoneradas+montoIGV) AS total
	FROM Documento 
	WHERE correlativo > 0 
    AND (tipoDoc = 'B' OR tipoDoc = 'F')
    AND vigente > -3
	ORDER BY fecha;";


if(!$result = $conn->query($sql)){
	die('There was an error running the query [' . $conn->error . ']');
}
