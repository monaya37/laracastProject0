<!DOCTYPE html>
<link rel="stylesheet" href="app.css">

<title>My Blog</title>

<body>

    <?php foreach ($posts as $post) : ?>
    <article>
        
        <?= $post; ?>

    </article>
    <?php endforeach; ?>

</body>

</html>
