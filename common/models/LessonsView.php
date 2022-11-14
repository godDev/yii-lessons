<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "lessons_view".
 *
 * @property int $id
 * @property int $user_id
 * @property int $is_viewed
 * @property int|null $lesson_id
 *
 * @property Lessons $lesson
 * @property User $user
 */
class LessonsView extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'lessons_view';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id'], 'required'],
            [['user_id', 'is_viewed', 'lesson_id'], 'integer'],
            [['lesson_id'], 'exist', 'skipOnError' => true, 'targetClass' => Lessons::class, 'targetAttribute' => ['lesson_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'is_viewed' => 'Is Viewed',
            'lesson_id' => 'Lesson ID',
        ];
    }

    /**
     * Gets query for [[Lesson]].
     *
     * @return \yii\db\ActiveQuery|LessonQuery
     */
    public function getLesson()
    {
        return $this->hasOne(Lessons::class, ['id' => 'lesson_id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery|yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }

    /**
     * {@inheritdoc}
     * @return LessonsViewQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new LessonsViewQuery(get_called_class());
    }
}
