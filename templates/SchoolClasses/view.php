<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SchoolClass $schoolClass
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit School Class'), ['action' => 'edit', $schoolClass->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete School Class'), ['action' => 'delete', $schoolClass->id], ['confirm' => __('Are you sure you want to delete # {0}?', $schoolClass->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List School Classes'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New School Class'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="schoolClasses view content">
            <h3><?= h($schoolClass->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($schoolClass->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($schoolClass->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Teacher') ?></th>
                    <td><?= $schoolClass->has('teacher') ? h($schoolClass->teacher->username) : '' ?></td>                </tr>
                <tr>
                    <th><?= __('Quantity Student') ?></th>
                    <td><?= $this->Number->format($schoolClass->student_count ?? 0) ?> Học sinh</td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($schoolClass->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($schoolClass->modified) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>