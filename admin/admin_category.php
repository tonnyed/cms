
<?php include "includes/admin_function.php" ;?>
    <div id="wrapper">

        <!-- Navigation -->

<?php include "includes/admin_navigation.php" ;?>
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                          Welcome to Admin Page
                            <small>author</small>
                        </h1>
<?php
if (isset($_POST['submit'])) {
  $admin_cat = $_POST['cat_title'];

add_cat($admin_cat);




}


 ?>


                      <div class="col-xs-6">
                        <form action="" method="post">
                          <div class="form-group">
                            <label for="cat_title">Category Title</label>
                            <input class="form-control" type="text" name="cat_title">
                            </div>
                        <div class="form-group">
                          <input class="btn btn-primary" type="submit" name="submit" value="Add Category">
                          </div>

                        </form>
                      </div>

                      <div class="col-xs-6">
                        <table class="table table-border table-hover">
                          <thead>
                            <tr>
                              <td>ID</td>
                              <td>Categories Titles</td>
                            </tr>
                          </thead>
                          <tbody>
<?php if(isset($_GET['delete']) ) {
  $del_id = $_GET['delete'];
  //php fuction to delete categorie, fuction is in admin function
  cat_del($del_id);
}
?>
                          <?php categories_call(); ?>

                          </tbody>
                        </table>

                      </div>
                    </div>
                </div>

                <!-- /.row -->

            </div>

          </div>
          <!-- /#page-wrapper -->
            <?php include "includes/admin_footer.php" ;?>
            <!-- /.container-fluid -->
