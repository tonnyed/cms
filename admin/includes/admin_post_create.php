<form class="" action="" method="post" enctype="multipart/form-data">
<div class="form-group">
  <label for="title">Post Title</label>
  <input type="text" name="admin_post_title" class="form-control">
</div>

<div class="form-group">
  <label for="post_category">Post Category ID</label>
<select class="" name="post_cat_id">
  <?php
  $cat_q = "select * from categories";
  $cat_c= mysqli_query($conn,$cat_q);
  if(!$cat_c){
  die("connection failed".mysqli_query_error($conn));
  }else {
  while ($cat_row = mysqli_fetch_assoc($cat_c)) {
  $cat = $cat_row['cat_title'];
  $cat_id = $cat_row['cat_id'];
  echo "<option value =$cat_id >{$cat}</option>";
  }
  }
   ?>
</select>
</div>
<div class="form-group">
  <label for="title">Post Author</label>
  <input type="text" name="admin_post_author" class="form-control">
</div>

<div class="form-group">
  <label for="status">Status</label>
  <input type="text" name="admin_post_status" class="form-control">
</div>

<div class="form-group">
  <label for="image">Post Image</label>
  <input type="file" name="admin_post_image">
</div>


<div class="form-group">
  <label for="tags">Post Tags</label>
  <input type="text" name="admin_post_tags" class="form-control">
</div>

<div class="form-group">
  <label for="content"> Post Content</label>
  <textarea name="admin_post_content" rows="20" cols="30" class="form-control"></textarea>
</div>

<div class="for-group">
  <input type="submit" name="create" value="Create">

</div>

</form>

<?php
//get data from form
if (isset($_POST['create'])   ) {
 $admin_post_title = $_POST['admin_post_title'];
 $admin_post_category = $_POST['post_cat_id'];
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

//pass data to database
$post_query = "insert into post (post_title, post_author, post_date, post_img, post_content, post_status, post_category_id, post_comment_count, post_tags)";
$post_query .=
"values('{$admin_post_title}','{$admin_post_author}',now(),'{$admin_post_img_name}','{$admin_post_content}','{$admin_post_status}',{$admin_post_category},{$admin_post_comment_count},'{$admin_post_tags}')";
$post_c = mysqli_query($conn,$post_query);
if (!$post_c) {
  die('Connection error'.mysqli_error($conn));
}else {
  echo "<h1>Post Created</h1>";
  header("Refresh: 2; admin_post.php?source=admin_view_all");

}


}
 ?>
