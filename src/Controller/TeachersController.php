<?php
declare(strict_types=1);

namespace App\Controller;

use Authentication\PasswordHasher\DefaultPasswordHasher;

class TeachersController extends AppController
{
    public function index()
    {
        $query = $this->Teachers->find();
        $teachers = $this->paginate($query);

        $this->set(compact('teachers'));
    }

    public function view($id = null)
    {
        $teacher = $this->Teachers->get($id, contain: []);
        $this->set(compact('teacher'));
    }

    public function add()
    {
        $teacher = $this->Teachers->newEmptyEntity();
        if ($this->request->is('post')) {
            $teacher = $this->Teachers->patchEntity($teacher, $this->request->getData());
            if ($this->Teachers->save($teacher)) {
                $this->Flash->success(__('The teacher has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The teacher could not be saved. Please, try again.'));
        }
        $this->set(compact('teacher'));
    }

    public function edit($id = null)
    {
        $teacher = $this->Teachers->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $teacher = $this->Teachers->patchEntity($teacher, $this->request->getData());
            if ($this->Teachers->save($teacher)) {
                $this->Flash->success(__('The teacher has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The teacher could not be saved. Please, try again.'));
        }
        $this->set(compact('teacher'));
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $teacher = $this->Teachers->get($id);
        if ($this->Teachers->delete($teacher)) {
            $this->Flash->success(__('The teacher has been deleted.'));
        } else {
            $this->Flash->error(__('The teacher could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function login()
    {
        $session = $this->request->getSession();
        if ($session->read('Auth')) {
            return $this->redirect(['controller' => 'Teachers', 'action' => 'index']);
        }
        if ($this->request->is('post')) {
            $data = $this->request->getData();

            $teacher = $this->Teachers->find()
                ->where(['username' => $data['username']])
                ->first();

            if ($teacher) {
                $hasher = new DefaultPasswordHasher();

                if ($hasher->check($data['password'], $teacher->password)) {
                    $this->request->getSession()->write('Auth', $teacher);
                    // Nếu đăng nhập thành công
                    return $this->redirect('/');
                } else {
                    $this->Flash->error(__('Sai mật khẩu'));
                }
            } else {
                $this->Flash->error(__('Không tìm thấy người dùng'));
            }
        }
    }

    public function logout()
    {
        $this->request->getSession()->delete('Auth');
        return $this->redirect(['controller' => 'Teachers', 'action' => 'login']);
    }
}
