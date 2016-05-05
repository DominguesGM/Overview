<div id="error_messages">
{foreach $ERROR_MESSAGES as $error}
  <div class="error alert alert-danger">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    {$error}</div>
{/foreach}
</div>
<div id="success_messages">
{foreach $SUCCESS_MESSAGES as $success}
  <div class="success alert alert-success">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    {$success}</div>
{/foreach}
</div>
