CREATE TABLE ag_catatan_surat (
    id INT AUTO_INCREMENT PRIMARY KEY,
    surat_id INT NOT NULL,
    deskripsi TEXT DEFAULT NULL,

    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
    created_by INT DEFAULT NULL,
    updated_by INT DEFAULT NULL,

    CONSTRAINT fk_ag_catatan_surat_surat_id FOREIGN KEY (surat_id) REFERENCES ag_surat(id) ON DELETE RESTRICT,
    CONSTRAINT fk_ag_catatan_surat_created_by FOREIGN KEY (created_by) REFERENCES users(id) ON DELETE RESTRICT,
    CONSTRAINT fk_ag_catatan_surat_updated_by FOREIGN KEY (updated_by) REFERENCES users(id) ON DELETE RESTRICT
);