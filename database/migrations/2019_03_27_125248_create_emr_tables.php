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
        // Create table for general configurations
        // explore putting on .env file
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

        // Create table for storing roles
        Schema::create('roles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('display_name')->nullable();
            $table->string('description')->nullable();
            $table->timestamps();
        });

        // Create table for associating roles to users (Many-to-Many)
        Schema::create('role_user', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('role_id')->unsigned();

            $table->foreign('user_id')->references('id')->on('users')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('role_id')->references('id')->on('roles')
                ->onUpdate('cascade')->onDelete('cascade');
        });

        // Create table for storing permissions
        Schema::create('permissions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('display_name')->nullable();
            $table->string('description')->nullable();
            $table->timestamps();
        });

        // Create table for associating permissions to roles (Many-to-Many)
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
            $table->foreign('organization_id')->references('id')->on('organizations');
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
            $table->boolean('culture')->default(0);
            $table->integer('lab_test_type_category_id')->unsigned();
            $table->boolean('active')->default(1);

            $table->foreign('lab_test_type_category_id')
                ->references('id')->on('lab_test_type_categories');

            $table->softDeletes();
            $table->timestamps();
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

            $table->foreign('patient_id')->references('id')->on('patients');
            $table->foreign('encounter_class_id')->references('id')->on('encounter_classes');
            $table->foreign('encounter_status_id')
                ->references('id')->on('encounter_statuses');
            $table->timestamps();
        });

        /*
         * @system HISv1.0 defined
         * @specimen_status_id available|unavailable|unsatisfactory|entered-in-error
         * @identifier External Identifier
         * @accession_identifier Identifier assigned by the lab
         * @parent_id Specimen from which this specimen originated
         */
        Schema::create('specimens', function (Blueprint $table) {
            $table->increments('id');
            $table->string('identifier')->nullable();
            $table->string('accession_identifier')->nullable();
            $table->integer('specimen_type_id')->unsigned();
            $table->integer('specimen_status_id')->unsigned()->default(\App\Models\SpecimenStatus::received);
            $table->integer('received_by')->unsigned();
            $table->string('collected_by')->nullable();
            $table->timestamp('time_collected')->nullable();
            $table->timestamp('time_received')->nullable();

            $table->foreign('specimen_type_id')->references('id')->on('specimen_types');
            $table->foreign('specimen_status_id')->references('id')->on('specimen_statuses');
            $table->foreign('received_by')->references('id')->on('users');
            $table->timestamps();
        });

        /*
         * @system HISv1.0 defined
         * @identifier Unique ID for external records
         */
        Schema::create('tests', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('encounter_id')->unsigned();
            $table->string('identifier')->nullable();
            $table->integer('test_type_id')->unsigned();
            $table->integer('specimen_id')->unsigned()->nullable();
            $table->integer('test_status_id')->unsigned()->default(\App\Models\TestStatus::pending);
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
            $table->foreign('test_type_id')->references('id')->on('test_types');
            $table->foreign('specimen_id')->references('id')->on('specimens');
            $table->foreign('test_status_id')->references('id')->on('test_statuses');
        });

        /*
         * @system HISv1.0 defined
         * @description can be number|string
         */
        Schema::create('lab_result_types', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('code_id')->unsigned()->nullable();
            $table->integer('test_type_id')->unsigned();
            $table->integer('specimen_type_id')->unsigned();
            $table->timestamps();

            $table->foreign('code_id')->references('id')->on('codes');
            $table->foreign('test_type_id')->references('id')->on('test_types');
            $table->foreign('specimen_type_id')->references('id')->on('specimen_types');
            $table->unique(['test_type_id', 'specimen_type_id']);
        });


        /*
         * @system HISv1.0 defined
         * @description isolated organisms and gram results also listed
         */
        Schema::create('lab_results', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('test_id')->unsigned();
            $table->integer('measure_id')->unsigned();
            $table->string('result')->nullable();
            $table->integer('lab_result_type_id')->unsigned()->nullable();
            $table->timestamp('time_entered')->default(DB::raw('CURRENT_TIMESTAMP'));

            $table->foreign('test_id')->references('id')->on('tests');
            $table->foreign('measure_id')->references('id')->on('measures');
            $table->unique(['test_id', 'measure_id', 'measure_range_id']);
        });

        /*
         * @system HISv1.0 defined
         * @description incrementing and resetting patient accession_identifier auto-increment component
         */
        Schema::create('counter', function (Blueprint $table) {
            $table->increments('id');
        });
        Eloquent::unguard();

        //Super Admin
        $superUser = \App\User::create([
            'name' => 'HIS Super Admin',
            'username' => 'admin',
            'email' => 'admin@his.local',
            'gender_id' => 1,
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
            \App\Models\LabResultType::create($labResultType);
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
            \App\Models\EncounterClass::create($encounterClass);
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
            ['name' => 'request_topup', 'display_name' => 'Can request top-up'],
            ['name' => 'manage_equipment', 'display_name' => 'Can manage equipment'],
        ];

        foreach ($permissions as $permission) {
            \App\Models\Permission::create($permission);
        }

        /* Roles table */
        $superRole = \App\Models\Role::create(['name' => 'Superadmin']);

        \App\Models\Role::create(['name' => 'Technologist']);
        \App\Models\Role::create(['name' => 'Receptionist']);

        $superUser = \App\User::find($superUser->id);
        $permissions = \App\Models\Permission::all();

        //Assign all permissions to role Superadmin
        foreach ($permissions as $permission) {
            $superRole->attachPermission($permission);
        }
        //Assign role Superadmin to user_id=1
        $superUser->attachRole($superRole);

        \Illuminate\Support\Facades\Artisan::call('passport:install');
        \Illuminate\Support\Facades\Artisan::call('storage:link');
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
