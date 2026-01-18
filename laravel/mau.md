laravel new kt
cd medicine

php artisan make:migration create_medicines_table 
public function up(): void
    {
        Schema::create('medicines', function (Blueprint $table) {
            $table->id();       // Primary Key
            $table->string('name', 255);             // Tên thuốc
            $table->string('brand', 100)->nullable(); // Thương hiệu (tùy chọn)
            $table->string('dosage', 50);            // Liều lượng
            $table->string('form', 50);              // Dạng thuốc
            $table->decimal('price', 10, 2);         // Giá
            $table->integer('stock');                // Số lượng tồn
            $table->timestamps();   
        });
    }

php artisan make:migration create_sales_table
public function up(): void
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id();            // Primary Key
            $table->foreignId('store_id')->constrained('medicines')->onDelete('cascade'); // Khóa ngoại
            $table->integer('quantity');              // Số lượng bán
            $table->dateTime('sale_date');            // Ngày bán
            $table->string('customer_phone', 10)->nullable(); // SDT khách (optional)
            $table->timestamps();
        });
    }

 php artisan migrate

 php artisan make:seeder MedicineSeed
 php artisan make:seeder SaleSeed

 php artisan db:seed --class=MedicineSeeder
 php artisan db:seed --class=SaleSeeder  

 php artisan make:model Medicine
 php artisan make:model Sale

 php artisan make:controller SaleController --resource

 php artisan serve  