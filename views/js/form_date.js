window.onload = function() {
    var dateField = document.getElementById("fecha_cita");
    var today = new Date();
    var year = today.getFullYear();
    var maxDate = year + "-12-31";
    
    dateField.setAttribute("min", today.toISOString().split("T")[0]);
    dateField.setAttribute("max", maxDate);

    /* Validar Hora para la Cita */
    
    var horaCita = document.getElementById('hora_cita');
    var horaActual = new Date();
    var horaMin = "08:00";
    var horaMax = "22:00";

    // Establecer los atributos min y max del input
    horaCita.min = horaMin;
    horaCita.max = horaMax;

    // Obtener la hora y minutos actuales en formato HH:MM
    var horaActualStr = ("0" + horaActual.getHours()).slice(-2) + ":" + ("0" + horaActual.getMinutes()).slice(-2);

    // Comprobar si la hora actual está dentro del rango permitido
    if (horaActualStr > horaMin && horaActualStr < horaMax) {
        // Si está dentro del rango permitido, establecer el atributo min al tiempo actual
        horaCita.min = horaActualStr;
    } else if (horaActualStr < horaMin) {
        // Si es más temprano que el tiempo mínimo, establecer el valor al tiempo mínimo
        horaCita.value = horaMin;
    } else {
        // Si es más tarde que el tiempo máximo, establecer el valor al tiempo máximo
        horaCita.value = horaMax;
    }

    // Evento que se activa cada vez que cambia el valor del input
    horaCita.onchange = function() {
        // Comprobar si el valor seleccionado está dentro del rango permitido
        if (this.value < this.min || this.value > this.max) {
            // Si no está dentro del rango permitido, restablecer el valor al rango permitido
            this.value = this.min;
        }
    };
};

