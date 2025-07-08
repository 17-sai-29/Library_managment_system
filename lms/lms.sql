
-- CREATE DATABASE library_1729;

-- Use the 'library_1729' database
USE library_1729;


CREATE TABLE student (
    studentid INT PRIMARY KEY,
    name VARCHAR(15),
    email VARCHAR(30),
    mobile_number VARCHAR(15),
    username VARCHAR(15),
    password VARCHAR(15)
);

CREATE TABLE books (
    book_id INT PRIMARY KEY,
    bookname VARCHAR(30),
    copies_available INT,
    edition_number VARCHAR(15)
);

CREATE TABLE book_request (
    student_id INT,
    book_name VARCHAR(30),
    edition_number VARCHAR(15),
    author_name VARCHAR(15)
);


CREATE TABLE author (
    author_name VARCHAR(15),
    book_id INT,
    year INT,
    FOREIGN KEY (book_id) REFERENCES books(book_id)
);

CREATE TABLE issued_books (
    student_id INT,
    book_id INT,
    issued_date DATE,
    due_date DATE,
    fine DECIMAL(10, 2),
    FOREIGN KEY (student_id) REFERENCES student(studentid),
    FOREIGN KEY (book_id) REFERENCES books(book_id)
);

CREATE TABLE course_prerequisites (
    course_id INT PRIMARY KEY,
    prerequisite_book_id INT,
    FOREIGN KEY (prerequisite_book_id) REFERENCES books(book_id)
);

CREATE TABLE thesis (
    thesis_id INT PRIMARY KEY,
    thesis_name VARCHAR(25),
    student_id INT,
    FOREIGN KEY (student_id) REFERENCES student(studentid)
);

CREATE TABLE feedback (
    student_id INT,
    feedback TEXT,
    FOREIGN KEY (student_id) REFERENCES student(studentid)
);


CREATE TABLE admin (
    username VARCHAR(30) PRIMARY KEY,
    admin_name VARCHAR(15),
    admin_mail VARCHAR(30),
    password VARCHAR(15)
);

CREATE TABLE category (
    category_name VARCHAR(15) PRIMARY KEY,
    book_ids VARCHAR(10)
);


INSERT INTO student (studentid, name, email, mobile_number, username, password) VALUES
    (1, 'John Doe', 'john.doe@email.com', '123-456-7890', 'johndoe', 'password1'),
    (2, 'Jane Smith', 'jane.smith@email.com', '987-654-3210', 'janesmith', 'password2'),
    (3, 'Alice Johnson', 'alice.johnson@email.com', '555-123-4567', 'alicej', 'password3'),
    (4, 'Bob Wilson', 'bob.wilson@email.com', '777-888-9999', 'bobwilson', 'password4'),
    (5, 'Eve Brown', 'eve.brown@email.com', '111-222-3333', 'evebrown', 'password5'),
    (6, 'David Lee', 'david.lee@email.com', '444-555-6666', 'davidlee', 'password6'),
    (7, 'Grace Hall', 'grace.hall@email.com', '999-888-7777', 'gracehall', 'password7'),
    (8, 'Chris Parker', 'chris.parker@email.com', '123-456-7890', 'chrisparker', 'password8'),
    (9, 'Olivia White', 'olivia.white@email.com', '222-333-4444', 'oliviawhite', 'password9'),
    (10, 'Michael Davis', 'michael.davis@email.com', '777-999-8888', 'michaeld', 'password10'),
    (11, 'Sarah Adams', 'sarah.adams@email.com', '333-444-5555', 'sarahadams', 'password11'),
    (12, 'Daniel Turner', 'daniel.turner@email.com', '888-999-7777', 'danielturner', 'password12'),
    (13, 'Sophia Scott', 'sophia.scott@email.com', '777-555-6666', 'sophias', 'password13'),
    (14, 'William Baker', 'william.baker@email.com', '444-666-7777', 'williamb', 'password14'),
    (15, 'Emily Mitchell', 'emily.mitchell@email.com', '111-222-3333', 'emilym', 'password15'),
    (16, 'Jacob Ward', 'jacob.ward@email.com', '999-777-6666', 'jacobw', 'password16'),
    (17, 'Ava Turner', 'ava.turner@email.com', '555-777-8888', 'avat', 'password17'),
    (18, 'Logan King', 'logan.king@email.com', '222-111-3333', 'logank', 'password18'),
    (19, 'Mia Phillips', 'mia.phillips@email.com', '888-999-5555', 'miap', 'password19'),
    (20, 'Benjamin Allen', 'benjamin.allen@email.com', '123-456-7777', 'benjamina', 'password20');

INSERT INTO books (book_id, bookname, copies_available, edition_number) VALUES
    (1, 'The Great Gatsby', 5, '1st Edition'),
    (2, 'To Kill a Mockingbird', 3, '2nd Edition'),
    (3, '1984', 7, '1st Edition'),
    (4, 'Brave New World', 4, '3rd Edition'),
    (5, 'The Catcher in the Rye', 6, '2nd Edition'),
    (6, 'Lord of the Flies', 4, '1st Edition'),
    (7, 'Pride and Prejudice', 5, '4th Edition'),
    (8, 'The Hobbit', 2, '2nd Edition'),
    (9, 'The Shining', 8, '1st Edition'),
    (10, 'Moby-Dick', 3, '5th Edition'),
    (11, 'War and Peace', 2, '3rd Edition'),
    (12, 'To the Lighthouse', 3, '2nd Edition'),
    (13, 'The Grapes of Wrath', 5, '1st Edition'),
    (14, 'The Odyssey', 7, '4th Edition'),
    (15, 'Hamlet', 4, '1st Edition'),
    (16, 'Frankenstein', 6, '2nd Edition'),
    (17, 'The Lord of the Rings', 2, '3rd Edition'),
    (18, 'The Road', 4, '1st Edition'),
    (19, 'The Sun Also Rises', 6, '2nd Edition'),
    (20, 'Crime and Punishment', 3, '1st Edition');
    
   INSERT INTO author (author_name, book_id, year) VALUES
    ('F. Scott Fitzgerald', 20, 1925),
    ('Harper Lee', 19, 1960),
    ('George Orwell', 18, 1949),
    ('Aldous Huxley', 17, 1932),
    ('J.D. Salinger', 16, 1951),
    ('William Golding', 15, 1954),
    ('Jane Austen', 14, 1813),
    ('J.R.R. Tolkien', 13, 1937),
    ('Stephen King', 12, 1977),
    ('Herman Melville', 11, 1851),
    ('Leo Tolstoy', 10, 1869),
    ('Virginia Woolf', 9, 1927),
    ('John Steinbeck', 8, 1939),
    ('Homer', 7, 1800),
    ('William Shakespeare', 6, 1609),
    ('Mary Shelley', 5, 1818),
    ('J.R.R. Tolkien', 4, 1954),
    ('Cormac McCarthy',3, 2006),
    ('Ernest Hemingway', 2, 1926),
    ('Fyodor Dostoevsky', 1, 1866); 
    
    
INSERT INTO issued_books (student_id, book_id, issued_date, due_date, fine) VALUES
    (1, 1, '2023-10-01', '2023-10-15', 0.00),
    (2, 2, '2023-10-02', '2023-10-16', 0.00),
    (3, 3, '2023-10-03', '2023-10-17', 0.00),
    (4, 4, '2023-10-04', '2023-10-18', 0.00),
    (5, 5, '2023-10-05', '2023-10-19', 0.00),
    (6, 6, '2023-10-06', '2023-10-20', 0.00),
    (7, 7, '2023-10-07', '2023-10-21', 0.00),
    (8, 8, '2023-10-08', '2023-10-22', 0.00),
    (9, 9, '2023-10-09', '2023-10-23', 0.00),
    (10, 10, '2023-10-10', '2023-10-24', 0.00),
    (11, 11, '2023-10-11', '2023-10-25', 0.00),
    (12, 12, '2023-10-12', '2023-10-26', 0.00),
    (13, 13, '2023-10-13', '2023-10-27', 0.00),
    (14, 14, '2023-10-14', '2023-10-28', 0.00),
    (15, 15, '2023-10-15', '2023-10-29', 0.00),
    (16, 16, '2023-10-16', '2023-10-30', 0.00),
    (17, 17, '2023-10-17', '2023-10-31', 0.00),
    (18, 18, '2023-10-18', '2023-11-01', 0.00),
    (19, 19, '2023-10-19', '2023-11-02', 0.00),
    (20, 20, '2023-10-20', '2023-11-03', 0.00);
    
INSERT INTO thesis (thesis_id, thesis_name, student_id) VALUES
    (1, 'A Study of Economics', 1),
    (2, 'Literary Analysis of Shakespeare', 2),
    (3, 'Environmental Science Research', 3),
    (4, 'Computer Science Algorithms', 4),
    (5, 'History of Ancient Civilizations', 5),
    (6, 'Psychological Studies', 6),
    (7, 'Mathematics Research', 7),
    (8, 'Art and Culture Studies', 8),
    (9, 'Physics Experiments', 9),
    (10, 'Philosophical Inquiries', 10),
    (11, 'Medical Research', 11),
    (12, 'Engineering Innovations', 12),
    (13, 'Literature and Society', 13),
    (14, 'Political Science Studies', 14),
    (15, 'Chemical Reactions', 15),
    (16, 'Space Exploration', 16),
    (17, 'Biology and Ecology', 17),
    (18, 'Cultural Anthropology', 18),
    (19, 'Language and Linguistics', 19),
    (20, 'Geological Studies', 20);

INSERT INTO feedback (student_id, feedback) VALUES
    (1, 'Great course! The material was well-organized and informative.'),
    (2, 'The professor is fantastic, and I learned a lot from this course.'),
    (3, 'The course content needs some updates, but overall it was good.'),
    (4, 'I had a wonderful learning experience, and the support was excellent.'),
    (5, 'This course helped me to improve my skills significantly.'),
    (6, 'The assignments were challenging, but it was a great learning opportunity.'),
    (7, 'I wish there were more practical examples in the course.'),
    (8, 'The course was well-structured and easy to follow.'),
    (9, 'I enjoyed the group projects and collaboration with classmates.'),
    (10, 'The professor was very knowledgeable and supportive.'),
    (11, 'This course was too theoretical for my liking.'),
    (12, 'The course could benefit from more real-world applications.'),
    (13, 'I struggled with some of the course materials, but the support was helpful.'),
    (14, 'I appreciated the flexibility of the course schedule.'),
    (15, 'The course helped me gain a new perspective on the subject.'),
    (16, 'The resources provided were inadequate.'),
    (17, 'I enjoyed the guest lectures and guest speakers.'),
    (18, 'I felt the course could have more interactive elements.'),
    (19, 'The workload was heavy, but I learned a lot.'),
    (20, 'I wish there were more opportunities for hands-on practice.');
    

INSERT INTO admin (username, admin_name, admin_mail, password) VALUES
    ('admin1', 'John Admin', 'admin1@email.com', 'adminpass1'),
    ('admin2', 'Jane Admin', 'admin2@email.com', 'adminpass2'),
    ('admin3', 'Alice Admin', 'admin3@email.com', 'adminpass3'),
    ('admin4', 'Bob Admin', 'admin4@email.com', 'adminpass4'),
    ('admin5', 'Eve Admin', 'admin5@email.com', 'adminpass5'),
    ('admin6', 'David Admin', 'admin6@email.com', 'adminpass6'),
    ('admin7', 'Grace Admin', 'admin7@email.com', 'adminpass7'),
    ('admin8', 'Chris Admin', 'admin8@email.com', 'adminpass8'),
    ('admin9', 'Olivia Admin', 'admin9@email.com', 'adminpass9'),
    ('admin10', 'Michael Admin', 'admin10@email.com', 'adminpass10'),
    ('admin11', 'Sarah Admin', 'admin11@email.com', 'adminpass11'),
    ('admin12', 'Daniel Admin', 'admin12@email.com', 'adminpass12'),
    ('admin13', 'Sophia Admin', 'admin13@email.com', 'adminpass13'),
    ('admin14', 'William Admin', 'admin14@email.com', 'adminpass14'),
    ('admin15', 'Emily Admin', 'admin15@email.com', 'adminpass15'),
    ('admin16', 'Jacob Admin', 'admin16@email.com', 'adminpass16'),
    ('admin17', 'Ava Admin', 'admin17@email.com', 'adminpass17'),
    ('admin18', 'Logan Admin', 'admin18@email.com', 'adminpass18'),
    ('admin19', 'Mia Admin', 'admin19@email.com', 'adminpass19'),
    ('admin20', 'Benjamin Admin', 'admin20@email.com', 'adminpass20');
    
    INSERT INTO category (category_name, book_ids) VALUES
    ('Mystery', '1,3,5,7,9'),
    ('Science Fiction', '2,4,6,8,10'),
    ('Romance', '11,13,15,17,19'),
    ('Fantasy', '12,14,16,18,20');

    INSERT INTO course_prerequisites (course_id, prerequisite_book_id) VALUES
    ('201','2'),
    ('102','4');


    
