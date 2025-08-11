$( document ).ready(function() {
	$('.sortable').sortable({
        cursor: 'move',
        items: '> .another-field',
        update: function (event, ui) {
            var panel = $(this).parent();
            update_order_numbers(panel);
            
            // Save new order to server
            var fields = [];
            $(this).find('.another-field').each(function(index) {
                fields.push({
                    id: $(this).data('id'),
                    order: index + 1
                });
            });
            
            // Send AJAX request to update order
            $.ajax({
                url: '/admin/dynamicfield/update-order',
                method: 'POST',
                data: {
                    fields: fields,
                    _token: $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    console.log('Order updated successfully');
                },
                error: function(xhr) {
                    console.error('Error updating order');
                }
            });
        }
    });
});
