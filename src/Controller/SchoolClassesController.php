<?php
declare(strict_types=1);

namespace App\Controller;

class SchoolClassesController extends AppController
{
    public function index()
    {
        $schoolClassesTable = $this->fetchTable('SchoolClasses');
        $query = $schoolClassesTable->find();
        $schoolClasses = $this->paginate($query);

        $this->set(compact('schoolClasses'));
    }

    public function view($id = null)
    {
        $schoolClassesTable = $this->fetchTable('SchoolClasses');
        $schoolClass = $schoolClassesTable->get($id, contain: []);
        $this->set(compact('schoolClass'));
    }

    public function add()
    {
        $schoolClassesTable = $this->fetchTable('SchoolClasses');
        $schoolClass = $schoolClassesTable->newEmptyEntity();
        if ($this->request->is('post')) {
            $schoolClass = $schoolClassesTable->patchEntity($schoolClass, $this->request->getData());
            if ($schoolClassesTable->save($schoolClass)) {
                $this->Flash->success(__('The school class has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The school class could not be saved. Please, try again.'));
        }
        $this->set(compact('schoolClass'));
    }

    public function edit($id = null)
    {
        $schoolClassesTable = $this->fetchTable('SchoolClasses');
        $schoolClass = $schoolClassesTable->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $schoolClass = $schoolClassesTable->patchEntity($schoolClass, $this->request->getData());
            if ($schoolClassesTable->save($schoolClass)) {
                $this->Flash->success(__('The school class has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The school class could not be saved. Please, try again.'));
        }
        $this->set(compact('schoolClass'));
    }

    public function delete($id = null)
    {
        $schoolClassesTable = $this->fetchTable('SchoolClasses');
        $this->request->allowMethod(['post', 'delete']);
        $schoolClass = $schoolClassesTable->get($id);
        if ($schoolClassesTable->delete($schoolClass)) {
            $this->Flash->success(__('The school class has been deleted.'));
        } else {
            $this->Flash->error(__('The school class could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
