<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\SchoolClass> $schoolClasses
 */
?>
<div class="schoolClasses index content">
    <?= $this->Html->link(__('New School Class'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('School Classes') ?></h3>
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
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('teacher') ?></th>
                    <th><?= $this->Paginator->sort('quantity_student') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($schoolClasses as $schoolClass): ?>
                <tr>
                    <td><?= $this->Number->format($schoolClass->id) ?></td>
                    <td><?= h($schoolClass->name) ?></td>
                    <td><?= $schoolClass->has('teacher') ? h($schoolClass->teacher->username) : '' ?></td>
                    <td><?= $this->Number->format($schoolClass->student_count ?? 0) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $schoolClass->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $schoolClass->id]) ?>
                        <?= $this->Form->postLink(
                            __('Delete'),
                            ['action' => 'delete', $schoolClass->id],
                            [
                                'method' => 'delete',
                                'confirm' => __('Are you sure you want to delete # {0}?', $schoolClass->id),
                            ]
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