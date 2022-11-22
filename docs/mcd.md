:
:
:
:
COMMENT: comment_identifier, activity_name, title, project_name, rating, message, comment_date, realisation_date, user_id
leave, 11 COMMENT, 0N USER
POST: post_identifier, title, summary, content, featured_image, publication_date, author

:
:
:
:
:
USER: user_identifier, name, password, email, role
writes, 0N USER, 11 POST

SERVICE: service_identifier, name, price, description, picture, category, activity_name
belongs to, 0N ACTIVITY, 11 SERVICE
:
includes, 11 ORDER DETAILS, 11 ORDER
ORDER: order_identifier, total_price, created_at, reference, status, delivery_time, user_id
can make, 11 ORDER, 0N USER
:

takes, 0N ACTIVITY, 11 MEDIA
ACTIVITY: activity_identifier, name, brand_name, logo
proposes, 11 ACTIVITY, 0N HOME
ORDER DETAILS: order_details_identifier, order_id, product_id, product_picture, quantity, price, total
has, 0N PRODUCT, 1N ORDER
:
:

MEDIA: media_identifier, main_picture, other_pictures, videos, activity_name
:
HOME: home_identifier, name, address, zip_code, home_img, phone_number, status
sells, 11 PRODUCT, 0N HOME
PRODUCT: product_identifier, name, picture, price, description, activity_name
:
: