create database p3db default character set utf8;
use p3db;
create table utakmica(
    sifra int not null primary key auto_increment,
    datum date not null,
    opis varchar(255) not null,
    rezultat varchar(255) not null
);
insert into utakmica(datum,opis,rezultat)
values ('2019-11-30','Real Madrid-Barcelona','2:2');
