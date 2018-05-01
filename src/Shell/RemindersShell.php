<?php
namespace App\Shell;

use Cake\Console\Shell;
// In a controller or table method.
use Cake\ORM\TableRegistry;
use App\Shell\Time;



/**
 * Reminders shell command.
 */
class RemindersShell extends Shell
{

    /**
     * Manage the available sub-commands along with their arguments and help
     *
     * @see http://book.cakephp.org/3.0/en/console-and-shells.html#configuring-options-and-generating-help
     *
     * @return \Cake\Console\ConsoleOptionParser
     */

    // public function main()
    // {
    //     $this->out('Hello world.');
    // }



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

    public function reminder() {
        // In a controller or table method.


        $reminders = TableRegistry::get('Reminders');
        $query = $reminders->find();
        $this->out($query);
        $time = new Time($reminders('date'));
        if ($time->isToday()) {
            // Greet user with a happy birthday message
            $this->Flash->success(__('Notification'));
        }
    }
}
