CREATE TABLE article (
	ref INTEGER PRIMARY KEY,
	libelle TEXT,
	categorie INTEGER,
	prix REAL,
	nbAchat INTEGER,
	image TEXT,
	FOREIGN KEY(categorie) REFERENCES categorie(id)
);

CREATE TABLE categorie (
	id INTEGER PRIMARY KEY,
	nom TEXT,
	pere INTEGER,
	FOREIGN KEY(pere) REFERENCES categorie(id)
);

CREATE TABLE user (
	id INTEGER PRIMARY KEY,
	mail TEXT UNIQUE
	pass TEXT,
	statut TEXT check (statut in ('simple', 'admin'))
);

CREATE TABLE
