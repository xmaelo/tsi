<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplicantsTable extends Migration 
{
    /**
     * Run the migrations.
     * 
     * @return void
     */
    public function up() 
    {
        Schema::create('applicants', function (Blueprint $table) {
            $table->increments('id');
            $table->string('appelation');
            $table->string('firstname');
            $table->string('lastname');
            $table->integer('programId')->default(null);
            $table->string('applicationStatus')->default(null);
            $table->string('dateApplicationStarted');
            $table->string('dateApplicationCompleted');
            $table->string('primaryLanguage')->default(null);
            $table->string('email');
            $table->string('skypeId');
            $table->string('gender');
            $table->string('dob');
            $table->string('identityDocument');
            $table->string('address');
            $table->string('cityResidence');
            $table->string('countryResidence');
            $table->string('nationality');
            $table->string('linkedInURL');
            $table->string('giHubURL');
            $table->string('school');
            $table->string('professionalStatus');
            $table->string('maritalStatus');
            $table->string('preferredCountryPostProgram');
            $table->text('motivationLetter');
            $table->string('scope1')->default(null);
            $table->string('scope2')->default(null);
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
       Schema::dropIfExists('applicants');
    }
}
