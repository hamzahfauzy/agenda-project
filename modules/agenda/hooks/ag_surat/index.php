<?php
$user = auth();
$having = "";

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

if(hasRole($user->id, 'Ajudan'))
{
    $where = (empty($where) ? 'WHERE ' : $where . ' AND ') . ' ag_surat.created_by = '.$user->id.' ';
}

$where = $where ." ". $having;

$this->db->query = "SELECT $this->table.*,
                            ag_kegiatan.tanggal tanggal_kegiatan FROM $this->table LEFT JOIN ag_kegiatan ON ag_kegiatan.surat_id = $this->table.id $where ";

if(!in_array(get_role($user->id)->name, ['Admin','Super Admin']) && !hasRole($user->id, 'Ajudan'))
{
    $this->db->query = "SELECT 
                            $this->table.*,
                            ag_kegiatan.tanggal tanggal_kegiatan
                        FROM $this->table 
                        LEFT JOIN ag_kegiatan ON ag_kegiatan.surat_id = $this->table.id
                        JOIN ag_surat_flow ON 
                            ag_surat_flow.surat_id = $this->table.id AND 
                            ag_surat_flow.user_id = $user->id 
                        $where ";
}

$total = $this->db->exec('exists');

$this->db->query .= "ORDER BY CASE 
    WHEN tanggal_kegiatan >= CURDATE() THEN 0
    ELSE 1
  END,
  ABS(DATEDIFF(tanggal_kegiatan, CURDATE())) LIMIT $start,$length";
$data  = $this->db->exec('all');


return compact('data','total');