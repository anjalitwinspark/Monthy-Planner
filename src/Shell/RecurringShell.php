<?php
namespace App\Shell;
use Cake\ORM\TableRegistry;

use Cake\Console\Shell;

/**
 * Recurring shell command.
 */
class RecurringShell extends Shell
{

    /**
     * Manage the available sub-commands along with their arguments and help
     *
     * @see http://book.cakephp.org/3.0/en/console-and-shells.html#configuring-options-and-generating-help
     *
     * @return \Cake\Console\ConsoleOptionParser
     */
    public function getOptionParser()
    {
        $parser = parent::getOptionParser();

        return $parser;
    }

    /**
     * main() method.
     *
     * @return bool|int|null Success or error code.
     */
    public function main()
    {
        $this->out($this->OptionParser->help());
    }

     public function initialize()
    {
        parent::initialize();
        $this->loadModel('Expenses');
        $this->loadModel('Users');
    }

public function recurring(){
     
        $expenses = TableRegistry::get('Expenses');
        //pr($expenses->find()->all());die;
        $expenses=$expenses
        ->find()
        //->contain('Users', 'ExpenseFields')
        //->where(['user_id ' => $this->Auth->user('id')])
        ->order(['Expenses.created' => 'DESC'])
        ->all();
        //pr($expenses);die;
        
        //$recurring=[];
        //pr($expenses);die;
        foreach ($expenses as $expense) {
            # code...
            if($expense['date']->wasWithinLast('1 month')){
                if($expense->recurring&&$expense['recurring_duration']!=0){

                    $updateExpense=$expense;
                    $updateExpense->recurring=false;
                    $this->Expenses->save($updateExpense);
                    
                    $expense['date']=$expense['date']->addMonth(1);
                    $expense['recurring_duration']=$expense['recurring_duration']-1;
                    $expense['recurring']=true;
               
                
                    $expense=$expense->toArray();

                    // $recurring[]=$expense;
                    $expenseR = $this->Expenses->newEntity();
                    $expenseR = $this->Expenses->patchEntity($expenseR, $expense);
                    $this->Expenses->save($expenseR);
                    

                    // if($this->Expenses->save($expenseR)){

                    //  //   $this->Flash->success(__('The expense has been saved.'));
                
                    // }
                    // else{
                    // //$this->Flash->success(__('The expense hasnt been saved.'));
                    // }
                    

                }
                
            }
            
        }
        
        
        
        //return $this->redirect(['action' => 'index']);
}
}
