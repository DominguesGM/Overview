{include file='common/header.tpl'}

{include file='common/status_messages.tpl'}

<link rel="shortcut icon" href="facivon.ico">
<link href="{$BASE_URL}css/profile.css" rel="stylesheet">

<div class="row">
  <div class="col-md-5 col-lg-5">
    <div id="user-info" class="profile">
      <input type="hidden" id="user-id" value="{$ID}">
      <div class="col-sm-12">
        <div class="col-xs-12 col-sm-8">
          <h2>{$user.first_name} {$user.last_name}</h2>
          <p class="text-muted email">{$user.email}</p>
          <h4>{$user.type}</h4>
          <br>
          <p class="about"><strong>Sobre...</strong></p>
          <p class="about">{$user.about}</p>
          <br>
        </div>

        <div class="col-xs-12 col-sm-4 text-center">
          <figure>
            <img height="80" width="80" src="{$BASE_URL}{$user.path}" alt="{$user.first_name} {$user.last_name}" class="img-circle">
          </figure>
        </div>

        {if user.id == $ID}
        <div class="selectable btn-simple pull-right text-muted">
          <span onclick="editAccount()" data-placement="bottom" data-toggle="tooltip" title="Editar perfil" class="glyphicon glyphicon-wrench"></span>
        </div>
        {/if}
      </div>

      <div class="col-xs-12 divider text-center">
        <div class="col-xs-12 col-sm-4 emphasis">
          <h2><strong>{$user.nArticles}</strong></h2>
          <p><small>Artigo{if $user.nArticles !=1}s{/if}</small></p>
        </div>
        <div class="col-xs-12 col-sm-4 emphasis">
          <h2><strong id="nFollowees">{$user.nFollowees}</strong></h2>
          <p><small>A seguir</small></p>
        </div>
        <div class="col-xs-12 col-sm-4 emphasis">
          <h2><strong id="nFollowers">{$user.nFollowers}</strong></h2>
          <p><small>Seguidor{if $user.nFollowers!=1}es{/if}</small></p>
        </div>
      </div>

      {if $ID && $ID != $user.id}
      <div class="col-xs-12 divider text-center">
        <button id="follow-button" style="margin-top:30px" onclick="toggleFollowStatus({$user.id})"class="btn btn-primary btn-block"><span class="glyphicon glyphicon-{if $user.follow_status==false}plus{else}minus{/if}"></span> {if $user.follow_status==true} Não seguir {else} Seguir {/if} </button>
      </div>
      {/if}
    </div>
  </div>

  <div class="col-md-7 col-lg-7">
    <div id="wall">

      {foreach $userStories as $userStory}
      <div class="row story">
         <div class="col-md-offset-1 col-md-10 col-sm-10 col-xs-10">
            <img src="{$BASE_URL}{$userStory.author_picture}" class="img-circle pull-left user_picture" width="60" height="60" alt="$userStory.first_name} {$userSorie.last_name}"/>
            <b><span class="vcenter"><a href="{$BASE_URL}pages/users/profile.php?id={$userStory.author_id}">{$userStory.first_name} {$userStory.last_name}</a> editou um artigo.</span></b>
            <p class="text-muted small">{$userStory.date}</p>
         </div>

        <div class="col-md-offset-3 col-md-9 col-sm-9 col-xs-9">
         <div class="short_news_item">
           <a href="{$BASE_URL}pages/articles/article.php?id={$userStory.article_id}"><h4>{$userStory.title}</h4></a>
           <span class="image-box" data-score="{$userStory.score} ponto{if {$userStory.score}!=1}s{/if}"><img class="img-thumbnail" src="{$BASE_URL}{$userStory.path}" alt="{$userStory.title}"></span>
           <p class="summary">{$userStory.summary}</p>
         </div>
        </div>
    </div>
    <br>
    {/foreach}
    </div>
  </div>
</div>

<script src="{$BASE_URL}lib/bootbox/bootbox.min.js"></script>
<script type="text/javascript" src="{$BASE_URL}lib/slimScroll/jquery.slimscroll.min.js"></script>
<script src="{$BASE_URL}javascript/profile.js"></script>

{include file='common/footer.tpl'}
