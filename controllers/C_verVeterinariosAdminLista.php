<?php   
    $salida = "";
    $query = 'SELECT * FROM veterinarios';

    if(isset($_POST['consulta'])) {
        $q = $con->con->real_escape_string($_POST['consulta']);
        $query = "SELECT * FROM veterinarios
        WHERE NAME_VET LIKE '%".$q."%' OR DNI_VET LIKE '%".$q."%'";
    }

    $resultado = $con->con->query($query);

    if($resultado->num_rows > 0) {
        $i = 0;
        # Importante!! No olvidar poner el ID como un td en hidden
        while($fila = $resultado->fetch_assoc()) {
            
            $src = "/Integrador/views/img/veterinarios/" . $fila['IMG_PATH'];

            $hora_ini = $fila['HORA_INI'];  // Reemplaza esto con tu hora real
            $hora_fin = $fila['HORA_FIN'];  // Reemplaza esto con tu hora real

            // Convertir la hora a un timestamp de Unix
            $timestampIni = strtotime($hora_ini);
            $timestampFin = strtotime($hora_fin);

            // Formatear la hora como horas y minutos
            $horaMinIni = date('H:i', $timestampIni);
            $horaMinFin = date('H:i', $timestampFin);
                
            $i++;
            $salida .= '<tr>';
            $salida .= '<th scope="row" class="ps-4">';
            $salida .= '<div class="form-check font-size-16"><input type="checkbox" class="form-check-input" id="contacusercheck1" /><label class="form-check-label" for="contacusercheck1"></label></div>';
            $salida .= '</th>';
            $salida .= '<td hidden>' . $fila['DNI_VET'] . '</td>';
            $salida .= '<td><img src="' . $src . '" alt="" class="avatar-sm rounded-circle me-2" /><a href="#" class="text-body">' . $fila['DNI_VET'] . '</a></td>';
            $salida .= '<td>' . $fila['NAME_VET'] . '</td>';
            $salida .= '<td><span class="badge badge-soft-success mb-0">' . $fila['ESPEC_VET'] . '</span></td>';
            $salida .= '<td>' . $fila['CEL_VET'] . '</td>';
            $salida .= '<td>' . '<p>'.$fila['DIA_INI'].' ~ '.$fila['DIA_FIN'].'</p>' . '<p>' . $horaMinIni . ' : ' . $horaMinFin . '</p>' . '</td>';
            /* Acciones */
            $salida .= '<td>';
            $salida .= '<ul class="list-inline mb-0">';
            $salida .= '<li class="list-inline-item">';
            $salida .= '<a href="javascript:void(0);" data-bs-toggle="tooltip" data-bs-placement="top" title="Editar Mascota" class="px-2 text-primary editarProductoJS"><i class="bx bx-pencil font-size-18"></i></a>';
            $salida .= '</li>';
            $salida .= '<li class="list-inline-item">';
            $salida .= '<a href="javascript:void(0);" onclick="return eliminarMascotaAdopcion('.$fila['ID_PET'].')" data-bs-toggle="tooltip" data-bs-placement="top" title="Eliminar Mascota" class="px-2 text-danger"><i class="bx bx-trash-alt font-size-18"></i></a>';
            $salida .= '</li>';
            $salida .= '<li class="list-inline-item dropdown">';
            $salida .= '<a class="text-muted dropdown-toggle font-size-18 px-2" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true"><i class="bx bx-dots-vertical-rounded"></i></a>';
            $salida .= '<div class="dropdown-menu dropdown-menu-end">';
            $salida .= '<a class="dropdown-item" href="#">Action</a><a class="dropdown-item" href="#">Another action</a><a class="dropdown-item" href="#">Something else here</a>';
            $salida .= '</div>';
            $salida .= '</li>';
            $salida .= '</ul>';
            $salida .= '</td>';
            $salida .= '</tr>';
        }
    } else {
        $salida .= '<tr>';
        $salida .= '<td colspan="5">Sin resultados</td>';
        $salida .= '</tr>';
    }

    echo $salida;
?>