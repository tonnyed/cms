
<?php
if (isset($_GET['p_id'])   ) {
  $the_id = $_GET['p_id'];
}
$admin_post_q = "select * from post where post_id = $the_id ";
$admin_post_c = mysqli_query($conn,$admin_post_q);
if (!$admin_post_c) {
  die('connection failed'.mysqli_error($conn));
}else {
  while ($post_row = mysqli_fetch_assoc($admin_post_c)) {
    $admin_post_id = $post_row['post_id'];
    $admin_post_title = $post_row['post_title'];
    $admin_post_author = $post_row['post_author'];
    $admin_post_date = $post_row['post_date'];
    $admin_post_img = $post_row['post_img'];
    $admin_post_content = $post_row['post_content'];
    $admin_post_status = $post_row['post_status'];
    $admin_post_category = $post_row['post_category_id'];
    $admin_post_comment = $post_row['post_comment_count'];
    $admin_post_tags = $post_row['post_tags'];

}


}




if (isset($_POST['admin_update_post'])   ) {
 $admin_post_title = $_POST['admin_post_title'];
 $admin_post_category = $_POST['cat'];
 $admin_post_author = $_POST['admin_post_author'];
 $admin_post_status = $_POST['admin_post_status'];
 $admin_post_img_name = $_FILES['admin_post_image']['name'];
 $admin_post_img_location = $_FILES['admin_post_image']['tmp_name'];
 $admin_post_tags = $_POST['admin_post_tags'];
 $admin_post_content = $_POST['admin_post_content'];
 $admin_post_date = date('d-m-y');
 $admin_post_comment_count = 6;

 //pass image from temp location to image location
 move_uploaded_file($admin_post_img_location, "../image/$admin_post_img_name");


//$post_id_set = $_GET['p_id'];
$post_query = "update post set ";
$post_query .= "post_title = '{$admin_post_title}', ";
$post_query .= "post_author = '{$admin_post_author}', ";
$post_query .= "post_date = now(), ";
$post_query .= "post_img = '{$admin_post_img_name}', ";
$post_query .= "post_content = '{$admin_post_content}', ";
$post_query .= "post_status = '{$admin_post_status}', ";
$post_query .= "post_category_id = $admin_post_category, ";
$post_query .= "post_comment_count = {$admin_post_comment_count}, ";
$post_query .= "post_tags = '{$admin_post_tags}' ";
$post_query .= "where post_id = {$the_id} ";


$post_c = mysqli_query($conn,$post_query);
if (!$post_c) {
  //die('Connection error'.mysqli_error($conn));
  echo "$post_query";
}else {
  echo "<h1>Post Updated</h1>";
  header("Refresh: 2; admin_post.php?source=admin_view_all");

}


}

 ?>





<form class="" action="" method="post" enctype="multipart/form-data">
<div class="form-group">
  <label for="title">Post Title</label>
  <input value="<?php echo $admin_post_title; ?>" type="text" name="admin_post_title" class="form-control">
</div>


<div class="form-group">
  <label for="post_category">Post Category</label>
  <select name="cat" id="$cat_id">
<?php
$cat_q = "select * from categories";
$cat_c= mysqli_query($conn,$cat_q);
if(!$cat_c){
die("connection failed".mysqli_query_error($conn));
}else {
while ($cat_row = mysqli_fetch_assoc($cat_c)) {
$cat = $cat_row['cat_title'];
$cat_id = $cat_row['cat_id'];

echo "<option value=$cat_id>{$cat}</option>";
}
}
 ?>
  </select>
</div>

<div class="form-group">
  <label for="title">Post Author</label>
  <input  value="<?php echo $admin_post_author; ?>" type="text" name="admin_post_author" class="form-control">
</div>

<div class="form-group">
  <label for="status">Status</label>
  <input value="<?php echo $admin_post_status; ?>"   type="text" name="admin_post_status" class="form-control">
</div>

<div class="form-group">
  <label for="image">Post Image</label>
  <img width ='100' src="../image/<?php echo $admin_post_img;?>">
</div

<div class="form-group">
  <label for="image">Post Image</label>
  <input type="file" name="admin_post_image">
</div>


<div class="form-group">
  <label for="tags">Post Tags</label>
  <input  value="<?php echo $admin_post_tags; ?>"   type="text" name="admin_post_tags" class="form-control">
</div>

<div class="form-group">
  <label for="content"> Post Content</label>
  <textarea name="admin_post_content" rows="20" cols="30" class="form-control">
  <?php echo $admin_post_content; ?>
  </textarea>
</div>

<div class="for-group">
  <input type="submit" name="admin_update_post" value="Update">

</div>

</form>
