<?php
include('template/header.html');
?>

<link rel="shortcut icon" href="facivon.ico">

<!-- search CSS -->
<link href="css/profile.css" rel="stylesheet">

<div class="container1">
  <div class="container">
    <div class="row">
      <div class="col-md-offset-2 col-md-8 col-lg-offset-3 col-lg-6">

        <div class="profile">
          <div class="col-sm-12">
            <div class="col-xs-12 col-sm-8">
              <h2>John Doe</h2>
              <h4>Moderator</h4>
              <p><strong>About</strong></p>
              <p>Something about me.</p>
            </div>

            <div class="col-xs-12 col-sm-4 text-center">
              <figure>
                <img src="http://packetcode.com/apps/wall-design/image.jpg" alt="" class="img-circle img-responsive">
              </figure>
            </div>
          </div>

          <div class="col-xs-12 divider text-center">
            <div class="col-xs-12 col-sm-4 emphasis">
              <h2><strong>22</strong></h2>
              <p><small>Articles</small></p>
            </div>
            <div class="col-xs-12 col-sm-4 emphasis">
              <h2><strong>245</strong></h2>
              <p><small>Following</small></p>
            </div>
            <div class="col-xs-12 col-sm-4 emphasis">
              <h2><strong>43</strong></h2>
              <p><small>Followers</small></p>
            </div>
          </div>

          <div class="col-xs-12 divider text-center">
            <button style="margin-top:30px" class="btn btn-primary btn-block"><span class="glyphicon glyphicon-plus"></span> Follow </button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div id="wall" class="container">

    <div class="row">
      <div class="col-md-offset-2 col-md-4 col-sm-4 col-xs-4">
        <div class="col-md-3 col-sm-3 col-xs-3">
          <img src="http://packetcode.com/apps/wall-design/image.jpg" class="img-circle" width="60px"/>
        </div>
        <div class="col-md-9 col-sm-9 col-xs-9">
          <b>John Doe posted a new article.</b>
          <!-- <div class="pull-right text-muted" id="delete"><span class="glyphicon glyphicon-trash"></span></div> -->
        </div>
      </div>
    </div>
    
    <div class="row">
      <div class="col-md-offset-3 col-md-6 col-sm-6 col-xs-6">
        <article class="search-result row">
          <span class="image-box" data-score="321"><img class="img-thumbnail" src="http://placehold.it/75x75" alt=""></span>
          <div class="col-xs-12 col-sm-12 col-md-7 excerpet">
            <h3><a href="#" title="">Voluptatem, exercitationem, suscipit, distinctio</a></h3>
          </div>
          <span class="clearfix borda"></span>
        </article>

        <div class="text-muted"><small>posted 2 minutes ago</small></div>
      </div>
    </div>


  </div>
</div>
</div>

<?php
include('template/footer.html');
?>
