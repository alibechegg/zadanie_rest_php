<?php include 'header.php'; ?>
    <?php 
        if (!$_SESSION['username']) {
            redirect('login.php');
        }
    ?>
    <h1>Домашняя страница</h1>
    <h2>Ваш токен: <?php echo session_id() ?></h2>
    <p>Ваши посты:</p>
    <ul>
        <?php
            $url = null;
            if(isset($_POST['submit'])){
                $search = $_POST['search'];
                $url = "post.php?p_id=".$search;
                redirect($url);
            }
        
        $post_user = $_SESSION['username'];
        $query = "SELECT * FROM posts WHERE post_user = '{$post_user}'";
        $select_user_posts_query = mysqli_query($connection, $query);

        while ($row = mysqli_fetch_assoc($select_user_posts_query)) {
            $post_id = $row['post_id'];
            $post_title = $row['post_title'];
            $post_user = $row['post_user'];
        ?>
            <li>
                <a href="post.php?p_id=<?php echo $post_id; ?>"><?php echo $post_title ?></a>
            </li>
        <?php } if($row != mysqli_fetch_assoc($select_user_posts_query)) { ?>
        <li>
            <p>Здесь пока ничего нету...</p>
        </li>
        <?php } ?>
    </ul>
    <a href="add_post.php">Добавить пост.</a>
    <hr>
    <h4>Найти пост по ID</h4>
        <form action="" method="post">
        <div class="col-md-4">
            <input name="search" id="search" type="number" class="form-control" required>
            <input class="btn btn-secondary" type="submit" name="submit" value="Найти">
        </div>
        </form>

<?php include 'footer.php'; ?>