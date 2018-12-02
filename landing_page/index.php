<!-- File: index.html -->
<!-- Purpose: home page design -->

<!DOCTYPE html>
<html>
  <head>
    <title>Living Your Best Life</title>
    <link type="text/css" rel="stylesheet" href="style.css"/>
    <link href="https://fonts.googleapis.com/css?family=Permanent+Marker" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Just+Another+Hand" rel="stylesheet" type="text/css">
  </head>
  <body>
    <div id="navbar" class="white_bg shadow_bottom">

    </div>
    <div class="content">
      <div class="banner">
        <div class="banner_content">
          <span class="banner_left">
            <h1 class="title white_text">Living Your<br/> Best Life</h1>
            <h3 class="subtext white_text">
              Learn And Develop The Skills To Succeed After Foster Care
            </h3>
          </span>
          <span class="banner_right">

          </span>
        </div>
      </div>
      <div class="information white_bg">
        <span class="information_photo">
          <img src="https://www.buttecounty.net/portals/11/383008_144111739031249_123902809_n.jpg" alt="after foster care" width="65%"/>
        </span>
        <span class="information_content blueberry">
          <h1 class="info_title citrus_text">Life After The Foster Care Can Be Scary,<br/>Let Us Help You Through This Process</h1>
        </span>
      </div>
      <div id="images" class="section blueberry" style="margin-bottom:-17em; position:relative; top:-15em; margin-bottom: 1em">
      <div id="carousel" class="images_inactive">
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
        <div id="mentor_images" class="image_inactive">
        <div id="index_board_out">
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
      </div>
      <div id="carousel_images" class="images_button blueberry">Carousel</div>
      <div id="mentors" class="images_button citrus">Mentors</div>
      </div>
    <!-- <div id="content">
      <div class="section blueberry shadow_top">
	       <div id="index_intro_text" class="text_full">
	         <h1 class="title apple_core_text remove_margin">Living Your Best Life</h1>
           <h1 class="subtitle apple_core_text remove_margin">Learn And Develop The Skills To Succeed After Foster Care</h1>
	                <hr class="hr_large red_hr"/><br/>
	                 <p class="text white_text">
	                   Lorem ipsum dolor sit amet, consectetur adipiscing elit. In sit amet risus vel odio vestibulum volutpat. Nam lacus nibh, rhoncus eget egestas in, tempor id justo. Praesent at tristique nisl, sit amet pretium metus. Integer aliquam egestas metus vel aliquam. Morbi sollicitudin magna vel pulvinar aliquet. Nullam ex ligula, pretium a ultrices et, luctus nec lectus. Sed blandit nibh ac condimentum porttitor. Maecenas sed laoreet arcu. Suspendisse condimentum convallis enim at tempus.
	                   </p>
	                  </div>
                  </div>

      </div> -->
    <div class="section" style=" position: relative; top: -10em ; margin-bottom: 0;">
	     <div class="index_page_content">
	        <h1 class="title  remove_margin">What Can We Offer</h1><br/>
	         <hr class="hr_xlarge red_hr remove_margin"/>
	          <div class="index_page_row">
	             <div class="index_page_title blueberry left">
	                <h1 class="citrus_text index_title">What We Do</h1>
	             </div>
	             <div class="index_page_description right">
	                <p class="index_text">
		                  We help people transition out of the Foster Care system. We know that it can be scary to start life after Foster Care, but we hope that our service can assist you in finding the correct path for you. The correct path for you may be to go through further education or to enter the workforce immediately. Whatever the case, we will assist in helping you find a position that suits your needs.
	                </p>
	            </div>
	         </div>
	  <div class="index_page_row">
	    <div class="index_page_description left">
	      <p class="index_text purple">
          We will assist you by assigning you a mentor that will be there to communicate with you one on one. We know that this is a tough process for anyone to go through, so we make sure that each person who uses our service can find a suitable mentor to help you throughout the process of transitioning out of the foster system. Each mentor will be limited in the mentees that they can assist, so that each mentee can have a mentor that can spend the necessary time in this important point of your life.
	      </p>
	    </div>
	    <div class="index_page_title blueberry right">
	      <h1 class="citrus_text index_title ">Learn Our Process</h1><br/>
	    </div>
	  </div>


	</div>
      </div>
    </div>
    <div id="footer" class="blueberry">

    </div>
    <script src="jquery.min.js"></script>
    <script src="index.js"></script>
  </body>
</html>
