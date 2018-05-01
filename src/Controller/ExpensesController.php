<?php
namespace App\Controller;

use App\Controller\AppController;

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

        $this->paginate = [
            'contain' => ['Users', 'ExpenseFields']
        ];
        $expenses = $this->paginate($this->Expenses
        ->find()
        ->where(['user_id ' => $this->Auth->user('id')])
        ->order(['Expenses.created' => 'DESC'])
        );

        //to calculate sum
        $query = $this->Expenses->find();
     
        $monthlyExpense=$query
        ->select(['sum' => $query->func()->sum('Expenses.value')])
        ->where(['user_id ' => $this->Auth->user('id')])
        ->toList();
        
        $income = $this->Incomes->find();
     
        $monthlyIncome=$income
        ->select(['sum' => $income->func()->sum('Incomes.value')])
        ->where(['user_id ' => $this->Auth->user('id')])
        ->toList();
        // pr($monthlyIncome);die;

        $this->set(compact('expenses'));
        $this->set('monthlyIncome',$monthlyIncome);
        $this->set('monthlyExpense',$monthlyExpense);
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
        



        if ($this->request->is('post')) {
            $expense['recurring_duration']=1;
            $expense = $this->Expenses->patchEntity($expense, $this->request->getData());
            
            
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
