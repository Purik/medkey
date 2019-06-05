<?php
namespace app\modules\security\port\rest\controllers;

use app\common\rest\ActiveController;
use app\common\filters\QueryParamAuth;
use app\common\widgets\ActiveForm;
use app\modules\security\application\UserServiceInterface;
use app\modules\security\models\form\UserPassword;
use yii\base\Module;
use app\modules\security\models\orm\AclRole;
use app\modules\security\models\form\User as UserForm;
use yii\filters\AccessControl;
use yii\web\ForbiddenHttpException;

/**
 * Class AclRoleController
 * @package Module\Security
 * @copyright 2012-2019 Medkey
 */
class AclRoleController extends ActiveController
{
	/**
     * @var string the model class name. This property must be set.
     */
    public $modelClass = AclRole::class;
}
