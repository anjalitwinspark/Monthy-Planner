<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Collection\Collection;
use Cake\I18\Time;
use Cake\ORM\Table;

/**
 * Expenses Controller
 *
 * @property \App\Model\Table\ExpensesTable $Expenses
 *
 * @method \App\Model\Entity\Expense[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ExpensesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->loadModel('Incomes');
        $this->loadModel('Expenses');
        $this->loadModel('Reminders');
        $name=$this->Auth->user('name');


        $this->paginate = [
            'contain' => ['Users', 'ExpenseFields']
        ];
        $expenses = $this->paginate($this->Expenses
        ->find()
        ->where(['user_id ' => $this->Auth->user('id')])
        ->order(['Expenses.date' => 'DESC'])
        );
        //pr($expenses);die;



        $incomes =$this->Incomes
        ->find()
        ->contain('IncomeFields')
        ->where(['user_id ' => $this->Auth->user('id')])
        ->order(['Incomes.created' => 'DESC'])
        ->all()
        ;
        $reminders =$this->Reminders
        ->find()
        ->contain('Expenses')
        ->where(['Reminders.user_id ' => $this->Auth->user('id')])
        ->order(['Reminders.created' => 'DESC'])
        ->all()
        ;
        //reminder
        $reminderToday=[];
        $i=0;
        if($reminders){
            foreach ($reminders as $reminder) {
            $time =$reminder->date;
        
            if ($time->isToday()) {
                $reminderToday[]=$reminder;
                $i=$i+1;

                }
           
            }
            $this->set('i',$i);
            $this->set('reminderToday',$reminderToday);
        }
        //Expense Graph Month
        if($expenses){
        $collection = new Collection($expenses);
        $newCollection = $collection->map(function($value, $key){
     
            return  ['month' => $value->date->month, 'value' => $value->value];   
        });

        $new=$newCollection->groupBy('month')->map(function($value, $key){
            $value1 = (new Collection($value))->reduce(function($accumulated, $line){
                return $accumulated + $line['value'];
            },0);
            return $value1;
        });
        $coordinates=$new->map(function($value, $key){
            return [$key,$value];
        });
        $coordinates=$coordinates->toList();
        //pr($coordinates);
        $this->set('coordinates',$coordinates);

    }


        

        //Expense graph
        $currentExpenses=[];
        foreach ($expenses as $expense) {
            # code...
            if($expense->date->isThisMonth()){
            $currentExpenses[]=$expense;
            }
            
        }
//pr($currentExpenses);die;

        if($currentExpenses){
        $collection = new Collection($currentExpenses);
        $newCollection = $collection->map(function($value, $key){
     
            return  ['day' => $value->date->day, 'value' => $value->value];   
        });
        //$newCollection = $newCollection->sortBy('value',SORT_ASC);
        //pr($newCollection->toList());die;
        $new=$newCollection->groupBy('day')->map(function($value, $key){
            $value1 = (new Collection($value))->reduce(function($accumulated, $line){
                return $accumulated + $line['value'];
            },0);
            return $value1;
        });
        //pr($new->toList());die;
        $coordinatesDay=$new->map(function($value, $key){
            return [$key,$value];
        });
        $coordinatesDay=$coordinatesDay->toList();
            //pr($coordinatesDay);die;
        $this->set('coordinatesDay',$coordinatesDay);

        }

        


        if($incomes){
        $collection = new Collection($incomes);
        $newCollection = $collection->map(function($value, $key){
     
            return  ['month' => $value->created->month, 'value' => $value->value];   
        });

        $new=$newCollection->groupBy('month')->map(function($value, $key){
            $value1 = (new Collection($value))->reduce(function($accumulated, $line){
                return $accumulated + $line['value'];
            },0);
            return $value1;
        });
        $coordinatesIncome=$new->map(function($value, $key){
            return [$key,$value];
        });
        $coordinatesIncome=$coordinatesIncome->toList();
        //pr($coordinatesIncome);die;
        $this->set('coordinatesIncome',$coordinatesIncome);

        }
        
        

        
        //to calculate sum
        $collectionSum = new Collection($currentExpenses);
        $collectionSumAll = new Collection($expenses);
        $monthlyExpense=$collectionSum->sumOf('value');
        $totalExpense=$collectionSumAll->sumOf('value');
        
        // $query = $this->Expenses->find();
     
        // $monthlyExpense=$query
        // ->select(['sum' => $query->func()->sum('Expenses.value')])
        // ->where(['user_id ' => $this->Auth->user('id')])
        // ->toList();
        
        $income = $this->Incomes->find();
     
        $monthlyIncome=$income
        ->select(['sum' => $income->func()->sum('Incomes.value')])
        ->where(['user_id ' => $this->Auth->user('id')])
        ->toList();
        
        $this->set(compact('reminders'));
        $this->set(compact('expenses'));
        $this->set(compact('incomes'));
        $this->set('monthlyIncome',$monthlyIncome);
        $this->set('monthlyExpense',$monthlyExpense);
        $this->set('totalExpense',$totalExpense);
        $this->set('name',$name);
        
       
    }

    // public function recurring(){
    //     $expenses = $this->Expenses
    //     ->find()
    //     ->where(['user_id ' => $this->Auth->user('id')])
    //     ->where(['recurring'=>true])
    //     ->order(['Expenses.created' => 'DESC'])
    //     ->all()
    //     ;
    //     //pr($expenses);die;
    //     foreach($expenses as $expense){
    //         if($expense['date']->wasWithinLast('1 month')){
    //             if($expense->recurring && $expense['recurring_duration']!=0){
    //             $expense['date'] = $expense['date']->addMonth();
    //             $expense['recurring_duration'] = $expense['recurring_duration']-1;

            
    //         //$expense['date'] = $expense['date']->addMonth();
        
    //             $expense = $expense->toArray();
    //             // pr($expense);die;
    //             //pr($expenses);die;
    //             $expenseR = $this->Expenses->newEntity();
    //             $expenseR =  $this->Expenses->patchEntity($expenseR, $expense);
    //             if ($this->Expenses->save($expenseR)) {
    //                 $this->Flash->success(__('The expense has been saved.'));

                
    //             }
    //             else{
    //                 $this->Flash->error(__('The expense could not be saved. Please, try again.'));
    //             }
        
        
    //     //$recurringExpenses = [];
    //             }
    //         } 
    //     }
    //   return $this->redirect(['action' => 'index']); 
    // }

    public function check(){
        $this->loadModel('Reminders');
        
        $x=$this->Reminders->find()
        ->where(['Reminders.user_id ' => $this->Auth->user('id')])
        ->all();
        foreach ($x as $reminder) {
        $time =$reminder->date;
        if ($time->isToday()) {
            $y[]=$reminder;
            // Greet user with a happy birthday message
            $this->Flash->success(__($reminder->description));

            }
           
        }

        $this->set('y',$y);
        return $this->redirect(['action' => 'index']);
    }


    /**
     * View method
     *
     * @param string|null $id Expense id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $expense = $this->Expenses->get($id, [
            'contain' => ['Users', 'ExpenseFields', 'Reminders']
        ]);

        $this->set('expense', $expense);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $expense = $this->Expenses->newEntity();
        $expense['user_id']=$this->Auth->user('id');
        $expense['recurring_duration'] = 0;


        if ($this->request->is('post')) {
            $expense['recurring_duration']=1;
            $expense = $this->Expenses->patchEntity($expense, $this->request->getData());
        //pr($expense);die;
            
            
            if ($this->Expenses->save($expense)) {
                $this->Flash->success(__('The expense has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The expense could not be saved. Please, try again.'));
        }
        $users = $this->Expenses->Users->find('list', ['limit' => 200]);

        if ($this->Auth->user('role_id') == 2 ) {
            $expenseFields = $this->Expenses->ExpenseFields->find('list', ['limit' => 200]);
        }
        else{
            $expenseFields = $this->Expenses->ExpenseFields->find('list')->where(['role_id =' => 1]);
        }
        

       // $expenseFields = $this->Expenses->ExpenseFields->find('list', ['limit' => 200]);
        $this->set(compact('expense', 'users', 'expenseFields'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Expense id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $expense = $this->Expenses->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $expense = $this->Expenses->patchEntity($expense, $this->request->getData());
            if ($this->Expenses->save($expense)) {
                $this->Flash->success(__('The expense has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The expense could not be saved. Please, try again.'));
        }
        $users = $this->Expenses->Users->find('list', ['limit' => 200]);
        $expenseFields = $this->Expenses->ExpenseFields->find('list', ['limit' => 200]);
        $this->set(compact('expense', 'users', 'expenseFields'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Expense id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $expense = $this->Expenses->get($id);
        if ($this->Expenses->delete($expense)) {
            $this->Flash->success(__('The expense has been deleted.'));
        } else {
            $this->Flash->error(__('The expense could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    public function isAuthorized($user){
        
       return true;
    
    }
}
