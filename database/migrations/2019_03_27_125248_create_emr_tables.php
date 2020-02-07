<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmrTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

       /*
        * Create table for general configurations
        * explore putting on .env file
        */
        Schema::create('general_configuration', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('post')->nullable();
            $table->string('address')->nullable();
            $table->string('code')->nullable();
            $table->string('logo')->nullable();
            $table->timestamps();
        });

       /*
        * Create table for storing roles
        */
        Schema::create('roles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('display_name')->nullable();
            $table->string('description')->nullable();
            $table->timestamps();
        });

        Schema::create('diagnosis', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('encounter_id')->unsigned();
            $table->integer('condition_id')->unsigned();
            $table->integer('diagnosed_by')->unsigned()->nullable();
            $table->string('comment')->nullable();
            $table->string('start_date')->nullable();// can be genetic
            $table->string('end_date')->nullable();
        });


        Schema::create('diagnosis_patient', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('diagnosis_id')->unsigned();
            $table->integer('patient_id')->unsigned();
            $table->timestamps();
        });

       /*
        * Create table for associating roles to users (Many-to-Many)
        */
        Schema::create('role_user', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('role_id')->unsigned();

            $table->foreign('user_id')->references('id')->on('users')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('role_id')->references('id')->on('roles')
                ->onUpdate('cascade')->onDelete('cascade');
        });

       /*
        * Create table for storing permissions
        */
        Schema::create('permissions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('display_name')->nullable();
            $table->string('description')->nullable();
            $table->timestamps();
        });

        /*
         * Create table for associating permissions to roles (Many-to-Many)
         */
        Schema::create('permission_role', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('permission_id')->unsigned();
            $table->integer('role_id')->unsigned();

            $table->foreign('permission_id')->references('id')->on('permissions')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('role_id')->references('id')->on('roles')
                ->onUpdate('cascade')->onDelete('cascade');
        });

        /*
         * @system Multiple
         * @name Code System Name: LOINC|FHIR|CLSI|ISO
         * @link Url to online resource
         * @description additional information
         */
        Schema::create('code_systems', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('link');
            $table->string('description');
            $table->timestamps();
        });

        /*
         * @system Multiple
         * @code male|female|234|etc
         * @display UI text of the code
         * @description additional information
         */
        Schema::create('codes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('code_system_id')->unsigned();
            $table->string('code');
            $table->string('display');
            $table->string('description');
            $table->timestamps();
            $table->foreign('code_system_id')->references('id')->on('code_systems');
        });

        /*
         * @system https://www.hl7.org/fhir/datatypes.html#HumanName
         * @use usual|official|temp|nickname|anonymous|old|maiden
         * @text representation of the full name
         * @prefix Parts that come before the name|Mr|Dr|Mrs
         * @surffix Parts that come after the name
         */
        Schema::create('names', function (Blueprint $table) {
            $table->increments('id');
            $table->string('use', 20)->default('usual');
            $table->string('text')->nullable();
            $table->string('family')->nullable();
            $table->string('given')->nullable();
            $table->string('prefix')->nullable();
            $table->string('suffix')->nullable();
            $table->timestamps();
        });

        /*
         * @system https://www.hl7.org/fhir/organization.html
         * @example hospitals|laboratories
         */
        Schema::create('organizations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('identifier')->nullable();
            $table->boolean('active')->nullable();
            $table->string('name');
            $table->string('description')->nullable();
            $table->string('alias')->nullable();
            $table->string('telecom')->nullable();
            $table->string('address')->nullable();
            $table->timestamps();
        });

        /*
         * @system https://www.hl7.org/fhir/codesystem-administrative-gender.html
         * @code male|female|both|unknown
         * @display Male|Female|both|Unknown
         */
        Schema::create('genders', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('active')->default(0);
            $table->string('code', 10);
            $table->string('display', 10);
        });

        /*
         * @system 

         * @code married|single|divorced|widowed
         * @display Married|Single|Divorced|Widowed
         */
        Schema::create('marital_status', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('active')->default(0);
            $table->string('code', 10);
            $table->string('display', 10);
        });

        Schema::create('blood_groups', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code');
            $table->string('display');
        });

        /*
         * @system https://www.hl7.org/fhir/patient.html
         * @animal if patient is animal
         */
        Schema::create('patients', function (Blueprint $table) {
            $table->increments('id');
            $table->string('identifier'); //Business identifier
            $table->string('ulin')->nullable(); //unique lab identification number
            $table->boolean('active')->default(1);
            $table->integer('name_id')->unsigned();
            $table->integer('gender_id')->unsigned();
            $table->integer('blood_group_id')->nullable()->unsigned();
            $table->date('birth_date');
            $table->boolean('deceased')->default(0);
            $table->date('deceased_date_time')->nullable();
            $table->string('address')->nullable();
            $table->string('marital_status')->nullable();
            $table->string('photo')->nullable();
            $table->integer('organization_id')->unsigned()->nullable();
            $table->string('created_by')->nullable();

            $table->timestamps();

            $table->foreign('name_id')->references('id')->on('names');
            $table->foreign('gender_id')->references('id')->on('genders');
            $table->foreign('blood_group_id')->references('id')->on('blood_groups');
            $table->foreign('organization_id')->references('id')->on('organizations');
        });

        Schema::create('queue_status', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code');
            $table->string('display');
            $table->string('color');
        });

        Schema::create('queues', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('patient_id')->unsigned();
            $table->integer('queue_status_id')->unsigned()->default(1);

            $table->foreign('patient_id')->references('id')->on('patients');
            $table->foreign('queue_status_id')->references('id')->on('queue_status');
            $table->timestamps();
        });

        /*
         * @system HISv1.0 defined
         */
        Schema::create('specimen_types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code', 45)->nullable();
            $table->string('name', 100);

            $table->softDeletes();
            $table->timestamps();
        });

        /*
         * @system HISv1.0 defined
         */
        Schema::create('lab_test_type_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code', 100)->nullable();
            $table->string('name', 100);

            $table->softDeletes();
            $table->timestamps();
        });

        /*
         * @system HISv1.0 defined
         */
        Schema::create('lab_test_types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100);
            $table->string('description', 100)->nullable();
            $table->integer('lab_test_type_category_id')->unsigned();
            $table->boolean('active')->default(1);
            $table->foreign('lab_test_type_category_id')
                ->references('id')->on('lab_test_type_categories');
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('lab_test_type_specimen_type', function (Blueprint $table) {
            $table->integer('lab_test_type_id')->unsigned();
            $table->integer('specimen_type_id')->unsigned();
        });
        /*
         * @system HISv1.0 defined
         * @example wards|clinics|healthunits
         */
        Schema::create('locations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('identifier', 45)->nullable();
            $table->string('name', 100);
        });

        /*
         * @system HISv1.0 defined
         */
        Schema::create('encounter_statuses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code', 20)->nullable();
            $table->string('display', 45);
        });

        /*
         * @system fhir
         * @name inpatient|outpatient|ambulatory|emergency
         */
        Schema::create('encounter_classes', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('active')->default(0);
            $table->string('code', 20)->nullable();
            $table->string('display', 45);
        });

        /*
         * @system https://www.hl7.org/fhir/encounter.html
         * @identifier Identifier(s) by which this encounter is known
         * @encounter_class_id inpatient|outpatient|ambulatory|emergency
         * @encounter_status_id planned|arrived|triaged|in-progress|onleave|finished|cancelled
         */
        Schema::create('encounters', function (Blueprint $table) {
            $table->increments('id');
            $table->string('identifier')->nullable();
            $table->integer('patient_id')->unsigned();
            $table->integer('location_id')->nullable();
            $table->integer('encounter_class_id')->unsigned()->nullable();
            $table->integer('encounter_status_id')->unsigned()->nullable();
            $table->string('bed_no')->nullable();
            $table->string('practitioner_name')->nullable();
            $table->string('practitioner_contact')->nullable();
            $table->string('practitioner_organisation')->nullable();
            // in-patient encounter
            $table->string('previous_goals_met')->nullable();
            $table->string('new_goals')->nullable();

            $table->foreign('patient_id')->references('id')->on('patients');
            $table->foreign('encounter_class_id')->references('id')->on('encounter_classes');
            $table->foreign('encounter_status_id')
                ->references('id')->on('encounter_statuses');
            $table->timestamps();
        });

        /*
         * @system HISv1.0 defined
         * @identifier Unique ID for external records
         * @todo organize to have this information comming from blis especially for incomplete tests
         */
        Schema::create('tests', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('encounter_id')->unsigned();
            $table->string('identifier')->nullable();
            $table->integer('lab_test_type_id')->unsigned();
            $table->integer('specimen_type_id')->unsigned()->nullable();
            $table->uuid('created_by')->nullable();
            $table->string('tested_by')->nullable();
            $table->string('verified_by')->nullable();
            $table->string('cancelled_by')->nullable();
            $table->string('requested_by', 60);
            $table->string('comment')->nullable();
            $table->timestamp('time_started')->nullable();
            $table->timestamp('time_cancelled')->nullable();
            $table->timestamp('time_completed')->nullable();
            $table->timestamp('time_verified')->nullable();
            $table->timestamps();

            $table->index('created_by');
            $table->index('tested_by');
            $table->index('verified_by');
            $table->foreign('encounter_id')->references('id')->on('encounters');
            $table->foreign('lab_test_type_id')->references('id')->on('lab_test_types');
        });

        /*
         * @system HISv1.0 defined
         * @description can be number|string
         */
        Schema::create('test_result_types', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('code_id')->unsigned()->nullable();
            $table->integer('test_type_id')->unsigned();
            $table->integer('specimen_type_id')->unsigned();
            $table->timestamps();

            $table->foreign('code_id')->references('id')->on('codes');
            $table->foreign('test_type_id')->references('id')->on('lab_test_types');
            $table->foreign('specimen_type_id')->references('id')->on('specimen_types');
            $table->unique(['test_type_id', 'specimen_type_id']);
        });

        /*
         * @system HISv1.0 defined
         * @description isolated organisms and gram results also listed
         * todo: investigate the possibility of implementing LOINC
         */
        Schema::create('test_results', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('test_id')->unsigned();
            $table->string('parameter');
            $table->string('result')->nullable();
            $table->integer('lab_result_type_id')->unsigned()->nullable();
            $table->timestamp('time_entered')->default(DB::raw('CURRENT_TIMESTAMP'));

            $table->unique(['test_id', 'parameter']);
        });


        /*
         * @system HISv1.0 defined
         * @description incrementing and resetting patient accession_identifier
         *              auto-increment component
         */
        Schema::create('counter', function (Blueprint $table) {
            $table->increments('id');
        });

        /*
         * @description asthma|diabetes|hypertension
         */
        Schema::create('condition_types', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('code_id')->unsigned();
            $table->string('description');
        });

        /*
         * @is_drug 1/0...yes,no
         * todo:check for missing information ... when discovered
         */
        Schema::create('allergies', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('code_id')->unsigned();
            $table->string('substance');
            $table->boolean('is_drug')->default(0);
        });

        /*
        * Create table for associating allergies to patients (Many-to-Many)
        */
        Schema::create('allergy_patient', function (Blueprint $table) {
            $table->integer('allergy_id')->unsigned();
            $table->integer('patient_id')->unsigned();
            $table->unique(['allergy_id', 'patient_id']);
        });

        /*
         * @body_temperature:todo check best data type
         * @respiratory_rate:todo check best data type
         * @heart_rate:todo check best data type
         * @blood_pressure:todo check best data type
         */
        Schema::create('vital_signs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('encounter_id')->unsigned();
            $table->integer('patient_id')->unsigned();
            $table->string('body_temperature');
            $table->string('respiratory_rate');
            $table->string('heart_rate');
            $table->string('blood_pressure');
            $table->string('height');
            $table->string('weight');
            $table->string('body_mass_index');
            $table->string('body_surface_area');
            $table->timestamps();
            $table->foreign('patient_id')->references('id')->on('patients');
        });

        Schema::create('appointment', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('patient_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->string('appointment_date');
            $table->string('appointment_time');
            $table->string('status');
            $table->timestamps();
            $table->foreign('patient_id')->references('id')->on('patients');
            $table->foreign('user_id')->references('id')->on('users');
        });

       Schema::create('appointment_status', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code');
            $table->string('display');
            $table->string('color');
        });
        /*
         * @height:todo check best data type
         * @weight:todo check best data type
         * @body_mass_index:todo check best data type
         * @body_surface_area:todo check best data type
         */
        Schema::create('anthropometric_measurements', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('encounter_id')->unsigned();
            $table->string('height');
            $table->string('weight');
            $table->string('body_mass_index');
            $table->string('body_surface_area');
        });

        Schema::create('social_histories', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('patient_id')->unsigned();
            $table->text('social_problem');
            $table->date('start_date');
            $table->date('end_date');
        });

        Schema::create('surgical_histories', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('encounter_id')->unsigned();
            $table->string('description');
        });

        Schema::create('family_relations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('code_id');
            $table->string('display');
            $table->text('definition')->nullable();
        });

        /*
         * @condition_types diabetes|cancer|hypertension|tuberculosis|asthma|mental illness
         */
        Schema::create('family_histories', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('patient_id')->unsigned();
            $table->integer('condition_type_id')->unsigned();
            $table->text('description');
            $table->integer('relation');
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
        });

        Schema::create('environmental_histories', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('patient_id')->unsigned();
            $table->text('description');
            $table->string('start_date');
            $table->string('end_date');
        });

        /*
         * todo: includes alcohol, smoking, and other drugs
         */
        Schema::create('substance_types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
        });

        /*
         * todo: includes alcohol, smoking, and other drugs
         */
        Schema::create('substance_abuse', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('patient_id')->unsigned();
            $table->integer('substance_type_id')->unsigned();
            $table->string('frequency');
            $table->string('quantity');
            $table->string('start_date');
            $table->string('end_date');
        });

        /*
         * todo this should probably become part of observation
         */
        Schema::create('presenting_complaints', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('encounter_id')->unsigned();
            $table->string('comment');
        });

        Schema::create('history_of_present_illness', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('encounter_id')->unsigned();
            $table->string('comment');
        });

        /*
         * List from which conditions for used in diagnoses can be gotten
         * @system ICD9|ICD10
         * @code E11
         * description Non-insulin-dependent diabetes mellitus
         */
        Schema::create('conditions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('condition_type_id')->unsigned();
            $table->string('system')->nullable();
            $table->string('code')->nullable();
            $table->string('description');
        });

        /*
         * @description {physical examination}|{presenting complaints}
         * todo consider having observation types | physical examination|presenting complaints
         */
        Schema::create('observations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('encounter_id')->unsigned();
            $table->string('description');
        });

        /*
         * capture also historical data
         */
        Schema::create('diagnoses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('encounter_id')->unsigned();
            $table->integer('condition_id')->unsigned();
            $table->integer('diagnosed_by')->unsigned()->nullable();
            $table->string('comment')->nullable();
            $table->string('start_date')->nullable();// can be genetic
            $table->string('end_date')->nullable();
        });

        /*
         * @maturity weeks
         * @type_of_delivery Spontaneous Vertex Delivery, Vacuum Extraction, Caeserian Section, Other
         * @bwt kg
         * @sex M/F
         */
        Schema::create('obstetric_histories', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('encounter_id')->unsigned();
            $table->string('year');
            $table->string('place');
            $table->string('maturity');
            $table->string('type_of_delivery');
            $table->string('bwt');
            $table->string('sex');
            $table->string('fate');
            $table->string('puerperium');
        });

        /*
         * @last_normal_menstrual_period [LNMP]{date - LNMP (day) + 7 | LNMP (month) + 9}
         * @expected_date_of_delivery [EDD](date)
         * @gestation weeks
         */
        Schema::create('present_pregnancies', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('encounter_id')->unsigned();
            $table->string('last_normal_menstrual_period');
            $table->string('expected_date_of_delivery');
            $table->string('gestation');
        });

        /*
         * @age_at_menarche in years
         * @duration_of_menstrual_cycle in days
         * @length_of_menstrual_cycle in days
         * @any_menstrual_problem in prose
         * @history_of_gynecological_operation myomectomy, dilatation, curettage, Other
         * @history_of_sti gonorrhea, syphilis, chlamydia, trichomoniasis, Other
         * @contraception_history pill, injection, coil, implant, other
         */
        Schema::create('gynecologic_histories', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('encounter_id')->unsigned();
            $table->string('age_at_menarche');
            $table->string('duration_of_menstrual_cycle');
            $table->string('length_of_menstrual_cycle');
            $table->string('any_menstrual_problem');
            $table->string('history_of_sti');
            $table->string('history_of_gynecological_operation');
            $table->string('contraception_history');
        });

        /*
         * @contraception_history Urinalysis
         * @contraception_history weeks
         * @contraception_history Beats/min
         */
        Schema::create('antenatal_history', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('encounter_id')->unsigned();
            $table->integer('test_id')->unsigned();
            $table->string('fundal_height');
            $table->string('presentation');
            $table->string('fhr');
            $table->string('comments');
            $table->string('date_of_next_visit');
        });

        Schema::create('body_systems', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
        });

        Schema::create('body_organs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('body_system_id')->unsigned();
            $table->string('particular');
        });

        Schema::create('system_enquiry', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('encounter_id')->unsigned();
            $table->integer('body_organ_id')->unsigned();
        });

        Schema::create('diagnostic_tests', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('encounter_id')->unsigned();
            $table->string('results')->nullable();
        });

        Schema::create('radiology_types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');// xray, ultrasound, ct-scan
        });

        Schema::create('radiologies', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('encounter_id')->unsigned();
            $table->integer('radiology_type_id')->unsigned();
            $table->string('image_url');
            $table->string('comments');
        });

        /*
         * todo explore what forms this actually take in practice if there is such a thing in the first place
         */
        Schema::create('drug_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('description');
        });

        Schema::create('drugs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('generic_name');
            $table->string('trade_name');
            $table->string('strength_value');
            $table->string('strength_unit');
            $table->string('dosage_form');
            $table->string('administration_route');
        });

        Schema::create('drug_category_drug', function (Blueprint $table) {
            $table->integer('drug_id')->unsigned();
            $table->integer('drug_category_id')->unsigned();
        });

        /*
         * @description OD(once daily)|BD(twice daily)|TDS (thrice daily)
         *              QID(four times daily)|PRN(as needed)|other(custom:specify times)
         * @todo expand resource to help generate medication sheets
         */
        Schema::create('dosages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('description');
        });

        /*
         * @display active|hold|complete|canceled
         */
        Schema::create('medication_statuses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('display');
        });

        /*
         * used by both doctor for prescription and pharmacist for dispensing
         * @dosage_id OD(once daily)|BD(twice daily)|TDS (thrice daily)
         *            QID(four times daily)|PRN(as needed)|other(custom:specify times)
         */
        Schema::create('medications', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('patient_id')->unsigned();
            $table->integer('medication_status_id')->unsigned();
            $table->integer('drug_id')->unsigned();
            $table->integer('prescribed_by')->unsigned();
            $table->integer('dosage_id')->unsigned();
            $table->string('quantity');
            $table->string('start_time');
            $table->string('end_time');

            $table->boolean('refill')->default(0);
            $table->string('comments');
            $table->foreign('patient_id')->references('id')->on('patients');
            $table->foreign('drug_id')->references('id')->on('drugs');
            $table->foreign('medication_status_id')->references('id')->on('medication_statuses');
            $table->foreign('dosage_id')->references('id')->on('dosages');
            $table->timestamps();
            
        });

        /*
         * @medication_id links to dosage|start|end|intervals(calculated)
         *                generated by a click, after all required information is entered
         */
        Schema::create('medication_sheets', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('medication_id')->unsigned();
            $table->timestamp('time_due')->nullable();
        });

        /*
         * todo check typical admission and discharge requirements
         */
        Schema::create('admissions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('reason_for_admission');
            $table->string('reason_for_discharge')->nullable();
            $table->string('comments')->nullable();
        });

        Schema::create('admission_encounter', function (Blueprint $table) {
            $table->integer('admission_id')->unsigned();
            $table->integer('encounter_id')->unsigned();
        });

        /*
         * todo check typical surgery requirements
         * todo anticipate billing logic
         */
        Schema::create('surgeries', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('encounter_id')->unsigned();
        });
        // wards migration table 
        Schema::create('wards', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('ward_no');
            $table->timestamps();
        });

        //beds migration table
        Schema::create('beds', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('bed_no');
            $table->integer('ward_no');
            $table->integer('status')->unsigned()->default('1');
            $table->timestamps();
            // $table->foreign('ward_no')->references('id')->on('wards');
        });

        // bed allocation table
        Schema::create('bed_allocation', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('patient_name');
            $table->integer('bed_no');
            $table->string('start_date');
            $table->string('start_time');
            $table->integer('status')->unsigned()->default('1');
            $table->timestamps();
        });

        \Illuminate\Support\Facades\Artisan::call('passport:install');
        \Illuminate\Support\Facades\Artisan::call('storage:link');

        Eloquent::unguard();

        //Super Admin
        $superUser = \App\User::create([
            'name' => 'HIS Super Admin',
            'username' => 'admin',//error: unknown column
            'email' => 'admin@his.local',
            'password' =>  bcrypt('password'),
        ]);

        /* Lab Result Types */
        $labResultTypes = [
            [
                'id' => '1',
                'code' => 'numeric',
                'name' => 'numeric',
            ],
            [
                'id' => '2',
                'code' => 'string',
                'name' => 'string',
            ],
        ];

        foreach ($labResultTypes as $labResultType) {
            // \App\Models\LabResultType::create($labResultType);
        }

        /* gender table */
        $genders = [
          ['id' => '1', 'active'=>'1', 'code' => 'male', 'display' => 'Male'],
          ['id' => '2', 'active'=>'1', 'code' => 'female', 'display' => 'Female'],
          ['id' => '3', 'active'=>'0', 'code' => 'both', 'display' => 'Both'],
          ['id' => '4', 'active'=>'0', 'code' => 'unknown', 'display' => 'Unknown'],
        ];
        foreach ($genders as $gender) {
            \App\Models\Gender::create($gender);
        }

        /* encounter class table */
        $encounterClasses = [
          ['id' => '1', 'active'=>'1', 'code' => 'inpatient', 'display' => 'In Patient'],
          ['id' => '2', 'active'=>'1', 'code' => 'outpatient', 'display' => 'Out Patient'],
        ];
        foreach ($encounterClasses as $encounterClass) {
            // \App\Models\EncounterClass::create($encounterClass);
        }

        /* Permissions table */
        $permissions = [
            // system configurations
            ['name' => 'manage_configurations', 'display_name' => 'Can manage configurations'],

            // manage test menu
            ['name' => 'manage_test_catalog', 'display_name' => 'Can manage test catalog'],

            // user management
            ['name' => 'manage_users', 'display_name' => 'Can manage users'],

            // patient data management
            ['name' => 'manage_patients', 'display_name' => 'Can add patients'],

            // inventory and equipment
            ['name' => 'manage_inventory', 'display_name' => 'Can manage inventory'],
        ];

        foreach ($permissions as $permission) {
            \App\Models\Permission::create($permission);
        }

        /* Roles table */
        $superRole = \App\Models\Role::create(['name' => 'Superadmin']);

        \App\Models\Role::create(['name' => 'Administrator']);
        \App\Models\Role::create(['name' => 'Doctor']);
        \App\Models\Role::create(['name' => 'Nurse']);
        \App\Models\Role::create(['name' => 'Receptionist']);

        $superUser = \App\User::find($superUser->id);
        $permissions = \App\Models\Permission::all();

        //Assign all permissions to role Superadmin
        foreach ($permissions as $permission) {
            $superRole->attachPermission($permission);
        }
        //Assign role Superadmin to user_id=1
        $superUser->attachRole($superRole);
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
