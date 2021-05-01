<?php include 'header.php' ?>

    <?php

    if (isset($_POST['create_post'])) {

        $post_title        = escape($_POST['title']);
        $post_user         = escape($_SESSION['username']);
        $post_content      = escape($_POST['post_content']);
        $post_date         = escape(date('d-m-y'));


        $query = "INSERT INTO posts(post_title, post_user, post_date, post_content) ";

        $query .= "VALUES('{$post_title}','{$post_user}',now(),'{$post_content}') ";

        $create_post_query = mysqli_query($connection, $query);

        confirmQuery($create_post_query);

        $the_post_id = mysqli_insert_id($connection);

        echo "<p class='bg-success'>Пост успешно создался! <a href='post.php?p_id={$the_post_id}'>Посмотреть его </a> или <a href='index.php'>Вернуться назад</a></p>";
    }

    ?>

    <form action="" method="post" enctype="multipart/form-data">

        <div class="form-group">
            <label for="title">Заголовок:</label>
            <input type="text" class="form-control" name="title">
        </div>

        <div class="form-group">
            <label for="post_content">Содержание:</label>
            <textarea class="form-control " name="post_content" id="body" cols="30" rows="10">
         </textarea>
        </div>


        <div class="form-group">
            <input class="btn btn-primary" type="submit" name="create_post" value="Publish Post">
        </div>

    </form>

<?php include 'footer.php' ?>