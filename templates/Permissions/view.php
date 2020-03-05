<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Permission $permission
 */
?>
<?php $this->extend('/layout/TwitterBootstrap/dashboard'); ?>

<?php $this->start('tb_actions'); ?>
<li><?= $this->Html->link(__('Edit Permission'), ['action' => 'edit', $permission->id], ['class' => 'nav-link']) ?></li>
<li><?= $this->Form->postLink(__('Delete Permission'), ['action' => 'delete', $permission->id], ['confirm' => __('Are you sure you want to delete # {0}?', $permission->id), 'class' => 'nav-link']) ?></li>
<li><?= $this->Html->link(__('List Permissions'), ['action' => 'index'], ['class' => 'nav-link']) ?> </li>
<li><?= $this->Html->link(__('New Permission'), ['action' => 'add'], ['class' => 'nav-link']) ?> </li>
<li><?= $this->Html->link(__('List Groups'), ['controller' => 'Groups', 'action' => 'index'], ['class' => 'nav-link']) ?></li>
<li><?= $this->Html->link(__('New Group'), ['controller' => 'Groups', 'action' => 'add'], ['class' => 'nav-link']) ?></li>
<?php $this->end(); ?>
<?php $this->assign('tb_sidebar', '<ul class="nav flex-column">' . $this->fetch('tb_actions') . '</ul>'); ?>

<div class="permissions view large-9 medium-8 columns content">
    <h3><?= h($permission->id) ?></h3>
    <div class="table-responsive">
        <table class="table table-striped">
            <tr>
                <th scope="row"><?= __('Controller') ?></th>
                <td><?= h($permission->controller) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Action') ?></th>
                <td><?= h($permission->action) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Group') ?></th>
                <td><?= $permission->has('group') ? $this->Html->link($permission->group->name, ['controller' => 'Groups', 'action' => 'view', $permission->group->id]) : '' ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Id') ?></th>
                <td><?= $this->Number->format($permission->id) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Created') ?></th>
                <td><?= h($permission->created) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Modified') ?></th>
                <td><?= h($permission->modified) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Permission') ?></th>
                <td><?= $permission->permission ? __('Yes') : __('No'); ?></td>
            </tr>
        </table>
    </div>
</div>
