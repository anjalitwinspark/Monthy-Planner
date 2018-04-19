<?php
use Migrations\AbstractSeed;

/**
 * IncomeFields seed.
 */
class IncomeFieldsSeed extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeds is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['name'=>'Salary',
            'role_id'=>'1',
                'created'       => date('Y-m-d H:i:s'),
                'modified'       => date('Y-m-d H:i:s')],
            ['name'=>'Pension',
            'role_id'=>'1',
                'created'       => date('Y-m-d H:i:s'),
                'modified'       => date('Y-m-d H:i:s')],
            ['name'=>'Rental Income',
            'role_id'=>'1',
                'created'       => date('Y-m-d H:i:s'),
                'modified'       => date('Y-m-d H:i:s')],
            ['name'=>'Savings',
            'role_id'=>'1',
                'created'       => date('Y-m-d H:i:s'),
                'modified'       => date('Y-m-d H:i:s')],
            ['name'=>'Sales Revenue',
            'role_id'=>'2',
                'created'       => date('Y-m-d H:i:s'),
                'modified'       => date('Y-m-d H:i:s')],
            ['name'=>'Inventment Income',
            'role_id'=>'2',
                'created'       => date('Y-m-d H:i:s'),
                'modified'       => date('Y-m-d H:i:s')],
            ['name'=>'Other',
            'role_id'=>'1',
                'created'       => date('Y-m-d H:i:s'),
                'modified'       => date('Y-m-d H:i:s')]
        ];

        $table = $this->table('income_fields');
        $table->insert($data)->save();
    }
}
