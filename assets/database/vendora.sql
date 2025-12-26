CREATE DATABASE vendora;

USE vendora;

CREATE TABLE users (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    email VARCHAR(100),
    password VARCHAR(255),
    register_date DATE,
    gender VARCHAR(10),
    user_type VARCHAR(20)
);

CREATE TABLE addresses (
    address_id INT AUTO_INCREMENT PRIMARY KEY,
    address_name VARCHAR(100),
    city VARCHAR(50),
    country VARCHAR(50),
    street VARCHAR(100),
    building_number VARCHAR(20),
    phone VARCHAR(20),
    user_id INT,
    FOREIGN KEY (user_id) REFERENCES users(user_id)
);

CREATE TABLE categories (
    category_id INT AUTO_INCREMENT PRIMARY KEY,
    category_name VARCHAR(100),
    created_at DATE,
    category_image VARCHAR(255)
);

CREATE TABLE products (
    product_id INT AUTO_INCREMENT PRIMARY KEY,
    product_name VARCHAR(100),
    price DECIMAL(10, 2),
    quantity INT,
    product_description TEXT,
    is_visible BOOLEAN,
    has_warranty BOOLEAN,
    warranty_period INT,
    category_id INT,
    FOREIGN KEY (category_id) REFERENCES categories(category_id)
);

CREATE TABLE orders (
    order_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    shipping_date DATE,
    shipping_address VARCHAR(255),
    total_quantity INT,
    total_price DECIMAL(10, 2),
    order_status VARCHAR(30),
    FOREIGN KEY (user_id) REFERENCES users(user_id)
);

CREATE TABLE order_items (
    order_item_id INT AUTO_INCREMENT PRIMARY KEY,
    order_id INT,
    product_id INT,
    product_quantity INT,
    price_at_purchase DECIMAL(10, 2),
    FOREIGN KEY (order_id) REFERENCES orders(order_id),
    FOREIGN KEY (product_id) REFERENCES products(product_id)
);

CREATE TABLE reviews (
    review_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    product_id INT,
    product_description TEXT,
    FOREIGN KEY (user_id) REFERENCES users(user_id),
    FOREIGN KEY (product_id) REFERENCES products(product_id)
);

CREATE TABLE ratings (
    rating_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    product_id INT,
    rating TINYINT,
    FOREIGN KEY (user_id) REFERENCES users(user_id),
    FOREIGN KEY (product_id) REFERENCES products(product_id)
);

CREATE TABLE wishlist (
    wishlist_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    product_id INT,
    FOREIGN KEY (user_id) REFERENCES users(user_id),
    FOREIGN KEY (product_id) REFERENCES products(product_id)
);

CREATE TABLE bank_cards (
    card_id INT AUTO_INCREMENT PRIMARY KEY,
    card_name VARCHAR(100),
    card_number VARCHAR(20),
    expiry_date VARCHAR(10),
    cvv VARCHAR(5),
    address VARCHAR(255)
);

CREATE TABLE cart (
    cart_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    product_id INT,
    quantity INT,
    FOREIGN KEY (user_id) REFERENCES users(user_id),
    FOREIGN KEY (product_id) REFERENCES products(product_id)
);

CREATE TABLE discounts (
    discount_id INT AUTO_INCREMENT PRIMARY KEY,
    product_id INT,
    discount_percentage INT,
    start_date DATE,
    end_date DATE,
    FOREIGN KEY (product_id) REFERENCES products(product_id)
);