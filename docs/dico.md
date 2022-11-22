# Dictionnaire de données

## USER (`utilisateur`)

|Champ|Type|Spécificités|Description|
|-|-|-|-|
|user_identifier|INT|PRIMARY KEY, NOT NULL, UNSIGNED, AUTO_INCREMENT|User ID|
|name|VARCHAR(64)|NOT NULL|User name|
|password|VARCHAR(255)|NOT NULL|Hashed password|
|email|VARCHAR(125)|NOT NULL|User email to login|
|role|VARCHAR(64)|NOT NULL|User role for security purposes|
|zip_code|INT|NOT NULL|User address|

## HOME (`Salon`)

|Champ|Type|Spécificités|Description|
|-|-|-|-|
|home_identifier|INT|PRIMARY KEY, NOT NULL, UNSIGNED, AUTO_INCREMENT|Home ID|
|name|VARCHAR(64)|NOT NULL,|Home name|
|address|VARCHAR(125)|NOT NULL|Home address|
|Home_img|VARCHAR(125)|NOT NULL|Picture of home|
|phone_number|VARCHAR(125)|NOT NULL|Home phone number|
|zip_code|INT|NOT NULL|Home address|
|status|INT|UNSIGNED, NOT NULL| Home open or closed |

## ACTIVITY (`activité`) 

|Champ|Type|Spécificités|Description|
|-|-|-|-|
|Activity_identifier|INT|PRIMARY KEY, NOT NULL, UNSIGNED, AUTO_INCREMENT|Activity ID|
|name|VARCHAR(64)|NOT NULL,|Activity name|
|brand_name|VARCHAR(64)|NOT NULL|Brand name|
|Logo|VARCHAR(64)|NOT NULL|Logo picture|


## Service (`prestations`)

|Champ|Type|Spécificités|Description|
|-|-|-|-|
|Service_identifier|INT|PRIMARY KEY, NOT NULL, UNSIGNED, AUTO_INCREMENT|Service ID|
|name|VARCHAR(64)|NOT NULL|Service name|
|price|FLOAT|NOT NULL|Service price|
|description|VARCHAR(125)|NULL|Service description|
|picture|VARCHAR(64)|NULL|Service image|
|category|VARCHAR(125)|NULL| Category of service proposed
|activity_name|ENTITY|UNSIGNED, NOT NULL| activity ID to connect to Service


## MEDIA (`Média`)

|Champ|Type|Spécificités|Description|
|-|-|-|-|
|Media_identifier|INT|PRIMARY KEY, NOT NULL, UNSIGNED, AUTO_INCREMENT|Media ID|
|main_picture|VARCHAR(64)|NOT NULL|Media main picture|
|other_pictures|VARCHAR(64)|NOT NULL|Media other pictures|
|video|VARCHAR(64)|NOT NULL|Media video|
|activity_name|ENTITY|UNSIGNED, NOT NULL| activity ID to connect to Media


## ORDER (`commande`)

|Champ|Type|Spécificités|Description|
|-|-|-|-|
|order_identifier|INT|PRIMARY KEY, NOT NULL, UNSIGNED, AUTO_INCREMENT|Tag ID|
|total_price|VARCHAR(64)|NOT NULL|Total price payed in order|
|created_at|TIMESTAMP|NOT NULL, DEFAULT CURRENT_TIMESTAMP|Order date|
|reference|INT|UNSIGNED, NOT NULL| reference of placed order
|status|INT|UNSIGNED, NOT NULL| Status of delivery
|delivery_time|TIMESTAMP|NOT NULL, DEFAULT CURRENT_TIMESTAMP| Time to deliver the product
|user_id|ENTITY|NOT NULL| User ID to connect to Order

## ORDER DETAILS (`détails de la commande`)

|Champ|Type|Spécificités|Description|
|-|-|-|-|
|order_details_identifier|INT|PRIMARY KEY, NOT NULL, UNSIGNED, AUTO_INCREMENT|order details ID|

|order_id|ENTITY|NOT NULL| Order ID to connect to Order details
|product_id|ENTITY|NOT NULL| product ID to connect to Order details
|product_picture|ENTITY|NOT NULL| Product picture ID to connect to Order details
|quantity|INT|UNSIGNED, NOT NULL| Quantity of product ordered
|price|VARCHAR(64)|NOT NULL|Price payed for detailled order|
|total|INT|UNSIGNED, NOT NULL| total price of the order


## POST(`Blog`)

|Champ|Type|Spécificités|Description|
|-|-|-|-|
|post_identifier|INT|PRIMARY KEY, NOT NULL, UNSIGNED,AUTO_INCREMENT|Post ID|
|title|VARCHAR(128)|NOT NULL|Titre de l'article|
|summary|TEXT|NOT NULL|Résumé de l'article|
|content|LONG TEXT|NOT NULL|Contenu de l'article|
|featured_image|VARCHAR(256)|NOT NULL|Image d'illustration de l'article|
|created_at|DATE|NOT NULL|Date de publication|
|user_id|ENTITY|UNSIGNED, NOT NULL| User Id ayant posté l'article

## COMMENT(`commentaire`)

|Champ|Type|Spécificités|Description|
|-|-|-|-|
|comment_identifier|INT|PRIMARY KEY, NOT NULL, UNSIGNED,AUTO_INCREMENT|Comment ID|
|activity_name|ENTITY|NOT NULL, UNSIGNED|le nom de l'activité|
|title|VARCHAR(128)|NOT NULL|Titre du commentaire|
|project_name|VARCHAR(128)|NULL|Nom du tatouage/piercing réalisé|
|rating|FLOAT|NOT NULL|Notation de la prestation|
|message|LONG TEXT|NOT NULL|Avis de la prestation|
|comment_date|DATE|NOT NULL|Date de l'avis|
|realisation_date|DATE|NULL|Date de la prestation|
|user_id|ENTITY|UNSIGNED, NOT NULL| User Id ayant laissé le commentaire

## PRODUCT(`Produit`)

|Champ|Type|Spécificités|Description|
|-|-|-|-|
|product_identifier|INT|PRIMARY KEY, NOT NULL, UNSIGNED,AUTO_INCREMENT|Product ID|
|name|VARCHAR(64)|NOT NULL|Product name|
|picture|VARCHAR(256)|NOT NULL|Image d'illustration du produit|
|price|FLOAT|NOT NULL|Prix du produit|
|description|TEXT|NOT NULL|Description du produit|
|activity_name|ENTITY|NOT NULL, UNSIGNED|le nom de l'activité|