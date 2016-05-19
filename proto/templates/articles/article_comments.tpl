<div class="row">
    <div class="col-md-8">
        <div class="page-header">
            <h3><span class="glyphicon glyphicon-comment"></span> Comentários </h3>
        </div>
        {if $ID}
          <div class="well">
                  <h4>Deixe um comentário:</h4>
                      <div class="form-group">
                        <textarea id="new-comment" style="overflow:auto;resize:vertical" class="form-control" name="comment" rows="2" ></textarea>
                      </div>
                      <button type="button" onclick="postComment({$ID}, '{$article['first_name']} {$article['last_name']}', '{$PICTURE}');" class="btn btn-primary">Enviar</button>
            </div>
        <hr>
        {/if}
        <div id="comments-list" class="comments-list">
            {foreach $articleComments as $comment}

            <div class="media comment">
                <p class="pull-right"><small>{$comment['comment_date']}</small></p>
                <div class="comment-vote"><a href="#"><i class="fa fa-arrow-up"></i></a><br><a href="#"><i class="fa fa-arrow-down"></i></a></div>
                <a class="media-left" href="{$BASE_URL}users/profile.php?id={$comment['posted_by']}">
                    <img class="img-circle comment-user-picture" src="{$BASE_URL}{$comment['path']}">
                </a>
                <div class="media-body">
                    <h4 class="media-heading user_name"><a href="{$BASE_URL}users/profile.php?id={$comment['posted_by']}">{$comment['first_name']} {$comment['last_name']}</a></h4>
                    {$comment['content']}
                    <p><small>{$comment['score']} ponto{if $comment['score'] != 1}s{/if} </small></p>
                    <div class="report-comment"><small><a data-id="comment#{$comment['id']}" data-toggle="modal" data-target="#report-form"><span data-placement="bottom" class="glyphicon glyphicon-flag"></span>Reportar comentário</a></small></div>
                </div>
            </div>

            {/foreach}
        </div>
  </div>
</div>
