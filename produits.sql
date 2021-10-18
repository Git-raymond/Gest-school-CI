-- Create Database market;

Create Table produits (
    id INTEGER primary key auto_increment,
    nom varchar(20),
    couleur VARCHAR(20)
);

Insert into
    produits (nom, couleur)
values
    ('tomate', 'rouge'),
    ('carrotte', 'orange'),
    ('patate', 'jaune'),
    ('haricot', 'vert'),
    ('banane', 'jaune'),
    ('fraise', 'rouge'),
    ('citron', 'vert'),
    ('pomme', 'rouge')