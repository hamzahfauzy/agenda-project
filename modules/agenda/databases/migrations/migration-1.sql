CREATE TABLE ag_pejabat (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    nama VARCHAR(200) NOT NULL,
    jabatan VARCHAR(100) NOT NULL,

    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
    created_by INT DEFAULT NULL,
    updated_by INT DEFAULT NULL,

    CONSTRAINT fk_ag_pejabat_user_id FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE RESTRICT,
    CONSTRAINT fk_ag_pejabat_created_by FOREIGN KEY (created_by) REFERENCES users(id) ON DELETE RESTRICT,
    CONSTRAINT fk_ag_pejabat_updated_by FOREIGN KEY (updated_by) REFERENCES users(id) ON DELETE RESTRICT
);

CREATE TABLE ag_kegiatan (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(200) NOT NULL,
    tanggal DATETIME NOT NULL,
    lokasi TEXT NOT NULL,
    pejabat_id INT NOT NULL,
    
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
    created_by INT DEFAULT NULL,
    updated_by INT DEFAULT NULL,

    CONSTRAINT fk_ag_kegiatan_pejabat_id FOREIGN KEY (pejabat_id) REFERENCES ag_pejabat(id) ON DELETE RESTRICT,
    CONSTRAINT fk_ag_kegiatan_created_by FOREIGN KEY (created_by) REFERENCES users(id) ON DELETE RESTRICT,
    CONSTRAINT fk_ag_kegiatan_updated_by FOREIGN KEY (updated_by) REFERENCES users(id) ON DELETE RESTRICT
);

CREATE TABLE ag_pendamping_kegiatan (
    id INT AUTO_INCREMENT PRIMARY KEY,
    kegiatan_id INT NOT NULL,
    pejabat_id INT NOT NULL,

    CONSTRAINT fk_ag_pendamping_kegiatan_kegiatan_id FOREIGN KEY (kegiatan_id) REFERENCES ag_kegiatan(id) ON DELETE CASCADE,
    CONSTRAINT fk_ag_pendamping_kegiatan_pejabat_id FOREIGN KEY (pejabat_id) REFERENCES ag_pejabat(id) ON DELETE RESTRICT
);