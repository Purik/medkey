<?php
namespace app\seeds;

use app\common\seeds\Seed;
use app\modules\security\models\orm\AclRole;

class SiriusAclRoleSeed extends Seed
{
    public function run()
    {
        $this->model = AclRole::class;

        $this->data = [
            [
                'name' => 'patient',
                'short_name' => 'patient',
                'description' => 'patient',
            ],
			[
                'name' => 'doctor',
                'short_name' => 'doctor',
                'description' => 'doctor',
            ],
        ];
    }
}
