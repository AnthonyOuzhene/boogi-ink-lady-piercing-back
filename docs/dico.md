# Dictionnaire de données

## USER (`utilisateur`)

|Champ|Type|Spécificités|Description|
|-|-|-|-|
|user_identifier|INT|PRIMARY KEY, NOT NULL, UNSIGNED, AUTO_INCREMENT|User ID|
|email|VARCHAR(125)|NOT NULL|User email to login|
|password|VARCHAR(255)|NOT NULL|Hashed password|
|role|VARCHAR(64)|NOT NULL|User role for security purposes|
|name|VARCHAR(64)|NOT NULL|User name|

## HOME (`Salon`)

|Champ|Type|Spécificités|Description|
|-|-|-|-|
|home_identifier|INT|PRIMARY KEY, NOT NULL, UNSIGNED, AUTO_INCREMENT|Home ID|
|name|VARCHAR(64)|NOT NULL,|Home name|
|address|VARCHAR(125)|NOT NULL|Home address|
|zip_code|INT|NOT NULL|Home address|
|home_img|VARCHAR(125)|NOT NULL|Picture of home|
|phone_number|VARCHAR(125)|NOT NULL|Home phone number|
|status|BOOLEAN|UNSIGNED, NOT NULL| Home open or closed |

## ACTIVITY (`activité`) 

|Champ|Type|Spécificités|Description|
|-|-|-|-|
|Activity_identifier|INT|PRIMARY KEY, NOT NULL, UNSIGNED, AUTO_INCREMENT|Activity ID|
|name|VARCHAR(64)|NOT NULL,|Activity name|
|brand_name|VARCHAR(64)|NOT NULL|Brand name|
|logo|VARCHAR(64)|NOT NULL|Logo picture|

## Service (`prestations`)

|Champ|Type|Spécificités|Description|
|-|-|-|-|
|service_identifier|INT|PRIMARY KEY, NOT NULL, UNSIGNED, AUTO_INCREMENT|Service ID|
|name|VARCHAR(255)|NOT NULL|Service name|
|price|FLOAT|NOT NULL|Service price|
|description|TEXT|NULL|Service description|
|picture|VARCHAR(64)|NULL|Service image|
|category_name|ENTITY|UNSIGNED, NULL| Category of service proposed
|activity_name|ENTITY|UNSIGNED, NOT NULL| activity ID to connect to Service

## GALLERY (`galerie`)


|Champ|Type|Spécificités|Description|
|-|-|-|-|
|gallery_identifier|INT|PRIMARY KEY, NOT NULL, UNSIGNED, AUTO_INCREMENT|Media ID|
|name|VARCHAR(255)|NOT NULL|Service name|
|main_picture|VARCHAR(255)|NOT NULL|Media main picture|
|picture1|VARCHAR(255)|NULL|additionnal picture 1|
|picture2|VARCHAR(255)|NULL|additionnal picture 2|
|picture3|VARCHAR(255)|NULL|additionnal picture 3|
|picture4|VARCHAR(255)|NULL|additionnal picture 4|
|picture5|VARCHAR(255)|NULL|additionnal picture 5|
|video|VARCHAR(255)|NULL|Media video|
|realisation_date|DATE|NULL|realisation date of service|
|activity_name|ENTITY|UNSIGNED, NOT NULL| activity ID to connect to Media
|category_name|ENTITY|UNSIGNED, NULL| category ID to connect to Media

## CATEGORY(`Categorie`)

|Champ|Type|Spécificités|Description|
|-|-|-|-|
|category_identifier|INT|PRIMARY KEY, NOT NULL, UNSIGNED,AUTO_INCREMENT|Category ID|
|name|VARCHAR(64)|NOT NULL|Category name|


## POST(`Blog`)

|Champ|Type|Spécificités|Description|
|-|-|-|-|
|post_identifier|INT|PRIMARY KEY, NOT NULL, UNSIGNED,AUTO_INCREMENT|Post ID|
|title|VARCHAR(128)|NOT NULL|Titre de l'article|
|summary|TEXT|NOT NULL|Résumé de l'article|
|content|LONG TEXT|NOT NULL|Contenu de l'article|
|featured_img|VARCHAR(256)|NOT NULL|Image d'illustration de l'article|
|created_at|DATETIME|NOT NULL|Date de publication|
|user_id|ENTITY|UNSIGNED, NOT NULL| User Id ayant posté l'article

## COMMENT(`commentaire`)

|Champ|Type|Spécificités|Description|
|-|-|-|-|
|comment_identifier|INT|PRIMARY KEY, NOT NULL, UNSIGNED,AUTO_INCREMENT|Comment ID|
|project_name|VARCHAR(128)|NULL|Nom du tatouage/piercing réalisé|
|realisation_date|DATE|NULL|Date de la prestation|
|title|VARCHAR(128)|NOT NULL|Titre du commentaire|
|message|LONG TEXT|NOT NULL|Avis de la prestation|
|comment_date|DATETIME|NOT NULL|Date de l'avis|
|user_id|ENTITY|UNSIGNED, NOT NULL| User Id ayant laissé le commentaire
|activity_name|ENTITY|NOT NULL, UNSIGNED|le nom de l'activité|


<!-- Entités à créer plus tard  -->

## PRODUCT(`Produit`)

|Champ|Type|Spécificités|Description|
|-|-|-|-|
|product_identifier|INT|PRIMARY KEY, NOT NULL, UNSIGNED,AUTO_INCREMENT|Product ID|
|name|VARCHAR(64)|NOT NULL|Product name|
|picture|VARCHAR(256)|NOT NULL|Image d'illustration du produit|
|price|FLOAT|NOT NULL|Prix du produit|
|description|TEXT|NOT NULL|Description du produit|
|activity_name|ENTITY|NOT NULL, UNSIGNED|le nom de l'activité|

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


