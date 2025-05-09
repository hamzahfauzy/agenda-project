<?php

$having = "";

$user = auth();

if(!in_array(get_role($user->id)->name,['Admin','Super Admin']) && !hasRole($user_id, 'Ajudan'))
{
    $pejabat = $this->db->single('ag_pejabat', ['user_id' => $user->id]);
    $where .= (empty($where) ? ' WHERE ' : ' AND ') . "($pejabat->id IN (SELECT ag_pendamping_kegiatan.pejabat_id FROM ag_pendamping_kegiatan WHERE ag_pendamping_kegiatan.kegiatan_id = ag_kegiatan.id) OR ag_kegiatan.pejabat_id = $pejabat->id OR ag_kegiatan.created_by = $user->id)";
}

if($filter)
{
    $filter_query = [];
    foreach($filter as $f_key => $f_value)
    {
        $filter_query[] = "$f_key = '$f_value'";
    }

    $filter_query = implode(' AND ', $filter_query);

    $having = (empty($having) ? 'HAVING ' : ' AND ') . $filter_query;
}

$this->db->query = "SELECT 
                $this->table.id,
                $this->table.nama,
                $this->table.tanggal,
                $this->table.lokasi,
                $this->table.deskripsi,
                $this->table.instruksi,
                $this->table.pejabat_id,
                GROUP_CONCAT(pejabat.jabatan SEPARATOR ', ') AS pendamping,
                $this->table.created_at,
                $this->table.updated_at,
                $this->table.created_by,
                $this->table.updated_by
            FROM $this->table 
            LEFT JOIN ag_pendamping_kegiatan ON ag_pendamping_kegiatan.kegiatan_id = $this->table.id 
            LEFT JOIN ag_pejabat pejabat ON ag_pendamping_kegiatan.pejabat_id = pejabat.id 
            $where
            GROUP BY $this->table.id 
            $having ";
$total = $this->db->exec('exists');

$this->db->query .= "ORDER BY ".$col_order." ".$order[0]['dir']." LIMIT $start,$length";
$data  = $this->db->exec('all');


return compact('data','total');