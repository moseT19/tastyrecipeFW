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
            <div id="comment">
                <div class="alert-success" ></div>
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
                                    <input id="foodcomment" type="hidden" name="recipe" value="meatball";>
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
