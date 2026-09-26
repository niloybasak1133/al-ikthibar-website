CREATE DATABASE IF NOT EXISTS ikthibar CHARACTER SET utf8mb4;
USE ikthibar;
CREATE TABLE users(id INT AUTO_INCREMENT PRIMARY KEY,name VARCHAR(100),email VARCHAR(150) UNIQUE,password_hash VARCHAR(255),role ENUM('admin','staff') DEFAULT 'staff',created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP);
CREATE TABLE shops(id INT AUTO_INCREMENT PRIMARY KEY,shop_label VARCHAR(100),address TEXT,staff_name VARCHAR(100),whatsapp_number VARCHAR(20),is_active TINYINT(1) DEFAULT 1,sort_order INT DEFAULT 0);
CREATE TABLE service_categories(id INT AUTO_INCREMENT PRIMARY KEY,name VARCHAR(100),slug VARCHAR(100) UNIQUE);
CREATE TABLE services(id INT AUTO_INCREMENT PRIMARY KEY,category_id INT,title VARCHAR(150),icon VARCHAR(10) DEFAULT '🔧',description TEXT,image_path VARCHAR(255),is_active TINYINT(1) DEFAULT 1,sort_order INT DEFAULT 0,FOREIGN KEY(category_id) REFERENCES service_categories(id) ON DELETE SET NULL);
CREATE TABLE bookings(id INT AUTO_INCREMENT PRIMARY KEY,customer_name VARCHAR(100),phone VARCHAR(20),email VARCHAR(150),vehicle VARCHAR(150),service_id INT,shop_id INT,booking_date DATE,booking_time TIME,notes TEXT,status ENUM('new','confirmed','in_progress','completed','cancelled') DEFAULT 'new',created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,FOREIGN KEY(service_id) REFERENCES services(id) ON DELETE SET NULL,FOREIGN KEY(shop_id) REFERENCES shops(id) ON DELETE SET NULL);
CREATE TABLE hero_slides(id INT AUTO_INCREMENT PRIMARY KEY,image_path VARCHAR(255),headline VARCHAR(200),subtext VARCHAR(255),sort_order INT DEFAULT 0,is_active TINYINT(1) DEFAULT 1);
CREATE TABLE about_stats(id INT AUTO_INCREMENT PRIMARY KEY,stat_label VARCHAR(100),stat_value VARCHAR(50),sort_order INT DEFAULT 0);
CREATE TABLE testimonials(id INT AUTO_INCREMENT PRIMARY KEY,customer_name VARCHAR(100),rating TINYINT,comment TEXT,is_approved TINYINT(1) DEFAULT 0);
CREATE TABLE contact_messages(id INT AUTO_INCREMENT PRIMARY KEY,name VARCHAR(100),phone VARCHAR(20),email VARCHAR(150),message TEXT,is_read TINYINT(1) DEFAULT 0,created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP);
INSERT INTO shops(shop_label,address,staff_name,whatsapp_number,sort_order) VALUES('Shop 1 – Niloy N6','Niloy Industrial Area N6, Abu Dhabi, UAE','Niloy','8801537470591',1),('Shop 2 – Niloy N5','Niloy Industrial Area N5, Abu Dhabi, UAE','Sajid','8801537470591',2);
INSERT INTO service_categories(name,slug) VALUES('Mechanical','mechanical'),('Electrical & AC','electrical'),('Body & Paint','body'),('Maintenance','maintenance');
INSERT INTO services(category_id,title,icon,description,sort_order) VALUES
(1,'Complete Mechanical Repair','🛠️','Engine, gearbox, brakes and suspension repaired by certified technicians.',1),
(2,'Car Electrical Repair','⚡','Wiring faults, alternators, starters, sensors and ECU diagnostics.',2),
(2,'Car AC Repair & Service','❄️','Gas refill, compressor and leak repair to keep the cabin cold in summer.',3),
(3,'Denting & Painting','🎨','Dent removal and showroom-quality paint matching for every colour.',4),
(1,'Car Airbag Repair','🛡️','Airbag module, sensor and warning-light repair done safely.',5),
(4,'Wiper Blades Replacement','🌧️','Quick fit of new wiper blades for clear vision in any weather.',6),
(4,'Battery Replacement','🔋','Battery testing and same-day replacement for all makes.',7),
(2,'Dashboard & Navigation Repair','📟','Screen, cluster and navigation unit repair without full replacement.',8);
INSERT INTO hero_slides(headline,subtext,sort_order) VALUES('UAE''s trusted car repair specialists','Professional diagnostics and repair across Abu Dhabi.',1),('ECU diagnostics & electrical repair','Engine control unit checks and precision vehicle electronics.',2),('Quality you can trust, every time','Honest pricing and fast turnarounds on every job.',3);
INSERT INTO about_stats(stat_label,stat_value,sort_order) VALUES('Services offered','15+',1),('UAE locations','2',2),('Quality focus','100%',3),('WhatsApp support','24/7',4);
INSERT INTO testimonials(customer_name,rating,comment,is_approved) VALUES('Tusher.',5,'Fixed my AC in one day at a fair price. Very professional team.',1),('Nokib.',5,'They found the electrical fault other garages missed.',1),('Protom.',5,'Quick airbag repair and clear communication over WhatsApp.',1);
