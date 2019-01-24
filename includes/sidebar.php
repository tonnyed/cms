<div class="col-md-4">

    <!-- Blog Search Well -->
    <div class="well">
        <h4>Blog Search</h4>
        <div class="input-group">


          <form class="" action="search.php" method="post">


            <input type="text" name="search" class="form-control">
            <span class="input-group-btn">
                <button class="btn btn-default" type="submit">
                    <span class="glyphicon glyphicon-search"></span>
            </button>
            </span>
        </form>

        </div>
        <!-- /.input-group -->
    </div>

    <!-- Blog Categories Well -->
    <div class="well">
        <h4>Blog Categories</h4>
        <div class="row">
            <div class="col-lg-6">
                <ul class="list-unstyled">
<?php category_call() ;?>
                </ul>
            </div>
            <!-- /.col-lg-6 -->
            <div class="col-lg-6">
                <ul class="list-unstyled">
                    <?php category_call() ;?>
                </ul>
            </div>
            <!-- /.col-lg-6 -->
        </div>
        <!-- /.row -->
    </div>

    <!-- Side Widget Well -->
  <?php include "widget.php" ?>

</div>
