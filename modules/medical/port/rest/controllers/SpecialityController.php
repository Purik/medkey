<?php
namespace app\modules\medical\port\rest\controllers;

use app\common\db\ActiveRecord;
use app\common\rest\ActiveController;
use app\common\widgets\ActiveForm;
use app\modules\medical\models\orm\Speciality;

/**
 * Class SpecialityController
 * @package Module\Medical
 * @copyright 2012-2019 Medkey
 */
class SpecialityController extends ActiveController
{
    public $modelClass = Speciality::class;


    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [];
    }

    /**
     * @inheritdoc
     */
    public function verbs()
    {
        return [];
    }
	
	public function actionIndex(q)
    {
        /* @var $modelClass ActiveRecordInterface */
        $modelClass = $this->modelClass;
        $query = $modelClass::find()
            ->where([
                'like',
                'title',
                $q
            ]);
        /** @var ActiveDataProvider $provider */
        $provider = \Yii::createObject([
            'class' => ActiveDataProvider::class,
            'query' => $query
        ]);
        return $provider;
    }

    public function actionValidateCreate()
    {
        $modelClass = $this->modelClass;
        /** @var $modelClass ActiveRecord */
        $model = $modelClass::ensureWeak(null, $this->createScenario, \Yii::$app->getRequest()->getBodyParams());
        return $this->asJson(ActiveForm::validate($model));
    }

    public function actionValidateUpdate($id)
    {
        $modelClass = $this->modelClass;
        /** @var $modelClass ActiveRecord */
        $model = $modelClass::ensure($id, $this->updateScenario, \Yii::$app->getRequest()->getBodyParams());
        return $this->asJson(ActiveForm::validate($model));
    }

    public function actionCreate()
    {
        $modelClass = $this->modelClass;
        /** @var $modelClass ActiveRecord */
        $model = $modelClass::ensureWeak(null, $this->createScenario, \Yii::$app->request->getBodyParams());
        $model->save();

        return $this->asJson($model);
    }

    public function actionUpdate($id)
    {
        $modelClass = $this->modelClass;
        /** @var $modelClass ActiveRecord */
        $model = $modelClass::ensure($id, $this->updateScenario, \Yii::$app->getRequest()->getBodyParams());
        $model->save();

        return $this->asJson($model);
    }

    public function actionDelete($id)
    {
        $modelClass = $this->modelClass;
        /** @var $modelClass ActiveRecord */
        $model = $modelClass::ensure($id);
        $model->setScenario(ActiveRecord::SCENARIO_DELETE);
        $model->delete();
        return $this->asJson($model);
    }
}
