<?php
/**
 * Created by IntelliJ IDEA.
 * User: Gil
 * Date: 16/03/2016
 * Time: 16:32
 */
include("template/header.html");?>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-lg-8">
            <div class="blog-stripe">
                <div>
                    <div>
                        <div class="article-title"><h2>Hundreds of thousands in protest on the streets of Brazil</h2></div>
                        <div class="article-score">123205</div>
                        <div class="article-scoring"><a href="#"><i class="fa fa-arrow-up"></i></a><br><a href="#"><i class="fa fa-arrow-down"></i></a></div>
                    </div>
                    <p class="article-summary">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam imperdiet lectus fermentum nunc sollicitudin tincidunt. Nulla nec volutpat.
                    </p>
                    <p class="author"><a href="#">Jon Doe</a>
                </div>
                <a href="#">
                    <img src="http://placehold.it/600x400" alt="" class="feature">
                </a>
                <div class="article-body">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis molestie pellentesque justo vel dignissim. Donec eleifend magna mi, vitae rhoncus turpis tempus ac. Suspendisse lacinia lectus mi, egestas commodo lorem pulvinar non. Donec sollicitudin lacinia condimentum. Ut venenatis suscipit quam quis fermentum. Vivamus vel lectus vel diam vulputate varius. Vivamus tempor, tortor non accumsan hendrerit, enim velit blandit elit, at cursus ante eros vitae quam. Donec tellus metus, lobortis sit amet lorem fermentum, tristique semper nisl. Nunc pellentesque sagittis lorem quis congue. Proin ac nunc at nisi eleifend pretium in vel velit. Proin ut faucibus tortor. Maecenas enim ante, placerat id dictum ac, consequat id est. Maecenas vitae dui quis enim sagittis fermentum in eget dolor. Donec suscipit consectetur feugiat. Aliquam sagittis pretium congue.</p>
                    <p>Vestibulum quis dolor eget felis tincidunt eleifend vel in risus. Vivamus faucibus metus vel scelerisque fringilla. Nunc ac vehicula lectus. Ut laoreet dolor vitae purus sodales viverra. Etiam ligula nulla, scelerisque interdum semper sed, egestas sagittis nulla. Donec sem ante, porta sed pretium vitae, rhoncus a dui. Aenean hendrerit mi dignissim sagittis semper. Aliquam luctus nunc id cursus bibendum. Quisque libero nisl, tempus ut semper a, consectetur a turpis. Curabitur ullamcorper orci quis arcu sagittis tempus. Phasellus fringilla id lectus ac pellentesque. Nam felis erat, sodales eget tellus sit amet, tincidunt porttitor lacus.</p>
                    <p>Sed hendrerit, ante id vestibulum efficitur, ligula felis feugiat lacus, ut tincidunt diam turpis quis dolor. Sed molestie scelerisque tellus quis viverra. Etiam a risus id turpis hendrerit egestas. Sed id iaculis augue, eget luctus sapien. In ac quam augue. Nullam in laoreet ante. Aliquam non justo accumsan ex egestas porttitor et et ligula. Quisque convallis, purus et vulputate blandit, nunc dolor tincidunt dolor, ac gravida magna neque ut sapien. Curabitur laoreet erat nec leo convallis, imperdiet luctus enim ultrices. Donec aliquam vitae mi in ullamcorper. Vivamus velit arcu, euismod ac molestie in, pharetra at diam. Suspendisse aliquet ultricies semper.</p>
                </div>
            </div>
            <div class="report-article"><a href="#">Report Article</a></div>
        </div>
        <div class="col-md-4 col-lg-4">
            <ul class="all-blogs">
                <li class="media">
                    <a class="pull-left" href="#">
                        <img src="http://placehold.it/100x100" alt="...">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">Latest Google Updates</h4>
                        <p class="author">Mike Smith</p>
                    </div>
                </li>
                <li class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/100x100" alt="...">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">Newest bootstrap version</h4>
                        <p class="author">Dave Hesler</p>
                    </div>
                </li>
                <li class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/100x100" alt="...">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">Android rolls our another update</h4>
                        <p class="author">Michael Davis</p>
                    </div>
                </li>
                <li class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/100x100" alt="...">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">Survey results are out</h4>
                        <p class="author">Mike Smith</p>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <div class="row">
      <!-- Facebook -->
      <a href="https://www.facebook.com/sharer/sharer.php?u=" title="Share on Facebook" target="_blank" class="btn btn-facebook"><i class="fa fa-facebook"></i> Facebook</a>

      <!-- Twitter -->
      <a href="http://twitter.com/home?status=" title="Share on Twitter" target="_blank" class="btn btn-twitter"><i class="fa fa-twitter"></i> Twitter</a>

      <!-- Google+ -->
      <a href="https://plus.google.com/share?url=" title="Share on Google+" target="_blank" class="btn btn-googleplus"><i class="fa fa-google-plus"></i> Google+</a>
    </div>
    <div class="row">
        <div class="col-md-8">
            <div class="page-header">
                <h1><small class="pull-right">4 comments</small> Comments </h1>
            </div>
            <div class="form-group comment-div">
                <label for="comment">Comment:</label>
                <input type="text" class="form-control comment-input" id="usr"><br>
                <span><button class="submit-comment">Submit</button></span>
            </div>
            <!-- list of comments -->
            <div class="comments-list">
                <div class="media comment">
                    <p class="pull-right"><small>5 days ago</small></p>
                    <div class="comment-vote"><a href="#"><i class="fa fa-arrow-up"></i></a><br><a href="#"><i class="fa fa-arrow-down"></i></a></div>
                    <a class="media-left" href="#">
                        <img class="img-circle comment-user-picture" src="http://placehold.it/40x40">
                    </a>
                    <div class="media-body">

                        <h4 class="media-heading user_name"><a href="#">Josh Smith</a></h4>
                        Wow! this is really great.

                        <p><small>Score: 123</small></p>
                        <p><small><a href="#">Report Comment</a></small></p>
                    </div>
                </div>
                <div class="media comment">
                    <p class="pull-right"><small>5 days ago</small></p>
                    <div class="comment-vote"><a href="#"><i class="fa fa-arrow-up"></i></a><br><a href="#"><i class="fa fa-arrow-down"></i></a></div>
                    <a class="media-left" href="#">
                        <img class="img-circle comment-user-picture" src="http://placehold.it/40x40">
                    </a>
                    <div class="media-body">

                        <h4 class="media-heading user_name"><a href="#">Peter Oldfield</a></h4>
                        No idea why this is even news, downvote!

                        <p><small>Score: -3</small></p>
                        <p><small><a href="#">Report Comment</a></small></p>
                    </div>
                </div>
                <div class="media comment">
                    <p class="pull-right"><small>5 days ago</small></p>
                    <div class="comment-vote"><a href="#"><i class="fa fa-arrow-up"></i></a><br><a href="#"><i class="fa fa-arrow-down"></i></a></div>
                    <a class="media-left" href="#">
                        <img class="img-circle comment-user-picture" src="http://placehold.it/40x40">
                    </a>
                    <div class="media-body">

                        <h4 class="media-heading user_name"><a href="#">Luke Singh</a></h4>
                        Very informative, great work!

                        <p><small>Score: 1</small></p>
                        <p><small><a href="#">Report Comment</a></small></p>
                    </div>
                </div>
                <div class="media comment">
                    <p class="pull-right"><small>5 days ago</small></p>
                    <div class="comment-vote"><a href="#"><i class="fa fa-arrow-up"></i></a><br><a href="#"><i class="fa fa-arrow-down"></i></a></div>
                    <a class="media-left" href="#">
                        <img class="img-circle comment-user-picture" src="http://placehold.it/40x40">
                    </a>
                    <div class="media-body">

                        <h4 class="media-heading user_name"><a href="#">Matthew O'Reilley</a></h4>
                        Impressive journalistig job, keep it up.

                        <p><small>Score: 10</small></p>
                        <p><small><a href="#">Report Comment</a></small></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include("template/footer.html");?>
