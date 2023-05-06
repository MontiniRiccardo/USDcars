<!DOCTYPE html>
<html>
  <head>
    <title>Car Price Predictor</title>
  </head>
  <body>
    <h1>Car Price Predictor</h1>
    <form action="predizione.php" method="POST">
      <label for="brand">Brand:</label>
      <input type="text" name="brand" required>
      <br>
      <label for="model">Model:</label>
      <input type="text" name="model" required>
      <br>
      <label for="year">Year:</label>
      <input type="number" name="year" min="1886" max="2030" required>
      <br>
      <label for="engine_hp">Engine Horsepower:</label>
      <input type="number" name="engine_hp" required>
      <br>
      <label for="engine_cylinders">Engine Cylinders:</label>
      <input type="number" name="engine_cylinders" required>
      <br>
      <label for="transmission_type">Transmission Type:</label>
      <select name="transmission_type" required>
        <option value="3">Automatic</option>
        <option value="1">Manual</option>
        <option value="4">Automated Manual</option>
        <option value="2">Direct Drive</option>
        <option value="0">Unknown</option>
      </select>
      <br>
      <label for="driven_wheels">Driven Wheels:</label>
      <select name="driven_wheels" required>
        <option value="3">All Wheel Drive</option>
        <option value="1">Four Wheel Drive</option>
        <option value="0">Front Wheel Drive</option>
        <option value="2">Rear Wheel Drive</option>
      </select>
      <br>
      <label for="highway_mpg">Highway MPG:</label>
      <input type="number" name="highway_mpg" required>
      <br>
      <label for="city_mpg">City MPG:</label>
      <input type="number" name="city_mpg" required>
      <br>
<button type="submit">Predict Price</button>
</form>

  </body>
</html>
<body>




</body>
</html>
