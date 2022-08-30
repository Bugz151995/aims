<?= $this->extend('layout') ?>

<?= $this->section('content') ?>

<header>
  <?= $this->include('components/sidebar') ?>
  <?= $this->include('components/topbar') ?>
</header>

<main id="content">
  <div class="d-flex mb-5">
    <?= $this->include('components/breadcrumb') ?>
  </div>

  <table id="table" class="table table-borderless table-light table-striped">
    <thead>
      <tr>
        <th>#</th>
        <th>Topic</th>
        <th>Posted by</th>
        <th>Posted at</th>
        <th>Updated at</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($topics as $key => $t) : ?>
        <tr>
          <td><?= ++$key ?></td>
          <td><?= $t['topic'] ?></td>
          <td><?= $t['fname'] . ' ' . $t['mname'] . ' ' . $t['lname'] ?></td>
          <td><?= $t['created_at'] ?></td>
          <td><?= $t['updated_at'] ?></td>
          <td>
            <a href="<?= base_url() ?>/forum_comments/<?= $t['forum_id'] ?>" class="btn btn-primary btn-sm"><i class="fas fa-fw fa-arrow-right"></i></a>

            <!-- Button trigger modal -->
            <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal<?= $t['forum_id'] ?>">
              <i class="fas fa-fw fa-trash-alt"></i>
            </button>

            <!-- Modal -->
            <div class="modal fade" id="deleteModal<?= $t['forum_id'] ?>" tabindex="-1" aria-labelledby="deleteModal<?= $t['forum_id'] ?>Label" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="deleteModal<?= $t['forum_id'] ?>Label"><i class="fas fa-fw fa-trash-alt"></i> Delete Forum Topic</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <?= form_open('forum/delete', null, ['forum_id' => $t['forum_id']]) ?>
                  <div class="modal-body">
                    <p class="text-wrap">Are you sure that you want this topic created on <?= $t['created_at'] ?>?</p>
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