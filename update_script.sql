DELETE FROM Books
WHERE authorId IS NULL;

ALTER TABLE Books
ADD genreId INT(11);

CREATE TABLE IF NOT EXISTS Genres (
genreId INT(11) NOT NULL AUTO_INCREMENT,
name VARCHAR(255) NOT NULL,
PRIMARY KEY (genreId)
);

INSERT INTO Genres (genreId, name) VALUES (1, 'Scientific literature');
INSERT INTO Genres (genreId, name) VALUES (2, 'Novel');
INSERT INTO Genres (genreId, name) VALUES (3, 'Health');
INSERT INTO Genres (genreId, name) VALUES (4, 'Biography');
INSERT INTO Genres (genreId, name) VALUES (5, 'Poetry');

CREATE TABLE IF NOT EXISTS Authors_Books (
Id INT(11) NOT NULL AUTO_INCREMENT,
authorId INT(11) NOT NULL,
bookId INT(11) NOT NULL,
PRIMARY KEY (Id)
);

INSERT INTO Authors_Books (authorId, bookId)
SELECT authorId, bookId
FROM Books;

ALTER TABLE Books
DROP COLUMN authorId;

UPDATE Books SET genreId = 1;

UPDATE Authors SET name = TRIM(name);

ALTER TABLE Books CONVERT TO CHARACTER SET utf8 COLLATE utf8_lithuanian_ci;
ALTER TABLE Authors CONVERT TO CHARACTER SET utf8 COLLATE utf8_lithuanian_ci;

INSERT INTO Authors (authorId, name) VALUES (8, 'Džekas Londonas');
INSERT INTO Books (bookId, genreId, title, year) VALUES (6, 2, 'Baltoji Iltis', 1992);
INSERT INTO Authors_Books (Id, authorId, bookId) VALUES (6, 8, 6);

INSERT INTO Authors (authorId, name) VALUES (9, 'Leo Angart');
INSERT INTO Books (bookId, genreId, title, year) VALUES (7, 3, 'Tausok sveikatą dirbdamas kompiuteriu', 2006);
INSERT INTO Authors_Books (Id, authorId, bookId) VALUES (7, 9, 7);

INSERT INTO Authors (authorId, name) VALUES (10, 'Edmondo de Amicis');
INSERT INTO Books (bookId, genreId, title, year) VALUES (8, 2, 'Širdis', 2011);
INSERT INTO Authors_Books (Id, authorId, bookId) VALUES (8, 10, 8);

INSERT INTO Authors (authorId, name) VALUES (11, 'A.Eidintas');
INSERT INTO Books (bookId, genreId, title, year) VALUES (9, 4, 'Antanas Smetona', 1990);
INSERT INTO Authors_Books (Id, authorId, bookId) VALUES (9, 11, 9);

INSERT INTO Authors (authorId, name) VALUES (12, 'A.Andrijanova');
INSERT INTO Authors (authorId, name) VALUES (13, 'S.Vilkienė');
INSERT INTO Books (bookId, genreId, title, year) VALUES (10, 1, 'Garsų tarimas', 1990);
INSERT INTO Authors_Books (Id, authorId, bookId) VALUES (10, 12, 10);
INSERT INTO Authors_Books (Id, authorId, bookId) VALUES (11, 13, 10);

INSERT INTO Authors (authorId, name) VALUES (14, 'Jay Greenspan');
INSERT INTO Authors (authorId, name) VALUES (15, 'Brad Bulger');
INSERT INTO Books (bookId, genreId, title, year) VALUES (11, 1, 'MySQL/PHP Database Applications', 2001);
INSERT INTO Authors_Books (Id, authorId, bookId) VALUES (12, 14, 11);
INSERT INTO Authors_Books (Id, authorId, bookId) VALUES (13, 15, 11);

INSERT INTO Authors (authorId, name) VALUES (16, 'Salomėja Nėris');
INSERT INTO Books (bookId, genreId, title, year) VALUES (12, 5, 'Kaip žydėjimas vyšnios', 1978);
INSERT INTO Books (bookId, genreId, title, year) VALUES (13, 5, 'Prie didelio kelio', 1995);
INSERT INTO Authors_Books (Id, authorId, bookId) VALUES (14, 16, 12);
INSERT INTO Authors_Books (Id, authorId, bookId) VALUES (15, 16, 13);
