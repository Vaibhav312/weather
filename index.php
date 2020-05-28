<?php
 $weather = "";
    $error = "";
    
      if(array_key_exists('city',$_GET)){
         error_reporting(E_ERROR | E_PARSE); $urlcontents=file_get_contents("https://api.openweathermap.org/data/2.5/weather?q=".urlencode($_GET['city'])."%20&appid=639143e4efb7a8484e20e50ae6b70d2f");
         
          $weatherArray=json_decode($urlcontents,true);
       //   print_r($weatherArray);
          
          if($weatherArray['cod']==200){
        
             $x=$weatherArray['weather'][0]['icon'];
              $url = "http://openweathermap.org/img/wn/$x@2x.png";  




            $weatherdata = base64_encode(file_get_contents("$url")); 
            $icon =  '<img src="data:image/jpeg;base64,'.$weatherdata.'">';    
            
           
                 $weather=date("l") . 
                              "<br>" . date("d-m-Y") . "<br>".
                                  "<h5><u>Weather datails are  : </u></h5>"
                                  ."<b>".$weatherArray['weather'][0]['description']."</b>".$icon.
                                  " <br><b>TEMP : </b>".intval($weatherArray['main']['temp']-273.15)."&deg;C".
                                  "<br><b>Humidity :</b> ".$weatherArray['main']['humidity']."%";
                    $image_data=$weatherArray['weather'][0]['description'];
                    
          
              
          }
          else{
              $error="City not found";
          }
          
          
          
          
      }
          
  
?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

     <link href="https://fonts.googleapis.com/css2?family=Balsamiq+Sans&display=swap" rel="stylesheet"> 
       <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <title>Weather App</title>
      
      <style>
          body{
            background: url(default.jpeg) no-repeat center center fixed;
                         font-family: 'Balsamiq Sans', cursive;
          }
          .container{
              text-align: center;
              margin-top: 60px;
              padding: 40px;
              width: 500px;
             
          }
          button{
            margin: 20px;
          }
          #data{
              position: absolute;
            top: 250px;
              left: 433px;
              text-align: center;
             font-size: 20px;
              font-weight: 500;
              border: 1px solid grey;
              border-radius: 50px;
          }
          #weather{
            
                    font-family: 'Balsamiq Sans', cursive;
          }
          h1 {
            color:white;
            text-shadow: 2px 2px black;
          }
          #city_text{
            color:white;
            text-shadow: 2px 2px black;
          }
        

         
          
      
      </style>
  </head>
  <body >
   <div class="container" >
       <h1>What's the weather ?</h1>
       <form>
        <fieldset class="form-group">
           <label for="city" id="city_text">Enter the city</label>
            <input type="text" class="form-control" name="city" id="city" placeholder="Gurgaon,etc.">
            <button type="submit" class="btn btn-primary">Submit</button>
           </fieldset>
       
       </form>
       
       <div id="weather">
           <?php 
          
              
              if ($weather) {
                  
                  echo '<div class="alert alert-success " role="alert">'.$weather.'</div>';
                 
                //  if($weatherArray['weather'][0]['description']=='mist')
                  
              } else if ($error) {
                  
                  echo '<div class="alert alert-danger" role="alert">
  '.$error.'
</div>';
                  
              }
              
              ?>
       </div>
      
      
    </div>
    
    
    <script>
    
    if("50d"== <?php echo json_encode($x); ?> || "50n"== <?php echo json_encode($x); ?>)
    {
      
      $('body').css('background-image', 'url("images/mist.jpg")');
      $('body').css('background-position','center');
      $('body').css('background-repeat','no-repeat');
      $('body').css('background-size','cover');
    }
    else if("13d"== <?php echo json_encode($x); ?> || "13n"== <?php echo json_encode($x); ?>)
    {
      $('body').css('background-image', 'url("images/snow.jpg")');
      $('body').css('background-position','center');
      $('body').css('background-repeat','no-repeat');
      $('body').css('background-size','cover');
    }
    else if("11d"== <?php echo json_encode($x); ?> || "11n"== <?php echo json_encode($x); ?>)
    {
      $('body').css('background-image', 'url("images/thunderstorm.jpg")');
      $('body').css('background-position','center');
      $('body').css('background-repeat','no-repeat');
      $('body').css('background-size','cover');
    }
    else if("10d"== <?php echo json_encode($x); ?> || "10n"== <?php echo json_encode($x); ?>)
    {
      $('body').css('background-image', 'url("images/rain.jpg")');
      $('body').css('background-position','center');
      $('body').css('background-repeat','no-repeat');
      $('body').css('background-size','cover');
    }
    else if("09d"== <?php echo json_encode($x); ?> || "09n"== <?php echo json_encode($x); ?>)
    {
      $('body').css('background-image', 'url("images/shower rain.jpg")');
      $('body').css('background-position','center');
      $('body').css('background-repeat','no-repeat');
      $('body').css('background-size','cover');
    }
    else if("04d"== <?php echo json_encode($x); ?> || "04n"== <?php echo json_encode($x); ?>)
    {
      $('body').css('background-image', 'url("images/broken clouds.jpg")');
      $('body').css('background-position','center');
      $('body').css('background-repeat','no-repeat');
      $('body').css('background-size','cover');
    }
    else if("03d"== <?php echo json_encode($x); ?> || "03n"== <?php echo json_encode($x); ?>)
    {
      $('body').css('background-image', 'url("images/scattered clouds.jpg")');
      $('body').css('background-position','center');
      $('body').css('background-repeat','no-repeat');
      $('body').css('background-size','cover');
    }
    else if("02d"== <?php echo json_encode($x); ?> || "02n"== <?php echo json_encode($x); ?>)
    {
      $('body').css('background-image', 'url("images/few clouds.jpg")');
      $('body').css('background-position','center');
      $('body').css('background-repeat','no-repeat');
      $('body').css('background-size','cover');
    }
    else if("01d"== <?php echo json_encode($x); ?> || "01n"== <?php echo json_encode($x); ?>)
    {
      $('body').css('background-image', 'url("images/clear sky.jpg")');
      $('body').css('background-position','center');
      $('body').css('background-repeat','no-repeat');
      $('body').css('background-size','cover');
    }
    
      
    </script>
   
  </body>
</html>