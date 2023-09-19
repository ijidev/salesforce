<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignid('user_id')->constrained()->nullable();
            $table->string('ref_id')->nullable();
            // $table->foreignid('ref')->nullable()->constrained('users', 'id');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('pass');
            $table->string('password');
            $table->rememberToken();
            
            $table->integer('optimized')->default(0);
            $table->float('balance')->default(0);
            $table->float('frozen')->default(0);
            $table->float('asset')->default(0);
            $table->integer('reset_count')->default(0);
            $table->integer('credit_score')->default(0);

            $table->boolean('is_active')->default(false);

            $table->foreignid('tier_id')->nullable()->constrained()
                ->onDelete('set null')->onUpdate('cascade');

            $table->timestamps();
        });

        Schema::table('users', function (Blueprint $table) {
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
