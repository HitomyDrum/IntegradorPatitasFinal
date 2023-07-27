<?php   
    $salida = "";
    $query = 'SELECT * FROM mascotas';

    if(isset($_POST['consulta'])) {
        $q = $con->con->real_escape_string($_POST['consulta']);
        $query = "SELECT * FROM mascotas
        WHERE NAME_PET LIKE '%".$q."%' OR DNI_CLI LIKE '%".$q."%'";
    }

    $resultado = $con->con->query($query);

    if($resultado->num_rows > 0) {
        $i = 0;
        while($fila = $resultado->fetch_assoc()) {
            if($fila['TIPO_PET'] == "Perro") {
                $src = "/Integrador/views/img/dog.png";
                $color = "bg-primary";
            } else if($fila['TIPO_PET'] == "Gato") {
                $src = "/Integrador/views/img/cat1.png";
                $color = "bg-warning";
            } else if($fila['TIPO_PET'] == "Loro") {
                $src = "/Integrador/views/img/parrot.png";
                $color = "bg-success";
            }

            $i++;
            $salida .= '<tr>';
            $salida .= '<th scope="row">' . $i . '</th>';
            $salida .= '<td hidden>' . $fila['ID_PET'] . '</td>';
            $salida .= '<td>' . '<img src="'.$src.'" class="rounded-circle p-1 '.$color.'" style="width: 40px;">';
            $salida .= '<td>' . $fila['NAME_PET'] . '</td>';
            $salida .= '<td>' . $fila['EDAD_PET'] . '</td>';
            $salida .= '<td class="text-primary">' . '<strong>' . $fila['DNI_CLI'] . '</strong>' . '</td>';
            $salida .= '<td>' . '<p class="status delivered" style="width: 6rem;">Estable</p>'.'</td>';
            $salida .= '<td>' . '<a href="V_VerMascotaInfo.php?idPet='.$fila['ID_PET'].'" class="btn btn-success mx-1 rounded-circle"><i class="fa-solid fa-circle-info fa-sm"></i></a>';
            //$salida .= '<td>' . '<a class="btn btn-warning m-1 editarMasctaJS" data-bs-toggle="modal" data-bs-target="#editarProductos"><i class="fa-solid fa-pen-to-square fa-sm" ></i></a>';
            $salida .= '<a onclick="return eliminarMascota('.$fila['ID_PET'].')" class="btn btn-danger rounded-circle mx-1"><i class="fa-solid fa-trash fa-sm" style="color: white;"></i></a>' . '</td>';
            $salida .= '</tr>';
        }
    } else {
        $salida .= '<tr>';
        $salida .= '<td colspan="6">Sin resultados</td>';
        $salida .= '</tr>';
    }

    echo $salida;
?>