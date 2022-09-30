<div><a href="/">Accueil</a></div>

<div>
    <form method="POST" action="/edit?id=<?= htmlspecialchars($article->getId_article()); ?>">
        <input type="text" name="title" placeholder="Le titre de votre article" value="<?= htmlspecialchars($article->getTitre()); ?>">
        <label for="title"></label>
        <br>
        <textarea name="description" cols="20" rows="10" placeholder="Le contenu de votre article"><?= htmlspecialchars($article->getDescription()); ?></textarea>
        <br>
        <button type="submit" name="send">Modifier l'article</button>
    </form>
</div>