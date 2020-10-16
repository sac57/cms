<?php
if(isset($_GET['p_id'])){
    $pid= $_GET['p_id'];
    
}
    $query="SELECT * FROM posts WHERE post_id=$pid";
    $select_posts=mysqli_query($connection,$query);
    
    while($row = mysqli_fetch_assoc($select_posts)){
    $post_id=$row['post_id'];                   
    $post_content=$row['post_content']; 
    $post_author=$row['post_author']; 
    $post_title=$row['post_title']; 
    $post_Category=$row['post_category_id']; 
    $post_status=$row['post_status']; 
    $post_Comment=$row['post_comment_count']; 
    $post_date=$row['post_date']; 
    $post_image=$row['post_image']; 
    $post_tags=$row['post_tags'];
    } 
 
    if(isset($_POST['updatep'])){
    $post_title=$_POST['title']; 
    $post_author=$_POST['author'];  
    $post_Category=$_POST['post_category']; 
    $post_status=$_POST['post_status']; 
    $post_content=$_POST['post_content']; 
    $post_image =$_FILES['image']['name'];
    $post_image_temp =$_FILES['image']['tmp_name'];
    $post_tags=$_POST['post_tags'];
        
    move_uploaded_file($post_image_temp, "../images/$post_image");
    
    if(empty($post_image)){
        $query="SELECT * FROM posts WHERE post_id=$pid ";
        $rs=mysqli_query($connection,$query);
        
        while($row=mysqli_fetch_array($rs)){
            $post_image=$row['post_image'];
        }
        
    }
    
    $query_update ="UPDATE posts SET ";
    $query_update .="post_title='{$post_title}', ";
    $query_update .="post_category_id='{$post_Category}', ";
    $query_update .="post_date=now(),";
    $query_update .="post_author='{$post_author}', ";
    $query_update .="post_status='{$post_status}', ";
    $query_update .="post_tags='{$post_tags}', ";
    $query_update .="post_content='{$post_content}',   ";
    $query_update .="post_image='{$post_image}' ";
    $query_update .="WHERE post_id={$pid} ";
    
    $update_post=mysqli_query($connection,$query);
    confirm($update_post);
        
    }
        ?>
<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <lable for="title">
            Post Title
        </lable>
        <input value="<?php echo $post_title; ?>" type="text" class="form-control" name="title">
    </div>

    <div class="form-group">
        <select name="post_category" id="post_category">
           <?php
            $query_edit="SELECT * FROM categories";
            $select_categories=mysqli_query($connection,$query_edit);
            confirm($select_categories);
            
             while($row = mysqli_fetch_assoc($select_categories)){
                $cat_id=$row['cat_id'];                   
                $cat_title=$row['cat_title'];
                 echo "<option value='$cat_id'>{$cat_title}</option>" ;
             }
            ?>
        </select>
    </div>

    <div class="form-group">
        <lable for="author">
            post author
        </lable>
        <input value="<?php echo $post_author; ?>" type="text" class="form-control" name="author">
    </div>

    <div class="form-group">
        <lable for="post_status">
            Post status
        </lable>
        <input value="<?php echo $post_status; ?>" type="text" class="form-control" name="post_status">
    </div>



    <div class="form-group">
        <img width="100" src="../images/<?php echo $post_image; ?>" alt="">  
        <input type="file" name="image">
    </div>

    <div class="form-group">
        <lable for="post_tags">
            Post tags
        </lable>
        <input type="text" value="<?php echo $post_tags; ?>" class="form-control" name="post_tags">
    </div>

    <div class="form-group">
        <lable for="post_content">
            Post Content
        </lable>
        <textarea type="text" class="form-control" name="post_content" id="" cols="30" rows="10"> <?php echo $post_content; ?>
        </textarea>
    </div>

    <div class="form-group">
        <input class="btn btn-success" type="submit" name="updatep" value="Publish Post">
    </div>

</form>
