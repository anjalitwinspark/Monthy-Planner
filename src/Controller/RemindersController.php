<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Reminders Controller
 *
 * @property \App\Model\Table\RemindersTable $Reminders
 *
 * @method \App\Model\Entity\Reminder[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class RemindersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Expenses']
        ];
        $reminders = $this->paginate($this->Reminders);

        $this->set(compact('reminders'));

        
        
        
    }

    
    /**
     * View method
     *
     * @param string|null $id Reminder id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $reminder = $this->Reminders->get($id, [
            'contain' => ['Expenses']
        ]);

        $this->set('reminder', $reminder);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $reminder = $this->Reminders->newEntity();
        $reminder['user_id']=$this->Auth->user('id');
        if ($this->request->is('post')) {
            $reminder = $this->Reminders->patchEntity($reminder, $this->request->getData());
            if ($this->Reminders->save($reminder)) {
                $this->Flash->success(__('The reminder has been saved.'));

                return $this->redirect(['controller'=>'Expenses','action' => 'index']);
            }
            $this->Flash->error(__('The reminder could not be saved. Please, try again.'));
        }
        $expenses = $this->Reminders->Expenses->find('list', ['limit' => 200]);
        $this->set(compact('reminder', 'expenses'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Reminder id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $reminder = $this->Reminders->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $reminder = $this->Reminders->patchEntity($reminder, $this->request->getData());
            if ($this->Reminders->save($reminder)) {
                $this->Flash->success(__('The reminder has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The reminder could not be saved. Please, try again.'));
        }
        $expenses = $this->Reminders->Expenses->find('list', ['limit' => 200]);
        $this->set(compact('reminder', 'expenses'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Reminder id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $reminder = $this->Reminders->get($id);
        if ($this->Reminders->delete($reminder)) {
            $this->Flash->success(__('The reminder has been deleted.'));
        } else {
            $this->Flash->error(__('The reminder could not be deleted. Please, try again.'));
        }

        return $this->redirect(['controller'=>'Expenses','action' => 'index']);
    }
    public function isAuthorized($user){
        
       return true;
    
    }
}
