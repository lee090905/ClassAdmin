<?php
/**
 * Giao diện trang Dashboard
 */
$this->assign('title', 'Bảng điều khiển');
?>

<div class="dashboard-index content">
    <h3>Bảng điều khiển (Dashboard)</h3>
    <p>Xin chào Admin <strong><?= h($user->username) ?></strong>! Dưới đây là tổng quan hệ thống của bạn:</p>

    <div class="row" style="margin-top: 20px; text-align: center;">
        
        <div class="column column-33">
            <div style="background: #e3f2fd; padding: 20px; border-radius: 8px; border: 1px solid #90caf9;">
                <h2 style="margin: 0; color: #1565c0; font-size: 2.5rem;"><?= $totalTeachers ?></h2>
                <span style="color: #555; text-transform: uppercase; font-weight: bold;">Giáo viên</span>
            </div>
        </div>

        <div class="column column-33">
            <div style="background: #e8f5e9; padding: 20px; border-radius: 8px; border: 1px solid #a5d6a7;">
                <h2 style="margin: 0; color: #2e7d32; font-size: 2.5rem;"><?= $totalClasses ?></h2>
                <span style="color: #555; text-transform: uppercase; font-weight: bold;">Lớp học</span>
            </div>
        </div>

        <div class="column column-33">
            <div style="background: #fff3e0; padding: 20px; border-radius: 8px; border: 1px solid #ffcc80;">
                <h2 style="margin: 0; color: #e65100; font-size: 2.5rem;"><?= $totalStudents ?></h2>
                <span style="color: #555; text-transform: uppercase; font-weight: bold;">Học sinh</span>
            </div>
        </div>

    </div>
    
    <div style="margin-top: 40px;">
        <h4>Lối tắt (Quick Links)</h4>
        <ul>
            <li><a href="<?= $this->Url->build('/teachers/add') ?>">+ Thêm Giáo viên mới</a></li>
            <li><a href="<?= $this->Url->build('/schoolclasses/add') ?>">+ Tạo Lớp học mới</a></li>
            <li><a href="<?= $this->Url->build('/students/add') ?>">+ Tiếp nhận Học sinh mới</a></li>
        </ul>
    </div>
</div>