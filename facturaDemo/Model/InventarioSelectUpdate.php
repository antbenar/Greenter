<?php
if(session_status() == PHP_SESSION_NONE){
    session_start();
}

require_once("dbConection.php"); 

$codigo = $_SESSION['codigo'];


$sql="SET @total=0;";
$result = $conn->query($sql);

$sql="SELECT fecha, nombre, detalle, aumento, disminucion,
(CASE     
     WHEN isNull(disminucion) THEN @total:= @total + aumento
     WHEN isNull(aumento) THEN @total := @total - disminucion 
 END) AS Saldo
    
FROM(
SELECT CONCAT(day(fecha),'/',month(fecha),'/',year(fecha)) AS fecha, inventario.nombre AS nombre,

    (CASE     
         WHEN updateinventario.aumento = 0 THEN 'Venta'
         WHEN updateinventario.aumento = 1 THEN 'Nuevo Producto'
         WHEN updateinventario.aumento = 2 THEN 'Aumento(Se edito)'
         WHEN updateinventario.aumento = 3 THEN 'Disminución(Se edito)'
     END) AS detalle,

    (CASE 
        WHEN updateinventario.aumento = 1 or updateinventario.aumento = 2 THEN updateinventario.cantidad
        ELSE null
    END) AS aumento,
    
    (CASE 
        WHEN updateinventario.aumento = 0 or updateinventario.aumento = 3 THEN      updateinventario.cantidad
        ELSE null
    END) AS disminucion    
FROM updateinventario
JOIN inventario ON inventario.codigo = updateinventario.codInventario
WHERE inventario.codigo = ".$codigo."

UNION ALL

SELECT CONCAT(day(fecha),'/',month(fecha),'/',year(fecha)) AS fecha, inventario.nombre AS nombre, 'Venta' AS detalle, null AS aumento, InventarioXDocumento.cantidad AS disminucion   
FROM InventarioXDocumento
JOIN inventario ON inventario.codigo = InventarioXDocumento.codigoInv
WHERE inventario.codigo = ".$codigo."
ORDER BY fecha) AS tableUpdates;";

if(!$result = $conn->query($sql)){
	die('There was an error running the query [' . $conn->error . ']');
}

?>