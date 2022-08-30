<?= $this->extend('layout') ?>

<?= $this->section('content') ?>

<header>
    <?= $this->include('components/sidebar') ?>
    <?= $this->include('components/topbar') ?>
</header>

<main id="content">
    <div class="mb-5">
        <?= $this->include('components/breadcrumb') ?>
    </div>

    <table id="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Comment</th>
                <th>Comment by</th>
                <th>Posted at</th>
                <th>Updated at</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($comments as $key => $comment) : ?>
                <tr>
                    <td><?= ++$key ?></td>
                    <td><?= $comment['comment'] ?></td>
                    <td><?= $comment['fname'] . ' ' . substr($comment['mname'], 0, 1) . '. ' . $comment['lname'] ?></td>
                    <td><?= $comment['created_at'] ?></td>
                    <td><?= $comment['updated_at'] ?></td>
                    <td>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal<?= $comment['forum_comment_id'] ?>">
                            <i class="fas fa-fw fa-trash-alt"></i>
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="deleteModal<?= $comment['forum_comment_id'] ?>" tabindex="-1" aria-labelledby="deleteModal<?= $comment['forum_comment_id'] ?>Label" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="deleteModal<?= $comment['forum_comment_id'] ?>Label"><i class="fas fa-fw fa-trash-alt"></i> Delete Forum Topic</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <?= form_open('forum_comments/delete', null, ['forum_comment_id' => $comment['forum_comment_id']]) ?>
                                    <div class="modal-body">
                                        <p class="text-wrap">Are you sure that you want this comment created on <?= $comment['created_at'] ?>?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fas fa-fw fa-times"></i> Cancel</button>
                                        <button type="submit" class="btn btn-danger"><i class="fas fa-fw fa-trash-alt"></i> Delete</button>
                                    </div>
                                    <?= form_close() ?>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</main>

<?= $this->endSection() ?>