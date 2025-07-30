-- Pet Profiles CMS - Final Database Setup

-- Create database
CREATE DATABASE IF NOT EXISTS pet_profiles_cms;
USE pet_profiles_cms;


-- Admins table
CREATE TABLE admins (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Pets table
CREATE TABLE pets (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    breed VARCHAR(100) NOT NULL,
    story TEXT NOT NULL,
    photo VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Breeds table for normalization
CREATE TABLE breeds (
    id INT AUTO_INCREMENT PRIMARY KEY,
    breed_name VARCHAR(100) NOT NULL UNIQUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Insert sample admin (password: admin123)
INSERT INTO admins (username, password) VALUES 
('admin', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi');

-- Insert breed data
INSERT INTO breeds (breed_name) VALUES
('Golden Retriever'),
('Siamese Cat'),
('Bulldog'),
('Beagle'),
('Labrador'),
('Persian Cat'),
('German Shepherd'),
('Poodle'),
('Husky'),
('Maine Coon');

-- Insert sample pet data
INSERT INTO pets (name, breed, story, photo) VALUES
('Buddy', 'Golden Retriever', 'A loyal and playful friend who loves fetch and long walks in the park. Buddy is great with kids and other pets.', 'buddy.jpg'),
('Luna', 'Siamese Cat', 'Mysterious and elegant with piercing blue eyes and a gentle purr. Luna loves sunny windowsills and gentle head scratches.', 'luna.jpg'),
('Max', 'Bulldog', 'Loves naps and belly rubs. A gentle giant with a heart of gold who enjoys short walks and lots of cuddles.', 'max.jpg'),
('Daisy', 'Beagle', 'Always sniffing around the garden, curious about everything around her. Daisy is energetic and loves outdoor adventures.', 'daisy.jpg'),
('Charlie', 'Labrador', 'Friendly and outgoing, Charlie loves swimming and playing fetch. Perfect family companion with endless energy.', 'charlie.jpg'),
('Whiskers', 'Persian Cat', 'Fluffy and regal, Whiskers enjoys quiet moments and gentle brushing. A calm and loving indoor companion.', 'whiskers.jpg');
