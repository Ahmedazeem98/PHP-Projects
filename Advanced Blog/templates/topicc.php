<?php include('includes/header.php'); ?>

  <ul id="topics">
        <li id="main-topic" class="topic topic">
          <div class="row">
            <div class="col-md-2">
              <div class="user-info">
                <img src="<?php echo BASE_URI; ?>images/avatars/<?php echo $myTopic->avatar; ?>" class="avatar pull-left">
                <ul>
                  <li><?php echo $myTopic->username; ?></li>
                  <li><?php echo postsCounter($myTopic->user_id). ' '; ?>Posts</li>
                  <li><a href="topics.php?user=<?php echo $myTopic->user_id; ?>">View Posts</a></li>
                </ul>
              </div>
            </div>
            <div class="col-md-10">
              <div class="topic content pull-right">
                <p> <?php echo $myTopic->body; ?> </p>
              </div>
            </div>
          </div>
        </li>

        <!-- Replies -->

        <?php if($replies) : ?>
          <?php foreach($replies as $reply) : ?>
            <li id="main-topic" class="topic topic">
              <div class="row">
                <div class="col-md-2">
                  <div class="user-info">
                    <img src="images/avatars/<?php echo $reply->avatar; ?>" class="avatar pull-left">
                    <ul>
                      <li><?php echo $reply->username; ?></li>
                      <li><?php echo postsCounter($reply->user_id). ' '; ?></li>
                      <li><a href="topics.php?user=<?php echo $reply->id; ?>">View Topics</a></li>
                    </ul>
                  </div>
                </div>
                <div class="col-md-10">
                  <div class="topic content pull-left">
                    <p> <?php echo $reply->body; ?> </p>
                  </div>
                </div>
              </div>
            </li>
          <?php endforeach; ?>
        <?php else : ?>
          <div>
            <h3>No replies yet!</h3>
          </div>
        <?php endif; ?>
      </ul>
      <?php if(isset($_SESSION['is_logged_in'])) :?>
        <h3>Add Your Replay</h3>
        <form role="form" method="post" action="topic.php?id=<?php echo $myTopic->id;?>">
          <div class="form-group">
            <textarea class="form-group" name="reply" rows="8" cols="80"
            placeholder="Enter Topic Body" id="reply"></textarea>
            <script>CKEDITOR.replace('reply');</script>
          </div>
          <button name="add_reply" type="submit" class="btn btn-primary">Submit</button>
        </form>
      <?php else : ?>
        <a class="list-group-item active" href ='#'>Please, Login to add your reply</a>
      <?php endif; ?>
<?php include('includes/footer.php'); ?>
