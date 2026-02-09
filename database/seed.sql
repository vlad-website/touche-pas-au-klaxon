-- Insertion des agences
INSERT INTO agences (nom) VALUES
('Paris'),
('Lyon'),
('Marseille'),
('Toulouse'),
('Nice'),
('Nantes'),
('Strasbourg'),
('Montpellier'),
('Bordeaux'),
('Lille'),
('Rennes'),
('Reims');

-- Administrateur
INSERT INTO users (prenom, nom, email, telephone, role, password) VALUES
('Admin', 'System', 'admin@klaxon.local', '0102030405', 'ADMIN', '$2y$10$uoh2aSL4JCT5j7JmlgEvC.t8GRfYDUgQiBSU.KearTy3OkmCfy1oC');

-- Insertion des utilisateurs standards
INSERT INTO users (nom, prenom, telephone, email, role, password) VALUES
('Martin', 'Alexandre', '0612345678', 'alexandre.martin@email.fr', 'USER', '$2y$10$zHUM6fQ8RhePE//5VTpIQeVIWyiDAgvMe97gH9QIavWbwe1.oQGkS'),
('Dubois', 'Sophie', '0698765432', 'sophie.dubois@email.fr', 'USER', '$2y$10$zHUM6fQ8RhePE//5VTpIQeVIWyiDAgvMe97gH9QIavWbwe1.oQGkS'),
('Bernard', 'Julien', '0622446688', 'julien.bernard@email.fr', 'USER', '$2y$10$zHUM6fQ8RhePE//5VTpIQeVIWyiDAgvMe97gH9QIavWbwe1.oQGkS'),
('Moreau', 'Camille', '0611223344', 'camille.moreau@email.fr', 'USER', '$2y$10$zHUM6fQ8RhePE//5VTpIQeVIWyiDAgvMe97gH9QIavWbwe1.oQGkS'),
('Lefèvre', 'Lucie', '0777889900', 'lucie.lefevre@email.fr', 'USER', '$2y$10$zHUM6fQ8RhePE//5VTpIQeVIWyiDAgvMe97gH9QIavWbwe1.oQGkS'),
('Leroy', 'Thomas', '0655443322', 'thomas.leroy@email.fr', 'USER', '$2y$10$zHUM6fQ8RhePE//5VTpIQeVIWyiDAgvMe97gH9QIavWbwe1.oQGkS'),
('Roux', 'Chloé', '0633221199', 'chloe.roux@email.fr', 'USER', '$2y$10$zHUM6fQ8RhePE//5VTpIQeVIWyiDAgvMe97gH9QIavWbwe1.oQGkS'),
('Petit', 'Maxime', '0766778899', 'maxime.petit@email.fr', 'USER', '$2y$10$zHUM6fQ8RhePE//5VTpIQeVIWyiDAgvMe97gH9QIavWbwe1.oQGkS'),
('Garnier', 'Laura', '0688776655', 'laura.garnier@email.fr', 'USER', '$2y$10$zHUM6fQ8RhePE//5VTpIQeVIWyiDAgvMe97gH9QIavWbwe1.oQGkS'),
('Dupuis', 'Antoine', '0744556677', 'antoine.dupuis@email.fr', 'USER', '$2y$10$zHUM6fQ8RhePE//5VTpIQeVIWyiDAgvMe97gH9QIavWbwe1.oQGkS'),
('Lefebvre', 'Emma', '0699887766', 'emma.lefebvre@email.fr', 'USER', '$2y$10$zHUM6fQ8RhePE//5VTpIQeVIWyiDAgvMe97gH9QIavWbwe1.oQGkS'),
('Fontaine', 'Louis', '0655667788', 'louis.fontaine@email.fr', 'USER', '$2y$10$zHUM6fQ8RhePE//5VTpIQeVIWyiDAgvMe97gH9QIavWbwe1.oQGkS'),
('Chevalier', 'Clara', '0788990011', 'clara.chevalier@email.fr', 'USER', '$2y$10$zHUM6fQ8RhePE//5VTpIQeVIWyiDAgvMe97gH9QIavWbwe1.oQGkS'),
('Robin', 'Nicolas', '0644332211', 'nicolas.robin@email.fr', 'USER', '$2y$10$zHUM6fQ8RhePE//5VTpIQeVIWyiDAgvMe97gH9QIavWbwe1.oQGkS'),
('Gauthier', 'Marine', '0677889922', 'marine.gauthier@email.fr', 'USER', '$2y$10$zHUM6fQ8RhePE//5VTpIQeVIWyiDAgvMe97gH9QIavWbwe1.oQGkS'),
('Fournier', 'Pierre', '0722334455', 'pierre.fournier@email.fr', 'USER', '$2y$10$zHUM6fQ8RhePE//5VTpIQeVIWyiDAgvMe97gH9QIavWbwe1.oQGkS'),
('Girard', 'Sarah', '0688665544', 'sarah.girard@email.fr', 'USER', '$2y$10$zHUM6fQ8RhePE//5VTpIQeVIWyiDAgvMe97gH9QIavWbwe1.oQGkS'),
('Lambert', 'Hugo', '0611223366', 'hugo.lambert@email.fr', 'USER', '$2y$10$zHUM6fQ8RhePE//5VTpIQeVIWyiDAgvMe97gH9QIavWbwe1.oQGkS'),
('Masson', 'Julie', '0733445566', 'julie.masson@email.fr', 'USER', '$2y$10$zHUM6fQ8RhePE//5VTpIQeVIWyiDAgvMe97gH9QIavWbwe1.oQGkS'),
('Henry', 'Arthur', '0666554433', 'arthur.henry@email.fr', 'USER', '$2y$10$zHUM6fQ8RhePE//5VTpIQeVIWyiDAgvMe97gH9QIavWbwe1.oQGkS');
