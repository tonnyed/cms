
<?php include "admin_header.php" ; ?>
<?php




//function navigation db get_called_class

function nav_call(){
global $conn;
$nav_q = "select * from categories";
$nav_c= mysqli_query($conn,$nav_q);
if(!$nav_c){
die("connection failed".mysqli_query_error($conn));
}else {
while ($nav_row = mysqli_fetch_assoc($nav_c)) {
$cat_title = $nav_row['cat_title'];

echo "<li><a href='#'>{$cat_title}</a></li>";
}
}
}


function categories_call(){
global $conn;
$cat_q = "select * from categories";
$cat_c= mysqli_query($conn,$cat_q);
if(!$cat_c){
die("connection failed".mysqli_query_error($conn));
}else {
while ($cat_row = mysqli_fetch_assoc($cat_c)) {
$cat = $cat_row['cat_title'];
$cat_id = $cat_row['cat_id'];
echo "<tr>";
echo "<td>{$cat_id}</td>";
echo "<td>{$cat}</td>";
echo "<td> <a href='admin_category.php?delete={$cat_id}'>Delete</a></td>";
echo "</tr>";
}
}
}
// add catigoerie
function add_cat($value){
$admin_cat = $value;
  if(!empty($admin_cat)){
    global $conn;
    $admin_cat_q = "insert into categories (cat_title) values('{$admin_cat}')";
    $admin_cat_c = mysqli_query($conn,$admin_cat_q);
    if (!$admin_cat_c) {
     die('Category Not Entetered'.mysqli_error($conn));
   }else {
     echo "<h2>Categories Added<h2>";
   }

   }else {
     echo "<h2>Post Is Empty</h2>";
   }
}


function cat_del($id){
global $conn;
$ids = $id;
if (!empty($ids) ) {
  $cat_del = "delete from categories where cat_id = '$ids'";
  $cat_del_q = mysqli_query($conn,$cat_del);
  if(!$cat_del_q){
    die('Category Not deleted'.mysqli_error('$conn'));
  }else {
    echo "Deleted".$ids;
  }
}else {
  echo "<h2>Please enter a value<h2>";
}



}



function post_cat($admin_post_cat){
  global $conn;
  $cat_q = "select * from categories where cat_id = {$admin_post_cat} ";
  $cat_c= mysqli_query($conn,$cat_q);
  if(!$cat_c){
  die("connection failed".mysqli_query_error($conn));
  }else {
  $cat_row = mysqli_fetch_assoc($cat_c);
  $cat = $cat_row['cat_title'];
  echo  "<td>'{$cat}'</td>";
}
}















 ?>
