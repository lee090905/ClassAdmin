<?php
declare(strict_types=1);

namespace App\Controller;

class SchoolClassesController extends AppController
{
    public function index()
    {
        // Lấy danh sách lớp học kèm theo thông tin Giáo viên
        $schoolClasses = $this->paginate(
            $this->fetchTable('SchoolClasses')->find()->contain(['Teachers'])
        );

        $this->set(compact('schoolClasses'));
    }

    public function view($id = null)
    {
        $schoolClass = $this->fetchTable('SchoolClasses')->get($id, [
            'contain' => ['Students', 'Teachers']
        ]);
        
        $this->set(compact('schoolClass'));
    }

    public function add()
    {
        $schoolClassesTable = $this->fetchTable('SchoolClasses');
        $schoolClass = $schoolClassesTable->newEmptyEntity();

        if ($this->request->is('post')) {
            $schoolClass = $schoolClassesTable->patchEntity($schoolClass, $this->request->getData());

            if ($schoolClassesTable->save($schoolClass)) {
                $this->Flash->success(__('Đã lưu lớp học thành công.'));
                return $this->redirect(['action' => 'index']);
            }

            $this->Flash->error(__('Có lỗi xảy ra. Vui lòng thử lại.'));
        }

        // 👉 Load danh sách Giáo viên để đưa vào thẻ Select Dropdown
        $teachers = $this->fetchTable('Teachers')->find('list');

        $this->set(compact('schoolClass', 'teachers'));
    }   

    public function edit($id = null)
    {
        $schoolClassesTable = $this->fetchTable('SchoolClasses');
        $schoolClass = $schoolClassesTable->get($id);
        
        if ($this->request->is(['patch', 'post', 'put'])) {
            $schoolClass = $schoolClassesTable->patchEntity($schoolClass, $this->request->getData());
            
            if ($schoolClassesTable->save($schoolClass)) {
                $this->Flash->success(__('Đã cập nhật lớp học thành công.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Có lỗi xảy ra. Vui lòng thử lại.'));
        }
        
        // 👉 Load danh sách Giáo viên
        $teachers = $this->fetchTable('Teachers')->find('list');
        
        $this->set(compact('schoolClass', 'teachers'));
    }
    
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);

        $schoolClassesTable = $this->fetchTable('SchoolClasses');
        $schoolClass = $schoolClassesTable->get($id);

        if ($schoolClassesTable->delete($schoolClass)) {
            $this->Flash->success(__('Đã xóa lớp học.'));
        } else {
            $this->Flash->error(__('Không thể xóa lớp học này.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}