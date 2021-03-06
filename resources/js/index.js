// file: index.js
// purpose: javascript that is used for index.php. However, the navigation button javascript is found in this page
// and is used in every other page of the website. 

$(document).ready(function(){
  // each time index.php is reloaded, this will alter the angle that the "polaroid images" for the mentor spotlight is presented in.
  // Does not make a huge difference, but is more of an aesthetic decision.
  polaroids = document.getElementsByClassName("polaroid");
  for(var i=0; i<polaroids.length; i++){
	   let degree = 5 - Math.floor(Math.random() * 11);
	    let rotation = "transform:rotate(" + degree  + "deg);";
	     polaroids[i].setAttribute("style", rotation);
  };
  // Allows the switching of images in the slideshow. After a set interval the image changes
  carousel = document.getElementsByClassName("carousel_image");
  let count = 0;
  setInterval(function(){
    image_number = count % carousel.length;
    carousel[image_number].removeAttribute("id");
    count += 1;
    image_number = count % carousel.length;
    carousel[image_number].setAttribute("id", "active");
  }, 7000);
  // allows switching of displaying slideshow and mentor spotlight
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

  // javascript for the navigation bar links. Because the buttons for the nav bar are not actual links
  // each element for the nav bar has a value attribute with the page it should be linking to and onclick
  // javascript changes the location of the page to link stored in the value
  navigation_links = document.getElementsByClassName("navigation_button");
  for(var i=0; i<navigation_links.length; i++){
    $(navigation_links[i]).click(function(){
      let link = $(this).attr("value");
      window.location.href = link;
    });
  };

  // javascript for the modal for the popup login on index.php
  $('#modal_button').click(function(){
    $("#modal").removeClass("hidden");
    $("#content").addClass("modal_active");
  });
  close_buttons = document.getElementsByClassName("modal_close");
  for(var i=0; i<close_buttons.length; i++){
    $(close_buttons[i]).click(function(){
      $("#modal").addClass("hidden");
      $("#content").removeClass("modal_active");
    });
  };

  login_buttons = document.getElementsByClassName("modal_login");
  for(var i=0; i<login_buttons.length; i++){
    $(login_buttons[i]).click(function(){
      $("#login").removeClass("hidden");
      $("#register").addClass("hidden");
    });
  };
  register_buttons = document.getElementsByClassName("modal_register");
  for(var i=0; i<register_buttons.length; i++){
    $(register_buttons[i]).click(function(){
      $("#register").removeClass("hidden");
      $("#login").addClass("hidden");
    });
  };
  cancel_buttons = document.getElementsByClassName("cancel");
  for(var i=0; i<cancel_buttons.length; i++){
    $(cancel_buttons[i]).click(function(){
      $("#modal").addClass("hidden");
      $("#content").removeClass("modal_active");
    });
  };
});
