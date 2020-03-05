<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProfileFieldsUser $profileFieldsUser
 */
?>
<?php $this->extend('/layout/TwitterBootstrap/dashboard'); ?>

<?php $this->start('tb_actions'); ?>
<li><?= $this->Html->link(__('Edit Profile Fields User'), ['action' => 'edit', $profileFieldsUser->id], ['class' => 'nav-link']) ?></li>
<li><?= $this->Form->postLink(__('Delete Profile Fields User'), ['action' => 'delete', $profileFieldsUser->id], ['confirm' => __('Are you sure you want to delete # {0}?', $profileFieldsUser->id), 'class' => 'nav-link']) ?></li>
<li><?= $this->Html->link(__('List Profile Fields Users'), ['action' => 'index'], ['class' => 'nav-link']) ?> </li>
<li><?= $this->Html->link(__('New Profile Fields User'), ['action' => 'add'], ['class' => 'nav-link']) ?> </li>
<li><?= $this->Html->link(__('List Profile Fields'), ['controller' => 'ProfileFields', 'action' => 'index'], ['class' => 'nav-link']) ?></li>
<li><?= $this->Html->link(__('New Profile Field'), ['controller' => 'ProfileFields', 'action' => 'add'], ['class' => 'nav-link']) ?></li>
<li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index'], ['class' => 'nav-link']) ?></li>
<li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add'], ['class' => 'nav-link']) ?></li>
<?php $this->end(); ?>
<?php $this->assign('tb_sidebar', '<ul class="nav flex-column">' . $this->fetch('tb_actions') . '</ul>'); ?>

<div class="profileFieldsUsers view large-9 medium-8 columns content">
    <h3><?= h($profileFieldsUser->id) ?></h3>
    <div class="table-responsive">
        <table class="table table-striped">
            <tr>
                <th scope="row"><?= __('Profile Field') ?></th>
                <td><?= $profileFieldsUser->has('profile_field') ? $this->Html->link($profileFieldsUser->profile_field->name, ['controller' => 'ProfileFields', 'action' => 'view', $profileFieldsUser->profile_field->id]) : '' ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('User') ?></th>
                <td><?= $profileFieldsUser->has('user') ? $this->Html->link($profileFieldsUser->user->id, ['controller' => 'Users', 'action' => 'view', $profileFieldsUser->user->id]) : '' ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Val') ?></th>
                <td><?= h($profileFieldsUser->val) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Id') ?></th>
                <td><?= $this->Number->format($profileFieldsUser->id) ?></td>
            </tr>
        </table>
    </div>
</div>
