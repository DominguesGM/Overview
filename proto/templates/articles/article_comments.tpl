<div class="row">
  <div class="col-md-8">
    <div class="page-header">
      <h3><span class="glyphicon glyphicon-comment"></span> Comentários </h3>
    </div>
    {if $contributorAccess}
    <div class="well">
      <h4>Deixe um comentário:</h4>
      <div class="form-group">
        <textarea id="new-comment" style="overflow:auto;resize:vertical" class="form-control" name="comment" rows="2" ></textarea>
      </div>
      <button type="button" onclick="postComment({$ID}, '{$article['first_name']}', '{$article['last_name']}', '{$PICTURE}');" class="btn btn-primary">Enviar</button>
    </div>
    <hr>
    {/if}
    <div id="comments-list" class="comments-list">
      {foreach $articleComments as $comment}

      <div id="comment-{$comment['id']}" class="media comment">
        <input class="comment-user" type="hidden" value="{$comment['posted_by']}">
        <p class="pull-right"><small>
          {$comment['comment_date']}</small></p>
          {if $contributorAccess}
          <div class="comment-vote">
            <a onclick="upvoteComment({$comment['id']})"><i id="comment-up-vote-{$comment['id']}" class="vote {if $comment['vote'] != 'up' } text-muted {/if} fa fa-arrow-up"></i></a>
            <br>
            <a onclick="downvoteComment({$comment['id']})"><i id="comment-down-vote-{$comment['id']}" class="vote {if $comment['vote'] != 'down'} text-muted {/if}fa fa-arrow-down"></i></a>
          </div>
          {/if}
          <a class="media-left" href="{$BASE_URL}pages/users/profile.php?id={$comment['posted_by']}">
            <img alt="Autor do comentário" class="img-circle comment-user-picture" src="{$BASE_URL}{$comment['path']}">
          </a>
          <div class="media-body">
            <h4 class="media-heading user_name"><a href="{$BASE_URL}users/profile.php?id={$comment['posted_by']}">{$comment['first_name']} {$comment['last_name']}</a></h4>
            {$comment['content']}
            <p><small id="comment-score-{$comment['id']}" class="text-muted">{$comment['score']} ponto{if $comment['score'] != 1 && $comment['score'] != -1}s{/if} </small></p>
            {if $contributorAccess}
            <div id="comment-report-{$comment['id']}">
              {if $comment['report']}
              <div class="report-comment text-muted"><small><span data-placement="bottom" class="glyphicon glyphicon-flag"></span>Comentário reportado</small></div>
              {else}
              <div class="selectable report-comment"><small><a data-id="comment#{$comment['id']}" data-toggle="modal" data-target="#report-form"><span data-placement="bottom" class="glyphicon glyphicon-flag"></span>Reportar comentário</a></small></div>
              {/if}
            </div>
            {/if}
          </div>
        </div>
        {/foreach}
      </div>
    </div>
  </div>
