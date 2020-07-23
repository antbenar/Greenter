<?php
require_once("dbConection.php"); 

$sql="SELECT documentoNota.codigo, CONCAT(day(documentoNota.fecha),'/',month(documentoNota.fecha),'/',year(documentoNota.fecha)) AS fecha,
    CONCAT(documentoNota.serie,'-',documentoNota.correlativo) AS 'serie-correlativo', 
    CONCAT(documento.serie,'-',documento.correlativo) AS 'serie-correlativoDoc', 
    (CASE     
        WHEN codMotivo = 1 THEN 'Anulación de la operación'
        WHEN codMotivo = 2 THEN 'Anulación por error en el RUC'
        WHEN codMotivo = 3 THEN 'Corrección por error en la descripción'
        WHEN codMotivo = 6 THEN 'Devolución total'
        WHEN codMotivo = 7 THEN 'Devolución por ítem'
        WHEN codMotivo = 9 THEN 'Disminución en el valor'
    END) AS motivo, 
    descripcion
    FROM documentoNota 
    JOIN documento ON documento.codigo = documentoNota.codigoDocModificado
    WHERE documentoNota.correlativo > 0 
    AND documentoNota.tipoDoc = 'C'
    ORDER BY documentoNota.fecha;";


if(!$result = $conn->query($sql)){
    die('There was an error running the query [' . $conn->error . ']');
}
