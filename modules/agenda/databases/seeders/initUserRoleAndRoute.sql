INSERT INTO roles(name) VALUES ('Admin'),('User'),('Asisten'),('Sekda'),('Bupati');

INSERT INTO role_routes(`route_path`, `role_id`) VALUES 
            ('default/*', (SELECT id FROM roles WHERE name = 'Admin')),
            ('crud/*?table=ag_surat', (SELECT id FROM roles WHERE name = 'Admin')),
            ('crud/*?table=ag_pejabat', (SELECT id FROM roles WHERE name = 'Admin')),
            ('crud/*?table=ag_kegiatan', (SELECT id FROM roles WHERE name = 'Admin')),
            ('crud/index?table=ag_surat', (SELECT id FROM roles WHERE name = 'Asisten')),
            ('agenda/surat/view', (SELECT id FROM roles WHERE name = 'Asisten')),
            ('agenda/surat/forward', (SELECT id FROM roles WHERE name = 'Asisten')),
            ('crud/index?table=ag_surat', (SELECT id FROM roles WHERE name = 'Sekda')),
            ('agenda/surat/view', (SELECT id FROM roles WHERE name = 'Sekda')),
            ('agenda/surat/forward', (SELECT id FROM roles WHERE name = 'Sekda')),
            ('agenda/surat/disposisi', (SELECT id FROM roles WHERE name = 'Sekda')),
            ('crud/index?table=ag_surat', (SELECT id FROM roles WHERE name = 'Bupati')),
            ('agenda/surat/view', (SELECT id FROM roles WHERE name = 'Bupati')),
            ('agenda/surat/disposisi', (SELECT id FROM roles WHERE name = 'Bupati')),
            ('default/*', (SELECT id FROM roles WHERE name = 'User')),
            ('crud/index?table=ag_kegiatan', (SELECT id FROM roles WHERE name = 'User'));