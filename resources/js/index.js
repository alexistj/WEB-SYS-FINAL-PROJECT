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
  }, 7000);
  images = document.getElementById("images");
  $("#mentors").click(function(){
    $("#mentor_images").removeClass("image_inactive");
    $("#carousel").addClass("image_inactive");
    $("#images").removeClass("blueberry").addClass("citrus");
  });
  $("#carousel_images").click(function(){
    $("#carousel").removeClass("image_inactive");
    $("#mentor_images").addClass("image_inactive");
    $("#images").removeClass("citrus").addClass("blueberry");
  });
  navigation_links = document.getElementsByClassName("navigation_button");
  for(var i=0; i<navigation_links.length; i++){
    $(navigation_links[i]).click(function(){
      let link = $(this).attr("value");
      window.location.href = link;
    });
  };
});
