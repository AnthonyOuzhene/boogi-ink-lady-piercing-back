:
:
POST: post_identifier, title, summary, content, featured_image, publication_date, author
:
:
:

includes, 11 ORDER DETAILS, 11 ORDER
ORDER DETAILS: order_details_identifier, order_id, product_id, product_picture, quantity, price, total
writes, 0N USER, 11 POST
:
:
:

ORDER: order_identifier, total_price, created_at, reference, status, delivery_time, user_id
can make, 11 ORDER, 0N USER
USER: user_identifier, name, password, email, role
leave, 11 COMMENT, 0N USER
COMMENT: comment_identifier, activity_name, title, project_name, message, comment_date, realisation_date, user_id
:

has, 0N PRODUCT, 1N ORDER
PRODUCT: product_identifier, name, picture, price, summary, description, activity_name
sells, 11 PRODUCT, 0N HOME
HOME: home_identifier, name, address, zip_code, home_image, phone_number, status
proposes, 11 ACTIVITY, 0N HOME
:

:
:
PRESTATIONS: service_identifier, name, price, description, picture, category_name, activity_name
belongs to, 0N ACTIVITY, 11 PRESTATIONS
ACTIVITY: activity_identifier, name, brand_name, logo
does, 0N ACTIVITY, 11 GALLERY

:
:
relates to, 01 PRESTATIONS, 1N CATEGORY
CATEGORY: category_identifier, name
is from, 00 GALLERY, 00 CATEGORY
GALLERY: prestation_identifier, name, main_picture, picture1, picture2, picture3, picture4, picture5, video, realisation_date, activity_name