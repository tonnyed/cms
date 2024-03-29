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
          if(isset($_GET['p_id'])){
          $post_id = $_GET['p_id'] ;
            }
          $post_q = "select * from post where post_id =$post_id ";
          $post_c= mysqli_query($conn,$post_q);

          while ($post_row = mysqli_fetch_assoc($post_c)) {
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
 <a href=""> <?php echo $post_title ;?></a>
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



;?>



</div>


            <!-- Blog Sidebar Widgets Column -->
  <?php include "includes/sidebar.php"; ?>

        </div>
        <!-- /.row -->

        <hr>




    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Comments Form -->
    <div class="well">
        <h4>Leave a Comment:</h4>
        <form role="form">
            <div class="form-group">
                <textarea class="form-control" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <hr>

    <!-- Posted Comments -->

    <!-- Comment -->
    <div class="media">
        <a class="pull-left" href="#">
            <img class="media-object" src="http://placehold.it/64x64" alt="">
        </a>
        <div class="media-body">
            <h4 class="media-heading">Start Bootstrap
                <small>August 25, 2014 at 9:30 PM</small>
            </h4>
            Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
        </div>
    </div>


<!-- Comment -->
<div class="media">
    <a class="pull-left" href="#">
        <img class="media-object" src="http://placehold.it/64x64" alt="">
    </a>
    <div class="media-body">
        <h4 class="media-heading">Start Bootstrap
            <small>August 25, 2014 at 9:30 PM</small>
        </h4>
        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
        <!-- Nested Comment -->
        <div class="media">
            <a class="pull-left" href="#">
                <img class="media-object" src="http://placehold.it/64x64" alt="">
            </a>
            <div class="media-body">
                <h4 class="media-heading">Nested Start Bootstrap
                    <small>August 25, 2014 at 9:30 PM</small>
                </h4>
                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
            </div>
        </div>
        <!-- End Nested Comment -->
    </div>
</div>

<!-- Footer -->
<?php include "includes/footer.php"; ?>
