
<?= $this->extend('_partials/default') ?>

<?= $this->section('content') ?>
<div class="container">
    <h1 class="my-4"><?= $person->name ?></h1>
    <div class="row">
        <div class="col-md-4">
            <img class="img-fluid" src="https://image.tmdb.org/t/p/w500<?= $person->profile_path ?>" alt="<?= $person->name ?>">
        </div>
        <div class="col-md-8">
            <h3>Biography</h3>
            <p><?= $person->biography ?></p>
            <h3>Known For</h3>
            <ul>
                <?php foreach ($movies->cast as $movie) : ?>
                    <li>
                        <a href="movie.php?id=<?= $movie->id ?>"><?= $movie->title ?> as <?= $movie->character ?></a>
                    </li>
                <?php endforeach ?>
            </ul>
        </div>
    </div>
    <a href="index.php" class="btn btn-primary mt-4">Back to List</a>
</div>
<?= $this->endSection() ?>