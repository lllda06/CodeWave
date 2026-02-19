<?php

//  POST
if ($_SERVER["REQUEST_METHOD"] != "POST") {
    echo "Wyślij formularz metodą POST.";
    exit();
}

//  dane z formularza
$imie = $_POST["imie"] ?? "";
$poziom = $_POST["poziom"] ?? "";

// czy pola nie są puste
$ok = false;

if ($imie != "" && $poziom != "") {
    $ok = true;
}

// zabezpieczenie danych  (Cross-Site Scripting)
$imie = htmlspecialchars($imie);
$poziom = htmlspecialchars($poziom);

?>
<!doctype html>
<html lang="pl">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>CodeWave — Rejestracja</title>
  <link rel="stylesheet" href="styl_zapis.css"/>
</head>
<body>

<div class="shine"></div>

<div class="bubbles" aria-hidden="true">
  <span style="left:12%; bottom:-10px;"></span>
  <span style="left:26%; bottom:-30px;"></span>
  <span style="left:44%; bottom:-20px;"></span>
  <span style="left:61%; bottom:-40px;"></span>
  <span style="left:73%; bottom:-25px;"></span>
  <span style="left:86%; bottom:-35px;"></span>
</div>

<div class="horizon" aria-hidden="true"></div>

<main class="card">

<?php if ($ok): ?>

  <div class="badge">CodeWave • Rejestracja zakończona</div>

  <h1>Gratulacje<?php if($imie!="") echo ", ".$imie; ?>!</h1>
  <p>Rejestracja zakończona sukcesem.</p>

  <div class="meta">
    <div class="pill">Poziom: <b><?php echo $poziom; ?></b></div>
    <div class="pill">Status: <b>OK</b></div>
  </div>

<?php else: ?>

  <h1>Błąd</h1>
  <p>Wszystkie pola muszą być wypełnione.</p>

<?php endif; ?>

  <div class="actions">
    <a class="btn primary" href="index.html">Powrót do formularza</a>
  </div>

</main>
</body>
</html>
