<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "lessons".
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property string $video_url
 * @property int $order_number
 *
 * @property LessonsView[] $lessonsViews
 */
class Lessons extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'lessons';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'description', 'video_url', 'order_number'], 'required'],
            [['title', 'description', 'video_url'], 'string'],
            [['order_number'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'description' => 'Description',
            'video_url' => 'Video Url',
            'order_number' => 'Order Number',
        ];
    }

    /**
     * Gets query for [[LessonsViews]].
     *
     * @return \yii\db\ActiveQuery|LessonsViewQuery
     */
    public function getLessonsView()
    {
        return $this->hasOne(LessonsView::class, ['lesson_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return LessonsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new LessonsQuery(get_called_class());
    }
}
