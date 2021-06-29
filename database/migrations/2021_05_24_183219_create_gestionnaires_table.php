    <?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    class CreateGestionnairesTable extends Migration
    {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up()
        {
            Schema::create('gestionnaires', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->string('name');
                $table->string('prenom');
                $table->string('username')->unique();
                $table->string('adresse');
                $table->string('region');
                $table->string('link');
                $table->string('numero_de_telephone');
                $table->string('email')->unique();
                $table->tinyInteger('IsBan')->default('0');
                $table->timestamp('email_verified_at')->nullable();
                $table->string('password');
                $table->rememberToken();
                $table->timestamps();
            });
        }

        /**
         * Reverse the migrations.
         *please please yarabi tkhdem
         * @return void
         */
        public function down()
        {
            Schema::dropIfExists('gestionnaires');
        }
    }
