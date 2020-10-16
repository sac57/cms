<?php include "includes/admin_header.php"; ?>
<div id="wrapper">

    <?php include "includes/admin_navigation.php"; ?>
    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Welcome to Admin
                        <small>Author</small>
                    </h1>
                </div>
            </div>

            <div class="col-xs-6">

                <?php
                insert();
                ?>
                <form action="" method="post">
                    <label for="cat-title">Add category</label>
                    <div class="form-group">
                        <input class="form-control" type="text" name="cat_title">
                    </div>
                    <div class="form-group">
                        <input class="btn btn-success" type="submit" name="submit" value="Add Category">
                    </div>
                </form>
                
                <?php
                if(isset($_GET['edit'])){
                    $cat_id=$_GET['edit'];
                    
                    include "includes/update.php";
                }
                ?>
             </div>
   
            <!-- /.row -->
            <div class="col-xs-6">

                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Categories</th>
                        </tr>
                    </thead>

                    <?php sel(); ?>
                    <?php del();?>
                </table>
            </div>

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

    <?php include "includes/admin_footer.php"; ?>
