$(document).ready(function(){

    showAllComments();

    //add commment with validation
    $('#showForm').click(function(){
			$('#myModal').modal('show');
			$('#addForm').attr('action', 'http://localhost/trFW/comments/addComment');
		});

    $('#addcomment').click(function(e){


       var url = $('#addForm').attr('action'),
           data = $('#addForm').serialize();

        var comment = $('input[name=comment]'),
            validate = '';

        if(comment.val() == ''){
            comment.parent().parent().addClass('has-error');
        }
        else{
            comment.parent().parent().removeClass('has-error');
            validate+='2+2=4-1=3'
        }

        if(validate == '2+2=4-1=3'){
            $.ajax({
               type: 'ajax',
					method: 'post',
					url: url,
					data: data,
					async: false,
					dataType: 'json',
					success: function(response){
                        console.log(response);
						if(response.success){
							$('#myModal').modal('hide');
							$('#addForm')[0].reset();
							if(response.type=='add'){
								var type = 'added'
							}
							$('.alert-success').html('Comment '+type+' successfully').fadeIn().delay(4000).fadeOut('slow');
							showAllComments();
						}else{
							alert('Error');
						}
					},
					error: function(){
						alert('Could not add data');
					}

            });

        }

    });

    //delete comments
        $('#commentarea').on('click', '.deletebtn', function(){
        var id = $(this).attr('data');
        $.ajax({
            type: 'ajax',
            method: 'get',
            async: false,
            url: 'http://localhost/trFW/comments/deleteComment',
            data:{id:id},
            dataType: 'json',
            success: function(response){
                if(response.success){
                    $('.alert-success').html('Comment Deleted successfully').fadeIn().delay(4000).fadeOut('slow');
                    showAllComments();
                }else{
                    alert('Error: You cant delete that comment.');
                }
            },
            error: function(){
                alert('Error deleting');
            }
        });
    });

    //function
		function showAllComments(){
			$.ajax({
				type: 'ajax',
				url: 'http://localhost/trFW/comments/showAllComments',
				async: false,
				dataType: 'json',
				success: function(data){
					var htmlOutput = '',
                        deletebtn = '',
                        i;
					for(i=0; i<data.length; i++){
                        deletebtn = '';
                        if($('#username').val() == data[i].username){
                            deletebtn += '<a href="javascript:;" class="deletebtn" data="'+data[i].id+'">Delete</a>';
                        }
                        if(data[i].recipe == $('#foodcomment').val()){
                            htmlOutput += ' <div class="comment" ><h4>'+data[i].username+'</h4><p>'+data[i].comment+'</p>'+deletebtn+'</div>';
                        }

					}
					$('#commentarea').html(htmlOutput);
				},
				error: function(){
					alert('Could not get Data from Database');
				}
			});
            return false;
		}




});
