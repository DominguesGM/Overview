<div class="carousel slide article-slide" id="article-photo-carousel">

  <!-- Wrapper for slides -->
  <div class="carousel-inner cont-slider">
    {$i=0}
    {foreach $articleImages as $image}
    <div class="item {if $i++==0} active {/if}">
      <img title="" src="{$BASE_URL}{$image['path']}">
    </div>
    {/foreach}
  </div>
  <!-- Indicators -->
  <ol class="carousel-indicators">
    {$i=0}
    {foreach $articleImages as $image}
    <li class="{if $i==0}active{/if}" data-slide-to="{$i++}" data-target="#article-photo-carousel">
      <img alt="" src="{$BASE_URL}{$image['path']}">
    </li>
    {/foreach}
  </ol>
</div>
