require('./bootstrap');

var notyf = new Notyf();

$(function() {

    $('button.edit').on('click', function() {
        
        let todoId = $(this).data('todo');

        const todoItem = $(this).closest('.todo-item');

        todoItem.find('.todo-actions').toggle();
    });

    $('.btn-action').on('click', function(event) {
        event.preventDefault();

        const _self = $(this);
        const todoItem = _self.closest('.todo-item');
        const className = _self.attr('class');
        const circle = _self.find('.circle');
        
        if( className.includes('status') ) {

            axios.post(_self.attr('href'), {
                _token: window.csrf_token
            }).then(function(response) {

                if( circle.hasClass('completed') ) {
                    circle.removeClass('completed')
                        .addClass('incompleted');

                    todoItem.removeClass('incompleted')
                    .addClass('completed');
                } else {
                    circle.removeClass('incompleted')
                        .addClass('completed');

                    todoItem.removeClass('completed')
                    .addClass('incompleted');
                }

                notyf.success(response.data.message);
            });

        } else if( className.includes('delete') ) {

            if( confirm('Are you sure to delete this item?') ) {
                axios.post(_self.attr('href'), {
                    _token: window.csrf_token
                }).then(function(response) {
                    todoItem.fadeOut();
                    notyf.success(response.data.message);
                });
            }
        }
    });


});