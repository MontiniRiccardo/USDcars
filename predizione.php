<!DOCTYPE html>
<html>
  <head>
    <title>Predicted Price</title>
  </head>
  <body>
    <h1>Predicted Price</h1>
    <?php
    if(isset($_POST['year']) 
    && isset($_POST['brand']) 
    && isset($_POST['model'])
    && isset($_POST['engine_hp'])
    && isset($_POST['engine_cylinders'])
    && isset($_POST['transmission_type'])
    && isset($_POST['driven_wheels'])
    && isset($_POST['highway_mpg'])
    && isset($_POST['city_mpg']) )
    {
        $year = $_POST['year'];
        echo "Year: " . $year . "<br>";
        $make = trim($_POST['brand']);
        echo "Brand: " . $make . "<br>";
        $model = trim($_POST['model']);
        echo "Model: " . $model . "<br>";
        $engine_hp = $_POST['engine_hp'];
        echo "Engine HP: " . $engine_hp . "<br>";
        $engine_cy = $_POST['engine_cylinders'];
        echo "Engine Cylinders: " . $engine_cy . "<br>";
        $trans =  $_POST['transmission_type'];
        echo "Transmission Type: " . $trans . "<br>";
        $whee = $_POST['driven_wheels'];
        echo "Driven Wheels: " . $whee . "<br>";
        $hmpg = $_POST['highway_mpg'];
        echo "Highway MPG: " . $hmpg . "<br>";
        $cmpg = $_POST['city_mpg'];
        echo "City MPG: " . $cmpg . "<br>";

        // Verifica degli input
        if(!is_numeric($year) || !is_numeric($engine_hp) ||  !is_numeric($engine_cy) || !is_numeric($trans) || !is_numeric($whee) || !is_numeric($hmpg) || !is_numeric($cmpg)){
            echo "Error: invalid input";
        }else{
            $url = "http://localhost:5000/mandapred/$year/$engine_hp/$engine_cy/$hmpg/$cmpg/$make/$model/$trans/$whee";
            $response = file_get_contents($url);
            $data = json_decode($response, true);

            if($data['predizione'] == "NO3")
            {
              echo "Non esiste questo modello per questa marca";
            }
            else if($data['predizione'] == "NO2")
            {
              echo "Modello inesistente";
            }
            else if($data['predizione'] == "NO1")
            {
              echo "Marca inesistente";
            }
            else
            {
              echo "The predicted price is: $";
              echo $data['predizione'];
            }

        }
    }
    ?>
  </body>
</html>