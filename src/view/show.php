<a href="/article">article</a>
<div>
    <h1><?= htmlspecialchars($article->getTitre()); ?></h1>
    <p><?= htmlspecialchars($article->getDescription()); ?></p>
    <p><?= htmlspecialchars($article->getDate()); ?></p>
</div>