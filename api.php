<?php
// URL de la API de jsonplaceholder para obtener publicaciones
$url = "https://jsonplaceholder.typicode.com/posts";

// Inicializar cURL
$ch = curl_init();

// Configurar opciones de cURL
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_URL, $url);

// Ejecutar cURL
$response = curl_exec($ch);

// Cerrar cURL
curl_close($ch);

// Decodificar la respuesta JSON
$posts = json_decode($response, true);

// Verificar si la respuesta tiene datos
if ($posts) {
    echo "Primeras 5 publicaciones:\n";
    for ($i = 0; $i < 5; $i++) {
        echo "Título: " . $posts[$i]['title'] . "\n";
        echo "Contenido: " . $posts[$i]['body'] . "\n\n";
    }
} else {
    echo "Error obteniendo los datos";
}
?>
