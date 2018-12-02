$(document).ready(function() {
    $.ajax({
        type: "GET",
        url: "../resources/scholarshipsResources.json",
        dataType: "json",
        success: function(responseData, status){
            var output;

            $.each(responseData.scholarships, function(i, item) {
                output += '<div>';
                output += '<h1>' + item.title +'</h1>';
                output += '<p>' + item.amount + '</p>';
                output += '<a href=\"' + item.appLink + '\">' + item.appLink + '</a>';
                output += '<p>' + item.deadline + '</p>';
                output += '<p>' + item.description + '</p>';
                output += '<p>' + item.sponsor + '</p>';

                output += '</div>';
            });
            output = output.replace('undefined', '');
            $('#resourceList').html(output);
        }, error: function(msg) {
            alert("There was a problem: " + msg.status + " " + msg.statusText);
        }
    });
});
