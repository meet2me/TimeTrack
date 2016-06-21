<?php include('includes/header.php'); ?>
<?php
  session_start();
  if(!isset($_SESSION['user'])){
    header("Location:login.php");
  }
?>
  <body>
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <h1>User Time Logging : <?php echo $_SESSION['user'];?></h1>
        </div>
      </div>
      <div id="page">
        <ul class="nav nav-tabs" role="tablist">
          <li role="presentation" class="active"><a href="#entry" aria-controls="entry" role="tab" data-toggle="tab">Entry</a></li>
          <li role="presentation"><a href="#history" aria-controls="history" role="tab" data-toggle="tab">Log History</a></li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
          <div role="tabpanel" class="tab-pane active" id="entry">
            <form role="form" action="" method="POST">
              <legend>Add Entry: </legend>
              <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id'];?>" />
              <div class="form-group">
                <label for="entry_date">Date:</label>
                <input type="text" class="form-control" id="entry_date" name="entry_date">
              </div>
              <div class="form-group">
                <label for="started_working">Started Working:</label>
                <input type="text" class="form-control" id="started_working" name="started_working">
              </div>
              <div class="form-group">
                <label for="stopped_working">Stopped Working:</label>
                <input type="text" class="form-control" id="stopped_working" name="stopped_working">
              </div>
              <div class="form-group">
                <label for="comment">Comment:</label>
                <textarea class="form-control" id="comment" name="comment"></textarea>
              </div><br/>
              <input type="submit" name="add_entry" class="btn btn-primary" value="Add Entry">
            </form>
          </div>
          <div role="tabpanel" class="tab-pane" id="history">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Entry Date</th>
                  <th>Started Working</th>
                  <th>Stopped Working</th>
                  <th>Your Comment</th>
                </tr>
              </thead>
              <tbody>
              <?php foreach ( getUserLog() as $user ) : ?>
                <tr>
                  <td><?php echo esc_html( $user['id'] ); ?></td>
                  <td><?php echo esc_html( $user['entry_date'] ); ?></td>
                  <td><?php echo esc_html( $user['started_working'] ); ?></td>
                  <td><?php echo esc_html( $user['stopped_working'] ); ?></td>
                  <td><?php echo esc_html( $user['comment'] ); ?></td>
                </tr>
              <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
<?php include('includes/footer.php'); ?>