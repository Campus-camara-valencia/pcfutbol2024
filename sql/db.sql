CREATE TABLE players (
    id_player INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    birth_date DATE NOT NULL
);

CREATE TABLE teams (
    id_team INT AUTO_INCREMENT PRIMARY KEY,
    team_name VARCHAR(100) NOT NULL,
    foundation_year INT NOT NULL,
    img_team VARCHAR(500),
    stadium_name VARCHAR(150),
    budget DECIMAL(15, 2),
    id_player INT,
    FOREIGN KEY (id_player) REFERENCES players(id_player) ON DELETE SET NULL
);

-- Insertar un jugador de prueba
INSERT INTO players (name, email, password, birth_date) 
VALUES ('Juan Pérez', 'juan.perez@example.com', 'securepassword123', '1990-05-15');

-- Insertar un equipo de prueba
INSERT INTO teams (team_name, foundation_year, img_team, stadium_name, budget, id_player) 
VALUES ('Tigres del Norte', 1968, 'https://example.com/images/tigres.png', 'Estadio Aurora', 1200000.00, 1);
