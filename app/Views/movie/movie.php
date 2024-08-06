<?= $this->extend('_partials/default') ?>

<?= $this->section('content') ?>
<div class="container">
    <h1 class="my-4"><?= $movie->title ?></h1>
    <div class="row">
        <div class="col-md-4">
            <img class="img-fluid" src="https://image.tmdb.org/t/p/w500<?= $movie->poster_path ?>" alt="<?= $movie->title ?>">
        </div>
        <div class="col-md-8">
            <h3>Overview</h3>
            <p><?= $movie->overview ?></p>
            <h3>Cast</h3>
            <ul>
                <?php foreach ($credits->cast as $credit): ?>
                    <li>
                        <a href="credit.php?id=<?= $credit->id ?>"><?= $credit->name ?></a> as <?= $credit->character ?>
                    </li>
                <?php endforeach ?>
            </ul>
        </div>
    </div>
    <a href="index.php" class="btn btn-primary mt-4">Back to List</a>
</div>
<?= $this->endSection() ?>