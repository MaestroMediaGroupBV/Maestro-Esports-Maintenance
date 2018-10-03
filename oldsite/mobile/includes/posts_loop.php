<?php

////////////////////////////////// POSTS LOOP ////////////////////////


function findPosts() {
    global $connection;
                
                
                $query = "SELECT * FROM posts";
                $select_all_posts_query = mysqli_query($connection, $query);
                    
                while($row = mysqli_fetch_assoc($select_all_posts_query)) {
                
                $post_title = $row['post_title'];
                $post_author = $row['post_author'];
                $post_date = $row['post_date'];
                $post_image = $row['post_image'];
                $post_content = $row['post_content'];
                $post_author_img = $row['post_author_img'];
                $post_category_id = $row['post_category_id'];
                
                


                }
}

?>
               

               
               
                <!-- First Blog Post -->
                <h2>
                    <a href="#"><?php echo $post_title ?></a>
                </h2>
                <p class="lead">
                    by <a href="#"><?php echo $post_author; ?></a> <img src="news/2017/assets/authors/<?php echo $post_author_img; ?>" width="50" height="50" class="img-circle" alt="">
                </p>
                <p><span class="glyphicon glyphicon-time"><?php echo $post_date ?></span>></p>
                <hr>
                <img src="assets/img/backgrounds/<?php echo $post_image; ?>" class="img-responsive" alt="" >
                <hr>
                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>
            
                <?php } ?>