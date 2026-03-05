CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100),
  email VARCHAR(100) UNIQUE,
  password VARCHAR(255),
  role ENUM('admin','approver') NOT NULL
);

CREATE TABLE vehicles (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100),
  type VARCHAR(50),
  plate_number VARCHAR(20)
);

CREATE TABLE drivers (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100),
  phone VARCHAR(30)
);

CREATE TABLE bookings (
  id INT AUTO_INCREMENT PRIMARY KEY,
  vehicle_id INT,
  driver_id INT,
  booking_date DATE,
  purpose VARCHAR(255),
  approver1_id INT,
  approver2_id INT,
  status_level1 ENUM('PENDING','APPROVED','REJECTED') DEFAULT 'PENDING',
  status_level2 ENUM('WAITING','PENDING','APPROVED','REJECTED') DEFAULT 'WAITING',
  final_status ENUM('PENDING','APPROVED','REJECTED') DEFAULT 'PENDING',
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (vehicle_id) REFERENCES vehicles(id),
  FOREIGN KEY (driver_id) REFERENCES drivers(id)
);