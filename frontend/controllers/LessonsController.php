<?php

namespace frontend\controllers;

use common\controllers\BaseController;
use common\models\Lessons;
use common\models\LessonsView;
use Yii;

/**
 * Site controller
 */
class LessonsController extends BaseController
{
    public function actionIndex()
    {
        $user_id = Yii::$app->user->id;


        $lessons = Lessons::find()->orderBy('order_number')->with([
            'lessonsView' => function ($query) use ($user_id) {
                $query->andWhere(['user_id' => $user_id]);
            }
        ])->all();


        return $this->render('index', ['lessons' => $lessons]);
    }

    public function actionLessonDetail(int $lesson_id)
    {
        $is_viewed = Yii::$app->request->get('is_viewed');
        $previous_lesson_id = Yii::$app->request->get('previous_lesson_id');

        if ($previous_lesson_id && $is_viewed) {
            $user_id = Yii::$app->user->id;

            $lessonsView = LessonsView::find()->where(['user_id' => $user_id, 'lesson_id' => $previous_lesson_id])->one();
            if (!$lessonsView) {
                $lessonsView = new LessonsView();
                $lessonsView->lesson_id = $previous_lesson_id;
                $lessonsView->user_id = $user_id;
                $lessonsView->is_viewed = 1;
                $lessonsView->save();
            }
        }

        $lesson = Lessons::findOne($lesson_id);
        if ($lesson) {
            return $this->render('lesson-detail', ['lesson' => $lesson]);
        }

        return $this->redirect('index');
    }
}
