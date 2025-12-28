<?php

require_once __DIR__ . '/Database.php';

class Product
{
    private $db;
    private $table = "products";

    public $product_id;
    public $product_name;
    public $price;
    public $quantity;
    public $product_description;
    public $is_visible;
    public $has_warranty;

    public $warranty_period;
    public $category_id;

    public function __construct()
    {

        $this->db = Database::getInstance()->getConnection();

    }

    public function create($product_name, $price, $quantity, $product_description, $category_id, $image_path)
    {

        // if ($table == "products") {

        $sql = "INSERT INTO {$this->table}

            (product_name, price, quantity, product_description, category_id,image_path)

            VALUES (:name, :price, :quantity, :description, :category, :image_path)";



        $stmt = $this->db->prepare($sql);


        return $stmt->execute([
            ':name' => $product_name,
            ':price' => $price,
            ':quantity' => $quantity,
            ':description' => $product_description,
            ':category' => $category_id,
            ':image_path' => $image_path
        ]);



        //         } elseif ($table == "discounts") {

        //             $discount;

        // $sql = "INSERT INTO {$table}

        //             (product_name, price, quantity, product_description, category_id)

        //             VALUES (:name, :price, :quantity, :description, :category) where product_id=";



        //             $stmt = $this->db->prepare($sql);


        //             return $stmt->execute([
//                 ':name' => $product_name,
//                 ':price' => $price,
//                 ':quantity' => $quantity,
//                 ':description' => $product_description,
//                 ':category' => $category_id
//             ]);




        //         }





    }

    public function readAll()
    {
        $query = "SELECT * FROM {$this->table}";

        $stmt = $this->db->prepare($query);

        $stmt->execute();

        return $stmt; // Returns a PDOStatement object

    }

    public function readOne($id)
    {

        $query = "SELECT *
              FROM {$this->table}
              WHERE product_id = :id
              LIMIT 1";

        $stmt = $this->db->prepare($query);

        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        $stmt->execute();

        return $stmt->fetch();



    }

    public function add_category($category)
    {


        $sql = "INSERT INTO categories

            (category_name)

            VALUES (:name)";



        $stmt = $this->db->prepare($sql);


        return $stmt->execute([
            ':name' => $category

        ]);


    }


    public function read_all_category()
    {

        $query = "SELECT * FROM categories";

        $stmt = $this->db->prepare($query);

        $stmt->execute();

        return $stmt; // Returns a PDOStatement object



    }


    public function read_by_category($cat)
    {

        $query = "SELECT * FROM products where category_id = :id limit 4";

        $stmt = $this->db->prepare($query);

        $stmt->bindParam(":id", $cat, PDO::PARAM_INT);

        $stmt->execute();

        return $stmt; // Returns a PDOStatement object


    }


    public function filterProducts($filters = [])
    {

        $sql = "SELECT * FROM products WHERE 1=1";


        $params = [];

        
        if (!empty($filters['category_id'])) {

            $sql .= " AND category_id = :category_id";
            $params[':category_id'] = $filters['category_id'];

        }

        
        if (!empty($filters['min_price'])) {

            $sql .= " AND price >= :min_price";
            $params[':min_price'] = $filters['min_price'];

        }

       
        if (!empty($filters['max_price'])) {

            $sql .= " AND price <= :max_price";
            $params[':max_price'] = $filters['max_price'];

        }

        
        if (!empty($filters['search'])) {

            $sql .= " AND product_name LIKE :search";
            $params[':search'] = '%' . $filters['search'] . '%';

        }

        if (isset($filters['is_visible'])) {

            $sql .= " AND is_visible = :is_visible";
            $params[':is_visible'] = $filters['is_visible'];

        }

        $stmt = $this->db->prepare($sql);

        $stmt->execute($params);

        return $stmt;
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
