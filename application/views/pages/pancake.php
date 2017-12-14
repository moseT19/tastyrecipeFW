<div class="container" >
         <div class="block">
            <h1>Pancake Recipe</h1>
            <img class="recipe-image" src="<?= asset_url() ?>/images/pancake.jpg" alt="An image to illustrate the final product the this recipe of pancakes. ">
            <div class="left-column">
                <h3>Method</h3>
                <p>Whisk together the dry ingredients in a large bowl. <br>In a separate bowl, whisk the eggs, then whisk in the milk, and buttermilk. Pour the wet ingredients into the dry ingredients and combine, using a wooden spoon. Mix only until the batter just comes together. Stir in the melted butter. Do not over-mix! The mixture should be a little lumpy. Lumpy is good. A lumpy batter makes fluffy pancakes.<br><br/>
At this point you can either gently fold in the blueberries, or wait until you pour the batter onto the griddle, and then place the blueberries into the surface of the pancake batter. Placing the blueberries into the pancakes while they are cooking will help keep them from bleeding.</p>
            </div>
            <div class="right-column">

             <h3>Dry ingredients: </h3>
             <ul>
                 <li>2 cups all purpose flour</li>
                 <li>1/2 teaspoon salt</li>
                 <li>
1/2 teaspoon baking powder</li>
                 <li>1/2 teaspoon baking soda</li>
                 <li>2 Tbsp sugar</li>
             </ul>
             <h3>Other ingredients: </h3>
             <ul>
                 <li>2 large eggs</li>
                 <li>1/2 cup buttermilk</li>
                 <li>1 cup milk</li>
                 <li>3 Tbsp warm melted butter</li>
                 <li>1 cup blueberries</li>
                 <li>Butter or vegetable oil</li>
             </ul>
             </div>
             <div id="comment">
                <h3>Commentsshibakel</h3>
                <?php if($this->session->userdata('logged_in')) : ?>
                <button id="showForm">Add comment</button>
                <?php endif; ?>
                <div id="myModal" class="modal fade" tabindex="-1" role="dialog">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Add a comment</h4>
                            </div>
                            <div class="modal-body">
                                <form id="addForm" action="" method="POST">
                                    <input id="foodcomment" type="hidden" name="recipe" value="pancake";>
                                    <input id="username" type="hidden" name="username" value="<?php echo $this->session->userdata('username') ?>";>
                                    <textarea name="comment"></textarea>

                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" id="addcomment">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="commentarea">

            </div>
            </div>
