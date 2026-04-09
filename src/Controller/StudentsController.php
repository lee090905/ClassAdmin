<?php
declare(strict_types=1);

namespace App\Controller;

class StudentsController extends AppController
{
    public function index()
    {
        // 1. Lấy từ khóa từ thanh địa chỉ (URL)
        $keyword = $this->request->getQuery('keyword');
        
        // 2. Tạo câu truy vấn cơ bản
        $query = $this->fetchTable('Students')->find()->contain(['SchoolClasses']);

        // 3. Nếu người dùng có nhập từ khóa -> Thêm điều kiện lọc
        if (!empty($keyword)) {
            $query->where([
                'OR' => [
                    'Students.username LIKE' => '%' . $keyword . '%',
                    'Students.email LIKE' => '%' . $keyword . '%',
                    // Nếu cột sđt của bạn là kiểu chuỗi (VARCHAR) thì mới dùng LIKE được nhé
                    'Students.phone_number LIKE' => '%' . $keyword . '%' 
                ]
            ]);
        }

        // 4. Phân trang kết quả
        $students = $this->paginate($query);
        $this->set(compact('students'));
    }

    public function view($id = null)
    {
        $student = $this->fetchTable('Students')->get($id, contain: []);
        $this->set(compact('student'));
    }

    public function add()
    {
        // 1. Dùng fetchTable thay vì $this->Students
        $studentsTable = $this->fetchTable('Students');
        $student = $studentsTable->newEmptyEntity();

        if ($this->request->is('post')) {
            $student = $studentsTable->patchEntity($student, $this->request->getData());

            if ($studentsTable->save($student)) {
                $this->Flash->success(__('Đã thêm học sinh thành công.'));
                return $this->redirect(['action' => 'index']);
            }
            debug($student->getErrors());
            $this->Flash->error(__('Có lỗi xảy ra. Vui lòng thử lại.'));
        }

        // 👉 load danh sách class cho select
        $schoolClasses = $this->fetchTable('SchoolClasses')->find('list');

        $this->set(compact('student', 'schoolClasses'));
    }   

    public function edit($id = null)
    {
        $studentsTable = $this->fetchTable('Students');
        $student = $studentsTable->get($id);
        
        if ($this->request->is(['patch', 'post', 'put'])) {
            $student = $studentsTable->patchEntity($student, $this->request->getData());
            
            if ($studentsTable->save($student)) {
                // Đã XÓA đoạn code tính toán cộng trừ lớp cũ/lớp mới
                $this->Flash->success(__('Đã cập nhật thành công.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Có lỗi xảy ra. Vui lòng thử lại.'));
        }
        
        $schoolClasses = $this->fetchTable('SchoolClasses')->find('list');
        $this->set(compact('student', 'schoolClasses'));
    }
    
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);

        $studentsTable = $this->fetchTable('Students');
        $student = $studentsTable->get($id);

        if ($studentsTable->delete($student)) {
            $this->Flash->success(__('Đã xóa học sinh.'));
        } else {
            $this->Flash->error(__('Không thể xóa.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}