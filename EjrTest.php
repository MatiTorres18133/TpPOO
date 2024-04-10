<?php

require_once 'EjrViaje.php';
require_once 'EjrResponsable.php';


while (true) {
    echo "1. Cargar información del viaje\n";
    echo "2. Modificar datos de los pasajeros\n";
    echo "3. Agregar pasajero al viaje\n";
    echo "4. Mostrar datos del viaje\n";
    echo "5. Salir\n";
    echo "Seleccione una opción: ";

    $opcion = trim(fgets(STDIN));

    switch ($opcion) {
        case 1:
            echo "Ingrese código del viaje: ";
            $codigo = trim(fgets(STDIN));
            echo "Ingrese destino: ";
            $destino = trim(fgets(STDIN));
            echo "Ingrese cantidad máxima de pasajeros: ";
            $maxPasajeros = trim(fgets(STDIN));
            // Inputs de datos del responsable
            echo "Ingrese nombre del responsable: ";
            $nombreResponsable = trim(fgets(STDIN));
            echo "Ingrese apellido del responsable: ";
            $apellidoResponsable = trim(fgets(STDIN));
            echo "Ingrese número de empleado del responsable: ";
            $numEmpleadoResponsable = trim(fgets(STDIN));
            echo "Ingrese número de licencia del responsable: ";
            $numLicenciaResponsable = trim(fgets(STDIN));
            $responsable = new Responsable($numEmpleadoResponsable, $numLicenciaResponsable, $nombreResponsable, $apellidoResponsable);
            $viaje = new Viaje($codigo, $destino, $maxPasajeros, $responsable);
            echo "Viaje creado correctamente.\n";
            break;
        case 2:
            echo "Ingrese documento del pasajero a modificar: ";
            $documento = trim(fgets(STDIN));
            $viaje->modificarPasajero($documento);
            break;
        case 3:
            echo "Ingrese nombre del pasajero: ";
            $nombre = trim(fgets(STDIN));
            echo "Ingrese apellido del pasajero: ";
            $apellido = trim(fgets(STDIN));
            echo "Ingrese documento del pasajero: ";
            $documento = trim(fgets(STDIN));
            echo "Ingrese teléfono del pasajero: ";
            $telefono = trim(fgets(STDIN));
            $pasajero = new Pasajero($nombre, $apellido, $documento, $telefono);
            $viaje->agregarPasajero($pasajero);
            break;
        case 4:
            $viaje->mostrarDatosViaje();
            break;
        case 5:
            exit();
        default:
            echo "Opción no válida\n";
            break;
    }
}

?>