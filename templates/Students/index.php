<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Student> $students
 */
?>
<div class="students index content">
    <?= $this->Html->link(__('New Student'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Students') ?></h3>
    <div class="search-bar" style="margin-bottom: 20px;">
        <?= $this->Form->create(null, ['type' => 'get', 'style' => 'display: flex; gap: 10px; align-items: center;']) ?>
        <?= $this->Form->control('keyword', [
            'label' => false,
            'placeholder' => 'Nhập từ khóa tìm kiếm...',
            'value' => $this->request->getQuery('keyword'), // Giữ lại từ khóa trên ô nhập khi load lại trang
            'style' => 'margin-bottom: 0; min-width: 300px;'
        ]) ?>
        <?= $this->Form->button(__('Tìm kiếm'), ['style' => 'margin-bottom: 0;']) ?>
        <?= $this->Html->link(__('Hủy'), ['action' => 'index'], ['class' => 'button button-outline', 'style' => 'margin-bottom: 0;']) ?>
        <?= $this->Form->end() ?>
    </div>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('username', 'Tên học sinh') ?></th>
                    <th><?= $this->Paginator->sort('age', 'Tuổi') ?></th>
                    <th><?= $this->Paginator->sort('school_class_id', 'Lớp học') ?></th>
                    <th><?= $this->Paginator->sort('address', 'Địa chỉ') ?></th>
                    <th><?= $this->Paginator->sort('phone_number', 'Số điện thoại') ?></th>
                    <th><?= $this->Paginator->sort('email', 'Email') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($students as $student): ?>
                <tr>
                    <td><?= $this->Number->format($student->id) ?></td>
                    <td><?= h($student->username) ?></td>
                    <td><?= $this->Number->format($student->age) ?></td>
                    
                    <td><?= $student->has('school_class') ? h($student->school_class->name) : 'Chưa có lớp' ?></td>
                    
                    <td><?= h($student->address) ?></td>
                    <td><?= h($student->phone_number) ?></td>
                    <td><?= h($student->email) ?></td>
                    
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $student->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $student->id]) ?>
                        <?= $this->Form->postLink(
                            __('Delete'),
                            ['action' => 'delete', $student->id],
                            ['confirm' => __('Are you sure you want to delete # {0}?', $student->id)]
                        ) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>