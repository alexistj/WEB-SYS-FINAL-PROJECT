$(document).ready(function() {
    $.ajax({
        type: "GET",
        url: "resources/data/scholarshipsResources.json",
        dataType: "json",
        success: function(responseData, status){
            var output;
            var counter = 0;
            $.each(responseData.scholarships, function(i, item) {
                if(counter % 2 == 0){
                  output += '<div class="resource_entry resource_1">';
                }else{
                  output += '<div class="resource_entry resource_2">';
                }
                output += '<h1>' + item.title +'</h1>';
                output += '<p>' + item.amount + '</p>';
                output += '<a href=\"' + item.appLink + '\">' + item.appLink + '</a>';
                output += '<p>' + item.deadline + '</p>';
                output += '<p>' + item.description + '</p>';
                output += '<p>' + item.sponsor + '</p>';

                output += '</div>';
                counter += 1;
            });
            output = output.replace('undefined', '');
            $('#resourceList').html(output);
        }, error: function(msg) {
            alert("There was a problem: " + msg.status + " " + msg.statusText);
        }
    });
});
