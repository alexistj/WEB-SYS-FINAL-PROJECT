<!DOCTYPE html>
<html>
<head>
    <title>Image Carousel</title>
    <link href="style.css" rel="stylesheet" type="text/css"/>
</head>
<body>
  <div id="images" class="section" >
  <div id="carousel">
  <?php
    $dir = "images/";
    $count = 0;
    if(is_dir($dir)){
      if($dh = opendir($dir)){
        while(($file = readdir($dh)) != false){
          if (strpos($file, 'jpg')) {
            if($count == 0){
              echo "<img class='carousel_image' src='images/$file' id='active' width='70%'/>" ;
            }else{
              echo "<img class='carousel_image' src='images/$file' width='70%'/>" ;
            }
            $count += 1;
          }
        }
      }
    }
  ?>
  </div>

  <div id="index_board_out" class="image_inactive">
  <div id="index_board_in">
    <div class="polaroid_row">
      <div class="polaroid white_bg left">
        <img class="polaroid_image" src="resources/images/0.jpg"/>
        <h3 class="polaroid_text"></h3>
      </div>
      <div class="polaroid white_bg polaroid_center">
        <img class="polaroid_image" src="resources/images/0.jpg"/>
        <h3 class="polaroid_text"></h3>
      </div>
      <div class="polaroid white_bg right">
        <img class="polaroid_image" src="resources/images/0.jpg"/>
        <h3 class="polaroid_text"></h3>
      </div>
    </div>
    <div class="polaroid_row">
      <div class="polaroid white_bg left">
        <img class="polaroid_image" src="resources/images/0.jpg"/>
        <h3 class="polaroid_text"></h3>
      </div>
      <div class="polaroid white_bg polaroid_center">
        <img class="polaroid_image" src="resources/images/0.jpg"/>
        <h3 class="polaroid_text"></h3>
      </div>
      <div class="polaroid white_bg right">
        <img class="polaroid_image" src="resources/images/0.jpg"/>
        <h3 class ="polaroid_text"></h3>
      </div>
    </div>
  </div>
  </div>
  <button id="mentors">Mentors</button>
  <button id="carousel_images">Carousel</button>
  </div>
  <script src="jquery.min.js"></script>
  <script src="index.js"></script>
</body>
</html>
