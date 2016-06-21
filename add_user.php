<?php include('includes/header.php'); ?>
  <body>
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <h1>Add User</h1>
        </div>
      </div>
      <form role="form" action="" method="POST">
        <legend>New User</legend>
        <div class="form-group">
          <label for="username">Username:</label>
          <input type="text" class="form-control" id="username" name="username">
        </div>
        <div class="form-group">
          <label for="password">Password:</label>
          <input type="password" class="form-control" id="password" name="password">
        </div><br/>
        <input type="submit" name="add_user" class="btn btn-primary" value="Add">
      </form>
    </div>
<?php include('includes/footer.php'); ?>