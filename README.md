# Database Schema

## Users
| Column Name  | Data Type | Constraints  |
|--------------|-----------|--------------|
| user_id      | INT       | PRIMARY KEY  |
<!-- | username      | VARCHAR   | NOT NULL     | -->
| password      | VARCHAR   | NOT NULL     |
| email        | VARCHAR   | NOT NULL     |
| first_name   | VARCHAR   | NOT NULL     |
| last_name    | VARCHAR   | NOT NULL     |
| created_at   | TIMESTAMP | NOT NULL     |
| updated_at   | TIMESTAMP | NOT NULL     |

## Products
| Column Name   | Data Type | Constraints   |
|---------------|-----------|---------------|
| product_id    | INT       | PRIMARY KEY   |
| name           | VARCHAR   | NOT NULL      |
| description    | TEXT      |               |
| price         | DECIMAL   | NOT NULL      |
| stock         | INT       | NOT NULL      |
| category_id   | INT       | FOREIGN KEY   |
| created_at    | TIMESTAMP | NOT NULL      |
| updated_at    | TIMESTAMP | NOT NULL      |

## Categories
| Column Name   | Data Type | Constraints   |
|---------------|-----------|---------------|
| category_id    | INT       | PRIMARY KEY   |
| name           | VARCHAR   | NOT NULL      |
| description    | TEXT      |               |
| created_at    | TIMESTAMP | NOT NULL      |
| updated_at    | TIMESTAMP | NOT NULL      |

## Orders
| Column Name   | Data Type | Constraints   |
|---------------|-----------|---------------|
| order_id      | INT       | PRIMARY KEY   |
| user_id       | INT       | FOREIGN KEY   |
| order_date    | TIMESTAMP | NOT NULL      |
| total_amount   | DECIMAL   | NOT NULL      |
| status        | VARCHAR   | NOT NULL      |
| created_at    | TIMESTAMP | NOT NULL      |
| updated_at    | TIMESTAMP | NOT NULL      |

## Order_Items
| Column Name    | Data Type | Constraints   |
|----------------|-----------|---------------|
| order_item_id  | INT       | PRIMARY KEY   |
| order_id       | INT       | FOREIGN KEY   |
| product_id     | INT       | FOREIGN KEY   |
| quantity       | INT       | NOT NULL      |
| price          | DECIMAL   | NOT NULL      |

## Shopping_Cart
| Column Name    | Data Type | Constraints   |
|----------------|-----------|---------------|
| cart_id        | INT       | PRIMARY KEY   |
| user_id        | INT       | FOREIGN KEY   |
| created_at     | TIMESTAMP | NOT NULL      |
| updated_at     | TIMESTAMP | NOT NULL      |

## Cart_Items
| Column Name    | Data Type | Constraints   |
|----------------|-----------|---------------|
| cart_item_id   | INT       | PRIMARY KEY   |
| cart_id        | INT       | FOREIGN KEY   |
| product_id     | INT       | FOREIGN KEY   |
| quantity       | INT       | NOT NULL      |

## Payments
| Column Name    | Data Type | Constraints   |
|----------------|-----------|---------------|
| payment_id     | INT       | PRIMARY KEY   |
| order_id       | INT       | FOREIGN KEY   |
| amount         | DECIMAL   | NOT NULL      |
| payment_date   | TIMESTAMP | NOT NULL      |
| status         | VARCHAR   | NOT NULL      |

## Shipping
| Column Name    | Data Type | Constraints   |
|----------------|-----------|---------------|
| shipping_id    | INT       | PRIMARY KEY   |
| order_id       | INT       | FOREIGN KEY   |
| address        | VARCHAR   | NOT NULL      |
| city           | VARCHAR   | NOT NULL      |
| postal_code    | VARCHAR   | NOT NULL      |
| country        | VARCHAR   | NOT NULL      |
| shipping_date  | TIMESTAMP | NOT NULL      |


