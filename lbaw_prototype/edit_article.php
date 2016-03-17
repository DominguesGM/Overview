<?php
include('template/header.html');
?>
<!-- Page Header -->
<div class="row">
  <div class="col-lg-12">
    <h1 class="page-header">
      <span class="glyphicon glyphicon-pencil"></span> Edit article
    </h1>
    <h2>
    <div class="pull-right text-muted" id="delete">
      <span class="glyphicon glyphicon-trash"></span>
    </div>

    <div class="pull-right text-muted" id="discard">
      <span class="glyphicon glyphicon-remove">&nbsp</span>
    </div>

    <div class="pull-right text-muted" id="save">
      <span class="glyphicon glyphicon-ok">&nbsp</span>
    </div>
  </h2>
  </div>
</div>
<!-- /.row -->

<div class="container-fluid">

  <div class="row">
    <div class="col-md-2 col-sm-12 col-xs-12">
            <img src="http://packetcode.com/apps/wall-design/image.jpg" class="img-circle" width="80px"/>
          <h4>John Doe</h4>
    </div>
    <div class="col-md-8 col-sm-12 col-xs-12">
      <form role="form">

        <div class="form-group">
          <label for="title">
            Title
          </label>
          <input type="text" class="form-control" id="title" value="Your title"/>
        </div>

        <div class="form-group">
          <label for="category">
            Category
          </label>
          <br>
          <select id="category">
            <option value="science" selected="true">Science</option> <!-- TODO use jquery-->
            <option value="politics">Politics</option> <!-- TODO use jquery-->
          </select>
        </div>

        <div class="form-group">
          <label for="summary">
            Summary
          </label>
          <textarea class="form-control" id="summary" rows="">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis molestie pellentesque justo vel dignissim. Donec eleifend magna mi, vitae rhoncus turpis tempus ac.</textarea>
        </div>

        <div class="form-group">
          <label for="content">
            Content
          </label>
          <textarea class="form-control" id="content" rows="10">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis molestie pellentesque justo vel dignissim. Donec eleifend magna mi, vitae rhoncus turpis tempus ac. Suspendisse lacinia lectus mi, egestas commodo lorem pulvinar non. Donec sollicitudin lacinia condimentum. Ut venenatis suscipit quam quis fermentum. Vivamus vel lectus vel diam vulputate varius. Vivamus tempor, tortor non accumsan hendrerit, enim velit blandit elit, at cursus ante eros vitae quam. Donec tellus metus, lobortis sit amet lorem fermentum, tristique semper nisl. Nunc pellentesque sagittis lorem quis congue. Proin ac nunc at nisi eleifend pretium in vel velit. Proin ut faucibus tortor. Maecenas enim ante, placerat id dictum ac, consequat id est. Maecenas vitae dui quis enim sagittis fermentum in eget dolor. Donec suscipit consectetur feugiat. Aliquam sagittis pretium congue.
            Vestibulum quis dolor eget felis tincidunt eleifend vel in risus. Vivamus faucibus metus vel scelerisque fringilla. Nunc ac vehicula lectus. Ut laoreet dolor vitae purus sodales viverra. Etiam ligula nulla, scelerisque interdum semper sed, egestas sagittis nulla. Donec sem ante, porta sed pretium vitae, rhoncus a dui. Aenean hendrerit mi dignissim sagittis semper. Aliquam luctus nunc id cursus bibendum. Quisque libero nisl, tempus ut semper a, consectetur a turpis. Curabitur ullamcorper orci quis arcu sagittis tempus. Phasellus fringilla id lectus ac pellentesque. Nam felis erat, sodales eget tellus sit amet, tincidunt porttitor lacus.
            Sed hendrerit, ante id vestibulum efficitur, ligula felis feugiat lacus, ut tincidunt diam turpis quis dolor. Sed molestie scelerisque tellus quis viverra. Etiam a risus id turpis hendrerit egestas. Sed id iaculis augue, eget luctus sapien. In ac quam augue. Nullam in laoreet ante. Aliquam non justo accumsan ex egestas porttitor et et ligula. Quisque convallis, purus et vulputate blandit, nunc dolor tincidunt dolor, ac gravida magna neque ut sapien. Curabitur laoreet erat nec leo convallis, imperdiet luctus enim ultrices. Donec aliquam vitae mi in ullamcorper. Vivamus velit arcu, euismod ac molestie in, pharetra at diam. Suspendisse aliquet ultricies semper.
          </textarea>
        </div>

        <div class="form-group">

          <label for="imgFile">
            Image
          </label>

          <a href="#">
              <img class="media-object" src="http://placehold.it/200x100" alt="...">
          </a>
          <br>
          <input type="file" id="imgFile" />
        </div>

        <br>

        <div class="form-group">
          <button type="submit" class="pull-right btn btn-primary">
            <span class="glyphicon glyphicon-ok"></span> Save
          </button>

          <span class="pull-right">&nbsp</span>

          <button class="pull-right btn btn-primary">
            <span class="glyphicon glyphicon-remove"></span> Cancel
          </button>

          <span class="pull-right">&nbsp</span>

          <button type="submit" class="pull-right btn btn-primary">
            <span class="glyphicon glyphicon-trash"></span> Delete
          </button>

        </div>

      </form>
    </div>
  </div>
</div>
</div>


<?php
include('template/footer.html');
?>
