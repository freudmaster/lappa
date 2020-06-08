<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Users'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New User'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="users view content">
            <h3><?= h($user->username) ?></h3>
            <table>
                <tr>
                    <th><?= __('Username') ?></th>
                    <td><?= h($user->username) ?></td>
                </tr>
                <tr>
                    <th><?= __('Password') ?></th>
                    <td><?= h($user->password) ?></td>
                </tr>
                <tr>
                    <th><?= __('Email') ?></th>
                    <td><?= h($user->email) ?></td>
                </tr>
                <tr>
                    <th><?= __('Token') ?></th>
                    <td><?= h($user->token) ?></td>
                </tr>
                <tr>
                    <th><?= __('Language') ?></th>
                    <td><?= $user->has('language') ? $this->Html->link($user->language->name, ['controller' => 'Languages', 'action' => 'view', $user->language->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Level') ?></th>
                    <td><?= $user->has('level') ? $this->Html->link($user->level->name, ['controller' => 'Levels', 'action' => 'view', $user->level->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($user->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Date Created') ?></th>
                    <td><?= h($user->date_created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Date Modified') ?></th>
                    <td><?= h($user->date_modified) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Favories') ?></h4>
                <?php if (!empty($user->favories)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th><?= __('Mot Id') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th><?= __('Activate') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($user->favories as $favories) : ?>
                        <tr>
                            <td><?= h($favories->id) ?></td>
                            <td><?= h($favories->user_id) ?></td>
                            <td><?= h($favories->mot_id) ?></td>
                            <td><?= h($favories->created) ?></td>
                            <td><?= h($favories->modified) ?></td>
                            <td><?= h($favories->activate) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Favories', 'action' => 'view', $favories->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Favories', 'action' => 'edit', $favories->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Favories', 'action' => 'delete', $favories->id], ['confirm' => __('Are you sure you want to delete # {0}?', $favories->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related User Languages') ?></h4>
                <?php if (!empty($user->user_languages)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Language Id') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($user->user_languages as $userLanguages) : ?>
                        <tr>
                            <td><?= h($userLanguages->id) ?></td>
                            <td><?= h($userLanguages->Language_id) ?></td>
                            <td><?= h($userLanguages->user_id) ?></td>
                            <td><?= h($userLanguages->created) ?></td>
                            <td><?= h($userLanguages->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'UserLanguages', 'action' => 'view', $userLanguages->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'UserLanguages', 'action' => 'edit', $userLanguages->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'UserLanguages', 'action' => 'delete', $userLanguages->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userLanguages->id)]) ?>
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
