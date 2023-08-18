<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class InitMzrenovation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //creation des tables 

        //devis
        Schema::create('devis', function(Blueprint $table){
            $table->id();
            $table->date('date_debut');
            $table->date('date_fin');
            $table->string('titre');
            $table->string('description');
            $table->integer('montants');
            $table->string('valider');

            //relation devis et clients
            $table->unsignedBigInteger('clients_id');
            $table->foreign('clients_id')->references('id')->on('clients');
        });

        //travaux
        Schema::create('travaux', function(Blueprint $table){
            $table->id();
            $table->date('date_debut');
            $table->date('date_fin');
            $table->string('titre');
            $table->string('description');
            $table->integer('montants');

            //relation travaux et clients
            $table->unsignedBigInteger('clients_id');
            $table->foreign('clients_id')->references('id')->on('clients');
        });

        //clients
        Schema::create('clients', function(Blueprint $table){
            $table->id();
            $table->string('nom');
            $table->string('email')->unique();
            $table->string('sexe');
            $table->integer('tel');
            $table->integer('adresse');
           

        });
        //profil
        Schema::create('profil', function(Blueprint $table){
            $table->id();
            $table->string('nom');
            $table->string('email')->unique();
            $table->string('sexe');
            $table->string('is_admin');
            $table->integer('tel');
        });

        //utilisateurs
        Schema::create('utilisateurs', function(Blueprint $table){
            $table->id();
            $table->string('nom');
            $table->string('email')->unique();
            $table->string('motpasse');

            //relation utilsateurs et profil
            $table->unsignedBigInteger('profil_id');
            $table->foreign('profil_id')->references('id')->on('profil');           
        });

        //admin
        Schema::create('admin', function(Blueprint $table){
            $table->id();
            $table->string('nom');
            $table->string('email')->unique();
            $table->string('motpasse');

            //relation admin et profil
            $table->unsignedBigInteger('profil_id');
            $table->foreign('profil_id')->references('id')->on('profil');           
        });

        //commentaires
        Schema::create('commentaires', function(Blueprint $table){
            $table->id();
            $table->string('nom');
            $table->string('email')->unique();
            $table->string('message');           
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('clients');
        Schema::dropIfExists('profil');
        Schema::dropIfExists('travaux');
        Schema::dropIfExists('utilsateurs');
        Schema::dropIfExists('admin');
        Schema::dropIfExists('commentaires');
        Schema::dropIfExists('devis');
    }
}
