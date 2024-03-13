CREATE TABLE categories (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(255) NOT NULL UNIQUE
);

CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  email VARCHAR(255) NOT NULL UNIQUE,
  username VARCHAR(255) NOT NULL UNIQUE,
  first_name VARCHAR(255) NOT NULL,
  last_name VARCHAR(255) NOT NULL,
  mot_pass VARCHAR(255) NOT NULL,
  numero_tel VARCHAR(255) NOT NULL
);

CREATE TABLE events (
  id INT AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(255) NOT NULL,
  descp TEXT,
  lieu VARCHAR(255),
  created_at TIMESTAMP DEFAULT NOW(),
  image_url VARCHAR(255) NOT NULL,
  start_date_time DATETIME NOT NULL,
  end_date_time DATETIME NOT NULL,
  price VARCHAR(255),
  
  category_id INT,
  organizer_id INT,
  
  FOREIGN KEY (category_id) REFERENCES categories(id),
  FOREIGN KEY (organizer_id) REFERENCES users(id)
);

CREATE TABLE orders (
  id INT AUTO_INCREMENT PRIMARY KEY,
  created_at TIMESTAMP DEFAULT NOW(),
  total_amount DECIMAL(10,2),
  event_id INT,
  user_id INT,
  FOREIGN KEY (event_id) REFERENCES events(id),
  FOREIGN KEY (user_id) REFERENCES users(id)
);

CREATE TABLE galleries (
  id INT AUTO_INCREMENT PRIMARY KEY,
  event_id INT,
  image_urls VARCHAR(255) NOT NULL,
  FOREIGN KEY (event_id) REFERENCES events(id)
);

CREATE TABLE participants (
  id INT AUTO_INCREMENT PRIMARY KEY,
  event_id INT,
  participant_name VARCHAR(255) NOT NULL,
  photo VARCHAR(255) NOT NULL,
  FOREIGN KEY (event_id) REFERENCES events(id)
);