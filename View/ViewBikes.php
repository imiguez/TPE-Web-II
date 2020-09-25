<?php

  class MainView{
    private $title;

    function __construct() {
      $this->title = "BeerList";
      showHome();
    }

  



    function showBikes($bikes) {

      $html = '<!DOCTYPE html>
      <html lang="en">
      <head>
          <meta charset="UTF-8">
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
          <title>BeerBee</title>
      </head>
      <body>
          
      <table class="table table-bordered container">
        <thead>
          <tr>
            <th scope="col">Marca</th>
            <th scope="col">Estilo</th>
            <th scope="col">Estado</th>
            <th scope="col">Precio</th>
          </tr>
        </thead>
        <tbody>';

        foreach ($bikes as $bike) {
          echo '<tr>
                  <td>'. $bici->marca .'</td>
                  <td>'. $bici->estilo .'</td>
                  <td>'. $bici->estado .'</td>
                  <td>'. $bici->precio .'</td>
                </tr>';
        }

        $html .='</tbody>
      </table>
      
      
      
      
      
      </body>
      </html>'



    }



  }

?>