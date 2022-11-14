<?php

use yii\helpers\Url;

?>
<main role="main" class="container">
    <div class="row">
        <div class="blog-main">
            <h3 class="pb-3 mb-4 font-italic border-bottom">
                <?= $lesson->title ?>
            </h3>

            <div class="embed-responsive embed-responsive-16by9">
                <iframe class="embed-responsive-item" src="<?= $lesson->video_url ?>" allowfullscreen></iframe>
            </div>

            <div class="blog-post">

                <p><?= $lesson->description ?></p>
            </div>



            <nav class="blog-pagination">
                <a class="btn btn-success" href="<?= Url::to(['lesson-detail', 'previous_lesson_id' => $lesson->id,'lesson_id' => $lesson->id + 1, 'is_viewed'=> true]) ?>">Урок просмотрен</a>
            </nav>

        </div>
    </div>

</main>