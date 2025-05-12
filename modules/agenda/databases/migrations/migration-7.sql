ALTER TABLE ag_kegiatan ADD COLUMN surat_id INT DEFAULT NULL;
ALTER TABLE ag_kegiatan ADD CONSTRAINT fk_ag_kegiatan_surat_id FOREIGN KEY (surat_id) REFERENCES ag_surat(id) ON DELETE RESTRICT;