<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConceptsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('concepts', function (Blueprint $table) {
            $table->id();
            $table->string('description');
            $table->boolean('status')->default(1);
            $table->string('value',20);
            
            // Fk_types_concepts
            $table->unsignedBigInteger('concepts_id');
            $table->foreign('concepts_id')
                ->references('id')
                ->on('types_concepts')
                ->onDelete('cascade');

            // Fk_Payroll
            $table->unsignedBigInteger('payroll_id');
            $table->foreign('payroll_id')
                ->references('id')
                ->on('payrolls')
                ->onDelete('cascade');
                
            // Fk_types_concepts
            $table->unsignedBigInteger('accounting_entry_id');
            $table->foreign('accounting_entry_id')
                ->references('id')
                ->on('accounting_entry')
                ->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('concepts');
    }
}
