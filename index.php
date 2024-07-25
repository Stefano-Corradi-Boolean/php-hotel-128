<?php

    $hotels = [

        [
          
            'name' => 'Hotel Belvedere',
            'description' => 'Hotel Belvedere Descrizione',
            'parking' => true,
            'vote' => 4,
            'distance_to_center' => 10.4
        ],
        [
            'name' => 'Hotel Futuro',
            'description' => 'Hotel Futuro Descrizione',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 2
        ],
        [
            'name' => 'Hotel Rivamare',
            'description' => 'Hotel Rivamare Descrizione',
            'parking' => false,
            'vote' => 1,
            'distance_to_center' => 1
        ],
        [
            'name' => 'Hotel Bellavista',
            'description' => 'Hotel Bellavista Descrizione',
            'parking' => false,
            'vote' => 5,
            'distance_to_center' => 5.5
        ],
        [
            'name' => 'Hotel Milano',
            'description' => 'Hotel Milano Descrizione',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 50
        ],

    ];

    // se di defaulto non viene inviata la chiave 'vote' $vote sarà = 0
    $vote = isset($_GET['vote']) ? $_GET['vote'] : 0;

    // inizializzo l'array che serve per stampare in pagina i dati
    $filtered_hotels = [];

    // effettuo prima il filtro solo in base al voto
    if(!isset($_GET['parking'])){
      foreach($hotels as $hotel){
        if( $hotel['vote'] >= $vote){
          $filtered_hotels[] = $hotel;
        }
      }
    }else{
      // se parking è stato inviato filtro anche per parking
      foreach($hotels as $hotel){
        if($hotel['parking'] && $hotel['vote'] >= $vote){
          $filtered_hotels[] = $hotel;
        }
      }
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css' integrity='sha512-b2QcS5SsA8tZodcDtGRELiGv5SaKSk1vDHDaQRda0htPYWZ6046lr3kJ5bAAQdpV2mmA/4v0wQF9MyU6/pDIAg==' crossorigin='anonymous'/>
  <link rel="stylesheet" href="css/style.css">
  <title>PHP Hotel</title>

</head>
<body>
  <div class="container my-5">
    <h1>PHP Hotel</h1>
    
    <form action="index.php" method="GET">
     <div class="d-flex">

          <div class="me-5">
            <input class="form-check-input" type="checkbox" id="parking" name="parking">
            <label class="form-check-label" for="parking">
              Solo con parcheggio
            </label>
          </div>
          <div>
            
          Voto: 

          <?php for($i = 0 ; $i <= 5; $i++): ?>
            <input class="form-check-input" type="radio" name="vote" id="vote<?php echo $i ?>" value="<?php echo $i ?> ">
            <label class="form-check-label me-3" for="vote<?php echo $i ?>"> <?php echo $i ?> </label>
          <?php endfor; ?>

          </div>

          <button type="submit" class="btn btn-primary">Filtra</button>
        </div>
    </form>


    <table class="table">
  <thead>
    <tr>
      <th scope="col">Nome</th>
      <th scope="col">Descrizione</th>
      <th scope="col">Parcheggio</th>
      <th scope="col">Voto</th>
      <th scope="col">Distanza dal centro</th>
    </tr>
  </thead>
  <tbody>

<?php foreach($filtered_hotels as $hotel): ?>
  <tr>
    <td><?php echo $hotel['name'] ?></td>
    <td><?php echo $hotel['description'] ?></td>
    <td><?php echo $hotel['parking'] ? 'Sì' : 'No' ?></td>
    <td><?php echo $hotel['vote'] ?></td>
    <td>Km. <?php echo $hotel['distance_to_center'] ?></td>
  </tr>
  <?php endforeach; ?>

    
  </tbody>
</table>
  </div>
  



  <script src="js/script.js"></script>
</body>
</html>