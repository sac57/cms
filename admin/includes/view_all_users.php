  <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Username</th>
                        <th>Firstnmae</th>
                        <th>lastname </th>
                        <th>email</th>
                        <th>role </th>
                        <th>Date</th>
                    </tr>
                </thead>
               
                
                <?php
                
            $query="SELECT * FROM users";
    $select_users=mysqli_query($connection,$query);
    
    while($row = mysqli_fetch_assoc($select_users)){
    $user_id=$row['user_id'];             
    $user_name=$row['user_name']; 
    $user_password=$row['user_password']; 
    $user_firstname=$row['user_firstname']; 
    $user_lastname=$row['user_lastname']; 
    $user_role=$row['user_role']; 
    $user_email=$row['user_email']; 
    $user_image=$row['user_image']; 
        
        echo "<tr>";
        echo "<td>$user_id</td>";
        echo "<td>$user_name</td>";
        echo "<td>$user_firstname</td>";

//        
//        $query_edit="SELECT * FROM categories WHERE cat_id= {$post_category_id} ";
//        $select_categories_id=mysqli_query($connection,$query_edit);
//        while($row = mysqli_fetch_assoc($select_categories_id)){
//        $cat_id=$row['cat_id'];                   
//        $cat_title=$row['cat_title'];
//                    
//        echo "<td>{$cat_title}</td>";
//        }
//        
        
        echo "<td>$user_lastname</td>";
        echo "<td>$user_email</td>";
        echo "<td>$user_role</td>";
        
//        $query ="SELECT * FROM posts WHERE post_id=$comment_post_id";
//        $select_query=mysqli_query($connection,$query);
//        while($row=mysqli_fetch_assoc($select_query)){
//            $post_id=$row['post_id'];
//            $post_title=$row['post_title'];
//        echo "<td><a href='../post.php?p_id=$post_id'>$post_title</a></td>";
//            
//        }
//        
//        echo "<td>Some Title</td>";
          echo "<td><a href='comments.php?approve='>Approve</a></td>";
         echo "<td><a href='comments.php?unapprove='>Unapprove</a></td>";
         echo "<td><a href='comments.php?delete='>Delete</a></td>";
        echo "</tr>";
    }   
?>
                
            </table>
            <?php
if(isset($_GET['approve'])){
    $the_comment_id =$_GET['approve'];
    
    $unapprove_query="UPDATE comments SET comment_status='approve' WHERE comment_id='{$the_comment_id}'";
    $rest=mysqli_query($connection,$unapprove_query);
    
    header("Location:comments.php");
}

if(isset($_GET['unapprove'])){
    $the_comment_id =$_GET['unapprove'];
    
    $approve_query="UPDATE comments SET comment_status='unapprove' WHERE comment_id='{$the_comment_id}'";
    $rest=mysqli_query($connection,$approve_query);
    
    header("Location:comments.php");
}


if(isset($_GET['delete'])){
    $the_comment_id =$_GET['delete'];
    
    $delete_query="DELETE FROM comments WHERE comment_id={$the_comment_id}";
    $rest=mysqli_query($connection,$delete_query);
    
    header("Location:comments.php");
}
?>