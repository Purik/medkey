<?php
namespace app\seeds;

use app\common\helpers\ArrayHelper;
use app\common\seeds\Seed;

class SiriusAcl extends Seed
{
    public function run()
    {
        $aclRoles = $this->call('sirius_acl_role_seed')->models;
        $this->model = \app\modules\security\models\orm\Acl::class;

        $this->data = [
            [
                'module' => 'medical',
                'type' => '1',
                'entity_type' => 'AttendanceService',
                'action' => 'getAttendanceById',
                'acl_role_id' => ArrayHelper::findBy($aclRoles, ['name' => 'patient'])->id
            ],
            [
                'module' => 'medical',
                'type' => '1',
                'entity_type' => 'AttendanceService',
                'action' => 'createAttendanceBySchedule',
                'acl_role_id' => ArrayHelper::findBy($aclRoles, ['name' => 'patient'])->id
            ],
            [
                'module' => 'medical',
                'type' => '1',
                'entity_type' => 'AttendanceService',
                'action' => 'cancelAttendance',
                'acl_role_id' => ArrayHelper::findBy($aclRoles, ['name' => 'patient'])->id
            ],
            [
                'module' => 'medical',
                'type' => '1',
                'entity_type' => 'AttendanceService',
                'action' => 'getAttendanceList',
                'acl_role_id' => ArrayHelper::findBy($aclRoles, ['name' => 'patient'])->id
            ],
            [
                'module' => 'medical',
                'type' => '1',
                'entity_type' => 'EhrService',
                'action' => 'getEhrList',
                'acl_role_id' => ArrayHelper::findBy($aclRoles, ['name' => 'patient'])->id
            ],
			[
                'module' => 'medical',
                'type' => '1',
                'entity_type' => 'PatientService',
                'action' => 'getPatientById',
                'acl_role_id' => ArrayHelper::findBy($aclRoles, ['name' => 'admin'])->id
            ],
            [
                'module' => 'medical',
                'type' => '1',
                'entity_type' => 'ReferralService',
                'action' => 'getReferralList',
                'acl_role_id' => ArrayHelper::findBy($aclRoles, ['name' => 'admin'])->id
            ],
            [
                'module' => 'medical',
                'type' => '1',
                'entity_type' => 'ReferralService',
                'action' => 'getReferralById',
                'acl_role_id' => ArrayHelper::findBy($aclRoles, ['name' => 'admin'])->id
            ],
        ];
    }
}
