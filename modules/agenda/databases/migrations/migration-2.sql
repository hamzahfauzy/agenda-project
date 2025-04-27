CREATE TABLE ag_surat (
    id INT AUTO_INCREMENT PRIMARY KEY,
    no_surat VARCHAR(100) NOT NULL,
    perihal VARCHAR(100) NOT NULL,
    asal VARCHAR(200) NOT NULL,
    tujuan VARCHAR(200) NOT NULL,
    file_url VARCHAR(200) NOT NULL,

    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
    created_by INT DEFAULT NULL,
    updated_by INT DEFAULT NULL,

    CONSTRAINT fk_ag_surat_created_by FOREIGN KEY (created_by) REFERENCES users(id) ON DELETE RESTRICT,
    CONSTRAINT fk_ag_surat_updated_by FOREIGN KEY (updated_by) REFERENCES users(id) ON DELETE RESTRICT
);

CREATE TABLE ag_surat_flow (
    id INT AUTO_INCREMENT PRIMARY KEY,
    surat_id INT NOT NULL,
    user_id INT NOT NULL,
    logs JSON DEFAULT NULL,

    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
    created_by INT DEFAULT NULL,
    updated_by INT DEFAULT NULL,

    CONSTRAINT fk_ag_surat_flow_surat_id FOREIGN KEY (surat_id) REFERENCES ag_surat(id) ON DELETE RESTRICT,
    CONSTRAINT fk_ag_surat_flow_user_id FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE RESTRICT,
    CONSTRAINT fk_ag_surat_flow_created_by FOREIGN KEY (created_by) REFERENCES users(id) ON DELETE RESTRICT,
    CONSTRAINT fk_ag_surat_flow_updated_by FOREIGN KEY (updated_by) REFERENCES users(id) ON DELETE RESTRICT
);
