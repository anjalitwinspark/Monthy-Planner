<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Collection\Collection;
/**
 * Incomes Controller
 *
 * @property \App\Model\Table\IncomesTable $Incomes
 *
 * @method \App\Model\Entity\Income[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class IncomesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->loadModel('Expenses');
        $expense = $this->Expenses->find()->all();
        //pr($expense);die;
        $Collection = new Collection($expense);
        //pr($expenseCollec->toArray());
        $newCollection=$Collection->map(function($value, $key){
            //pr($value);die;
            return ['month'=> $value->date->month, 'value'=>$value->value];
            });
        //pr($newCollection->toArray());die;
        $new = $newCollection->groupBy('month')->map(function($value, $key){
           
            $val = (new Collection($value))->reduce(function($accumulated, $line){
                return $accumulated + $line['value'];
            },0);
            return $val;
        });
        //pr($new->toArray());  die;
        $coordinatesI = $new->map(function($key, $value){
            return [$key,$value];
        });
         //pr($coordinates->toList());die;  
         $coordinatesI = $coordinatesI->toList(); 
        //pr($new->toList());die;
        $this->paginate = [
            'contain' => ['Users', 'IncomeFields']
        ];
        $incomes = $this->paginate($this->Incomes);
        return $this->redirect(['controller'=>'Expenses','action' => 'index']);

        $this->set(compact('incomes'));
        $this->set('coordinatesI',$coordinatesI);
    }

    
    public function isAuthorized($user){
        
        
        
       return true;
    
    }


    /**
     * View method
     *
     * @param string|null $id Income id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $income = $this->Incomes->get($id, [
            'contain' => ['Users', 'IncomeFields']
        ]);

        $this->set('income', $income);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    // public function add()
    // {
    //     $income = $this->Incomes->newEntity();
    //     if ($this->request->is('post')) {
    //         $income = $this->Incomes->patchEntity($income, $this->request->getData());
    //         if ($this->Incomes->save($income)) {
    //             $this->Flash->success(__('The income has been saved.'));

    //             return $this->redirect(['controller'=>'Expenses','action' => 'index']);
    //         }
    //         $this->Flash->error(__('The income could not be saved. Please, try again.'));
    //     }
    //     $users = $this->Incomes->Users->find('list', ['limit' => 200]);
    //     $incomeFields = $this->Incomes->IncomeFields->find('list', ['limit' => 200]);
    //     $this->set(compact('income', 'users', 'incomeFields'));
    // }
    public function add()
    {
        $income = $this->Incomes->newEntity();
        $income['user_id'] = $this->Auth->user('id');
        $role = $this->Auth->user('role_id');
        
       // $data= [
       //      [
       //          'income_field_id' => 2,
       //          'value' => 'tyu'
       //      ],
       //      [
       //          'income_field_id' => 1,
       //          'value' => 'dfghj'
       //      ]
       //  ];
// pr($data); die;

       //pr($this->Auth->user('role_id'));die;
        if ($this->request->is('post')) {
         $data = $this->request->getData();
         $data = $data['data'];  //converting array to patchEntity format
         $newData= [];
         foreach ($data as $value) {
            $value['user_id'] = $this->Auth->user('id');
            $newData[] = $value;
         }
//pr($newData); die;
            $income = $this->Incomes->patchEntities($income, $newData);

            if ($this->Incomes->saveMany($income)) {
                $this->Flash->success(__('The income has been saved.'));

                return $this->redirect(['controller'=>'Expenses','action' => 'index']);
            }
            $this->Flash->error(__('The income could not be saved. Please, try again.'));
        }
        $users = $this->Incomes->Users->find('list', ['limit' => 200]);
        if ($this->Auth->user('role_id') == 2 ) {
            $incomeFields = $this->Incomes->IncomeFields->find()->all();
        }
        else{
            $incomeFields = $this->Incomes->IncomeFields->find()->where(['role_id =' => 1])->all();
        }
        //$incomeFields = $this->Incomes->IncomeFields->find('list', ['limit' => 200]);
        $this->set(compact('income', 'users', 'incomeFields'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Income id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $income = $this->Incomes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $income = $this->Incomes->patchEntity($income, $this->request->getData());
            if ($this->Incomes->save($income)) {
                $this->Flash->success(__('The income has been saved.'));

                return $this->redirect(['controller'=>'Expenses','action' => 'index']);
            }
            $this->Flash->error(__('The income could not be saved. Please, try again.'));
        }
        $users = $this->Incomes->Users->find('list', ['limit' => 200]);
        $incomeFields = $this->Incomes->IncomeFields->find('list', ['limit' => 200]);
        $this->set(compact('income', 'users', 'incomeFields'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Income id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $income = $this->Incomes->get($id);
        if ($this->Incomes->delete($income)) {
            $this->Flash->success(__('The income has been deleted.'));
        } else {
            $this->Flash->error(__('The income could not be deleted. Please, try again.'));
        }

        return $this->redirect(['controller'=>'Expenses','action' => 'index']);
    }


}
