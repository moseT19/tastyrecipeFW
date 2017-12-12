$(document).ready(function(){

    showComments();

    $("#submit-btn").click(function(){

        var username = $('#username').val(),
            comment = $('#body').val(),
            recipe = $('recipe').val();

        $.ajax({

            url: $(this).attr('action'),
            type: $(this).attr('method'),
            data: {
                'username': username,
                'comment': comment,
                'recipe': recipe
            },
            success: function(response){
                $('#body').val("");


            }

        });

       //$(".comments").load("comments/getCom")
    });


     function showComments(){
        $.ajax({
            type: 'ajax',
            url: '<?php echo base_url() ?>/comments/getCom',
            async: false,
            dataType: 'json',
            success: function(data){
                var output = '';
                var deleteComment = '';
                var i;
                for(i = 0; i<data.length;i++){
                    if($('#username').text() == data[i].username){
                        deleteComment = '<a href="javascript:;" class="deletebutton" data="'+data[i].id+'">Delete</a>'
                    }else{
                        deleteComment = '';
                    }
                    if(data[i].food == 'pancake'){
                        output += '<div class="comment">'+deleteComment+'<h3 class="commentusername">'+data[i].username+'</h3><p>'+data[i].comment+'</p></div>';
                    }
                }

                $('#comments').html(output);
            },
            error: function(){
                alert('could not get data from database');
            }
        })
    }

});

/*
$('form.ajax').on('submit', function(){

    var that = $(this),
        url = that.attr('action'),
        type = that.attr('method'),
        data = {};

    that.find('[name]').each(function(){

            var that = $(this),
                name = that.attr('name'),
                value = that.val();

            data[name] = value;
            });

    $.ajax({
        url: url,
        type: type,
        data: data,
        success: function() {
            $('.comments').load(location.href, '.comments');
        }
    });
     return false;
});
*/
