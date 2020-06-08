<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Role $role
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Role'), ['action' => 'edit', $role->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Role'), ['action' => 'delete', $role->id], ['confirm' => __('Are you sure you want to delete # {0}?', $role->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Roles'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Role'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="roles view content">
            <h3><?= h($role->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($role->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($role->id) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Administrators') ?></h4>
                <?php if (!empty($role->administrators)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Username') ?></th>
                            <th><?= __('Password') ?></th>
                            <th><?= __('Firstname') ?></th>
                            <th><?= __('Lastname') ?></th>
                            <th><?= __('Picture') ?></th>
                            <th><?= __('Slug Name') ?></th>
                            <th><?= __('Date Created') ?></th>
                            <th><?= __('Date Modified') ?></th>
                            <th><?= __('Role Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($role->administrators as $administrators) : ?>
                        <tr>
                            <td><?= h($administrators->id) ?></td>
                            <td><?= h($administrators->username) ?></td>
                            <td><?= h($administrators->password) ?></td>
                            <td><?= h($administrators->firstname) ?></td>
                            <td><?= h($administrators->lastname) ?></td>
                            <td><?= h($administrators->picture) ?></td>
                            <td><?= h($administrators->slug_name) ?></td>
                            <td><?= h($administrators->date_created) ?></td>
                            <td><?= h($administrators->date_modified) ?></td>
                            <td><?= h($administrators->role_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Administrators', 'action' => 'view', $administrators->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Administrators', 'action' => 'edit', $administrators->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Administrators', 'action' => 'delete', $administrators->id], ['confirm' => __('Are you sure you want to delete # {0}?', $administrators->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
