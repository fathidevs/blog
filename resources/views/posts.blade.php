<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="app.css">
    <title>Posts</title>
</head>
<body>
    <?php foreach($posts as $post): ?>
    <article>
        <?= $post?>
    </article>
    <?php endforeach; ?>

    <!-- <article>
    <h1><a href="/posts/my_first_post">My first post</a></h1>

    <p>
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda inventore beatae impedit laudantium dolor saepe corrupti, est ullam delectus sint ducimus tenetur facilis porro omnis hic in. Sit, nisi et.
    </p>
    </article>

    <article>
    <h1><a href="/posts/my_second_post">My second post</a></h1>

    <p>
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda inventore beatae impedit laudantium dolor saepe corrupti, est ullam delectus sint ducimus tenetur facilis porro omnis hic in. Sit, nisi et.
    </p>
    </article>

    <article>
    <h1><a href="/posts/my_third_post">My third post</a></h1>

    <p>
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda inventore beatae impedit laudantium dolor saepe corrupti, est ullam delectus sint ducimus tenetur facilis porro omnis hic in. Sit, nisi et.
    </p>
    </article> -->
</body>
</html>