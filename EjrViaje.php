<?php

require_once 'EjrPasajero.php';
require_once 'EjrResponsable.php';

class Viaje
{
    public $codigo;
    public $destino;
    public $maxPasajeros;
    public $pasajeros = [];
    public $responsable;

    public function __construct($codigo, $destino, $maxPasajeros, $responsable)
    {
        $this->codigo = $codigo;
        $this->destino = $destino;
        $this->maxPasajeros = $maxPasajeros;
        $this->responsable = $responsable;
    }

    public function agregarPasajero($pasajero)
    {
        // Verificar si el pasajero ya está en el viaje
        foreach ($this->pasajeros as $p) {
            if ($p->documento === $pasajero->documento) {
                echo "El pasajero ya está registrado en este viaje.";
                return;
            }
        }

        // Verificar si hay espacio para más pasajeros
        if (count($this->pasajeros) < $this->maxPasajeros) {
            $this->pasajeros[] = $pasajero;
            echo "Pasajero agregado correctamente al viaje.";
        } else {
            echo "No hay más espacio para pasajeros en este viaje.";
        }
    }

    public function modificarPasajero($documento)
    {
        foreach ($this->pasajeros as $pasajero) {
            if ($pasajero->documento === $documento) {
                echo "Ingrese nuevo nombre: ";
                $nombre = trim(fgets(STDIN));
                echo "Ingrese nuevo apellido: ";
                $apellido = trim(fgets(STDIN));
                echo "Ingrese nuevo teléfono: ";
                $telefono = trim(fgets(STDIN));
                $pasajero->nombre = $nombre;
                $pasajero->apellido = $apellido;
                $pasajero->telefono = $telefono;
                echo "Datos del pasajero modificados correctamente.";
                return;
            }
        }
        echo "No se encontró al pasajero con el documento proporcionado.";
    }

    public function mostrarDatosViaje()
    {
        echo "Código del viaje: {$this->codigo}\n";
        echo "Destino: {$this->destino}\n";
        echo "Cantidad máxima de pasajeros: {$this->maxPasajeros}\n";

        echo "Pasajeros:\n";

        foreach ($this->pasajeros as $pasajero) {
            echo "Nombre: {$pasajero->nombre} {$pasajero->apellido}, Documento: {$pasajero->documento}, Teléfono: {$pasajero->telefono}\n";
        }

        if ($this->responsable) { // Información del responsable ?
            echo "Responsable del viaje: {$this->responsable->nombre} {$this->responsable->apellido}, Empleado: {$this->responsable->numEmpleado}, Licencia: {$this->responsable->numLicencia}\n";
        } else { // No hay responsable
            echo "No se ha proporcionado información del responsable del viaje.\n";
        }
    }
}
