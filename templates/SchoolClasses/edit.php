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
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $schoolClass->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $schoolClass->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List School Classes'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="schoolClasses form content">
            <?= $this->Form->create($schoolClass) ?>
            <fieldset>
                <legend><?= __('Edit School Class') ?></legend>
                <?php
                    echo $this->Form->control('name');
                    echo $this->Form->control('teacher');
                    echo $this->Form->control('quantity_student');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
