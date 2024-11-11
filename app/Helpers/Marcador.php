<?php

namespace App\Helpers;

class Marcador {

    public array $resultado;
    public string $jug1;
    public string $jug2;

    public function __construct(array $resultado, string $jug1, string $jug2) {
        $this->resultado = $resultado;
        $this->jug1 = $jug1;
        $this->jug2 = $jug2;
    }

    public function mostrarResultado() {
        for ($i=0; $i<count($this->resultado);$i += 2) {
        echo "Set " . ($i+2)/2 . " : " . $this->resultado[$i] . " - " . $this->resultado[$i+1] . PHP_EOL;
        }
    }

    public function setMayorDiferencia() {
        $diff = 0;
        $mayorDiff = 0;
        $set = 0;
        for ($i=0; $i<count($this->resultado);$i += 2) {
            $diff = abs($this->resultado[$i] - $this->resultado[$i+1]);
            if ($diff > $mayorDiff) {
                $mayorDiff = $diff;
                $set = ($i+2)/2;
            }
        }
        echo "Set de mayor diferencia: $set" . PHP_EOL;
        echo "diferencia de juegos: $mayorDiff" . PHP_EOL;

    }

    public function ganador() {
        $jug1 = 0;
        $jug2 = 0;
        for ($i=0; $i<count($this->resultado);$i += 2) {
            $diff = $this->resultado[$i] - $this->resultado[$i+1];
            if ($diff > 0) {
                $jug1 ++;
            } else {
                $jug2 ++;
            }
        }
        return ($jug1>$jug2) ? $this->jug1 : $this->jug2;
    
        
    }

} 