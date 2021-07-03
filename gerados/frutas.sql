CREATE TABLE frutas (
    id int primary key auto_increment,
    fruta varchar(20) not null,
    data date,
    valor int
);
INSERT INTO frutas (fruta, data, valor) VALUES 
('Laranja','1970-01-11','580'),
('Manga','1979-11-15','577'),
('Banana','1984-10-14','725'),
('Manga','1986-02-18','380'),
('Manga','1976-04-28','276'),
('Laranja','2000-01-20','929'),
('Banana','1980-10-26','1122'),
('Banana','1972-01-18','264'),
('Laranja','1988-04-26','266'),
('Banana','1998-04-17','1089'),
