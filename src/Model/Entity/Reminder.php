<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Reminder Entity
 *
 * @property int $id
 * @property int $expense_id
 * @property \Cake\I18n\FrozenDate $date
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property string $description
 * @property int $user_id
 *
 * @property \App\Model\Entity\Expense $expense
 */
class Reminder extends Entity
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
        'expense_id' => true,
        'date' => true,
        'created' => true,
        'modified' => true,
        'description' => true,
        'user_id' => true,
        'expense' => true
    ];
}
