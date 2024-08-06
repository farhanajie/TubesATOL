<?= $this->extend('_partials/default') ?>

<?= $this->section('content') ?>
<div class="container-fluid">
    <div class="container-fluid rows">
        <h1>Film Populer</h1>
        <hr>
        <div class="d-flex flex-row flex-nowrap overflow-x-scroll">
            <?php foreach ($popular->results as $popular) : ?>
                <div class="card col-sm-3 col-md-2">
                    <img src="https://image.tmdb.org/t/p/w500<?= $popular->poster_path ?>" alt="" class="card-img-top">
                    <div class="card-body">
                        <p class="card-title"><strong><?= $popular->title ?></strong></p>
                    </div>
                    <a href="<?= base_url('movie/' . $popular->id) ?>" class="stretched-link"></a>
                </div>
            <?php endforeach ?>
        </div>
    </div>

    <div class="container-fluid rows">
        <h1>Film yang Akan Datang</h1>
        <hr>
        <div class="d-flex flex-row flex-nowrap overflow-x-scroll">
            <?php foreach ($upcoming->results as $upcoming) : ?>
                <div class="card col-sm-3 col-md-2">
                    <img src="https://image.tmdb.org/t/p/w500<?= $upcoming->poster_path ?>" alt="" class="card-img-top">
                    <div class="card-body">
                        <p class="card-title"><strong><?= $upcoming->title ?></strong></p>
                    </div>
                    <a href="<?= base_url('movie/' . $upcoming->id) ?>" class="stretched-link"></a>
                </div>
            <?php endforeach ?>
        </div>
    </div>
</div>
<?= $this->endSection() ?>