<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Expense Entity
 *
 * @property int $id
 * @property int $user_id
 * @property int $expense_field_id
 * @property int $value
 * @property string $description
 * @property bool $recurring
 * @property int $recurring_duration
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\ExpenseField $expense_field
 * @property \App\Model\Entity\Reminder[] $reminders
 */
class Expense extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'user_id' => true,
        'expense_field_id' => true,
        'value' => true,
        'description' => true,
        'recurring' => true,
        'recurring_duration' => true,
        'created' => true,
        'modified' => true,
        'user' => true,
        'expense_field' => true,
        'reminders' => true
    ];
}
