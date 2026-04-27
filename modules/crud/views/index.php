<?php get_header() ?>
<style>
table td img {
    max-width:150px;
}
table.table td, table.table th {
    white-space:pre-wrap;
}
table.table tr.upcomming td {
    background-color:#FFF;
}

table.table tr td {
    white-space: nowrap;
}

/* table.table tr.overdue td { */
    /* background-color:rgba(162, 230, 159, 0.85); */
    /* color: #FFF; */
/* } */
</style>
<div class="card border border-slate rounded-3 shadow-sm-custom mb-4 overflow-hidden">
    <div class="card-header bg-white border-bottom border-slate p-4 d-flex flex-grow-1 align-items-center">
        <h3 class="fs-5 fw-bold text-slate-800 mb-0"><?php get_title() ?></h3>

        <div class="right-button ms-auto">
            <?= $crudRepository->additionalButtonBeforeCreate() ?>
            <?php if(is_allowed(parsePath(routeTo('crud/create', ['table'=>$tableName])), auth()->id)): ?>
            <a href="<?= crudRoute('crud/create', $tableName) ?>" class="btn btn-success btn-sm">
                <i class="fa-solid fa-plus"></i> <?= __('crud.label.create') ?>
            </a>
            <?php endif ?>
            <?= $crudRepository->additionalButtonAfterCreate() ?>
        </div>
    </div>

    <div class="card-body">
        <?php if ($success_msg) : ?>
        <div class="alert alert-success"><?= $success_msg ?></div>
        <?php endif ?>
        <?php if ($error_msg) : ?>
        <div class="alert alert-danger"><?= $error_msg ?></div>
        <?php endif ?>
        <div>
            <table class="table datatable-crud table-hover text-nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th width="20px">#</th>
                        <?php 
                        $isActionButton = false;
                        foreach($fields as $field): 
                            $label = $field;
                            if(is_array($field))
                            {
                                $label = $field['label'];
                            }
                            if($label == '_action_button')
                            {
                                $isActionButton = true;
                            }
                            $label = $label == '_action_button' ? __('crud.label.action_button') : _ucwords($label);
                        ?>
                        <th class="text-nowrap"><?=$label?></th>
                        <?php endforeach ?>
                        <?php if(!$isActionButton): ?>
                        <th class="text-right">
                        </th>
                        <?php endif ?>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>
<?php get_footer() ?>
