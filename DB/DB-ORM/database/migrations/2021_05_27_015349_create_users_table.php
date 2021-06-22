<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name',25);
            $table->string('lastname',25);
            $table->string('email',25);
            $table->unique('email');
            $table->string('salary',20);
            $table->text('password',25);
            $table->string('image',250);
            $table->string('document_number',20);
            $table->boolean('status')->default(1);
            // Fk_rol
            $table->unsignedBigInteger('role_id');
            $table->foreign('role_id')
                ->references('id')
                ->on('roles')
                ->onDelete('cascade');
            // Fk_charges
            $table->unsignedBigInteger('charges_id');
            $table->foreign('charges_id')
                ->references('id')
                ->on('charges')
                ->onDelete('cascade');
            // Fk_document_type 
            $table->unsignedBigInteger('document_type_id');
            $table->foreign('document_type_id')
                ->references('id')
                ->on('document_types')
                ->onDelete('cascade');

            // Fk_contract_type 
            $table->unsignedBigInteger('contract_type_id');
            $table->foreign('contract_type_id')
                ->references('id')
                ->on('contract_types')
                ->onDelete('cascade');
            
            $table->text('token');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
