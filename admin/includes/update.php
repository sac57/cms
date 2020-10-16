

                <form action="" method="post">
                    <label for="cat-title">Edit category</label>
                    <div class="form-group">
                    </div>
         <?php 
  
        if(isset($_GET['edit'])){
             $cat_id=$_GET['edit'];
              $query_edit="SELECT * FROM categories WHERE cat_id=$cat_id";
                $select_categories_id=mysqli_query($connection,$query_edit);
                while($row = mysqli_fetch_assoc($select_categories_id)){
                $cat_id=$row['cat_id'];                   
                $cat_title=$row['cat_title'];
                    
                ?>
                <input class="form-control" value="<?php if(isset($cat_title)){echo $cat_title; }?>" type="text" name="cat_title">
                <?php }}?>
                <?php     
                    if(isset($_POST['Edit_Category'])){
                        $get_cat=$_POST['cat_title'];
                        $query_edit="UPDATE categories SET cat_title='{$get_cat}' WHERE cat_id='{$cat_id}'";
                        $red=mysqli_query($connection,$query_edit);
    
}?>
            
                    
                    
                    <div class="form-group">
                        <input class="btn btn-success" type="submit" value="edit category" name="Edit_Category">
                    </div>
                </form>
           