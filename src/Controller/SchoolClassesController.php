<?php
declare(strict_types=1);

namespace App\Controller;
class SchoolClassesController extends AppController
{
    public function index()
    {
        $query = $this->SchoolClasses->find();
        $schoolClasses = $this->paginate($query);

        $this->set(compact('schoolClasses'));
    }

    public function view($id = null)
    {
        $schoolClass = $this->SchoolClasses->get($id, contain: []);
        $this->set(compact('schoolClass'));
    }

    public function add()
    {
        $schoolClass = $this->SchoolClasses->newEmptyEntity();
        if ($this->request->is('post')) {
            $schoolClass = $this->SchoolClasses->patchEntity($schoolClass, $this->request->getData());
            if ($this->SchoolClasses->save($schoolClass)) {
                $this->Flash->success(__('The school class has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The school class could not be saved. Please, try again.'));
        }
        $this->set(compact('schoolClass'));
    }

    public function edit($id = null)
    {
        $schoolClass = $this->SchoolClasses->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $schoolClass = $this->SchoolClasses->patchEntity($schoolClass, $this->request->getData());
            if ($this->SchoolClasses->save($schoolClass)) {
                $this->Flash->success(__('The school class has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The school class could not be saved. Please, try again.'));
        }
        $this->set(compact('schoolClass'));
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $schoolClass = $this->SchoolClasses->get($id);
        if ($this->SchoolClasses->delete($schoolClass)) {
            $this->Flash->success(__('The school class has been deleted.'));
        } else {
            $this->Flash->error(__('The school class could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
