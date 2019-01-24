<?php ob_start(); ?>
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
if (isset($_GET['source'])    ) {
  $source = $_GET['source'];
  switch ($source) {
    case 'admin_post_create':
      include "includes/admin_post_create.php";
      break;
      case 'admin_view_all':
      include "includes/view_all_post.php";
      break;
      case 'admin_edit_post':
      include "includes/admin_edit_post.php";
      break;
      default:
      include "includes/view_all_post.php";
      break;
  }
}

// delet post function in admin_function
 ?>
<?php
if(isset($_GET['delete'])) {
$post_del_id =  $_GET['delete'];
$post_del_q = "delete from post where post_id = {$post_del_id}";
$post_del_c = mysqli_query($conn,$post_del_q);
if (!$post_del_c) {
  header('location: admin_post.php?source=admin_view_all');
  die('Post Note Deleted'.mysqli_error($conn));
}else {
  echo "<h2>Post Deleted</h2>";
  header("Refresh: 1; admin_post.php?source=admin_view_all");

}

}





 ?>

                      </div>
                    </div>
                </div>

                <!-- /.row -->

            </div>

          </div>
          <!-- /#page-wrapper -->
            <?php include "includes/admin_footer.php" ;?>
            <!-- /.container-fluid -->
