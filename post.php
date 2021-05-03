<?php include 'header.php' ?>

<?php 
    if(isset($_GET['p_id'])) {
    
    $the_post_id = escape($_GET['p_id']);

    if(isset($_SESSION['username'])) {
        $query = "SELECT * FROM posts WHERE post_id = $the_post_id ";
        $selectAllPostsQuery = mysqli_query($connection, $query);

        while ($row = mysqli_fetch_assoc($selectAllPostsQuery)) {
            $post_title = $row['post_title'];
            $post_user = $row['post_user'];
            $post_date = $row['post_date'];
            $post_content = $row['post_content'];
    ?>
    <h1>ID поста: <?php echo $the_post_id ?></h1>
    <h3>Заголовок: <?php echo $post_title ?></h3>

    <p>Автор: <?php echo $post_user ?></p>
    <p><span class="glyphicon glyphicon-time"></span> Дата создания: <?php echo $post_date ?></p>
    
    <p>Содержание: <?php echo $post_content ?></p>
    
    <hr>
    <?php } 
        } else { redirect('login.php'); } } else { redirect('index.php'); } 
        
        if(!$post_user): ?>
        <h2>Поста с таким ID не существует. Попробуйте еще раз.</h2>
        <a href="index.php">На главную.</a>
        <?php die(); endif; ?>
    <?php 
        if(isset($_POST['delete'])) {
            $del_post_id = $the_post_id;
            $query = "DELETE FROM posts WHERE post_id = {$del_post_id} ";
            $delete_query = mysqli_query($connection, $query);
            header("Location: index.php");
        }

        if($post_user == $_SESSION['username']) { ?>

        <a class="btn btn-info" href="edit_post.php?p_id=<?php echo $the_post_id; ?>">Обновить</a>
        <form method="POST" style="display: inline-block;">
            <input type="hidden" name="post_id" value="<?php echo $post_id ?>">
            <?php 
            echo '<td><input class="btn btn-danger" type="submit" name="delete" value="Удалить"></td>';
            ?>
        </form>
        
    <?php } ?>
   <a class="btn btn-warning" href="index.php">Обратно на главную</a>

<?php include 'footer.php' ?>