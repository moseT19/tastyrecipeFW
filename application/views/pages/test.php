<div class="container" >
                <div class="block">

                <h1>Meatball Recipe</h1>
            <img class="recipe-image" src="<?= asset_url() ?>/images/kottbullar.png" alt="An image to illustrate the final product the this recipe of meatballs. ">
            <div class="left-column">
                <h3>Method</h3>
                <p>
                1. Heat oven to 400°F. Line 13x9-inch pan with foil; spray with cooking spray.
               <br/><br/> 2.
                In large bowl, mix all ingredients. Shape mixture into 20 to 24 (1 1/2-inch) meatballs. Place 1 inch apart in pan.
                <br/><br/>3.
                Bake uncovered 18 to 22 minutes or until no longer pink in center.</p>
            </div>
            <div class="right-column">

             <h3>Ingredients: </h3>
             <ul>
                 <li>1 lb lean (at least 80%) ground beef</li>
                 <li>1/2 cup Progresso™ Italian-style bread crumbs</li>
                    <li>1/2 teaspoon baking powder</li>
                    <li>1/4 cup milk</li>
                    <li>1/2 teaspoon salt</li>
                    <li>1/2teaspoon Worcestershire sauce</li>
                    <li>1/4 teaspoon pepper</li>
                    <li>1 small onion, finely chopped (1/4 cup)</li>
                    <li>1egg</li>

             </ul>
             </div>
            <div id="comments">
                <h3>Commentsshibakel</h3>



                <form id="thisForm" action="<?php echo base_url() ?>comments/createCom" method="post">
                 <div id="commentform">
                     <h4>Write a comment here :</h4><textarea type = "text" name = "comment" pattern="[a-zA-Z0-9]+" class = ""></textarea><br /><br />
                     <button type = "submit" id="submit-btn">Comment</button><br />
                     <input type="hidden" name="recipe" value="meatball";>
                     <input type="hidden" name="username" value="<?php echo $this->session->userdata('username'); ?>";>
                 </div>
                </form>
            </div>
            <form id="thisForm" action="<?php echo base_url() ?>comments/createCom" method="post">
                 <div id="commentform">
                     <h4>Write a comment here :</h4><textarea type = "text" name = "comment" pattern="[a-zA-Z0-9]+" class = ""></textarea><br /><br />
                     <button type = "submit" id="submit-btn">Comment</button><br />
                     <input type="hidden" name="recipe" value="meatball";>
                     <input type="hidden" name="username" value="<?php echo $this->session->userdata('username'); ?>";>
                 </div>
                </form>

        </div>
<script>
    $(function(){

    showAllComments('meatball');

    //add commment with validation
    $('#addcomment').click(function(){
       var url = $('#thisForm').attr('action'),
           data = $('#thisForm').serialize();

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
						if(response.success){
							$('#thisForm')[0].reset();
							$('.alert-success').html('Comment added successfully').fadeIn().delay(4000).fadeOut('slow');
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

    //function
		function showAllComments(recipe){
			$.ajax({
				type: 'ajax',
				url: '<?php echo base_url() ?>comments/showAllComments',
				async: false,
				dataType: 'json',
				success: function(data){
					var htmlOutput = '',
                        deletebtn = '',
                        i;
					for(i=0; i<data.length; i++){
                        deletebtn = '';
                        if('<?php echo $this->session->userdata('username') ?>' == data[i].username){
                            deletebtn += '<a href="javascript:;" class="deletebtn" data="'+data[i].id+'">Delete</a>';
                        }
                        if(data[i].recipe == recipe){
                            htmlOutput += ' <div class="comment" ><h4>'+data[i].username+'</h4><p>'+data[i].comment+'</p>'+deletebtn+'</div>';
                        }

					}
					$('#comments').html(htmlOutput);
				},
				error: function(){
					alert('Could not get Data from Database');
				}
			});
		}




});

</script>
