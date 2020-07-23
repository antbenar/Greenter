<?php
require_once("dbConection.php"); 

$sql="SELECT documentoNota.codigo, CONCAT(day(documentoNota.fecha),'/',month(documentoNota.fecha),'/',year(documentoNota.fecha)) AS fecha,
    CONCAT(documentoNota.serie,'-',documentoNota.correlativo) AS 'serie-correlativo', 
    CONCAT(documento.serie,'-',documento.correlativo) AS 'serie-correlativoDoc', 
    (CASE     
        WHEN codMotivo = 1 THEN 'Intereses por mora'
        WHEN codMotivo = 2 THEN 'Aumento en el valor'
        WHEN codMotivo = 3 THEN 'Penalidades/ otros conceptos'
    END) AS motivo, 
    descripcion
	FROM documentoNota 
    JOIN documento ON documento.codigo = documentoNota.codigoDocModificado
	WHERE documentoNota.correlativo > 0 
    AND documentoNota.tipoDoc = 'D'
	ORDER BY documentoNota.fecha;";


if(!$result = $conn->query($sql)){
	die('There was an error running the query [' . $conn->error . ']');
}
