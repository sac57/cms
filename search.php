<?php include "include/db.php";?>
<?php include "include/header.php";?>

    <!-- Navigation -->
    

    <!-- Page Content -->
    <div class="container">
<?php include "include/navigation.php";    ?>
        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">
                <?php 
                
                   if(isset($_POST['submit'])){
       $search = $_POST['search'];
       $query="SELECT * FROM posts WHERE post_tags LIKE '%$search%'";
        $search_query=mysqli_query($connection,$query);
    if (!$search_query){
        die("query failed".mysqli_error($connection));
    }
        $count=mysqli_num_rows($search_query);
        if($count == 0){
            echo "no result";
        }
        else{
                    while($row = mysqli_fetch_assoc($search_query)){
                        $post_id=$row['post_id']
                        $post_title=$row['post_title'];
                         $post_author=$row['post_author'];
                         $post_date=$row['post_date'];
                         $post_image=$row['post_image'];
                         $post_content=$row['post_content'];
                ?>

                <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>

                <!-- First Blog Post -->
                <h2>
                    <a href="post.php?p_id=<?php echo $post_id; ?>"><?php echo $post_title; ?></a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?php echo $post_author ; ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date ; ?></p>
                <hr>
                <img class="img-responsive" src="images/<?php echo $post_image;?>" alt="">
                <hr>
                <p><?php echo $post_content; ?></p>
                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
                <hr>

                <!-- Second Blog Post -->
    <?php  } 
        }
        
    }
          ?>       
                
                
                  

            </div>

            <!-- Blog Sidebar Widgets Column -->
            <?php
            include "include/sidebar.php";
            ?>
                    <!-- /.row -->
                </div>

                <!-- Side Widget Well -->
                <?php include "include/widget.php"; ?>

            </div>

        </div>
        <!-- /.row -->

        <hr>

        <?php
include "include/footer.php"; ?>