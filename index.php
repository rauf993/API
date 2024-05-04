<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Información de Países</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Información de Países</h1>
    <div class="country-container">
        <?php
        // URL para obtener información sobre todos los países
        $url = "https://restcountries.com/v3.1/all";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_URL, $url);
        $response = curl_exec($ch);
        curl_close($ch);
        $countries = json_decode($response, true);

        if ($countries) {
            foreach ($countries as $country) {
                $countryName = $country['name']['common']; // Nombre común del país
                $capital = $country['capital'][0] ?? 'No especificado'; // Capital del país
                $population = $country['population']; // Población del país
                echo "<div class='country'>";
                echo "<h2>" . htmlspecialchars($countryName) . "</h2>";
                echo "<p>Capital: " . htmlspecialchars($capital) . "</p>";
                echo "<p>Población: " . number_format($population) . "</p>";
                echo "</div>";
            }
        } else {
            echo "<p>Error obteniendo los datos de los países.</p>";
        }
        ?>
    </div>
</body>
</html>
