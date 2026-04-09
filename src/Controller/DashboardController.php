<?php
declare(strict_types=1);

namespace App\Controller;

class DashboardController extends AppController
{
    public function index()
    {
        // 1. Kiểm tra xem user đã đăng nhập chưa (bảo vệ trang admin)
        $user = $this->request->getSession()->read('Auth');
        if (!$user) {
            $this->Flash->error('Bạn cần đăng nhập để truy cập trang này.');
            return $this->redirect(['controller' => 'Teachers', 'action' => 'login']);
        }
        $totalTeachers = $this->fetchTable('Teachers')->find()->count();
        $totalClasses = $this->fetchTable('SchoolClasses')->find()->count();
        $totalStudents = $this->fetchTable('Students')->find()->count();

        // 3. Gửi dữ liệu ra ngoài View (Template)
        $this->set(compact('totalTeachers', 'totalClasses', 'totalStudents', 'user'));
    }
}