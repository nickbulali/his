<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Pregnancy extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         //Pregnancy vital signs
        Schema::create('pregnancy_vitalsigns', function (Blueprint $table){
            $table->bigIncrements('id');
            // $table->integer('patient_id')->unsigned();
            $table->integer('systolic_blood_pressure');
            $table->integer('diastolic_blood_pressure');
            $table->integer('respiratory_rate');
            $table->integer('heartRate');
            $table->String('oxygen_saturation');
            $table->integer('body_temperature');
            $table->integer('abdominal');
            $table->integer('midUpper_Arm');
            $table->integer('height');
            $table->integer('weight');
            $table->integer('body_mass_index');
            $table->integer('body_surface_area');
            
            $table->timestamps();
            // $table->foreign('patient_id')->references('id')->on('patients');

        });

        //Pregnancy Additional Information
         Schema::create('pregnancy_additionalInfo', function (Blueprint $table){
            $table->bigIncrements('id');
            // $table->integer('patient_id')->unsigned();
            $table->String('colour');
            $table->String('jaundice');
            $table->String('dehydration');
            $table->String('cyanosis');
            $table->String('diabetes');
            $table->String('tb');
            $table->String('malaria');
            $table->String('malnourishment');
            
            $table->timestamps();
            // $table->foreign('patient_id')->references('id')->on('patients');

        });

         //pregnancy Lymph
         Schema::create('pregnancy_lymph', function (Blueprint $table){
            $table->bigIncrements('id');
            // $table->integer('patient_id')->unsigned();
            $table->String('value');
          
            
            $table->timestamps();
            // $table->foreign('patient_id')->references('id')->on('patients');

        });

        //Pregnancy Edema
         Schema::create('pregnancy_edema', function (Blueprint $table){
            $table->bigIncrements('id');
            // $table->integer('patient_id')->unsigned();
            $table->String('value');
          
            
            $table->timestamps();
            // $table->foreign('patient_id')->references('id')->on('patients');

        });

        //Pregnancy gestational Age
         Schema::create('pregnancy_gestationalAge', function (Blueprint $table){
            $table->bigIncrements('id');
            // $table->integer('patient_id')->unsigned();
            $table->integer('ipv');
            $table->String('edd');
            $table->date('expectedDate');
            $table->String('height_cm');
            $table->String('height_weeks');
            $table->date('symphysialDate');
            $table->String('ageWeeks');
            $table->String('babyLie');
            $table->String('presentation');
            $table->String('fHeart');
            $table->String('tb');
            $table->String('malaria');
            $table->String('malnourishment');
            
            $table->timestamps();
            // $table->foreign('patient_id')->references('id')->on('patients');

        });



        //OutPatient Registration 

        Schema:: create('OutPatientRegistration', function (Blueprint $table){
            $table->bigIncrements('id');
            // $table->integer('patient_id')->unsigned()->nullable();
            $table->String('fName');
            $table->String('mName');
            $table->String('lName');
            $table->String('idNo');
            $table->String('medNo');
            $table->String('fPlannigNo');
            $table->String('ancNo');
            $table->String('screeningNo');
            $table->String('artNo');
            $table->String('tbNo');
            $table->String('opdNo');
            $table->String('cu5No');
            $table->String('eyeClinicNo');
            $table->String('contactNo');
            $table->String('email');
            $table->String('nationality');
            $table->String('languages');
            $table->String('dob');
            $table->String('gender');
            $table->String('occupation');
            $table->String('maritalStatus');
            $table->String('age');
            $table->String('county');
            $table->String('sCounty');
            $table->String('village');
            $table->timestamps();
            // $table->foreign('patient_id')->references('id')->on('patients');

        });

        //NextofKin
        Schema::create('NextofKin', function (Blueprint $table){
            $table->bigIncrements('id');
            // $table->integer('patient_id')->unsigned()->nullable();
            $table->integer('fName');
            $table->integer('mName');
            $table->integer('lName');
            $table->integer('idNo');
            $table->String('contactNo');
            $table->String('gender');
            $table->String('dob');
            $table->String('email');
            $table->String('nationality');
            $table->String('languages');
            $table->String('occupation');
            $table->String('relationship');
            $table->String('county');
            $table->String('sCounty');
            $table->String('village');

            $table->timestamps();
            // $table->foreign('patient_id')->references('id')->on('patients');

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
    }
}
