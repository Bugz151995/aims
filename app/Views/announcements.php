<?= $this->extend('layout') ?>

<?= $this->section('content') ?>

<header>
  <?= $this->include('components/sidebar') ?>
  <?= $this->include('components/topbar') ?>
</header>

<main id="content">
  <?= $this->include('components/breadcrumb') ?>

  <?php
  if (isset($_SESSION['validation'])) {
    $validation = $_SESSION['validation'];
  }
  ?>
  <div class="row mt-3 g-4">
    <div class="col-12 col-sm-4">
      <?= form_open('announcements/save', ['id' => 'createForm', 'class' => 'rounded rounded-3 p-4']) ?>
      <?= isset($sel_data) ? form_hidden('announcement_id', $sel_data['announcement_id'])  : null ?>
      <div class="mb-3">
        <h5><i class="fas fa-fw fa-file-signature "></i> <?= isset($sel_data) ? 'Edit' : 'Create' ?> Announcement Form</h5>
      </div>
      <hr>
      <div class="row">
        <div class="col mb-3">
          <label for="caption" class="form-label">Caption</label>
          <textarea name="caption" id="caption" cols="50" rows="10" class="form-control"><?= isset($sel_data) ? $sel_data['caption'] : null ?></textarea>
          <?= isset($validation) ? $validation->showError('caption', 'single') : null ?>
        </div>
      </div>
      <hr>
      <div class="d-flex justify-content-<?= isset($sel_data) ? 'between' : 'end' ?>">
        <?php if (isset($sel_data)) : ?>
          <a href="<?= base_url() ?>/announcements" class="btn btn-secondary"><i class="fas fa-fw fa-times"></i> Cancel</a>
        <?php endif ?>
        <button type="submit" class="btn btn-primary"><i class="fas fa-fw fa-save"></i> Save</button>
      </div>
      <?= form_close() ?>
    </div>

    <div class="col-12 col-sm-8">
      <table id="table" class="table table-borderless table-light table-striped">
        <thead>
          <tr>
            <th>#</th>
            <th>Caption</th>
            <th>Posted at</th>
            <th>Updated at</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($announcements as $key => $a) : ?>
            <tr>
              <td><?= ++$key ?></td>
              <td><?= $a['caption'] ?></td>
              <td><?= $a['created_at'] ?></td>
              <td><?= $a['updated_at'] ?></td>
              <td class="text-nowrap">
                <a href="<?= base_url() ?>/announcements/<?= $a['announcement_id'] ?>" class="btn btn-sm btn-primary btn-sm"><i class="fas fa-fw fa-edit"></i></a>

                <!-- Button trigger modal -->
                <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal<?= $a['announcement_id'] ?>">
                  <i class="fas fa-fw fa-trash-alt"></i>
                </button>

                <!-- Modal -->
                <div class="modal fade" id="deleteModal<?= $a['announcement_id'] ?>" tabindex="-1" aria-labelledby="deleteModal<?= $a['announcement_id'] ?>Label" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="deleteModal<?= $a['announcement_id'] ?>Label"><i class="fas fa-fw fa-trash-alt"></i> Delete Announcement</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <?= form_open('announcements/delete', null, ['announcement_id' => $a['announcement_id']]) ?>
                      <div class="modal-body">
                        <p class="text-wrap">Are you sure that you want to delete the announcement data created on <?= $a['created_at'] ?>?</p>
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
    </div>
  </div>
</main>

<?= $this->endSection() ?>