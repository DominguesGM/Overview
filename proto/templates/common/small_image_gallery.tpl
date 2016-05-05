<div class="row">
  <br>
</div>
<div class="row">
  <div id="article-images" class='list-group small_gallery'>

  {foreach $articleImages as $image}
    <div id="image-{$image['id']}" class='col-sm-4 col-xs-6 col-md-3 col-lg-4'>
      <div class='col-sm-9 col-xs-9 col-md-9 col-lg-9'>
      <a class="thumbnail fancybox" rel="ligthbox" href="{$BASE_URL}{$image['path']}">
        <img class="img-responsive" src="{$BASE_URL}{$image['path']}" />
      </a>
    </div>
    <div class='col-sm-1 col-xs-1 col-md-1 col-lg-1'>
      <div class="btn-simple pull-right text-muted">
         <span onclick="deleteImage({$image['id']})" data-placement="bottom" data-toggle="tooltip" title="Eliminar imagem" class="glyphicon glyphicon-trash"></span>
       </div>
    </div>
    </div> <!-- col-6 / end -->
    {/foreach}

    </div> <!-- list-group / end -->
</div>

<script type="text/javascript">
  $(".fancybox").fancybox({
      helpers : {
          overlay : {
              css : {
                  'background' : 'rgba(58, 42, 45, 0.95)'
              }
          }
      }
    });
</script>
