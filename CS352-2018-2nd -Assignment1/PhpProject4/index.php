<?php
/*
function file_get_contents_curl( $url ) {

  $ch = curl_init();

  curl_setopt( $ch, CURLOPT_AUTOREFERER, TRUE );
  curl_setopt( $ch, CURLOPT_HEADER, 0 );
  curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1 );
  curl_setopt( $ch, CURLOPT_URL, $url );
  curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, TRUE );

  $data = curl_exec( $ch );
  curl_close( $ch );

  return $data;

}*/

  if(isset($_POST['submit'])){
      $address = $_POST['address'];
      $weather_url = 'https://api.openweathermap.org/data/2.5/weather?q='.$address.'&units=metric&appid=b5818a3c9e3f4c892fb5f4ef37d3001f';
      $weather_json = file_get_contents($weather_url);
      $weather_array = json_decode($weather_json,true);
   //  print_r($weather_array);
      if(isset($weather_array)&& count($weather_array)>0)
      {
          echo '<div>
         <h1>
              '. $weather_array['main']['temp'].' °C
        </h1>';
          echo '<h1>
             '.$address.', '.$weather_array['sys']['country'].'</h1>';
        echo' <h1>'.'Wind '.$weather_array['wind']['speed'].' m/h</h1>';
         echo'<h1> '.'Pressure '.$weather_array['main']['pressure'].' hpa
        </h1>';
         echo'<h1> '.'humidity '.$weather_array['main']['humidity'].' hpa
        </h1></div>';
      }else
          echo 'error try again';
  }

 ?>
 <!DOCTYPE html>
 <html>
   <head>
     <title>API Test</title>
   </head>
   <body>

           <form action="index.php" method="post">
           <input type="text" name="address" placeholder="Enter city name">
           <input type="submit" name="submit" value="ok">
         </form>


   </body>
 </html>
