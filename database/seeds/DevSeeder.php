<?php

use Illuminate\Database\Seeder;
use Faker\Factory;

use App\Models\EncounterClass;
use App\Models\MaritalStatus;
use App\Models\ItemCategory;
use App\Models\InvoiceItem;
use App\Models\QueueStatus;
use App\Models\BloodGroup;
use App\Models\Encounter;
use App\Models\Location;
use App\Models\Patient;
use App\Models\Invoice;
use App\Models\Gender;
use App\Models\Name;
use App\Models\Item;

class DevSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$faker = Factory::create();

    	//BloodGroup table
    	BloodGroup::truncate();

        BloodGroup::create([
            'code' => 'A+',
            'display' => 'A+'
        ]);
        BloodGroup::create([
            'code' => 'A-',
            'display' => 'A-'
        ]);
        BloodGroup::create([
            'code' => 'B+',
            'display' => 'B+'
        ]);
        BloodGroup::create([
            'code' => 'B-',
            'display' => 'B-'
        ]);
        BloodGroup::create([
            'code' => 'O+',
            'display' => 'O+'
        ]);
        BloodGroup::create([
            'code' => 'O-',
            'display' => 'O-'
        ]);
        BloodGroup::create([
            'code' => 'AB+',
            'display' => 'AB+'
        ]);
        BloodGroup::create([
            'code' => 'AB-',
            'display' => 'AB-'
        ]);

    	//Name Table
    	Name::truncate();

        $faker = \Faker\Factory::create();
        
        for ($i = 0; $i < 500; $i++) {
            Name::create([
                'text' => $faker->name,
                'family' => $faker->lastName,
                'given'=>$faker->firstName,
                'suffix'=>$faker->suffix,
            ]);
        }

        $names = Name::all();
        $bloodGroup = BloodGroup::pluck('id');

    	//Patients table
    	Patient::truncate();
    	foreach ($names as $name) {
            Patient::create([
                'identifier' => $faker->ean8,
                'ulin' => $faker->uuid,
                'name_id'=>$name->id,
                'gender_id'=>$faker->numberBetween($min = 1, $max = 2),
                'blood_group_id'=>$faker->randomElement($bloodGroup),
                'marital_status'=>$faker->numberBetween($min = 1, $max = 4),
                'birth_date'=>$faker->date($format = 'Y-m-d', $max = 'now'),
            ]);
        }

        QueueStatus::truncate();

        //Queue Status table
        QueueStatus::create([
            'code' => 'pending',
            'display' => 'Pending',
            'color' => 'red'
        ]);
        QueueStatus::create([
            'code' => 'triage',
            'display' => 'Triage',
            'color' => 'brown'
        ]);
        QueueStatus::create([
            'code' => 'consultation',
            'display' => 'Consultation'
            ,
            'color' => 'blue'
        ]);
        QueueStatus::create([
            'code' => 'labs',
            'display' => 'Labs',
            'color' => 'teal'
        ]);
        QueueStatus::create([
            'code' => 'pharmacy',
            'display' => 'Pharmacy'
            ,
            'color' => 'purple'
        ]);
        QueueStatus::create([
            'code' => 'complete',
            'display' => 'Complete'
            ,
            'color' => 'green'
        ]);

        EncounterClass::truncate();

        //EncounterClass table
        EncounterClass::create([
        	'code' => 'in-patient',
            'display' => 'In-Patient'
        ]);
        EncounterClass::create([
        	'code' => 'out-patient',
            'display' => 'Out-Patient'
        ]);

        //Location table
        Location::create([
        	'identifier'=> 'accident and emergency',
        	'name'		=> 'Accident and Emergency (A&E)'
        ]);
        Location::create([
        	'identifier'=> 'anaesthetics',
        	'name'		=> 'Anaesthetics'
        ]);
        Location::create([
        	'identifier'=> 'breast screening',
        	'name'		=> 'Breast Screening'
        ]);
        Location::create([
        	'identifier'=> 'cardiology',
        	'name'		=> 'Cardiology'
        ]);
        Location::create([
        	'identifier'=> 'critical care',
        	'name'		=> 'Critical Care'
        ]);
        Location::create([
        	'identifier'=> 'diagnostic Imaging',
        	'name'		=> 'Diagnostic imaging'
        ]);
        Location::create([
        	'identifier'=> 'ENT',
        	'name'		=> 'Ear nose and throat (ENT)'
        ]);
        Location::create([
        	'identifier'=> 'ESD',
        	'name'		=> 'Elderly Services Department'
        ]);
        Location::create([
        	'identifier'=> 'gastro',
        	'name'		=> 'Gastroenterology'
        ]);
        Location::create([
        	'identifier'=> 'GS',
        	'name'		=> 'General Surgery'
        ]);
        Location::create([
        	'identifier'=> 'gynaecology',
        	'name'		=> 'Gynaecology'
        ]);
        Location::create([
        	'identifier'=> 'haematology',
        	'name'		=> 'Haematology'
        ]);
        Location::create([
        	'identifier'=> 'MD',
        	'name'		=> 'Maternity departments'
        ]);
        Location::create([
        	'identifier'=> 'microbiology',
        	'name'		=> 'Microbiology'
        ]);
        Location::create([
        	'identifier'=> 'NU',
        	'name'		=> 'Neonatal Unit'
        ]);
        Location::create([
        	'identifier'=> 'nephrology',
        	'name'		=> 'Nephrology'
        ]);
        Location::create([
        	'identifier'=> 'ND',
        	'name'		=> 'Nutrition and Dietetics'
        ]);
        Location::create([
        	'identifier'=> 'OGU',
        	'name'		=> 'Obstetrics and Gynaecology Units'
        ]);
        Location::create([
        	'identifier'=> 'oncology',
        	'name'		=> 'Oncology'
        ]);
        Location::create([
        	'identifier'=> 'ophthalmology',
        	'name'		=> 'Ophthalmology'
        ]);
        Location::create([
        	'identifier'=> 'orthopaedics',
        	'name'		=> 'Orthopaedics'
        ]);
        Location::create([
        	'identifier'=> 'PMC',
        	'name'		=> 'Pain Management Clinics'
        ]);
        Location::create([
        	'identifier'=> 'pharmacy',
        	'name'		=> 'Pharmacy'
        ]);
        Location::create([
        	'identifier'=> 'physiotherapy',
        	'name'		=> 'Physiotherapy'
        ]);
        Location::create([
        	'identifier'=> 'radiotherapy',
        	'name'		=> 'Radiotherapy'
        ]);
        Location::create([
        	'identifier'=> 'RU',
        	'name'		=> 'Renal Unit'
        ]);
        Location::create([
        	'identifier'=> 'rheumatology',
        	'name'		=> 'Rheumatology'
        ]);
        Location::create([
        	'identifier'=> 'SH',
        	'name'		=> 'Sexual health (genitourinary medicine)'
        ]);
        Location::create([
        	'identifier'=> 'urology',
        	'name'		=> 'Urology'
        ]);

        //Encounters
        $patient = Patient::pluck('id');
        $location = Location::pluck('id');

        Encounter::truncate();
        for ($i = 0; $i < 1000; $i++) {
        	Encounter::create([
        		'patient_id' => $faker->randomElement($patient),
        		'location_id'=> $faker->randomElement($location),
        		'encounter_class_id'=> mt_rand(1, 2)
        	]);
        }

        //ItemCategory table
        ItemCategory::truncate();
        for ($i = 0; $i < 10; $i++) {
            ItemCategory::create([
                'name' => $faker->word,
                'description' => 'description of Item '.$faker->word,
            ]);
        }

        //Item table
        $itemCategories = ItemCategory::pluck('id');

        Item::truncate();
        for ($i = 0; $i < 200; $i++) {
            Item::create([
                'item_code' => 'PDT-'.$i,
                'description' => 'Name of Item '.$i,
                'item_category_id' => $faker->randomElement($itemCategories),
                'unit_price' => mt_rand(100, 1000)
            ]);
        }

        //Invoice & InvoiceItem tables
    	Invoice::truncate();
        InvoiceItem::truncate();

        $patients = Patient::pluck('id');
        $items = Item::pluck('id');

        for ($i = 0; $i < 1000; $i++) {
            $invoice = Invoice::create([
                'number' => 'INV-'.$i,
                'patient_id' => $faker->randomElement($patients),
                'date' => $faker->date($format = 'Y-m-d', $max = 'now'),
                'due_date' => $faker->date($format = 'Y-m-d', $max = 'now'),
                'reference' => 'LPO #'.$i,
                'terms_and_conditions' => $faker->text,
                'discount' => mt_rand(0, 100),
                'sub_total' => mt_rand(1000, 2000)
            ]);

            foreach(range(1, mt_rand(2, 4)) as $j) {
                InvoiceItem::create([
                    'invoice_id' => $invoice->id,
                    'item_id' => $faker->randomElement($items),
                    'unit_price' => mt_rand(100, 500),
                    'qty' => mt_rand(1, 6)
                ]);
            }
        }

        //Gender table
        Gender::truncate();
        Gender::create([
        	'active' => 1,
        	'code' => 'male',
        	'display' => 'Male'
        ]);
        Gender::create([
        	'active' => 1,
        	'code' => 'female',
        	'display' => 'Female'
        ]);
        Gender::create([
        	'active' => 1,
        	'code' => 'both',
        	'display' => 'Both'
        ]);
        Gender::create([
        	'active' => 1,
        	'code' => 'unknown',
        	'display' => 'Unknown'
        ]);

        //Marital Status Table
        MaritalStatus::create([
        	'active' => 1,
        	'code' => 'married',
        	'display' => 'Married'
        ]);
        MaritalStatus::create([
        	'active' => 1,
        	'code' => 'single',
        	'display' => 'Single'
        ]);
        MaritalStatus::create([
        	'active' => 1,
        	'code' => 'divorced',
        	'display' => 'Divorced'
        ]);
        MaritalStatus::create([
        	'active' => 1,
        	'code' => 'widowed',
        	'display' => 'Widowed'
        ]);
   	}
}