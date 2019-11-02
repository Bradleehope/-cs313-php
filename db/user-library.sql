CREATE DATABASE user_library;

CREATE TABLE public.book(
    id SERIAL NOT NULL PRIMARY KEY,
    title VARCHAR(100) NOT NULL UNIQUE,
    author VARCHAR(100) NOT NULL,
    genre VARCHAR(100),
    checkout_date DATE,
    checkout_user VARCHAR(100),
    availibility VARCHAR(20),
    release_date DATE,
);

CREATE TABLE public.librarylogin(
    id SERIAL NOT NULL PRIMARY KEY,
    username VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(100) NOT NULL,
);
