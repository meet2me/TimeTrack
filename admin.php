<?php include('includes/header.php');?>
<?php
  session_start();
  if(!isset($_SESSION['user']) ){
    header("Location:login.php");
  }
  elseif ($_SESSION['user'] != 'admin') {
    header("Location:entry.php");
  }
?>
  <body>
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <h1>Simple Time Tracking App</h1>
        </div>
      </div>
      <a href="add_user.php" class="btn btn-primary pull-right">Add User</a>
      <table class="table table-striped">
        <thead>
          <tr>
            <th>Username</th>
            <th>Time Tracked(Hours)</th>
        </thead>
        <tbody>
        <?php foreach ( getUsers() as $user ) : ?>
          <tr>
            <td><?php echo esc_html( $user['username'] ); ?></td>
            <td><?php echo esc_html( $user['total'] ); ?></td>
          </tr>
        <?php endforeach; ?>
        </tbody>
      </table>
    </div>
<?php include('includes/footer.php');?>