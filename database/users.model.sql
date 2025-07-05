    CREATE TABLE IF NOT EXISTS users (
        id INT GENERATED ALWAYS AS IDENTITY PRIMARY KEY,
        first_name varchar(225) NOT NULL,
        middle_name varchar(225),
        last_name varchar(225) NOT NULL,
        password varchar(225) NOT NULL,
        username varchar(225) NOT NULL,
        role varchar(225) NOT NULL
    );