<main role="main">
    <div class="album py-5 bg-light">
        <div class="container">

            <div class="row">
                <?php /** @var \common\models\Lessons[] $lessons */

                use kartik\icons\Icon;
                use yii\helpers\Url;

                foreach ($lessons as $lesson): ?>
                    <div class="col-md-4">
                        <div class="card mb-4 box-shadow ">
                            <div class="card-body">
                                <h6><?= $lesson->title ?></h6>
                                <p class="card-text"><?= $lesson->description ?></p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <a href="<?= Url::to(['lesson-detail', 'lesson_id' => $lesson->id]) ?>" type="button"
                                           class="btn btn-sm btn-primary btn-outline-secondary">View</a>
                                    </div>
                                    <i class="fa-solid fa-check"></i>
                                    <?= $lesson->lessonsView && $lesson->lessonsView->is_viewed ? Icon::show('check solid green', ['class'=>'text-success'])  : '' ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

</main>