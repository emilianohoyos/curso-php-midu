<?php
define('API_URL', 'https://whenisthenextmcufilm.com/api');
#inicializar una nueva sesión de cURL handle
$ch = curl_init(API_URL);
//Indicar que queremos recibir el resultado de la peticion y no mostrar en pantalla
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
/* Elecutar la petición y guardamos el resultado */
$result = curl_exec($ch);
$data = json_decode($result, true);

curl_close($ch);



?>

<head>
    <meta charset="UTF-8">
    <title>
        La próxima película de marvel
    </title>
    <meta name="description" content="la proxima película de Marvel">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.classless.min.css" />
</head>
<!-- Centered viewport -->

<main>

    <section>
        <img src="<?= $data['poster_url'] ?>" alt="Poster de <?= $data['title'] ?>" width="200" style="border-radius:16px">
    </section>
    <hgroup>
        <h2>
            <?= $data['title'] ?> Se estrena en <?= $data['days_until'] ?> 112 dias
            <p>Fecha de estreno:<?= $data['release_date'] ?></p>
            <p>La siguiente es:<?= $data['following_production']['title'] ?></p>
        </h2>
    </hgroup>
</main>


<style>
    body {
        display: grid;
        place-content: center;
    }

    section {
        display: flex;
        justify-content: center;
        text-align: center;
    }

    hgroup {
        display: flex;
        flex-direction: column;
        justify-content: center;
        text-align: center;
    }

    img {
        margin: 0 auto;
    }
</style>
<!-- curl https://whenisthenextmcufilm.com/api -->