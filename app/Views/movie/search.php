<?= $this->extend('_partials/default') ?>

<?= $this->section('content') ?>
<div class="container-fluid">
    <h1>Hasil Pencarian</h1>
    <hr>
    <?php foreach($movies->results as $movie) : ?>
    <div class="card mb-3 h-100">
        <div class="row g-0">
            <div class="col-md-2">
                <img src="https://image.tmdb.org/t/p/w500<?= $movie->poster_path ?>" class="img-fluid rounded-start card-img-left" alt="">
            </div>
            <div class="col-md-10">
                <div class="card-body">
                    <h5 class="card-title"><?= $movie->title ?></h5>
                    <p class="card-text"><?= $movie->overview ?></p>
                </div>
            </div>
            <a href="<?= base_url('movie/' . $movie->id) ?>" class="stretched-link"></a>
        </div>
    </div>
    <?php endforeach ?>
</div>
<?= $this->endSection() ?>