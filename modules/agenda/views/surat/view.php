<?php get_header() ?>
<style>
.select2 {
    width: 100% !important
}
</style>
<div class="row">
    <div class="col-12 col-md-8">
        <iframe src="<?=asset($data->file_url)?>" frameborder="0" width="100%" height="580px"></iframe>
    </div>
    <div class="col-12 col-md-4">
        <div class="card">
            <div class="card-header d-flex flex-grow-1 align-items-center">
                <p class="h4 m-0">Detail Surat</p>
                <div class="right-button ms-auto">
                    <?php if(!$data->take_action): ?>
                        <?php if(is_allowed(parsePath(routeTo('agenda/surat/forward')), auth()->id)): ?>
                        <a href="<?= routeTo('agenda/surat/forward', ['id' => $data->id]) ?>" class="btn btn-info btn-sm">
                            Teruskan
                        </a>
                        <?php endif ?>
                        <?php if(is_allowed(parsePath(routeTo('agenda/surat/disposisi')), auth()->id)): ?>
                        <button class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#itemModal">
                            Disposisi
                        </button>
                        <?php endif ?>
                    <?php endif ?>
                    <a href="<?= crudRoute('crud/index', $tableName) ?>" class="btn btn-warning btn-sm">
                        <?= __('crud.label.back') ?>
                    </a>
                </div>
            </div>
            <div class="card-body">
                <?php if ($success_msg) : ?>
                <div class="alert alert-success"><?= $success_msg ?></div>
                <?php endif ?>
                <?php if ($error_msg) : ?>
                <div class="alert alert-danger"><?= $error_msg ?></div>
                <?php endif ?>
                <div class="form-group">
                    <label for="">Nomor Surat</label>
                    <p><?= $data->no_surat?></p>
                </div>
                <div class="form-group">
                    <label for="">Perihal</label>
                    <p><?= $data->perihal?></p>
                </div>
                <div class="form-group">
                    <label for="">Asal Surat</label>
                    <p><?= $data->asal?></p>
                </div>
                <div class="form-group">
                    <label for="">Tujuan Surat</label>
                    <p><?= $data->tujuan?></p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row mt-4">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex flex-grow-1 align-items-center">
                <p class="h4 m-0">Log</p>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <tbody>
                            <tr>
                                <td>[<?= date(app('datetime_format'), strtotime($data->created_at)) ?>] Surat Masuk di terima oleh <?=$data->creator_name?></td>
                            </tr>
                            <?php 
                            foreach($data->flow as $flow): 
                                $logs = json_decode($flow->logs);
                                foreach($logs as $log):
                            ?>
                            <tr>
                                <td>[<?= date(app('datetime_format'), strtotime($log->created_at)) ?>] <?= $log->status?> ke <?=$log->jabatan?></td>
                            </tr>
                            <?php endforeach ?>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="itemModal" tabindex="-1" aria-labelledby="itemModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="/agenda/surat/disposisi?id=<?=$data->id?>" method="post">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="itemModalLabel">Form Disposisi</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?=csrf_field()?>
                <div class="form-group mb-3">
                    <label class="mb-2 w-100">Pejabat Pelaksana</label>
                    <?= \Core\Form::input('options-obj:ag_pejabat,id,jabatan', 'pejabat_id', ['class' => 'form-control select2insidemodal', 'placeholder' => 'Pilih Pejabat Pelaksana']) ?>
                </div>
                <div class="form-group mb-3">
                    <label class="mb-2 w-100">Pejabat Pendamping</label>
                    <?= \Core\Form::input('options-obj:ag_pejabat,id,jabatan', 'pendamping[]', ['class' => 'form-control select2insidemodal', 'placeholder' => 'Pilih Pejabat Pendamping', 'multiple' => 'nultiple']) ?>
                </div>
                <div class="form-group mb-3">
                    <label class="mb-2 w-100">Lokasi</label>
                    <input type="text" name="lokasi" class="form-control">
                </div>
                <div class="form-group mb-3">
                    <label class="mb-2 w-100">Tanggal</label>
                    <input type="datetime-local" name="tanggal" class="form-control">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>


<?php get_footer() ?>
