<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProfileFieldsUser $profileFieldsUser
 * @var \App\Model\Entity\ProfileField[]|\Cake\Collection\CollectionInterface $profileFields
 * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $users
 */
?>
<?php $this->extend('/layout/TwitterBootstrap/dashboard'); ?>

<?php $this->start('tb_actions'); ?>
<li><?= $this->Html->link(__('List Profile Fields Users'), ['action' => 'index'], ['class' => 'nav-link']) ?></li>
<li><?= $this->Html->link(__('List Profile Fields'), ['controller' => 'ProfileFields', 'action' => 'index'], ['class' => 'nav-link']) ?></li>
<li><?= $this->Html->link(__('New Profile Field'), ['controller' => 'ProfileFields', 'action' => 'add'], ['class' => 'nav-link']) ?></li>
<li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index'], ['class' => 'nav-link']) ?></li>
<li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add'], ['class' => 'nav-link']) ?></li>
<?php $this->end(); ?>
<?php $this->assign('tb_sidebar', '<ul class="nav flex-column">' . $this->fetch('tb_actions') . '</ul>'); ?>

<div class="profileFieldsUsers form content">
    <?= $this->Form->create($profileFieldsUser) ?>
    <fieldset>
        <legend><?= __('Add Profile Fields User') ?></legend>
        <?php
            echo $this->Form->control('profile_field_id', ['options' => $profileFields]);
            echo $this->Form->control('user_id', ['options' => $users]);
            echo $this->Form->control('val');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
