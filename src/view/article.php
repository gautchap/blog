<div><a href="/">Accueil</a></div>

<div>
    <form method="POST" action="/article">
        <input type="text" name="title" placeholder="Le titre de votre article">
        <label for="title"></label>
        <br>
        <textarea name="description" cols="20" rows="10" placeholder="Le contenu de votre article"></textarea>
        <br>
        <button type="submit" name="send">Ajouter un aticle</button>
    </form>
</div>

<?php foreach ($articles as $article) : ?>
    <div>
        <a href="/article?id=<?= htmlspecialchars($article->getId_article()); ?>"><?= htmlspecialchars($article->getTitre()); ?></a>
        <p><?= htmlspecialchars($article->getDescription()); ?></p>
        <p>Article posté le <?= htmlspecialchars($article->getdate()); ?></p>
        <form method="POST" action="/article">
            <input type="hidden" name="id" value="<?= htmlspecialchars($article->getId_article()); ?>">
            <button name="delete">Supprimer l'article</button>
            <a href="/edit?id=<?= htmlspecialchars($article->getId_article()); ?>">Modifier l'article</a>
        </form>
    </div>
<?php endforeach; ?>