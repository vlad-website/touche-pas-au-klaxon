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
INSERT INTO users (prenom, nom, email, telephone, role) VALUES
('Admin', 'System', 'admin@klaxon.local', '0102030405', 'ADMIN');

-- Insertion des utilisateurs standards
INSERT INTO users (nom, prenom, telephone, email, role) VALUES
('Martin', 'Alexandre', '0612345678', 'alexandre.martin@email.fr', 'USER'),
('Dubois', 'Sophie', '0698765432', 'sophie.dubois@email.fr', 'USER'),
('Bernard', 'Julien', '0622446688', 'julien.bernard@email.fr', 'USER'),
('Moreau', 'Camille', '0611223344', 'camille.moreau@email.fr', 'USER'),
('Lefèvre', 'Lucie', '0777889900', 'lucie.lefevre@email.fr', 'USER'),
('Leroy', 'Thomas', '0655443322', 'thomas.leroy@email.fr', 'USER'),
('Roux', 'Chloé', '0633221199', 'chloe.roux@email.fr', 'USER'),
('Petit', 'Maxime', '0766778899', 'maxime.petit@email.fr', 'USER'),
('Garnier', 'Laura', '0688776655', 'laura.garnier@email.fr', 'USER'),
('Dupuis', 'Antoine', '0744556677', 'antoine.dupuis@email.fr', 'USER'),
('Lefebvre', 'Emma', '0699887766', 'emma.lefebvre@email.fr', 'USER'),
('Fontaine', 'Louis', '0655667788', 'louis.fontaine@email.fr', 'USER'),
('Chevalier', 'Clara', '0788990011', 'clara.chevalier@email.fr', 'USER'),
('Robin', 'Nicolas', '0644332211', 'nicolas.robin@email.fr', 'USER'),
('Gauthier', 'Marine', '0677889922', 'marine.gauthier@email.fr', 'USER'),
('Fournier', 'Pierre', '0722334455', 'pierre.fournier@email.fr', 'USER'),
('Girard', 'Sarah', '0688665544', 'sarah.girard@email.fr', 'USER'),
('Lambert', 'Hugo', '0611223366', 'hugo.lambert@email.fr', 'USER'),
('Masson', 'Julie', '0733445566', 'julie.masson@email.fr', 'USER'),
('Henry', 'Arthur', '0666554433', 'arthur.henry@email.fr', 'USER');
