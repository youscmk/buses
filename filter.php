<?php 


// Arreglo de objetos
$personas = [
    ['nombre' => 'Juan', 'edad' => 25],
    ['nombre' => 'María', 'edad' => 30],
    ['nombre' => 'Pedro', 'edad' => 20],
    ['nombre' => 'jaime', 'edad' => 20],
    ['nombre' => 'esteban', 'edad' => 20],
];

// Arreglo de criterios de filtrado
$criterios = ['Juan'];

// Función de filtrado
$resultado = array_filter($personas, function($persona) use ($criterios) {
    return in_array($persona['nombre'], $criterios);
});

// Imprimir resultado
print_r($resultado);

?>