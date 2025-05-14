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
        <div class="card mb-3">
            <div class="card-header d-flex flex-grow-1 align-items-center">
                <p class="h4 m-0">Detail Surat</p>
                <div class="right-button ms-auto">
                    <?php if(!$data->take_action && in_array($data->record_status,['DITERUSKAN','DITERIMA'])): ?>
                        <?php if(is_allowed(parsePath(routeTo('agenda/surat/forward')), auth()->id)): ?>
                        <button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#forwardModal">
                            Teruskan
                        </button>
                        <?php endif ?>
                        
                        <?php /*
                        <?php if(is_allowed(parsePath(routeTo('agenda/surat/attend')), auth()->id)): ?>
                        <button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#attendModal">
                            Hadiri
                        </button>
                        <?php endif ?> */ ?>

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
                    <label for="" class="fw-bold">Nomor Surat</label>
                    <p><?= $data->no_surat?></p>
                </div>
                <div class="form-group">
                    <label for="" class="fw-bold">Perihal</label>
                    <p><?= $data->perihal?></p>
                </div>
                <div class="form-group">
                    <label for="" class="fw-bold">Asal Surat</label>
                    <p><?= $data->asal?></p>
                </div>
                <div class="form-group">
                    <label for="" class="fw-bold">Tujuan Surat</label>
                    <p><?= $data->tujuan?></p>
                </div>
            </div>
        </div>

        <?php if(!hasRole(auth()->id, 'Admin')): ?>
        <div class="card">
            <div class="card-header d-flex flex-grow-1 align-items-center">
                <p class="h4 m-0">Catatan</p>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <tbody>
                            <?php foreach($data->notes as $note): ?>
                            <tr>
                                <td>[<?= date(app('datetime_format'), strtotime($note->created_at)) ?>] Catatan dari <?= $note->nama?> : <?=$note->deskripsi?></td>
                            </tr>
                            <?php endforeach ?>

                            <?php if(empty($data->notes)): ?>
                            <tr>
                                <td><i>Tidak ada catatan</i></td>
                            </tr>
                            <?php endif ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <?php endif ?>
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
                            <?php if(hasRole($data->created_by, 'Ajudan')): ?>
                            <tr>
                                <td>[<?= date(app('datetime_format'), strtotime($data->created_at)) ?>] Surat dibuat oleh <?=$data->creator_name?></td>
                            </tr>
                            <?php else: ?>
                            <tr>
                                <td>[<?= date(app('datetime_format'), strtotime($data->created_at)) ?>] Surat Masuk di terima oleh <?=$data->creator_name?></td>
                            </tr>
                            <?php endif ?>
                            <?php 
                            foreach($data->flow as $flow): 
                                $logs = json_decode($flow->logs);
                                foreach($logs as $log):
                                    $supportText = $log->status == 'Dihadiri' ? 'Oleh' : 'ke';
                            ?>
                            <tr>
                                <td>[<?= date(app('datetime_format'), strtotime($log->created_at)) ?>] <?= $log->status?> <?=$supportText?> <?=$log->jabatan?></td>
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
                    <?= \Core\Form::input('options-obj:ag_pejabat,id,jabatan', 'pejabat[]', ['class' => 'form-control select2insidemodal', 'placeholder' => 'Pilih Pejabat Pelaksana', 'multiple' => 'multiple']) ?>
                </div>
                <div class="form-group mb-3">
                    <label class="mb-2 w-100">Pejabat Pendamping</label>
                    <?= \Core\Form::input('options-obj:ag_pejabat,id,jabatan', 'pendamping[]', ['class' => 'form-control select2insidemodal', 'placeholder' => 'Pilih Pejabat Pendamping', 'multiple' => 'multiple']) ?>
                </div>
                <div class="form-group mb-3">
                    <label class="mb-2 w-100">Instruksi Disposisi</label>
                    <?= \Core\Form::input('checkbox:Dihadiri Bupati|Dihadiri Wakil Bupati|Dihadiri Sekdakab|Wakilkan/Hadiri|Untuk ditindaklanjuti|Untuk.dilaksanakan', 'instruksi[]', ['class' => 'form-control select2insidemodal']) ?>
                </div>
                <div class="form-group mb-3">
                    <label class="mb-2 w-100">Instruksi Tambahan</label>
                    <textarea name="deskripsi" id="" class="form-control"></textarea>
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

<div class="modal fade" id="forwardModal" tabindex="-1" aria-labelledby="itemModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="/agenda/surat/forward?id=<?=$data->id?>" method="post">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="itemModalLabel">Teruskan Pesan</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?=csrf_field()?>
                <div class="form-group mb-3">
                    <label class="mb-2 w-100">Penerima</label>
                    <select name="user_id" id="" class="form-control select2insidemodal2">
                        <?php foreach($receivers as $receiver): ?>
                            <option value="<?=$receiver->user_id?>"><?=$receiver->nama?></option>
                        <?php endforeach ?>
                    </select>
                </div>

                <?php if(hasRole(auth()->id, 'Asisten')): ?>
                <div class="form-group mb-3">
                    <label class="mb-2 w-100">Catatan</label>
                    <textarea name="catatan" id="" class="form-control"></textarea>
                </div>
                <?php endif ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="attendModal" tabindex="-1" aria-labelledby="itemModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="/agenda/surat/attend?id=<?=$data->id?>" method="post">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="itemModalLabel">Form Kegiatan</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?=csrf_field()?>
                <div class="form-group mb-3">
                    <label class="mb-2 w-100">Pejabat Pendamping</label>
                    <?= \Core\Form::input('options-obj:ag_pejabat,id,jabatan', 'pendamping[]', ['class' => 'form-control select2insidemodal3', 'placeholder' => 'Pilih Pejabat Pendamping', 'multiple' => 'nultiple']) ?>
                </div>
                <div class="form-group mb-3">
                    <label class="mb-2 w-100">Lokasi</label>
                    <input type="text" name="lokasi" class="form-control">
                </div>
                <div class="form-group mb-3">
                    <label class="mb-2 w-100">Tanggal</label>
                    <input type="datetime-local" name="tanggal" class="form-control">
                </div>
                <div class="form-group mb-3">
                    <label class="mb-2 w-100">Catatan</label>
                    <textarea name="instruksi" id="" class="form-control"></textarea>
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
