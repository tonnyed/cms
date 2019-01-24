<?php // include "includes/db.php" ;?>

<?php include "includes/header.php"; ?>

    <!-- Navigation -->
<?php include "includes/navigation.php";?>



<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">

          <?php
          global $conn;
          $post_q = "select * from post";
          $post_c= mysqli_query($conn,$post_q);
          if(!$post_c){
          die("connection failed".mysqli_query_error($conn));
          }else {
          while ($post_row = mysqli_fetch_assoc($post_c)) {
          $post_id = $post_row['post_id'];
          $post_cat = $post_row['post_category_id'];
          $post_title = $post_row['post_title'];
          $post_author = $post_row['post_author'];
          $post_date = $post_row['post_date'];
          $post_content= $post_row['post_content'];
          $post_img = $post_row['post_img'];
;?>

<h1 class="page-header">
    Page Heading
    <small>Secondary Text</small>
</h1>

<!-- First Blog Post -->
<h2>
 <a href='single_post.php?p_id=<?php echo $post_id;?>'> <?php echo $post_title ;?></a>
</h2>
<p class="lead">
    by <a href="index.php"><?php echo $post_author ;?></a>
</p>
<p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date ;?></p>
<hr>
<img class="img-responsive" src="image/<?php echo $post_img; ?>" alt="">
<hr>
<p> <?php echo $post_content ;?></p>
<a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

<hr>

<?php
}


}
;?>



</div>


            <!-- Blog Sidebar Widgets Column -->
  <?php include "includes/sidebar.php"; ?>

        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
        <?php include "includes/footer.php"; ?>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
