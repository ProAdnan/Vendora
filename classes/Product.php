<?php

require_once './Database.php';

class Product
{
    private $db;
    private $table = "products";

    // Product properties
    public $id;
    public $name;
    public $description;
    public $price;
    public $category_id;
    public $image;
    public $stock;

    public function __construct()
    {

        $this->db = Database::getInstance()->getConnection();

    }

    // Create a new product
    public function create()
    {
        // Implement with prepared statements
    }

    // Read all products with optional filtering and pagination
    public function readAll()
    {
        // Implement with prepared statements
        // Return array of products
    }

    // Read a single product by ID
    public function readOne($id)
    {
        // Implement with prepared statements
        // Return product object or false
    }

    // Update a product
    public function update()
    {
        // Implement with prepared statements
    }

    // Delete a product
    public function delete($id)
    {
        // Implement with prepared statements
    }

    // Handle file uploads for product images
    public function uploadImage($file)
    {
        // Implement secure file upload
        // Return filename or false
    }
}
