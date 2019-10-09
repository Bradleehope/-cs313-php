CREATE DATABASE movie_library;
CREATE TABLE public.movie(
    id SERIAL NOT NULL PRIMARY KEY,
    title VARCHAR(100) NOT NULL UNIQUE,
    genre VARCHAR(100) NOT NULL,
    release_date DATETIME,
    format VARCHAR(100) NOT NULL,
    parent_company VARCHAR(100)
);

CREATE TABLE public.book(
    id SERIAL NOT NULL PRIMARY KEY,
    title VARCHAR(100) NOT NULL UNIQUE,
    author VARCHAR(100) NOT NULL,
    genre VARCHAR(100) NOT NULL,
    release_date DATETIME,
);

CREATE TABLE public.user(
    id SERIAL NOT NULL PRIMARY KEY,
    username VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(100) NOT NULL,
    movie_checked_out INT REFERENCES public.movie(id),
    movie_date_checked_out DATETIME,
    book_checked_out INT REFERENCES public.book(id),
    book_data_checked_out DATETIME,
);