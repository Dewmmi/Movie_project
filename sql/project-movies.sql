CREATE DATABASE IF NOT EXISTS `project-movies`;
USE `project-movies`;

CREATE TABLE users (
  id int NOT NULL AUTO_INCREMENT,
  username varchar(50) NOT NULL,
  email varchar(100) NOT NULL,
  password varchar(255) NOT NULL,
  created_at timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (id),
  UNIQUE KEY username (username)
);

CREATE TABLE movies (
  id int NOT NULL AUTO_INCREMENT,
  title varchar(255) NOT NULL,
  director varchar(100) NOT NULL,
  actors text,
  category enum('action','drama') NOT NULL,
  price decimal(10,2) NOT NULL,
  image varchar(255) DEFAULT NULL,
  description text,
  PRIMARY KEY (id)
);

CREATE TABLE cart (
  id int NOT NULL AUTO_INCREMENT,
  user_id int DEFAULT NULL,
  movie_id int DEFAULT NULL,
  PRIMARY KEY (id),
  KEY user_id (user_id),
  KEY movie_id (movie_id)
);

CREATE TABLE purchases (
  id int NOT NULL AUTO_INCREMENT,
  user_id int DEFAULT NULL,
  movie_id int DEFAULT NULL,
  purchased_at timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (id),
  KEY user_id (user_id),
  KEY movie_id (movie_id)
);

INSERT INTO movies (id, title, director, actors, category, price, image, description) VALUES
(1, 'The Dark Knight', 'Christopher Nolan', 'Christian Bale, Heath Ledger', 'action', 14.99, 'assets/images/dark-knight.jpg', 'The Joker wreaks havoc on Gotham City.'),
(2, 'Inception', 'Christopher Nolan', 'Leonardo DiCaprio', 'action', 12.50, 'assets/images/inception.jpg', 'A thief steals secrets through dream-sharing technology.'),
(3, 'Mad Max: Fury Road', 'George Miller', 'Tom Hardy, Charlize Theron', 'action', 9.99, 'assets/images/Mad-max.jpg', 'A woman rebels against a tyrannical ruler in post-apocalyptic Australia.'),
(4, 'John Wick', 'Chad Stahelski', 'Keanu Reeves', 'action', 7.99, 'assets/images/JW.jpg', 'An ex-hitman comes out of retirement to track down gangsters.'),
(5, 'Gladiator', 'Ridley Scott', 'Russell Crowe', 'action', 8.50, 'assets/images/Gladiator.jpg', 'A former Roman General sets out to exact vengeance.'),
(6, 'The Matrix', 'Lana Wachowski', 'Keanu Reeves', 'action', 10.00, 'assets/images/matrix.jpg', 'A computer hacker learns about the true nature of his reality.'),
(7, 'Die Hard', 'John McTiernan', 'Bruce Willis', 'action', 5.99, 'assets/images/die-hard.jpg', 'An NYPD officer tries to save his wife from terrorists.'),
(8, 'Top Gun: Maverick', 'Joseph Kosinski', 'Tom Cruise', 'action', 19.99, 'assets/images/top-gun.jpg', 'Maverick is still pushing the envelope as a top naval aviator.'),
(9, 'Heat', 'Michael Mann', 'Al Pacino, Robert De Niro', 'action', 9.00, 'assets/images/heat.jpg', 'A group of professional bank robbers feel the heat from police.'),
(10, 'Taken', 'Pierre Morel', 'Liam Neeson', 'action', 6.50, 'assets/images/taken.jpg', 'A retired CIA agent travels across Europe to save his daughter.'),
(11, 'The Godfather', 'Francis Ford Coppola', 'Marlon Brando, Al Pacino', 'drama', 15.00, 'assets/images/godfather.jpg', 'The aging patriarch of a crime dynasty transfers control to his son.'),
(12, 'Pulp Fiction', 'Quentin Tarantino', 'John Travolta, Samuel L. Jackson', 'drama', 11.99, 'assets/images/pulp-fiction.jpg', 'The lives of mob hitmen, a boxer, and a gangster wife intertwine.'),
(13, 'The Shawshank Redemption', 'Frank Darabont', 'Morgan Freeman, Tim Robbins', 'drama', 8.99, 'assets/images/shawshank.jpg', 'Two imprisoned men bond over a number of years.'),
(14, 'Parasite', 'Bong Joon-ho', 'Song Kang-ho', 'drama', 14.50, 'assets/images/parasite.jpg', 'Greed and class discrimination threaten a new relationship.'),
(15, 'Schindlers List', 'Steven Spielberg', 'Liam Neeson', 'drama', 12.00, 'assets/images/schindlers-list.jpg', 'A businessman saves Jewish workers during WWII.'),
(16, 'Forrest Gump', 'Robert Zemeckis', 'Tom Hanks', 'drama', 7.50, 'assets/images/forrest-gump.jpg', 'The history of the US unfolds through the eyes of one man.'),
(17, 'Goodfellas', 'Martin Scorsese', 'Robert De Niro, Ray Liotta', 'drama', 10.50, 'assets/images/goodfellas.jpg', 'The story of Henry Hill and his life in the mob.'),
(18, 'The Whale', 'Darren Aronofsky', 'Brendan Fraser', 'drama', 18.00, 'assets/images/the-whale.jpg', 'A reclusive teacher attempts to reconnect with his daughter.'),
(19, 'Whiplash', 'Damien Chazelle', 'Miles Teller, J.K. Simmons', 'drama', 9.50, 'assets/images/whiplash.jpg', 'A promising young drummer enrolls at a cut-throat conservatory.'),
(20, 'Social Network', 'David Fincher', 'Jesse Eisenberg', 'drama', 8.00, 'assets/images/social-network.jpg', 'Mark Zuckerberg creates the site known as Facebook.');

ALTER TABLE cart
  ADD CONSTRAINT cart_user_fk FOREIGN KEY (user_id) REFERENCES users (id) ON DELETE CASCADE,
  ADD CONSTRAINT cart_movie_fk FOREIGN KEY (movie_id) REFERENCES movies (id) ON DELETE CASCADE;

ALTER TABLE purchases
  ADD CONSTRAINT purchases_user_fk FOREIGN KEY (user_id) REFERENCES users (id) ON DELETE CASCADE,
  ADD CONSTRAINT purchases_movie_fk FOREIGN KEY (movie_id) REFERENCES movies (id) ON DELETE CASCADE;