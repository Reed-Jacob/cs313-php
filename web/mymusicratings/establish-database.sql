CREATE TABLE public.user (
  user_id   SERIAL PRIMARY KEY,
  username  VARCHAR(100) NOT NULL UNIQUE,
  password  VARCHAR(100) NOT NULL
);

CREATE TABLE public.album (
  album_id        SERIAL PRIMARY KEY,
  album_artist    VARCHAR(100),
  album_title     VARCHAR(100),
  album_year      SMALLINT,
  album_favorite  BOOLEAN,
  user_id SERIAL REFERENCES public.user(user_id)
);

CREATE TABLE public.track (
  track_id        SERIAL PRIMARY KEY,
  track_number    SMALLINT,
  track_favorite  BOOLEAN,
  track_title     VARCHAR(100),
  album_id SERIAL REFERENCES public.album(album_id)
);

INSERT INTO public.user (username, password) VALUES ('admin', 'admin');
INSERT INTO public.user (username, password) VALUES ('test', 'test');

INSERT INTO public.album (album_artist, album_title, album_year, album_favorite, user_id) VALUES ('MAITRO', 'Dragonball Wave', 2015, TRUE, 1);

INSERT INTO public.track (track_favorite, track_title, album_id, track_number) VALUES (TRUE, 'Kid Goku', 1, 1);
INSERT INTO public.track (track_favorite, track_title, album_id, track_number) VALUES (TRUE, 'Training Day', 1, 2);
INSERT INTO public.track (track_favorite, track_title, album_id, track_number) VALUES (FALSE, 'Medical Machine', 1, 3);
INSERT INTO public.track (track_favorite, track_title, album_id, track_number) VALUES (FALSE, 'Korin Tower', 1, 4);
INSERT INTO public.track (track_favorite, track_title, album_id, track_number) VALUES (TRUE, 'Chiaotzu', 1, 5);
INSERT INTO public.track (track_favorite, track_title, album_id, track_number) VALUES (TRUE, 'East City', 1, 6);
INSERT INTO public.track (track_favorite, track_title, album_id, track_number) VALUES (FALSE, 'SCOUTER', 1, 7);
INSERT INTO public.track (track_favorite, track_title, album_id, track_number) VALUES (TRUE, 'BULMA', 1, 8);
INSERT INTO public.track (track_favorite, track_title, album_id, track_number) VALUES (TRUE, 'Android 18', 1, 9);
INSERT INTO public.track (track_favorite, track_title, album_id, track_number) VALUES (FALSE, 'KAME HOUSE', 1, 10);
INSERT INTO public.track (track_favorite, track_title, album_id, track_number) VALUES (TRUE, 'Hyperbolic Time Chamber', 1, 11);
INSERT INTO public.track (track_favorite, track_title, album_id, track_number) VALUES (TRUE, 'FUTURE TRUNKS', 1, 12);
INSERT INTO public.track (track_favorite, track_title, album_id, track_number) VALUES (FALSE, 'SNAKE WAY', 1, 13);
INSERT INTO public.track (track_favorite, track_title, album_id, track_number) VALUES (FALSE, 'ONE WISH', 1, 14);

INSERT INTO public.album (album_artist, album_title, album_year, album_favorite, user_id) VALUES ('990x', 'Sculptorr', 2016, FALSE, 1);

INSERT INTO public.track (track_favorite, track_title, album_id, track_number) VALUES (FALSE, 'In a crowded place', 2, 1);
INSERT INTO public.track (track_favorite, track_title, album_id, track_number) VALUES (TRUE, 'Terminal', 2, 2);
INSERT INTO public.track (track_favorite, track_title, album_id, track_number) VALUES (FALSE, 'Umbrella', 2, 3);
INSERT INTO public.track (track_favorite, track_title, album_id, track_number) VALUES (FALSE, 'Scrape', 2, 4);
INSERT INTO public.track (track_favorite, track_title, album_id, track_number) VALUES (TRUE, 'Flood', 2, 5);
INSERT INTO public.track (track_favorite, track_title, album_id, track_number) VALUES (FALSE, 'Flutter', 2, 6);

INSERT INTO public.album (album_artist, album_title, album_year, album_favorite, user_id) VALUES ('JD senuTi', 'Girl in the Window EP', 2016, TRUE, 1);

INSERT INTO public.track (track_favorite, track_title, album_id, track_number) VALUES (FALSE, 'Catwalk', 3, 1);
INSERT INTO public.track (track_favorite, track_title, album_id, track_number) VALUES (FALSE, 'Good Hair Day', 3, 2);
INSERT INTO public.track (track_favorite, track_title, album_id, track_number) VALUES (TRUE, 'Remember', 3, 3);
INSERT INTO public.track (track_favorite, track_title, album_id, track_number) VALUES (TRUE, 'Girl in the Window', 3, 4);

INSERT INTO public.album (album_artist, album_title, album_year, album_favorite, user_id) VALUES ('Dirty Chocolate', 'Dirty Chocolate - 93', 2015, FALSE, 1);

INSERT INTO public.track (track_favorite, track_title, album_id, track_number) VALUES (TRUE, 'Crystal Cavern', 4, 1);
INSERT INTO public.track (track_favorite, track_title, album_id, track_number) VALUES (FALSE, 'Emoji Girl', 4, 2);
INSERT INTO public.track (track_favorite, track_title, album_id, track_number) VALUES (FALSE, 'Memory Cards', 4, 3);

INSERT INTO public.album (album_artist, album_title, album_year, album_favorite, user_id) VALUES ('Guggenz', 'Space Age', 2015, FALSE, 2);

INSERT INTO public.track (track_favorite, track_title, album_id, track_number) VALUES (TRUE, 'I Need Love', 5, 1);
INSERT INTO public.track (track_favorite, track_title, album_id, track_number) VALUES (FALSE, 'One Night With You', 5, 2);
INSERT INTO public.track (track_favorite, track_title, album_id, track_number) VALUES (FALSE, 'At Last', 5, 3);
INSERT INTO public.track (track_favorite, track_title, album_id, track_number) VALUES (TRUE, 'Sweet Dreams', 5, 4);
INSERT INTO public.track (track_favorite, track_title, album_id, track_number) VALUES (FALSE, 'Placid', 5, 5);

INSERT INTO public.album (album_artist, album_title, album_year, album_favorite, user_id) VALUES ('Hyuna', 'A''wesome', 2016, TRUE, 2);

INSERT INTO public.track (track_favorite, track_title, album_id, track_number) VALUES (TRUE, 'U & ME',6, 1);
INSERT INTO public.track (track_favorite, track_title, album_id, track_number) VALUES (TRUE, 'How''s This?', 6, 2);
INSERT INTO public.track (track_favorite, track_title, album_id, track_number) VALUES (FALSE, 'Dot it!', 6, 3);
INSERT INTO public.track (track_favorite, track_title, album_id, track_number) VALUES (FALSE, 'Morning Glory', 6, 4);
INSERT INTO public.track (track_favorite, track_title, album_id, track_number) VALUES (FALSE, 'Freaky', 6, 5);
INSERT INTO public.track (track_favorite, track_title, album_id, track_number) VALUES (FALSE, 'Wolf', 6, 6);
