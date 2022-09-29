<a href="/">Accueil</a>

<?php foreach ($articles as $article) : ?>
    <div>
        <a href="/article?id=<?= htmlspecialchars($article->getId_article()); ?>"><?= htmlspecialchars($article->getTitre()); ?></a>
        <p><?= htmlspecialchars($article->getDescription()); ?></p>
        <p>Article posté le <?= htmlspecialchars($article->getdate()); ?></p>
    </div>
<?php endforeach; ?>