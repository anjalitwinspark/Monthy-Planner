<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link https://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();
        $this->loadModel('Expenses');
        $this->loadModel('Reminders');
        
        $this->loadComponent('Flash');
        $this->loadComponent('RequestHandler', [
               'enableBeforeRedirect' => false
                ]);  
         $this->loadComponent('Auth', [
            'authorize' => 'Controller',
            'authenticate' => [
                'Form' => [
                    'fields' => [
                        'username' => 'email',
                        'password' => 'password'
                    ]
                ]
            ],
            'loginAction' => [
                'controller' => 'Users',
                'action' => 'login'
            ],
             // If unauthorized, return them to page they were just on
            'unauthorizedRedirect' => $this->referer()
        ]);

        // Allow the display action so our PagesController
        // continues to work. Also enable the read only actions.
        $this->Auth->allow(['display', 'login']);
        
        /*
         * Enable the following components for recommended CakePHP security settings.
         * see https://book.cakephp.org/3.0/en/controllers/components/security.html
         */
        //$this->loadComponent('Security');
        //$this->loadComponent('Csrf');
        $loggedInUser=$this->Auth->user();
         
        $this->set(compact('loggedInUser'));

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


        
        // $i=0;
        //  $this->set('i',$i);
        //  $name = '';
        //  $this->set('name',$name);
    }


}
