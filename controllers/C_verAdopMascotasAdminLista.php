<?php   
    $salida = "";
    $query = 'SELECT * FROM mascotas_adopcion';

    if(isset($_POST['consulta'])) {
        $q = $con->con->real_escape_string($_POST['consulta']);
        $query = "SELECT * FROM mascotas_adopcion
        WHERE NAME_PET LIKE '%".$q."%' OR ESTADO LIKE '%".$q."%'";
    }

    $resultado = $con->con->query($query);

    if($resultado->num_rows > 0) {
        $i = 0;
        # Importante!! No olvidar poner el ID como un td en hidden
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
            $salida .= '<th scope="row" class="ps-4">';
            $salida .= '<div class="form-check font-size-16"><input type="checkbox" class="form-check-input" id="contacusercheck1" /><label class="form-check-label" for="contacusercheck1"></label></div>';
            $salida .= '</th>';
            $salida .= '<td hidden>' . $fila['ID_PET'] . '</td>';
            $salida .= '<td><img src="' . $src . '" alt="" class="avatar-sm rounded-circle me-2" /><a href="#" class="text-body">' . $fila['NAME_PET'] . '</a></td>';
            $salida .= '<td>' . $fila['EDAD_PET'] . '</td>';
            $salida .= '<td><span class="badge badge-soft-success mb-0">' . $fila['ESTADO'] . '</span></td>';

            $salida .= '<td hidden><span class="badge badge-soft-success mb-0">' . $fila['RAZA_PET'] . '</span></td>';
            $salida .= '<td>' . $fila['SEXO_PET'] . '</td>';
            $salida .= '<td hidden><span class="badge badge-soft-success mb-0">' . $fila['COLOR_PET'] . '</span></td>';
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