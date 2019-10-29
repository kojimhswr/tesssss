$(document).on('click', '#add_option1', function() {
    $.ajax({
        method: 'GET',
        url: '/admin/packages/itinerary',
        dataType: 'html',
        success: function(result) {
            if (result) {
                $('#itinerary').append(result);
            }
        },
    });
});

$("#itinerary").on('click','.remove1',function(){
 $(this).closest('tr').remove();

   
})