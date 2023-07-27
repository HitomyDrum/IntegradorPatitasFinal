<?php   
    $salida = "";
    $query = 'SELECT * FROM productos';

    if(isset($_POST['consulta'])) {
        $q = $con->con->real_escape_string($_POST['consulta']);
        $query = "SELECT * FROM productos
        WHERE NOM_PROD LIKE '%".$q."%' OR RUC_PROV LIKE '%".$q."%'";
    }

    $resultado = $con->con->query($query);

    if($resultado->num_rows > 0) {
        $i = 0;
        while($fila = $resultado->fetch_assoc()) {
            $i++;
            $salida .= '<tr>';
            $salida .= '<th scope="row">' . $i . '</th>';
            $salida .= '<td hidden>' . $fila['ID_PROD'] . '</td>';
            $salida .= '<td>' . $fila['NOM_PROD'] . '</td>';
            $salida .= '<td class="text-success">' . '<strong>' . $fila['PREC_UNIT'] . '</strong>' . '</td>';
            $salida .= '<td>' . '<div class="badge bg-secondary text-wrap p-2" style="width: 6rem;">'.$fila['RUC_PROV'] . '</div>'.'</td>';
            $salida .= '<td>' . $fila['STOCK'] . '</td>';
            $salida .= '<td hidden>' . $fila['DESCRIPCION'] . '</td>';
            $salida .= '<td>' . '<a class="btn btn-warning mx-1 editarProductoJS" data-bs-toggle="modal" data-bs-target="#editarProductos"><i class="fa-solid fa-pen-to-square fa-sm" ></i></a>';
            $salida .= '<a onclick="return eliminarProducto('.$fila['ID_PROD'].')" class="btn btn-danger mx-1"><i class="fa-solid fa-trash fa-sm" style="color: white;"></i></a>' . '</td>';
            $salida .= '</tr>';
        }
    } else {
        $salida .= '<tr>';
        $salida .= '<td colspan="6">Sin resultados</td>';
        $salida .= '</tr>';
    }

    echo $salida;
?>