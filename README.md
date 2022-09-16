Online store "Laravel Shop", which sells various products.
Over time, the range has increased, and we have opened several cities in which we deliver.

**We need to add filters so that a person can view products only in the right categories and cities**.

**Filterig:**
- Filter by category - should allow you to select only one category of goods.
- Filter by city - should allow you to select one or more cities that have the desired product.
- You can select category and city at the same time.
- Filtering should work at the database level.

**Test data**
- It is necessary to write a seeder that will create 5 thousand products, 100 categories and 30 cities and link them.
- The names of products, categories and cities can be random words or identifiers.

**Interface**
- Created with Laravel Livewire to update data without reloading the page when selecting selects and checkboxes.


**How to deploy a project**

Instruction using Docker:

```bash
git clone git@github.com:a-romald/laravel-shop.git && cd laravel-shop

cp .env.example .env

docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v $(pwd):/var/www/html \
    -w /var/www/html \
    laravelsail/php81-composer:latest \
    composer install --ignore-platform-reqs
    
./vendor/bin/sail up -d

./vendor/bin/sail artisan key:generate

./vendor/bin/sail artisan migrate --seed

./vendor/bin/sail test
```
