-- Database: inventaris_peminjaman
-- Sistem Inventaris Peminjaman Barang

CREATE DATABASE IF NOT EXISTS inventaris_peminjaman;
USE inventaris_peminjaman;

-- Table: users
CREATE TABLE IF NOT EXISTS users (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    phone VARCHAR(255) NULL,
    role ENUM('admin', 'user') NOT NULL DEFAULT 'user',
    password VARCHAR(255) NOT NULL,
    remember_token VARCHAR(100) NULL,
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Table: categories
CREATE TABLE IF NOT EXISTS categories (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description TEXT NULL,
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Table: items
CREATE TABLE IF NOT EXISTS items (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    code VARCHAR(255) NOT NULL UNIQUE,
    name VARCHAR(255) NOT NULL,
    category_id BIGINT UNSIGNED NOT NULL,
    description TEXT NULL,
    quantity INT NOT NULL,
    available_quantity INT NOT NULL,
    `condition` ENUM('baik', 'rusak ringan', 'rusak berat') NOT NULL DEFAULT 'baik',
    location VARCHAR(255) NULL,
    image VARCHAR(255) NULL,
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL,
    FOREIGN KEY (category_id) REFERENCES categories(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Table: borrowings
CREATE TABLE IF NOT EXISTS borrowings (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    borrowing_code VARCHAR(255) NOT NULL UNIQUE,
    user_id BIGINT UNSIGNED NOT NULL,
    item_id BIGINT UNSIGNED NOT NULL,
    quantity INT NOT NULL,
    borrow_date DATE NOT NULL,
    due_date DATE NOT NULL,
    return_date DATE NULL,
    status ENUM('dipinjam', 'dikembalikan', 'terlambat') NOT NULL DEFAULT 'dipinjam',
    purpose TEXT NULL,
    notes TEXT NULL,
    item_condition_borrow ENUM('baik', 'rusak ringan', 'rusak berat') NOT NULL DEFAULT 'baik',
    item_condition_return ENUM('baik', 'rusak ringan', 'rusak berat') NULL,
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (item_id) REFERENCES items(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Insert Default Data

-- Users
INSERT INTO users (name, email, phone, role, password, created_at, updated_at) VALUES
('Administrator', 'admin@admin.com', '081234567890', 'admin', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NOW(), NOW()),
('Budi Santoso', 'budi@example.com', '081234567891', 'user', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NOW(), NOW()),
('Siti Nurhaliza', 'siti@example.com', '081234567892', 'user', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NOW(), NOW());

-- Categories
INSERT INTO categories (name, description, created_at, updated_at) VALUES
('Elektronik', 'Peralatan elektronik seperti laptop, proyektor, dll', NOW(), NOW()),
('Olahraga', 'Peralatan olahraga seperti bola, raket, dll', NOW(), NOW()),
('Alat Tulis', 'Peralatan tulis menulis dan kantor', NOW(), NOW()),
('Laboratorium', 'Peralatan laboratorium dan praktikum', NOW(), NOW()),
('Multimedia', 'Peralatan multimedia seperti kamera, mic, dll', NOW(), NOW());

-- Items
INSERT INTO items (code, name, category_id, description, quantity, available_quantity, `condition`, location, created_at, updated_at) VALUES
('ELK-001', 'Laptop Asus', 1, 'Laptop Asus Core i5 RAM 8GB', 10, 10, 'baik', 'Ruang TI', NOW(), NOW()),
('ELK-002', 'Proyektor Epson', 1, 'Proyektor Epson EB-X41', 5, 5, 'baik', 'Ruang Media', NOW(), NOW()),
('OLR-001', 'Bola Futsal', 2, 'Bola futsal size 4', 20, 20, 'baik', 'Gudang Olahraga', NOW(), NOW()),
('OLR-002', 'Raket Badminton', 2, 'Raket badminton Yonex', 15, 15, 'baik', 'Gudang Olahraga', NOW(), NOW()),
('ALT-001', 'Spidol Whiteboard', 3, 'Spidol whiteboard berbagai warna', 100, 100, 'baik', 'Ruang Guru', NOW(), NOW()),
('LAB-001', 'Mikroskop', 4, 'Mikroskop biologi', 8, 8, 'baik', 'Lab Biologi', NOW(), NOW()),
('MUL-001', 'Kamera DSLR Canon', 5, 'Kamera Canon EOS 700D', 3, 3, 'baik', 'Ruang Media', NOW(), NOW()),
('MUL-002', 'Microphone Wireless', 5, 'Mic wireless untuk acara', 4, 4, 'baik', 'Ruang Media', NOW(), NOW());
