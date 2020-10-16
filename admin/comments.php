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
        <?php
            if(isset($_GET['source'])){
                $source=$_GET['source'];
            }else{
                $source=' ';
            }
            switch($source){
                case 'add':
                   include "includes/add_post.php";
                    break;
                 case 'edit':
                   include "includes/edit_post.php";
                    break;
                 case '100':
                    echo "nice 100";
                    break;
                default:
                    include "includes/view_all_comments.php";
                    break;
            }
            ?>
           
            </div>

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

    <?php include "includes/admin_footer.php"; ?>