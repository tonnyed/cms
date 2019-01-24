<?php
include "includes/db.php";

//function navigation db get_called_class

function nav_call(){
global $conn;
$nav_q = "select * from categories limit 5";
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


function category_call(){
global $conn;
$cat_q = "select * from categories LIMIT 3";
$cat_c= mysqli_query($conn,$cat_q);
if(!$cat_c){
die("connection failed".mysqli_query_error($conn));
}else {
while ($cat_row = mysqli_fetch_assoc($cat_c)) {
$cat = $cat_row['cat_title'];
$cat_id = $cat_row['cat_id'];

echo "<li><a href='category.php?cat_post=$cat_id'>{$cat}</a></li>";
}
}
}

function category_call_sigle($post_id){
global $conn;
$cat_q = "select * from categories where post_cat_id = $post_id";
$cat_c= mysqli_query($conn,$cat_q);
if(!$cat_c){
die("connection failed".mysqli_query_error($conn));
}else {
while ($cat_row = mysqli_fetch_assoc($cat_c)) {
$cat = $cat_row['cat_title'];
$cat_id = $cat_row['cat_id'];
echo "<li><a href='#'>{$cat}</a></li>";
}
}
}





















 ?>
