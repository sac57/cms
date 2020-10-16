<?php

function confirm($select_categories){
    global $connection;
    
    if(!$select_categories){
        die("failed".mysqli_error($connection));
    }
    
}

function insert(){
                if(isset($_POST['submit'])){
                    global $connection;
                    $cat_title=$_POST['cat_title'];
                
                    if($cat_title== " " || empty($cat_title)){
                    echo "field should not be empty";
                    
                }
                else{
                    $cat_query="INSERT INTO categories(cat_title) VALUES('{$cat_title}')";
                    $rest=mysqli_query($connection,$cat_query);
                    
                    if(!$rest){
                        die("FAILED".mysqli_error($connection));
                    }
                }
                }
}

function sel(){
    global $connection;
$query="SELECT * FROM categories";
    $select_categories=mysqli_query($connection,$query);
    while($row = mysqli_fetch_assoc($select_categories)){
    $cat_id=$row['cat_id'];                   
    $cat_title=$row['cat_title'];
      echo "<tr>";
    echo " <td>{$cat_id}</td>";
     echo " <td>{$cat_title}</td>";
    echo "<td><a href='categories.php?delete={$cat_id}'>Delete</a></td>";
    echo "<td><a href='categories.php?edit={$cat_id}'>Edit</a></td>";
    echo "</tr>";
    }
}
            
function del(){
if(isset($_GET['delete'])){
     global $connection;
                        $the_cat_id=$_GET['delete'];
                       $query_del="DELETE FROM categories WHERE cat_id={$the_cat_id}";
                        $red=mysqli_query($connection,$query_del);
                        header("Location:categories.php");
                    }
}?>