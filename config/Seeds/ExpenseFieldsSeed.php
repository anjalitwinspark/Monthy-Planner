<?php
use Migrations\AbstractSeed;

/**
 * ExpenseFields seed.
 */
class ExpenseFieldsSeed extends AbstractSeed
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
            [ 'name'=>'Food',
              'role_id'=>1,
              'created'=>date('Y-m-d H:i:s'),
              'modified'=>date('Y-m-d H:i:s')
            ],
            [ 'name'=>'Rent',
              'role_id'=>1,
              'created'=>date('Y-m-d H:i:s'),
              'modified'=>date('Y-m-d H:i:s')
            ],
            [ 'name'=>'Tax',
              'role_id'=>1,
              'created'=>date('Y-m-d H:i:s'),
              'modified'=>date('Y-m-d H:i:s')
            ],
            [ 'name'=>'Electricity Bill',
              'role_id'=>1,
              'created'=>date('Y-m-d H:i:s'),
              'modified'=>date('Y-m-d H:i:s')
            ],
            [ 'name'=>'Fee',
              'role_id'=>1,
              'created'=>date('Y-m-d H:i:s'),
              'modified'=>date('Y-m-d H:i:s')
            ],
            [ 'name'=>'Water Bill',
              'role_id'=>1,
              'created'=>date('Y-m-d H:i:s'),
              'modified'=>date('Y-m-d H:i:s')
            ],
            [ 'name'=>'Insurance',
              'role_id'=>1,
              'created'=>date('Y-m-d H:i:s'),
              'modified'=>date('Y-m-d H:i:s')
            ],
            [ 'name'=>'Petrol',
              'role_id'=>1,
              'created'=>date('Y-m-d H:i:s'),
              'modified'=>date('Y-m-d H:i:s')
            ],
            [ 'name'=>'Transportation',
              'role_id'=>1,
              'created'=>date('Y-m-d H:i:s'),
              'modified'=>date('Y-m-d H:i:s')
            ],
            [ 'name'=>'Others',
              'role_id'=>1,
              'created'=>date('Y-m-d H:i:s'),
              'modified'=>date('Y-m-d H:i:s')
            ],
            [ 'name'=>'Employee Salaries',
              'role_id'=>2,
              'created'=>date('Y-m-d H:i:s'),
              'modified'=>date('Y-m-d H:i:s')
            ],
            [ 'name'=>'Office Rent',
              'role_id'=>2,
              'created'=>date('Y-m-d H:i:s'),
              'modified'=>date('Y-m-d H:i:s')
            ],
            [ 'name'=>'Utilities/Telephone',
              'role_id'=>2,
              'created'=>date('Y-m-d H:i:s'),
              'modified'=>date('Y-m-d H:i:s')
            ],
            [ 'name'=>'Installation/Repair',
              'role_id'=>2,
              'created'=>date('Y-m-d H:i:s'),
              'modified'=>date('Y-m-d H:i:s')
            ],
            [ 'name'=>'Inventory/Purchases',
              'role_id'=>2,
              'created'=>date('Y-m-d H:i:s'),
              'modified'=>date('Y-m-d H:i:s')
            ],
            [ 'name'=>'Loan/EMIs',
              'role_id'=>2,
              'created'=>date('Y-m-d H:i:s'),
              'modified'=>date('Y-m-d H:i:s')
            ],
            [ 'name'=>'Hiring Cost',
              'role_id'=>2,
              'created'=>date('Y-m-d H:i:s'),
              'modified'=>date('Y-m-d H:i:s')
            ],

        ];

        $table = $this->table('expense_fields');
        $table->insert($data)->save();
    }
}
