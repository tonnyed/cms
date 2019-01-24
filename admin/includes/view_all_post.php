
<div class="col-xs-6">
<table class="table table-border table-hover">
  <thead>
    <tr>
      <td>Post ID</td>
      <td>Post Titles</td>
      <td>Post Author</td>
      <td>Post Date</td>
      <td>Post Image</td>
      <td>Post Content</td>
      <td>Post Status</td>
      <td>Post Categories</td>
      <td>Post Comment</td>
      <td>Post Tags</td>
    </tr>
  </thead>
  <tbody>
    <?php
        $admin_post_q = "select * from post";
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
            echo "<tr>";
        echo  "<td>'{$admin_post_id}'</td>";
        echo  "<td>'{$admin_post_title}'</td>";
        echo  "<td>'{$admin_post_author}'</td>";
        echo  "<td>'{$admin_post_date}'</td>";
        echo  "<td><img width=100 src='../image/{$admin_post_img}' alt='image'></td>";
        echo  "<td>'{$admin_post_content}'</td>";
        echo  "<td>'{$admin_post_status}'</td>";
// categorie call with post categorie id
        post_cat($admin_post_category);
        echo  "<td>'{$admin_post_comment}'</td>";
        echo  "<td>'{$admin_post_tags}'</td>";
        echo "<td><a href='admin_post.php?source=admin_edit_post&p_id={$admin_post_id}'>Edit</a></td>";
      echo "<td><a href='admin_post.php?delete={$admin_post_id}'>Delete</a></td>";
        echo "</tr>";
          }
        }
        ?>

  </tbody>
</table>
