<html lang="en">
<head>
    <title>The32Chan</title>
</head>

<body>
<h1>Threads</h1>
<?php if (isset($threads)) : ?>
<?php foreach ($threads as $thread): ?>
<div style="border: 1px solid black" class="thread">
    <h3><?= $thread['Name']?></h3>
    <p><?= $thread['Description']?></p>
</div>
<?php endforeach; ?>
<?php endif ?>
</body>
</html>
