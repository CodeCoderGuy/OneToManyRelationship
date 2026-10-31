    CREATE TABLE tutors (
        tutor_id INTEGER PRIMARY KEY AUTO_INCREMENT,
        first_name VARCHAR(100) NOT NULL,
        last_name VARCHAR(100) NOT NULL,
        email VARCHAR(150) NOT NULL,
        phone_number VARCHAR(20),
        specialty VARCHAR(100) NOT NULL,
        date_added TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        last_updated DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        added_by VARCHAR(100),
        updated_by VARCHAR(100)
    );

    CREATE TABLE students (
        student_id INTEGER PRIMARY KEY AUTO_INCREMENT,
        first_name VARCHAR(100) NOT NULL,
        last_name VARCHAR(100) NOT NULL,
        email VARCHAR(150) NOT NULL,
        phone_number VARCHAR(20),
        tutor_id INTEGER,
        date_added TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        last_updated DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        added_by VARCHAR(100),
        updated_by VARCHAR(100)
    );

    CREATE TABLE passwords(
        user_id INTEGER PRIMARY KEY AUTO_INCREMENT,
        username VARCHAR(100) NOT NULL,
        pass_word VARCHAR(255) NOT NULL,
        date_added TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    );

    INSERT INTO tutors (first_name, last_name, email, phone_number, specialty, added_by, updated_by) VALUES
    ('John', 'Doe', 'john.doe@example.com', '123-456-7890', 'Mathematics', 'admin', 'admin'),
    ('Jane', 'Smith', 'jane.smith@example.com', '098-765-4321', 'Science', 'admin', 'admin');

    INSERT INTO students (first_name, last_name, email, phone_number, tutor_id, added_by, updated_by) VALUES
    ('Alice', 'Johnson', 'alice.johnson@example.com', '555-1234', 1, 'admin', 'admin'),
    ('Bob', 'Williams', 'bob.williams@example.com', '555-5678', 1, 'admin', 'admin'),
    ('Charlie', 'Brown', 'charlie.brown@example.com', '555-9012', 2, 'admin', 'admin');

    insert into passwords (username, pass_word) values
    ('admin', 'abc123');

