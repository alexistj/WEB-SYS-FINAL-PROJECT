$(document).ready(function(){
  polaroids = document.getElementsByClassName("polaroid");
  for(var i=0; i<polaroids.length; i++){
	   let degree = 5 - Math.floor(Math.random() * 11);
	    let rotation = "transform:rotate(" + degree  + "deg);";
	     polaroids[i].setAttribute("style", rotation);
  };
  carousel = document.getElementsByClassName("carousel_image");
  let count = 0;
  setInterval(function(){
    image_number = count % carousel.length;
    carousel[image_number].removeAttribute("id");
    count += 1;
    image_number = count % carousel.length;
    carousel[image_number].setAttribute("id", "active");
  }, 3000);
  images = document.getElementById("images");
  $("#mentors").click(function(){
    $("#index_board_out").removeClass("image_inactive");
    $("#carousel").addClass("image_inactive");
  });
  $("#carousel_images").click(function(){
    $("#carousel").removeClass("image_inactive");
    $("#index_board_out").addClass("image_inactive");
  });
});
