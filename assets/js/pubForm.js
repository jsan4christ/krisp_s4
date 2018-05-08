/**
 * Created by vagner on 2018/05/07.
 */

$(document).ready(function(){
    $("#publication_doi").blur(function(){
        $.ajax({
            url: "{{ (path('get_pub_details')) }}",
            type: "POST",
            dataType: "json",
            data: {
                "some_var_name": "some_var_value"
            },
            async: true,
            success: function (data)
            {
                console.log(data)
                $('div#ajax-results').html(data.output);

            }
        });
    });
});
