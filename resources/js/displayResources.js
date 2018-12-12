// file: displayResoucres.js
// purpose: retrieve data from json file for scholarships and output it onto resources.html

$(document).ready(function() {
    $.ajax({
        // set up ajax to retrieve information from the json file
        type: "GET",
        url: "resources/data/scholarshipsResources.json",
        dataType: "json",
        success: function(responseData, status){
            var output;
            var counter = 0;
            // read and loop through each separate scholarship entry
            $.each(responseData.scholarships, function(i, item) {
                // this portion is for styling. the page has each entry alternating in color and this adds a class to dictate which color it will be
                if(counter % 2 == 0){
                  output += '<div class="resource_entry resource_1">';
                }else{
                  output += '<div class="resource_entry resource_2">';
                }
                // output the different components
                output += '<h1>' + item.title +'</h1>';
                output += '<p>' + item.amount + '</p>';
                output += '<a href=\"' + item.appLink + '\">' + item.appLink + '</a>';
                output += '<p>' + item.deadline + '</p>';
                output += '<p>' + item.description + '</p>';
                output += '<p>' + item.sponsor + '</p>';

                output += '</div>';
                counter += 1;
            });
            // update the div in resources.html to be loaded with json content
            output = output.replace('undefined', '');
            $('#resourceList').html(output);
        }, error: function(msg) {
            alert("There was a problem: " + msg.status + " " + msg.statusText);
        }
    });
});
