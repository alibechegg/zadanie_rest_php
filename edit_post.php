<?php include 'header.php' ?>

<?php 
    if(isset($_GET['p_id'])) {
        $edit_post_id = escape($_GET['p_id']);
    }
   
    $query = "SELECT * FROM posts WHERE post_id = {$edit_post_id}";
    $selectPostById = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($selectPostById)) {
        $post_id = $row['post_id'];
        $post_user = $row['post_user'];
        $post_title = $row['post_title'];
        $post_date = $row['post_date'];
        $post_content = $row['post_content'];
    }

    if(isset($_POST['update_post'])) {
        $post_title = escape($_POST['title']);
        $post_user = escape($_SESSION['username']);
        $post_content = escape($_POST['post_content']);

        $query = "UPDATE posts SET ";
        $query .= "post_title = '{$post_title}', ";
        $query .= "post_date = now(), ";
        $query .= "post_user = '{$post_user}', ";
        $query .= "post_content = '{$post_content}' ";
        $query .= "WHERE post_id = {$edit_post_id} ";

        $update_post = mysqli_query($connection, $query);
        confirmQuery($update_post);

        echo "<p class='bg-success'>Пост успешно обновлен! <a href='post.php?p_id={$edit_post_id}'>Посмотреть его </a> / <a href='index.php'> Вернуться на главную</a></p>";

    }
?>

    <form action="" method="post" enctype="multipart/form-data">    
      
      <div class="form-group col-md-4">
          <label for="title">Заголовок:</label>
          <input value="<?php echo $post_title; ?>" type="text" class="form-control" name="title">
      </div>
  
      <div class="form-group col-md-4">
          <label for="post_content">Содержание:</label>
          <textarea class="form-control "name="post_content" id="body" cols="30" rows="10"><?php echo str_replace('\r\n', '</br>', $post_content); ?>
          </textarea>
      </div>
      
      <div class="form-group">
          <input class="btn btn-primary" type="submit" name="update_post" value="Обновить Ваш пост">
      </div>
  
    </form>
    <a class="btn btn-danger" href="post.php?p_id=<?php echo $post_id; ?>">Отмена, обратно на главную</a>

<?php include 'footer.php' ?>