# Test Project


## Setup

1. Create a MySQL or PostgreSQL database
2. Configure the `.env` with right infos :

```
STRIPE_KEY=your-stripe-key
STRIPE_SECRET=your-stripe-secret
STRIPE_PRODUCT_ID=your-stripe-product-id
STRIPE_PRICE_ID=your-stripe-price-id            

HUBSPOT_API_KEY=your-hubspot-api-key                  

3. Install vendors and run migrations:

```
composer install
php artisan migrate

4. Run npm command :

```
npm install && npm run dev
