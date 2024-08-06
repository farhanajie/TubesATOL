
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
                        <a href="<?= base_url('movie/' . $movie->id) ?>"><?= $movie->title ?></a> as <?= $movie->character ?>
                    </li>
                <?php endforeach ?>
            </ul>
        </div>
    </div>
</div>
<?= $this->endSection() ?>