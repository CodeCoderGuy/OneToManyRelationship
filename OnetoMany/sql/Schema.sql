    CREATE TABLE tutors (
        tutor_id INTEGER PRIMARY KEY AUTO_INCREMENT,
        first_name VARCHAR(100) NOT NULL,
        last_name VARCHAR(100) NOT NULL,
        email VARCHAR(150) NOT NULL,
        phone_number VARCHAR(20),
        specialty VARCHAR(100) NOT NULL,
        date_added TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    );

    CREATE TABLE students (
        student_id INTEGER PRIMARY KEY AUTO_INCREMENT,
        first_name VARCHAR(100) NOT NULL,
        last_name VARCHAR(100) NOT NULL,
        email VARCHAR(150) NOT NULL,
        phone_number VARCHAR(20),
        tutor_id INTEGER,
        date_added TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    );

    CREATE TABLE passwords(
        user_id INTEGER PRIMARY KEY AUTO_INCREMENT,
        username VARCHAR(100) NOT NULL,
        pass_word VARCHAR(255) NOT NULL,
        date_added TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    );

    INSERT INTO tutors (first_name, last_name, email, phone_number, specialty) VALUES
    ('John', 'Doe', 'john.doe@example.com', '123-456-7890', 'Mathematics'),
    ('Jane', 'Smith', 'jane.smith@example.com', '098-765-4321', 'Science');

    INSERT INTO students (first_name, last_name, email, phone_number, tutor_id) VALUES
    ('Alice', 'Johnson', 'alice.johnson@example.com', '555-1234', 1),
    ('Bob', 'Williams', 'bob.williams@example.com', '555-5678', 1),
    ('Charlie', 'Brown', 'charlie.brown@example.com', '555-9012', 2);

    insert into passwords (username, pass_word) values
    ('admin', 'abc123');

