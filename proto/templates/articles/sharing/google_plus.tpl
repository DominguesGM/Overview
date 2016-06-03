<!-- Atualize a tag html para incluir os atributos itemscope e itemtype. -->
<html itemscope itemtype="http://schema.org/Article">

<!-- Insira as três tags a seguir no corpo. -->
<span itemprop="name">{$BASE_URL}pages/articles/article.php?id={$article.id}</span>
<span itemprop="description">{$article.title}</span>
<img itemprop="image" src="{$BASE_URL}{$articleImages[0].path}">

<!-- Posicione esta tag no cabeçalho ou imediatamente antes da tag de fechamento do corpo. -->
<script src="https://apis.google.com/js/platform.js" async defer>
  {
    lang: 'pt-PT',
    parsetags: 'explicit'
  }
</script>

<!-- Posicione esta tag onde você deseja que o botão +1 apareça. -->
<div class="g-plusone" data-annotation="inline" data-width="300"></div>

<!-- Posicione este retorno de chamada onde achar necessário. -->
<script type="text/javascript">gapi.plusone.go();</script>
