<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProfileFieldsUser[]|\Cake\Collection\CollectionInterface $profileFieldsUsers
 */
?>
<?php $this->extend('/layout/TwitterBootstrap/dashboard'); ?>

<?php $this->start('tb_actions'); ?>
<li><?= $this->Html->link(__('New Profile Fields User'), ['action' => 'add'], ['class' => 'nav-link']) ?></li>
<li><?= $this->Html->link(__('List Profile Fields'), ['controller' => 'ProfileFields', 'action' => 'index'], ['class' => 'nav-link']) ?></li>
<li><?= $this->Html->link(__('New Profile Field'), ['controller' => 'ProfileFields', 'action' => 'add'], ['class' => 'nav-link']) ?></li>
<li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index'], ['class' => 'nav-link']) ?></li>
<li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add'], ['class' => 'nav-link']) ?></li>
<?php $this->end(); ?>
<?php $this->assign('tb_sidebar', '<ul class="nav flex-column">' . $this->fetch('tb_actions') . '</ul>'); ?>

<table class="table table-striped">
    <thead>
    <tr>
        <th scope="col"><?= $this->Paginator->sort('id') ?></th>
        <th scope="col"><?= $this->Paginator->sort('profile_field_id') ?></th>
        <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
        <th scope="col"><?= $this->Paginator->sort('val') ?></th>
        <th scope="col" class="actions"><?= __('Actions') ?></th>
    </tr>
    </thead>
    <tbody>
        <?php foreach ($profileFieldsUsers as $profileFieldsUser) : ?>
        <tr>
            <td><?= $this->Number->format($profileFieldsUser->id) ?></td>
            <td><?= $profileFieldsUser->has('profile_field') ? $this->Html->link($profileFieldsUser->profile_field->name, ['controller' => 'ProfileFields', 'action' => 'view', $profileFieldsUser->profile_field->id]) : '' ?></td>
            <td><?= $profileFieldsUser->has('user') ? $this->Html->link($profileFieldsUser->user->id, ['controller' => 'Users', 'action' => 'view', $profileFieldsUser->user->id]) : '' ?></td>
            <td><?= h($profileFieldsUser->val) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $profileFieldsUser->id], ['title' => __('View'), 'class' => 'btn btn-secondary']) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $profileFieldsUser->id], ['title' => __('Edit'), 'class' => 'btn btn-secondary']) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $profileFieldsUser->id], ['confirm' => __('Are you sure you want to delete # {0}?', $profileFieldsUser->id), 'title' => __('Delete'), 'class' => 'btn btn-danger']) ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<div class="paginator">
    <ul class="pagination">
        <?= $this->Paginator->first('<< ' . __('First')) ?>
        <?= $this->Paginator->prev('< ' . __('Previous')) ?>
        <?= $this->Paginator->numbers(['before' => '', 'after' => '']) ?>
        <?= $this->Paginator->next(__('Next') . ' >') ?>
        <?= $this->Paginator->last(__('Last') . ' >>') ?>
    </ul>
    <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
</div>
