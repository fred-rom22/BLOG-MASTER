<?php
    $route = isset($post) && $post->get('id') ? 'editArticle&articleId='.$post->get('id') : 'addArticle';
    $submit = $route === 'addArticle' ? 'Envoyer' : 'Mettre à jour';
?>

<form method="post" action="../public/index.php?route=<?= $route; ?>">
    <div class="form-group row">
        <label for="title" class="col-sm-2 col-form-label">Titre : </label><br>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="title" name="title" value="<?= isset($post) ? htmlspecialchars($post->get('title')): ''; ?>">
        </div>
    </div>
    <br>
    <?= isset($errors['title']) ? $errors['title'] : ''; ?>
    <div class="form-group  row">
        <label for="content" class="col-sm-2 col-form-label">Contenu : </label><br>
        <div class="col-sm-10">
            <textarea id="content" class="form-control" name="content"><?= isset($post) ? htmlspecialchars($post->get('content')): ''; ?></textarea>
        </div>
    </div>
    <br>
    <?= isset($errors['content']) ? $errors['content'] : ''; ?>
    <input type="submit" value="<?= $submit; ?>" id="submit" name="submit" class="btn btn-success">
</form>