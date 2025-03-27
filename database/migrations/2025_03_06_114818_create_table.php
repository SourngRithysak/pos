<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('tbl_currency', function (Blueprint $table) {
            $table->id(); 
            $table->decimal('usd', 15, 2); 
            $table->decimal('khr', 15, 2); 
            $table->timestamps(); 
        });

        Schema::create('tbl_branches', function (Blueprint $table) {
            $table->id(); 
            $table->string('name'); 
            $table->text('address')->nullable();
            $table->string('city')->nullable(); 
            $table->string('country')->nullable(); 
            $table->text('description')->nullable(); 
            $table->string('status'); 
            $table->timestamps(); 
        });

        Schema::create('tbl_branches_contact', function (Blueprint $table) {
            $table->id(); 
            $table->foreignId('branches_id')->constrained('tbl_branches');
            $table->string('contact_name'); 
            $table->string('contact_title')->nullable();  
            $table->string('contact_number'); 
            $table->timestamps(); 
        });

        Schema::create('tbl_departments', function (Blueprint $table) {
            $table->id(); 
            $table->string('department_name');
            $table->text('description')->nullable(); 
            $table->string('status'); 
            $table->timestamps(); 
        });

        Schema::create('tbl_employee', function (Blueprint $table) {
            $table->id();
            $table->foreignId('branches_id')->constrained('tbl_branches');
            $table->string('first_name'); 
            $table->string('last_name'); 
            $table->string('profile'); 
            $table->foreignId('departments')->constrained('tbl_departments'); 
            $table->string('title_of_courtesy'); 
            $table->foreignId('parent_id')->nullable()->constrained('tbl_employee'); 
            $table->date('hire_date')->nullable(); 
            $table->text('address')->nullable(); 
            $table->text('description')->nullable(); 
            $table->string('status'); 
            $table->timestamps(); 
        });

        Schema::create('tbl_employee_contact', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id')->constrained('tbl_employee'); 
            $table->string('contact_number'); 
            $table->timestamps(); 
        });

        Schema::create('tbl_category', function (Blueprint $table) {
            $table->id(); 
            $table->string('category_name'); 
            $table->foreignId('parent_id')->nullable()->constrained('tbl_category'); 
            $table->text('description')->nullable(); 
            $table->string('status'); 
            $table->timestamps(); 
        });

        Schema::create('tbl_unit', function (Blueprint $table) {
            $table->id(); 
            $table->string('unit_name'); 
            $table->text('description')->nullable(); 
            $table->string('status'); 
            $table->timestamps(); 
        });

        Schema::create('tbl_product', function (Blueprint $table) {
            $table->id(); 
            $table->foreignId('category_id')->constrained('tbl_category'); 
            $table->foreignId('sale_unit_id')->constrained('tbl_unit'); 
            $table->foreignId('bulk_unit_id')->nullable()->constrained('tbl_unit'); 
            $table->integer('conversion_rate')->nullable(); 
            $table->foreignId('user_id')->constrained('users'); 
            $table->string('product_name'); 
            $table->string('barcode')->nullable(); 
            $table->string('product_image')->nullable(); 
            $table->text('description')->nullable(); 
            $table->integer('is_kit')->default(0);
            $table->string('status'); 
            $table->timestamps(); 
        });

        Schema::create('tbl_kit', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kit_product_id')->constrained('tbl_product'); 
            $table->foreignId('product_id')->constrained('tbl_product'); 
            $table->foreignId('unit_id')->constrained('tbl_unit'); 
            $table->integer('quantity'); 
            $table->timestamps(); 
        });

        Schema::create('tbl_kit_transactions', function (Blueprint $table) {
            $table->id(); 
            $table->foreignId('user_id')->constrained('users'); 
            $table->foreignId('branches_id')->constrained('tbl_branches'); 
            $table->foreignId('product_id')->constrained('tbl_product'); 
            $table->foreignId('unit_id')->constrained('tbl_unit');
            $table->integer('quantity');
            $table->string('type')->nullable(); 
            $table->date('transaction_date'); 
            $table->timestamps(); 
        });

        Schema::create('tbl_price', function (Blueprint $table) {
            $table->id(); 
            $table->foreignId('product_id')->constrained('tbl_product'); 
            $table->foreignId('unit_id')->constrained('tbl_unit'); 
            $table->decimal('price_per_unit', 15, 2); 
            $table->integer('discount')->nullable()->default(0); 
            $table->timestamps(); 
        });

        Schema::create('tbl_inventory', function (Blueprint $table) {
            $table->id(); 
            $table->foreignId('product_id')->constrained('tbl_product'); 
            $table->foreignId('branches_id')->constrained('tbl_branches'); 
            $table->integer('quantity'); 
            $table->timestamps(); 
        });

        Schema::create('tbl_supplier', function (Blueprint $table) {
            $table->id(); 
            $table->string('company_name');
            $table->text('address')->nullable(); 
            $table->string('city')->nullable(); 
            $table->string('country')->nullable(); 
            $table->text('description')->nullable(); 
            $table->string('status'); 
            $table->timestamps(); 
        });

        Schema::create('tbl_supplier_contact', function (Blueprint $table) {
            $table->id(); 
            $table->foreignId('supplier_id')->constrained('tbl_supplier'); 
            $table->string('contact_name'); 
            $table->string('contact_title')->nullable();  
            $table->string('contact_number', 15); 
            $table->timestamps(); 
        });

        Schema::create('tbl_purchase', function (Blueprint $table) {
            $table->id(); 
            $table->foreignId('supplier_id')->constrained('tbl_supplier'); 
            $table->foreignId('user_id')->constrained('users');
            $table->date('purchase_date'); 
            $table->decimal('currency_rate', 15, 2); 
            $table->text('remark')->nullable(); 
            $table->string('stock_status'); 
            $table->timestamps(); 
        });

        Schema::create('tbl_purchase_detail', function (Blueprint $table) {
            $table->id(); 
            $table->foreignId('purchase_id')->constrained('tbl_purchase'); 
            $table->foreignId('product_id')->constrained('tbl_product'); 
            $table->foreignId('unit_id')->constrained('tbl_unit'); 
            $table->integer('quantity'); 
            $table->decimal('unit_price', 15, 2); 
            $table->integer('discount')->nullable(); 
            $table->timestamps(); 
        });

        Schema::create('tbl_transfer', function (Blueprint $table) {
            $table->id(); 
            $table->foreignId('from_branches_id')->constrained('tbl_branches'); 
            $table->foreignId('to_branches_id')->constrained('tbl_branches'); 
            $table->foreignId('user_id')->constrained('users');
            $table->date('transfer_date'); 
            $table->text('remark')->nullable(); 
            $table->timestamps(); 
        });

        Schema::create('tbl_transfer_detail', function (Blueprint $table) {
            $table->id(); 
            $table->foreignId('transfer_id')->constrained('tbl_transfer'); 
            $table->foreignId('product_id')->constrained('tbl_product'); 
            $table->foreignId('unit_id')->constrained('tbl_unit'); 
            $table->integer('quantity'); 
            $table->timestamps(); 
        });

        Schema::create('tbl_stock_in', function (Blueprint $table) {
            $table->id(); 
            $table->foreignId('purchase_id')->nullable()->constrained('tbl_purchase'); 
            $table->foreignId('transfer_id')->nullable()->constrained('tbl_transfer');
            $table->foreignId('return_id')->nullable()->constrained('tbl_return');  
            $table->foreignId('branches_id')->constrained('tbl_branches'); 
            $table->foreignId('user_id')->constrained('users'); 
            $table->date('stock_in_date');
            $table->text('remark')->nullable();  
            $table->timestamps(); 
        });

        Schema::create('tbl_stock_in_detail', function (Blueprint $table) {
            $table->id(); 
            $table->foreignId('stock_in_id')->constrained('tbl_stock_in'); 
            $table->foreignId('product_id')->constrained('tbl_product'); 
            $table->foreignId('unit_id')->constrained('tbl_unit'); 
            $table->integer('quantity'); 
            $table->timestamps(); 
        });

        Schema::create('tbl_stock_adjustment', function (Blueprint $table) {
            $table->id(); 
            $table->foreignId('branches_id')->constrained('tbl_branches');
            $table->string('adjustment_type'); 
            $table->foreignId('return_id')->nullable()->constrained('tbl_return'); 
            $table->foreignId('user_id')->constrained('users');
            $table->date('adjustment_date')->nullable(); 
            $table->text('remark')->nullable(); 
            $table->timestamps(); 
        });

        Schema::create('tbl_stock_adjustment_detail', function (Blueprint $table) {
            $table->id(); 
            $table->foreignId('stock_adjustment_id')->constrained('tbl_stock_adjustment'); 
            $table->foreignId('product_id')->constrained('tbl_product'); 
            $table->foreignId('unit_id')->constrained('tbl_unit'); 
            $table->integer('quantity'); 
            $table->timestamps(); 
        });

        Schema::create('tbl_customer', function (Blueprint $table) {
            $table->id(); 
            $table->string('customer_name'); 
            $table->string('contact_number')->nullable(); 
            $table->string('status'); 
            $table->timestamps(); 
        });

        Schema::create('tbl_card_type', function (Blueprint $table) {
            $table->id(); 
            $table->foreignId('user_id')->constrained('users');
            $table->string('card_name'); 
            $table->integer('duration_months')->nullable();  
            $table->date('expiry_date')->nullable();  
            $table->text('description')->nullable();  
            $table->string('status'); 
            $table->timestamps(); 
        });

        Schema::create('tbl_member_card', function (Blueprint $table) {
            $table->id(); 
            $table->foreignId('customer_id')->constrained('tbl_customer'); 
            $table->foreignId('card_type_id')->constrained('tbl_card_type'); 
            $table->string('card_number')->unique(); 
            $table->date('issue_date')->nullable(); 
            $table->date('expiry_date')->nullable(); 
            $table->integer('points')->nullable(); 
            $table->string('status'); 
            $table->timestamps();
        });

        Schema::create('tbl_ponit_condition', function (Blueprint $table) {
            $table->id();
            $table->foreignId('card_type_id')->constrained('tbl_card_type'); 
            $table->decimal('dollars_per_point', 15, 2);
            $table->integer('point_per_dollar');
            $table->decimal('discount_per_point', 15, 2);
            $table->integer('point_per_discount');
            $table->decimal('max_discount', 15, 2);
            $table->decimal('min_purchase', 15, 2);
            $table->string('status'); 
            $table->timestamps(); 
        });

        Schema::create('tbl_sale', function (Blueprint $table) {
            $table->id(); 
            $table->foreignId('branches_id')->constrained('tbl_branches');
            $table->foreignId('user_id')->constrained('users');  
            $table->foreignId('customer_id')->nullable()->constrained('tbl_customer'); 
            $table->foreignId('card_id')->nullable()->constrained('tbl_member_card'); 
            $table->date('sale_date')->nullable(); 
            $table->decimal('currency_rate', 15, 2); 
            $table->decimal('member_discount', 15, 2)->nullable();
            $table->timestamps(); 
        });

        Schema::create('tbl_sale_detail', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sale_id')->constrained('tbl_sale'); 
            $table->foreignId('product_id')->constrained('tbl_product'); 
            $table->foreignId('unit_id')->constrained('tbl_unit'); 
            $table->integer('quantity'); 
            $table->decimal('unit_price', 15, 2); 
            $table->integer('discount')->nullable(); 
            $table->timestamps(); 
        });

        Schema::create('tbl_stock_out', function (Blueprint $table) {
            $table->id(); 
            $table->foreignId('branches_id')->constrained('tbl_branches'); 
            $table->foreignId('sale_id')->constrained('tbl_sale'); 
            $table->foreignId('transfer_id')->constrained('tbl_transfer');
            $table->foreignId('user_id')->constrained('users'); 
            $table->date('stock_out_date')->nullable(); 
            $table->text('reason')->nullable();
            $table->timestamps(); 
        });

        Schema::create('tbl_stock_out_detail', function (Blueprint $table) {
            $table->id(); 
            $table->foreignId('stock_out_id')->constrained('tbl_stock_out'); 
            $table->foreignId('product_id')->constrained('tbl_product'); 
            $table->foreignId('unit_id')->constrained('tbl_unit'); 
            $table->integer('quantity'); 
            $table->timestamps(); 
        });

        Schema::create('tbl_invoice', function (Blueprint $table) {
            $table->id(); 
            $table->string('invoice_no')->unique(); 
            $table->foreignId('sale_id')->nullable()->constrained('tbl_sale'); 
            $table->foreignId('exchange_id')->nullable()->constrained('tbl_exchange'); 
            $table->string('payment_method'); 
            $table->decimal('subtotal', 15, 2); 
            $table->decimal('total_vat', 15, 2); 
            $table->timestamp('invoice_date'); 
            $table->timestamps(); 
        });

        Schema::create('tbl_return', function (Blueprint $table) {
            $table->id();
            $table->foreignId('branches_id')->constrained('tbl_branches'); 
            $table->foreignId('invoice_id')->constrained('tbl_invoice'); 
            $table->foreignId('user_id')->constrained('users'); 
            $table->timestamp('return_date');
            $table->text('reason');
            $table->timestamps();
        });

        Schema::create('tbl_return_detail', function (Blueprint $table) {
            $table->id(); 
            $table->foreignId('return_id')->constrained('tbl_return'); 
            $table->foreignId('return_product_id')->constrained('tbl_product'); 
            $table->foreignId('return_unit_id')->constrained('tbl_unit'); 
            $table->integer('return_quantity'); 
            $table->integer('restock_quantity')->default(0);
            $table->integer('defective_quantity')->default(0);
            $table->decimal('return_unit_price', 15, 2); 
            $table->integer('return_discount'); 
            $table->timestamps();
        });

        Schema::create('tbl_exchange', function (Blueprint $table) {
            $table->id();
            $table->foreignId('branches_id')->constrained('tbl_branches'); 
            $table->foreignId('return_id')->constrained('tbl_return'); 
            $table->foreignId('user_id')->constrained('users'); 
            $table->timestamp('exchange_date');
            $table->text('reason')->nullable();
            $table->timestamps();
        });

        Schema::create('tbl_exchange_detail', function (Blueprint $table) {
            $table->id();
            $table->foreignId('exchange_id')->constrained('tbl_exchange'); 
            $table->foreignId('exchange_product_id')->constrained('tbl_product'); 
            $table->foreignId('exchange_unit_id')->constrained('tbl_unit'); 
            $table->integer('exchange_quantity');
            $table->decimal('exchange_unit_price', 15, 2); 
            $table->integer('exchange_discount'); 
            $table->timestamps(); 
        });

        Schema::create('tbl_end_of_day_closing', function (Blueprint $table) {
            $table->id(); 
            $table->foreignId('branches_id')->constrained('tbl_branches'); 
            $table->foreignId('user_id')->constrained('users'); 
            $table->timestamp('closing_date');
            $table->decimal('total_sale', 15, 2); 
            $table->decimal('total_member_dis', 15, 2); 
            $table->decimal('total_exchange', 15, 2); 
            $table->decimal('total_difference', 15, 2); 
            $table->decimal('total_vat', 15, 2); 
            $table->decimal('total_cash', 15, 2); 
            $table->decimal('total_card', 15, 2); 
            $table->text('remark')->nullable(); 
            $table->timestamps(); 
        });

        Schema::create('tbl_inventory_closing', function (Blueprint $table) {
            $table->id();
            $table->foreignId('branches_id')->constrained('tbl_branches'); 
            $table->foreignId('user_id')->constrained('users'); 
            $table->foreignId('product_id')->constrained('tbl_product'); 
            $table->foreignId('unit_id')->constrained('tbl_unit'); 
            $table->integer('stock_in')->default(0); 
            $table->integer('stock_out')->default(0); 
            $table->integer('stock_adjustment')->default(0); 
            $table->integer('stock_return')->default(0); 
            $table->integer('restock_quantity')->default(0);
            $table->integer('defective_quantity')->default(0);
            $table->integer('kit_transaction')->default(0); 
            $table->integer('closing_stock')->default(0); 
            $table->timestamps(); 
        });

    }



    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table');
    }
};
