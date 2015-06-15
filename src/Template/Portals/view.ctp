<!-- File: src/Template/Articles/view.ctp -->

<h1><?= h($portal->name) ?></h1>
<p><?= h($portal->faction) ?></p>
<p><small>Owner: <?= h($portal->agent)  ?> - <?= h(print_r($me,1))  ?></small></p>
