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

    public function create($product_name, $price, $quantity, $product_description, $category_id, $image_path, $is_featured)
    {
        $sql = "INSERT INTO {$this->table}
            (product_name, price, quantity, product_description, category_id, image_path, is_featured)
            VALUES (:name, :price, :quantity, :description, :category, :image_path, :is_featured)";

        $stmt = $this->db->prepare($sql);

        $stmt->execute([
            ':name' => $product_name,
            ':price' => $price,
            ':quantity' => $quantity,
            ':description' => $product_description,
            ':category' => $category_id,
            ':image_path' => $image_path,
            ':is_featured' => $is_featured
        ]);


        return $this->db->lastInsertId();
    }



    public function addDiscount($product_id, $discount, $start, $end)
    {
        $sql = "INSERT INTO discounts (product_id, discount, start_date, end_date)
            VALUES (:pid, :discount, :start, :end)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            ':pid' => $product_id,
            ':discount' => $discount,
            ':start' => $start,
            ':end' => $end
        ]);
    }


    public function update_Discount($discount, $start, $end, $product_id)
    {

        $sql = "update discounts set
        
         discount= :discountt, start_date = :start, end_date = :end 
            
        where product_id= :id
         ";


        $stmt = $this->db->prepare($sql);
        $stmt->execute([

            ':discountt' => $discount,
            ':start' => $start,
            ':end' => $end,

            ':id' => $product_id
        ]);



    }




    public function read_all_discounts()
    {

        $query = "SELECT * FROM discounts";

        $stmt = $this->db->prepare($query);

        $stmt->execute();

        return $stmt; // Returns a PDOStatement object



    }





    public function readAll()
    {
        $query = "SELECT * FROM {$this->table}";

        $stmt = $this->db->prepare($query);

        $stmt->execute();

        return $stmt; // Returns a PDOStatement object

    }

    public function read_just_featured()
    {

        $query = "SELECT * FROM {$this->table} where is_featured = 1 limit 4";

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


    public function delete_product($id)
    {

        $query = 'delete from products where product_id = :id';

        $stmt = $this->db->prepare($query);

        $stmt->bindParam(':id', $id);
        $stmt->execute();

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



    public function delete_cat($id)
    {

        $query = 'delete from categories where category_id = :id';

        $stmt = $this->db->prepare($query);

        $stmt->bindParam(':id', $id);
        $stmt->execute();


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



    public function get_single_categoty($id)
    {

        $query = "SELECT category_name FROM categories where category_id = :id limit 1";

        $stmt = $this->db->prepare($query);

        $stmt->bindParam(":id", $id);

        $stmt->execute();

        return $stmt->fetch(); // Returns a PDOStatement object

    }



    public function calculate_categories()
    {
        $query = "SELECT category_id FROM categories";

        $stmt = $this->db->prepare($query);

        $stmt->execute();

        $number = $stmt->rowCount();

        return $number; // Returns a PDOStatement object



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



    public function calculate_OrderItems()
    {


        $query = "SELECT price_at_purchase FROM order_items";

        $stmt = $this->db->prepare($query);

        $stmt->execute();

        $total_income = 0;

        while ($row = $stmt->fetch()) {

            $total_income += $row['price_at_purchase'];


        }




        return $total_income;



    }


    public function get_old_image_path($id)
    {

        $query = "SELECT image_path FROM products where product_id = :id limit 1";

        $stmt = $this->db->prepare($query);

        $stmt->bindParam(":id", $id, PDO::PARAM_INT);

        $stmt->execute();

        return $stmt->fetch();


    }






    public function read_all_orderItems()
    {

        $query = 'select * from order_items';

        $stmt = $this->db->prepare($query);

        $stmt->execute();

        return $stmt;


    }

    public function num_of_orders()
    {

        $query = 'select order_id from orders';

        $stmt = $this->db->prepare($query);

        $stmt->execute();

        $number = $stmt->rowCount();

        return $number;


    }


    public function read_all_orders()
    {


        $query = 'select * from orders';

        $stmt = $this->db->prepare($query);
        $stmt->execute();


        return $stmt;
    }


    public function get_user_with_order()
    {


        $query = 'SELECT orders.*, users.*
FROM orders
JOIN users ON orders.user_id = users.user_id';
        $stmt = $this->db->prepare($query);
        $stmt->execute();

        return $stmt;







    }


    public function get_order_by_id($id)
    {


        $query = 'select * from orders where order_id= :id';

        $stmt = $this->db->prepare(query: $query);

        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        $stmt->execute();



        return $stmt->fetch();



    }



    public function num_of_users()
    {

        $query = 'select user_id from users';

        $stmt = $this->db->prepare(query: $query);
        $stmt->execute();

        $number = $stmt->rowCount();

        return $number;

    }

    public function read_all_users()
    {

        $query = 'select * from users';

        $stmt = $this->db->prepare(query: $query);
        $stmt->execute();



        return $stmt;

    }
    public function read_user_by_id($id)
    {

        $query = 'select * from users where user_id = :id';

        $stmt = $this->db->prepare(query: $query);

        $stmt->bindParam(':id', $id);

        $stmt->execute();



        return $stmt->fetch();

    }




    public function delete_user($id)
    {

        $query = 'delete from users where user_id = :id';

        $stmt = $this->db->prepare($query);

        $stmt->bindParam(':id', $id);
        $stmt->execute();


    }




    // Update a product
    public function update_product($product_name, $price, $quantity, $product_description, $category_id, $image_path, $is_featured, $product_id)
    {


        $sql = "
UPDATE products
SET product_name = :name, price = :price, quantity = :quantity, product_description = :pro_des, category_id = :cat_id, image_path = :image_path, is_featured = :is_f
WHERE product_id = :id; ";


        $stmt = $this->db->prepare($sql);
        $stmt->execute([

            ':name' => $product_name,
            ':price' => $price,
            ':quantity' => $quantity,
            ':pro_des' => $product_description,
            ':cat_id' => $category_id,
            ':image_path' => $image_path,
            ':is_f' => $is_featured,

            ':id' => $product_id

        ]);


        return $product_id;
    }




}
