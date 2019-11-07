<?php

use Illuminate\Database\Seeder;
use Faker\Factory;

use App\Models\EnvironmentalHistory;
use App\Models\LabTestTypeCategory;
use App\Models\MedicationStatus;
use App\Models\SocialHistory;
use App\Models\EncounterClass;
use App\Models\ConditionType;
use App\Models\FamilyRelation;
use App\Models\FamilyHistory;
use App\Models\MaritalStatus;
use App\Models\ItemCategory;
use App\Models\InvoiceItem;
use App\Models\QueueStatus;
use App\Models\Medication;
use App\Models\BloodGroup;
use App\Models\Encounter;
use App\Models\Location;
use App\Models\TestType;
use App\Models\Allergy;
use App\Models\Alcohol;
use App\Models\Smoking;
use App\Models\Patient;
use App\Models\Invoice;
use App\Models\Payment;
use App\Models\Gender;
use App\Models\Dosage;
use App\Models\Drug;
use App\Models\Name;
use App\Models\Item;
use App\User;


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

        //Allergy
        Allergy::truncate();

        Allergy::create([
            'code_id'   => 1,
            'substance' => 'naproxen',
            'is_drug'   => 1
        ]);
        Allergy::create([
            'code_id'   => 2,
            'substance' => 'ibuprofen',
            'is_drug'   => 1
        ]);
        Allergy::create([
            'code_id'   => 3,
            'substance' => 'Aspirin',
            'is_drug'   => 1
        ]);
        Allergy::create([
            'code_id'   => 4,
            'substance' => 'Sulfa drugs',
            'is_drug'   => 1
        ]);
        Allergy::create([
            'code_id'   => 5,
            'substance' => 'Chemotherapy drugs',
            'is_drug'   => 1
        ]);
        Allergy::create([
            'code_id'   => 6,
            'substance' => 'Rituxian',
            'is_drug'   => 1
        ]);
        Allergy::create([
            'code_id'   => 7,
            'substance' => 'cetuximab',
            'is_drug'   => 1
        ]);
        Allergy::create([
            'code_id'   => 8,
            'substance' => 'Aspirin',
            'is_drug'   => 1
        ]);
        Allergy::create([
            'code_id'   => 9,
            'substance' => 'Insulin',
            'is_drug'   => 1
        ]);
        Allergy::create([
            'code_id'   => 10,
            'substance' => 'nevirapine',
            'is_drug'   => 1
        ]);
        Allergy::create([
            'code_id'   => 11,
            'substance' => 'abacavir',
            'is_drug'   => 1
        ]);
        Allergy::create([
            'code_id'   => 12,
            'substance' => 'carbamazepine',
            'is_drug'   => 1
        ]);
        Allergy::create([
            'code_id'   => 13,
            'substance' => 'atracurium',
            'is_drug'   => 1
        ]);
        Allergy::create([
            'code_id'   => 14,
            'substance' => 'succinylcholine',
            'is_drug'   => 1
        ]);
        Allergy::create([
            'code_id'   => 15,
            'substance' => 'vecuronium',
            'is_drug'   => 1
        ]);
        Allergy::create([
            'code_id'   => 16,
            'substance' => 'tetracycline',
            'is_drug'   => 1
        ]);
        Allergy::create([
            'code_id'   => 17,
            'substance' => 'penicillin',
            'is_drug'   => 1
        ]);
        Allergy::create([
            'code_id'   => 18,
            'substance' => 'ampicillin',
            'is_drug'   => 1
        ]);
        Allergy::create([
            'code_id'   => 19,
            'substance' => 'amoxicillin',
            'is_drug'   => 1
        ]);
        Allergy::create([
            'code_id'   => 20,
            'substance' => "Cow's Milk",
            'is_drug'   => 0
        ]);
        Allergy::create([
            'code_id'   => 21,
            'substance' => 'Eggs',
            'is_drug'   => 0
        ]);
        Allergy::create([
            'code_id'   => 22,
            'substance' => 'Tree Nuts',
            'is_drug'   => 0
        ]);
        Allergy::create([
            'code_id'   => 23,
            'substance' => 'Peanuts',
            'is_drug'   => 0
        ]);
        Allergy::create([
            'code_id'   => 24,
            'substance' => 'Shellfish',
            'is_drug'   => 0
        ]);
        Allergy::create([
            'code_id'   => 25,
            'substance' => 'Wheat',
            'is_drug'   => 0
        ]);
        Allergy::create([
            'code_id'   => 26,
            'substance' => 'Soy',
            'is_drug'   => 0
        ]);
        Allergy::create([
            'code_id'   => 27,
            'substance' => 'Fish',
            'is_drug'   => 0
        ]);
        Allergy::create([
            'code_id'   => 28,
            'substance' => 'Pollen',
            'is_drug'   => 0
        ]);
        Allergy::create([
            'code_id'   => 29,
            'substance' => 'Dust Mites',
            'is_drug'   => 0
        ]);
        Allergy::create([
            'code_id'   => 30,
            'substance' => 'Mold',
            'is_drug'   => 0
        ]);
        Allergy::create([
            'code_id'   => 31,
            'substance' => 'Animal Dander and Cockroaches',
            'is_drug'   => 0
        ]);
        Allergy::create([
            'code_id'   => 32,
            'substance' => 'Insect Sting',
            'is_drug'   => 0
        ]);
        Allergy::create([
            'code_id'   => 33,
            'substance' => 'Latex',
            'is_drug'   => 0
        ]);
        Allergy::create([
            'code_id'   => 33,
            'substance' => 'Food',
            'is_drug'   => 0
        ]);

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
        
        for ($i = 0; $i < 200; $i++) {
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

        //Users table
        for ($i = 0; $i < 50; $i++) {
            $email=$faker->companyEmail;
            if(User::whereEmail($email)->exists()){

            }
            else{
                User::create([
                    'name' => $faker->firstName,
                    'username' => $faker->name,
                    'email'=>$email,
                    'password'=>$faker->password,
                ]);
            }
            
        }

        $patients = Patient::pluck('id');
        $allergies = Allergy::pluck('id');
        
        //AllergyPatient table
        DB::table('allergy_patient')->truncate();

        for ($i = 0; $i < 200; $i++){
            $idAllergy = $faker->randomElement($allergies);
            $idPatient = $faker->randomElement($patients);

            if(DB::table('allergy_patient')->where('allergy_id', $idAllergy)->where('patient_id', $idPatient)->exists()){

            }else{
                DB::table('allergy_patient')->insert([
                   'allergy_id' => $idAllergy,
                   'patient_id' => $idPatient
                ]);
            }
        }

        //Smoking Histories
        Smoking::truncate();
        for ($i = 0; $i < 50; $i++){
            Smoking::create([
                'patient_id' => $faker->randomElement($patients),
                'kind' => $faker->word,
                'frequency' => $faker->word,
                'quantity' => $faker->randomDigit,
                'start_date'  => $faker->date($format = 'Y-m-d', $max = 'now'),
                'end_date'  => $faker->date($format = 'Y-m-d', $max = 'now')
            ]);
        }

        //Smoking Histories
        Alcohol::truncate();
        for ($i = 0; $i < 50; $i++){
            Smoking::create([
                'patient_id' => $faker->randomElement($patients),
                'kind' => $faker->word,
                'frequency' => $faker->word,
                'quantity' => $faker->randomDigit,
                'start_date'  => $faker->date($format = 'Y-m-d', $max = 'now'),
                'end_date'  => $faker->date($format = 'Y-m-d', $max = 'now')
            ]);
        }

        //Social Histories
        SocialHistory::truncate();
        for ($i = 0; $i < 200; $i++){
            SocialHistory::create([
                'patient_id' => $faker->randomElement($patients),
                'social_problem' => $faker->realText($maxNbChars = 50, $indexSize = 2),
                'start_date'  => $faker->date($format = 'Y-m-d', $max = 'now'),
                'end_date'  => $faker->date($format = 'Y-m-d', $max = 'now')
            ]);
        }

        //Environmental Histories
        EnvironmentalHistory::truncate();
        for ($i = 0; $i < 200; $i++){
            EnvironmentalHistory::create([
                'patient_id' => $faker->randomElement($patients),
                'description' => $faker->realText($maxNbChars = 50, $indexSize = 2),
                'start_date'  => $faker->date($format = 'Y-m-d', $max = 'now'),
                'end_date'  => $faker->date($format = 'Y-m-d', $max = 'now')
            ]);
        }

        MedicationStatus::truncate();
        MedicationStatus::create([
            'display' => 'In Progress'
        ]);
        MedicationStatus::create([
            'display' => 'Not Done'
        ]);
        MedicationStatus::create([
            'display' => 'On Hold'
        ]);
        MedicationStatus::create([
            'display' => 'Completed'
        ]);
        MedicationStatus::create([
            'display' => 'Entered in Error'
        ]);
        MedicationStatus::create([
            'display' => 'Stopped'
        ]);
        MedicationStatus::create([
            'display' => 'Unknown'
        ]);

        ConditionType::truncate();

        ConditionType::create([
            'code_id' => '001',
            'description' => 'cystic fibrosis'
        ]);
        ConditionType::create([
            'code_id' => '002',
            'description' => 'alpha-and beta-thalassemias'
        ]);
        ConditionType::create([
            'code_id' => '003',
            'description' => 'sickle cell anemia'
        ]);
        ConditionType::create([
            'code_id' => '004',
            'description' => 'Marfan syndrome'
        ]);
        ConditionType::create([
            'code_id' => '005',
            'description' => 'fragile X syndrome'
        ]);
        ConditionType::create([
            'code_id' => '006',
            'description' => "Huntington's disease"
        ]);
        ConditionType::create([
            'code_id' => '007',
            'description' => 'hemochromatosis'
        ]);
        ConditionType::create([
            'code_id' => '008',
            'description' => 'heart disease'
        ]);
        ConditionType::create([
            'code_id' => '009',
            'description' => 'high blood pressure'
        ]);
        ConditionType::create([
            'code_id' => '010',
            'description' => "Alzheimer's disease"
        ]);
        ConditionType::create([
            'code_id' => '011',
            'description' => 'arthritis'
        ]);
        ConditionType::create([
            'code_id' => '012',
            'description' => 'diabetes'
        ]);
        ConditionType::create([
            'code_id' => '013',
            'description' => 'cancer'
        ]);
        ConditionType::create([
            'code_id' => '014',
            'description' => 'obesity'
        ]);

        FamilyRelation::truncate();

        FamilyRelation::create([
            'code_id'   => '1',
            'display'   => 'son',
            'definition'=> 'Description: The player of the role is a male child (of any type) of scoping entity (parent)'
        ]);
        FamilyRelation::create([
            'code_id'   => '2',
            'display'   => 'daughter',
            'definition'=> 'Description: The player of the role is a female child (of any type) of scoping entity (parent)'
        ]);
        FamilyRelation::create([
            'code_id'   => '3',
            'display'   => 'aunt',
            'definition'=> "The player of the role is a sister of the scoping person's mother or father"
        ]);
        FamilyRelation::create([
            'code_id'   => '4',
            'display'   => 'maternal cousin',
            'definition'=> "Description:The player of the role is a biological relative of the scoping person descended from a common ancestor on the player's mother's side, such as a grandparent, by two or more steps in a diverging line"
        ]);
        FamilyRelation::create([
            'code_id'   => '5',
            'display'   => 'paternal cousin',
            'definition'=> "Description:The player of the role is a biological relative of the scoping person descended from a common ancestor on the player's father's side, such as a grandparent, by two or more steps in a diverging line"
        ]);
        FamilyRelation::create([
            'code_id'   => '6',
            'display'   => 'maternal great-grandfather',
            'definition'=> "Description:The player of the role is the biological father of the scoping person's biological mother's parent"
        ]);
        FamilyRelation::create([
            'code_id'   => '7',
            'display'   => 'paternal great-grandfather',
            'definition'=> "Description:The player of the role is the biological father of the scoping person's biological father's parent"
        ]);
        FamilyRelation::create([
            'code_id'   => '8',
            'display'   => 'maternal great-grandmother',
            'definition'=> "Description:The player of the role is the biological mother of the scoping person's biological mother's parent"
        ]);
        FamilyRelation::create([
            'code_id'   => '9',
            'display'   => 'paternal great-grandmother',
            'definition'=> "Description:The player of the role is the biological mother of the scoping person's biological father's parent"
        ]);
        FamilyRelation::create([
            'code_id'   => '10',
            'display'   => 'granddaughter',
            'definition'=> "The player of the role is a daughter of the scoping person's son or daughter"
        ]);
        FamilyRelation::create([
            'code_id'   => '11',
            'display'   => 'grandson',
            'definition'=> "The player of the role is a son of the scoping person's son or daughter"
        ]);
        FamilyRelation::create([
            'code_id'   => '12',
            'display'   => 'maternal grandfather',
            'definition'=> "Description:The player of the role is the biological father of the scoping person's biological mother"
        ]);
        FamilyRelation::create([
            'code_id'   => '13',
            'display'   => 'paternal grandfather',
            'definition'=> "Description:The player of the role is the biological father of the scoping person's biological father"
        ]);
        FamilyRelation::create([
            'code_id'   => '14',
            'display'   => 'maternal grandmother',
            'definition'=> "Description:The player of the role is the biological mother of the scoping person's biological mother"
        ]);
        FamilyRelation::create([
            'code_id'   => '15',
            'display'   => 'paternal grandmother',
            'definition'=> "Description:The player of the role is the biological mother of the scoping person's biological father"
        ]);
        FamilyRelation::create([
            'code_id'   => '16',
            'display'   => 'nephew',
            'definition'=> "The player of the role is a son of the scoping person's brother or sister or of the brother or sister of the scoping person's spouse"
        ]);
        FamilyRelation::create([
            'code_id'   => '17',
            'display'   => 'niece',
            'definition'=> "The player of the role is a daughter of the scoping person's brother or sister or of the brother or sister of the scoping person's spouse"
        ]);
        FamilyRelation::create([
            'code_id'   => '18',
            'display'   => 'maternal uncle',
            'definition'=> "Description:The player of the role is a biological brother of the scoping person's biological mother"
        ]);
        FamilyRelation::create([
            'code_id'   => '19',
            'display'   => 'paternal uncle',
            'definition'=> "Description:The player of the role is a biological brother of the scoping person's biological father"
        ]);
        FamilyRelation::create([
            'code_id'   => '20',
            'display'   => 'father',
            'definition'=> 'The player of the role is a male who begets or raises or nurtures the scoping entity (child)'
        ]);
        FamilyRelation::create([
            'code_id'   => '21',
            'display'   => 'mother',
            'definition'=> "The player of the role is a female who conceives, gives birth to, or raises and nurtures the scoping entity (child)"
        ]);
        FamilyRelation::create([
            'code_id'   => '22',
            'display'   => 'brother',
            'definition'=> "The player of the role is a male sharing one or both parents in common with the scoping entity"
        ]);
        FamilyRelation::create([
            'code_id'   => '23',
            'display'   => 'sister',
            'definition'=> 'The player of the role is a female sharing one or both parents in common with the scoping entity'
        ]);
        FamilyRelation::create([
            'code_id'   => '24',
            'display'   => 'husband',
            'definition'=> 'The player of the role is a man joined to a woman (scoping person) in marriage'
        ]);
        FamilyRelation::create([
            'code_id'   => '25',
            'display'   => 'wife',
            'definition'=> 'The player of the role is a woman joined to a man (scoping person) in marriage'
        ]);

        $conditionTypes = ConditionType::pluck('id');
        $familyRelation = FamilyRelation::pluck('id');
        $patients = Patient::pluck('id');

        FamilyHistory::truncate();

        for ($i = 0; $i < 200; $i++){
            FamilyHistory::create([
                'patient_id'        => $faker->randomElement($patients),
                'condition_type_id' => $faker->randomElement($conditionTypes),
                'description'   => $faker->text($maxNbChars = 50, $indexSize = 2),
                'relation' => $faker->randomElement($familyRelation),
                'start_date'    => $faker->date($format = 'Y-m-d', $max = 'now'),
                'end_date'      => $faker->date($format = 'Y-m-d', $max = 'now')
            ]);
        }

        Drug::truncate();

        Drug::create([
            'generic_name'  => 'SODIUM CHLORIDE',
            'trade_name'    => '0.225% W/V SODIUM CHLORIDE (1/4 NORMAL SALINE)  INTRAVENOUS INFUSION BP (500ML BOTTLE)',
            'strength_value'=> '0.225',
            'strength_unit' => '%',
            'dosage_form'   => 'Solution for infusion',
            'administration_route'=> 'Intravenous (not otherwise specified)'
        ]);
        Drug::create([
            'generic_name'  => 'METRONIDAZOLE',
            'trade_name'    => '0.5% METRONIDAZOLE INJECTION USP',
            'strength_value'=> '5',
            'strength_unit' => 'mg/ml',
            'dosage_form'   => 'Solution for infusion',
            'administration_route'=> 'Intravenous (not otherwise specified)'
        ]);
        Drug::create([
            'generic_name'  => 'SODIUM CHLORIDE',
            'trade_name'    => '0.9% W/V SODIUM CHLORIDE INJECTION B.P',
            'strength_value'=> '0.9',
            'strength_unit' => '%',
            'dosage_form'   => 'Solution for injection',
            'administration_route'=> 'Parenteral'
        ]);
        Drug::create([
            'generic_name'  => 'LIDOCAINE (LIGNOCAINE) HYDROCHLORIDE',
            'trade_name'    => '1% W-V LIDOCAINE HCL INJECTION USP',
            'strength_value'=> '1',
            'strength_unit' => '%',
            'dosage_form'   => 'Solution for injection',
            'administration_route'=> 'Intravenous (not otherwise specified)'
        ]);
        Drug::create([
            'generic_name'  => 'GLYCINE',
            'trade_name'    => '1.5% GLYCINE IRRIGATION USP',
            'strength_value'=> '1.5',
            'strength_unit' => '%',
            'dosage_form'   => 'Irrigation solution',
            'administration_route'=> 'Topical'
        ]);
        Drug::create([
            'generic_name'  => 'DEXTROSE, SODIUM CHLORIDE',
            'trade_name'    => '10% DEXTROSE AND 0.18% SODIUM CHLORIDE USP',
            'strength_value'=> '10, 0.18',
            'strength_unit' => '%',
            'dosage_form'   => 'Solution for injection/infusion',
            'administration_route'=> 'Intravenous (not otherwise specified)'
        ]);
        Drug::create([
            'generic_name'  => 'MANNITOL',
            'trade_name'    => '10% MANNITOL INTRAVENOUS INFUSION BP',
            'strength_value'=> '10',
            'strength_unit' => '%',
            'dosage_form'   => 'Solution for injection/infusion',
            'administration_route'=> 'Intravenous (not otherwise specified)'
        ]);
        Drug::create([
            'generic_name'  => 'POTASSIUM CHLORIDE',
            'trade_name'    => '15% W-V POTASSIUM CHLORIDE FOR INJ. USP',
            'strength_value'=> '15',
            'strength_unit' => '%',
            'dosage_form'   => 'Solution for injection',
            'administration_route'=> 'Intravenous (not otherwise specified)'
        ]);
        Drug::create([
            'generic_name'  => 'LIDOCAINE (LIGNOCAINE) HYDROCHLORIDE',
            'trade_name'    => '2% W-V LIDOCAINE HCL INJECTION USP',
            'strength_value'=> '2',
            'strength_unit' => '%',
            'dosage_form'   => 'Solution for injection',
            'administration_route'=> 'Intravenous (not otherwise specified)'
        ]);
        Drug::create([
            'generic_name'  => 'DEXTROSE',
            'trade_name'    => '25% W/V DEXTROSE INTRAVENOUS INFUSION USP (1000ML PP BAG)',
            'strength_value'=> '25',
            'strength_unit' => '%',
            'dosage_form'   => 'Solution for infusion',
            'administration_route'=> 'Intravenous (not otherwise specified)'
        ]);
        Drug::create([
            'generic_name'  => 'VITAMIN B1 (THIAMINE), VITAMIN B2 (RIBOFLAVIN), VITAMIN B6 (PYRIDOXINE), NICOTINAMIDE, CALCIUM PANTOTHENOL',
            'trade_name'    => '3V TABLETS',
            'strength_value'=> '100, 200, 0.2',
            'strength_unit' => 'mg',
            'dosage_form'   => 'Tablet',
            'administration_route'=> 'Oral'
        ]);
        Drug::create([
            'generic_name'  => 'ARIPIPRAZOLE',
            'trade_name'    => 'ABILIFY 10MG TABLET',
            'strength_value'=> '10',
            'strength_unit' => 'mg',
            'dosage_form'   => 'Tablet',
            'administration_route'=> 'Oral'
        ]);
        Drug::create([
            'generic_name'  => 'ACARBOSE',
            'trade_name'    => 'ACAROSE 100MG TABLETS',
            'strength_value'=> '100',
            'strength_unit' => 'mg',
            'dosage_form'   => 'Tablet',
            'administration_route'=> 'Oral'
        ]);
        Drug::create([
            'generic_name'  => 'ACETYLCYSTEINE',
            'trade_name'    => 'ACC 200MG POWDER FOR ORAL SOLUTION',
            'strength_value'=> '200',
            'strength_unit' => 'mg',
            'dosage_form'   => 'Powder for oral solution',
            'administration_route'=> 'Oral'
        ]);
        Drug::create([
            'generic_name'  => 'ZAFIRLUKAST',
            'trade_name'    => 'ACCOLATE 20 MG F.C.TAB',
            'strength_value'=> '20',
            'strength_unit' => 'mg',
            'dosage_form'   => 'Film-coated tablet',
            'administration_route'=> 'Oral'
        ]);
        Drug::create([
            'generic_name'  => 'QUINAPRIL, HYDROCHLOROTHIAZIDE',
            'trade_name'    => 'ACCUZIDE 20 F.C.TAB',
            'strength_value'=> '20, 12.5',
            'strength_unit' => 'mg',
            'dosage_form'   => 'Film-coated tablet',
            'administration_route'=> 'Oral'
        ]);
        Drug::create([
            'generic_name'  => 'CAPTOPRIL',
            'trade_name'    => 'ACETAB 25 MG TABLETS',
            'strength_value'=> '25',
            'strength_unit' => 'mg',
            'dosage_form'   => 'Tablet',
            'administration_route'=> 'Oral'
        ]);
        Drug::create([
            'generic_name'  => 'SODIUM CHLORIDE, POTASSIUM CHLORIDE, CALCIUM CHLORIDE, MAGNESIUM CHLORIDE, ACETIC ACID, DEXTROSE',
            'trade_name'    => 'ACETATE HEMODIALYSIS CAT.NO 3-085-005',
            'strength_value'=> '0',
            'strength_unit' => '%',
            'dosage_form'   => 'Concentrate for haemodialysis solution',
            'administration_route'=> 'Hemodialysis'
        ]);
        Drug::create([
            'generic_name'  => 'ACETYLCYSTEINE',
            'trade_name'    => 'ACETYLCYSTEINE EFFE INSTANT 200MG SACHET',
            'strength_value'=> '200',
            'strength_unit' => 'mg',
            'dosage_form'   => 'Granules',
            'administration_route'=> 'Oral'
        ]);
        Drug::create([
            'generic_name'  => 'DIHYDROXY ALUMINIUM SODIUM',
            'trade_name'    => 'ACICAL CHEWABLE TABLETS',
            'strength_value'=> '320',
            'strength_unit' => 'mg',
            'dosage_form'   => 'Chewable tablet',
            'administration_route'=> 'Oral'
        ]);

        Dosage::truncate();
        Dosage::create([
            'description' => '1 pill/day'
        ]);
        Dosage::create([
            'description' => '2 pills/day'
        ]);
        Dosage::create([
            'description' => '3 pills/day'
        ]);
        Dosage::create([
            'description' => ' 6.3ml/hr'
        ]);
        Dosage::create([
            'description' => '420ml/hr'
        ]);
        Dosage::create([
            'description' => '620ml/day'
        ]);

        $patients = Patient::pluck('id');
        $medicationstatus = MedicationStatus::pluck('id');
        $drugs = Drug::pluck('id');
        $users = User::pluck('id');
        $dosage = Dosage::pluck('id');

        Medication::truncate();
        for ($i = 0; $i < 200; $i++){
            Medication::create([
                'patient_id'=> $faker->randomElement($patients),
                'medication_status_id'=> $faker->randomElement($medicationstatus),
                'drug_id'   => $faker->randomElement($drugs),
                'prescribed_by'=> $faker->randomElement($users),
                'dosage_id' => $faker->randomElement($dosage),
                'quantity'  => mt_rand(1, 50),
                'start_time'=> $faker->dateTime(),
                'end_time'  => $faker->dateTime(),
                'refill'    => mt_rand(0, 1),
                'comments'  => $faker->realText($maxNbChars = 50, $indexSize = 2),
            ]);
        }

        QueueStatus::truncate();

        //Queue Status table
        QueueStatus::create([
            'code' => 'pending',
            'display' => 'Pending Vitals',
            'color' => 'red'
        ]);
        QueueStatus::create([
            'code' => 'triage',
            'display' => 'In Triage',
            'color' => 'brown'
        ]);
        QueueStatus::create([
            'code' => 'consultation_pending',
            'display' => 'Awaiting Consultation'
            ,
            'color' => 'blue'
        ]);
        QueueStatus::create([
            'code' => 'consultation_started',
            'display' => 'In Consult',
            'color' => 'teal'
        ]);
        QueueStatus::create([
            'code' => 'lab',
            'display' => 'Lab Investigation'
            ,
            'color' => 'purple'
        ]);
        QueueStatus::create([
            'code' => 'pharmacy',
            'display' => 'Pharmacy'
            ,
            'color' => 'orange'
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
            'name'      => 'Accident and Emergency (A&E)'
        ]);
        Location::create([
            'identifier'=> 'anaesthetics',
            'name'      => 'Anaesthetics'
        ]);
        Location::create([
            'identifier'=> 'breast screening',
            'name'      => 'Breast Screening'
        ]);
        Location::create([
            'identifier'=> 'cardiology',
            'name'      => 'Cardiology'
        ]);
        Location::create([
            'identifier'=> 'critical care',
            'name'      => 'Critical Care'
        ]);
        Location::create([
            'identifier'=> 'diagnostic Imaging',
            'name'      => 'Diagnostic imaging'
        ]);
        Location::create([
            'identifier'=> 'ENT',
            'name'      => 'Ear nose and throat (ENT)'
        ]);
        Location::create([
            'identifier'=> 'ESD',
            'name'      => 'Elderly Services Department'
        ]);
        Location::create([
            'identifier'=> 'gastro',
            'name'      => 'Gastroenterology'
        ]);
        Location::create([
            'identifier'=> 'GS',
            'name'      => 'General Surgery'
        ]);
        Location::create([
            'identifier'=> 'gynaecology',
            'name'      => 'Gynaecology'
        ]);
        Location::create([
            'identifier'=> 'haematology',
            'name'      => 'Haematology'
        ]);
        Location::create([
            'identifier'=> 'MD',
            'name'      => 'Maternity departments'
        ]);
        Location::create([
            'identifier'=> 'microbiology',
            'name'      => 'Microbiology'
        ]);
        Location::create([
            'identifier'=> 'NU',
            'name'      => 'Neonatal Unit'
        ]);
        Location::create([
            'identifier'=> 'nephrology',
            'name'      => 'Nephrology'
        ]);
        Location::create([
            'identifier'=> 'ND',
            'name'      => 'Nutrition and Dietetics'
        ]);
        Location::create([
            'identifier'=> 'OGU',
            'name'      => 'Obstetrics and Gynaecology Units'
        ]);
        Location::create([
            'identifier'=> 'oncology',
            'name'      => 'Oncology'
        ]);
        Location::create([
            'identifier'=> 'ophthalmology',
            'name'      => 'Ophthalmology'
        ]);
        Location::create([
            'identifier'=> 'orthopaedics',
            'name'      => 'Orthopaedics'
        ]);
        Location::create([
            'identifier'=> 'PMC',
            'name'      => 'Pain Management Clinics'
        ]);
        Location::create([
            'identifier'=> 'pharmacy',
            'name'      => 'Pharmacy'
        ]);
        Location::create([
            'identifier'=> 'physiotherapy',
            'name'      => 'Physiotherapy'
        ]);
        Location::create([
            'identifier'=> 'radiotherapy',
            'name'      => 'Radiotherapy'
        ]);
        Location::create([
            'identifier'=> 'RU',
            'name'      => 'Renal Unit'
        ]);
        Location::create([
            'identifier'=> 'rheumatology',
            'name'      => 'Rheumatology'
        ]);
        Location::create([
            'identifier'=> 'SH',
            'name'      => 'Sexual health (genitourinary medicine)'
        ]);
        Location::create([
            'identifier'=> 'urology',
            'name'      => 'Urology'
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
                'name' => 'consultation',
                'description' => 'radiology consultation',
            ]);
        }

        //Item table
        $itemCategories = ItemCategory::pluck('id');

        Item::truncate();
        for ($i = 0; $i < 200; $i++) {
            Item::create([
                'item_code' => 'CNT-'.$i,
                'description' => 'consultation',
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
                'description' => 'LPO #'.$i,
                'status' => 'paid',
                'discount' => mt_rand(0, 100),
                'tax' => mt_rand(0, 100),
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

        //Payment table
        Payment::truncate();

        for ($i = 0; $i < 1000; $i++) {
            $payment = Payment::create([
                'number' => 'PMT-'.$i,
                'invoice_id' => $invoice->id,
                'date' => $faker->date($format = 'Y-m-d', $max = 'now'),
                'description' => $faker->text,
                'status' => 'complete',
                'method' => 'cash',
                'balance' => mt_rand(0, 100),
                'amount' => mt_rand(1000, 2000)
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

        // Tests Seed
        /* Specimen Types table */
        $specimenTypeAsciticTap = SpecimenType::create(['name' => 'Ascitic Tap']);
        $specimenTypeDriedBloodSpot = SpecimenType::create(['name' => 'Dried Blood Spot']);
        $specimenTypeNasalSwab = SpecimenType::create(['name' => 'Nasal Swab']);
        $specimenTypePleuralTap = SpecimenType::create(['name' => 'Pleural Tap']);
        $specimenTypeRectalSwab = SpecimenType::create(['name' => 'Rectal Swab']);
        $specimenTypeSemen = SpecimenType::create(['name' => 'Semen']);
        $specimenTypeSkin = SpecimenType::create(['name' => 'Skin']);
        $specimenTypeVomitus = SpecimenType::create(['name' => 'Vomitus']); // should this be kept given there is sputum
        $specimenTypeSynovialFluid = SpecimenType::create(['name' => 'Synovial Fluid']);
        $specimenTypeUrethralSmear = SpecimenType::create(['name' => 'Urethral Smear']);
        $specimenTypeVaginalSmear = SpecimenType::create(['name' => 'Vaginal Smear']);
        $specimenTypeWater = SpecimenType::create(['name' => 'Water']);

        // microb-able specimen types
        $specimenTypeStool = SpecimenType::create(['name' => 'Stool']);
        $specimenTypeCSF = SpecimenType::create(['name' => 'CSF']);
        $specimenTypeWoundSwab = SpecimenType::create(['name' => 'Wound swab']);
        $specimenTypePusSwab = SpecimenType::create(['name' => 'Pus swab']);
        $specimenTypeHVS = SpecimenType::create(['name' => 'HVS']);
        $specimenTypeEyeSwab = SpecimenType::create(['name' => 'Eye swab']);
        $specimenTypeEarSwab = SpecimenType::create(['name' => 'Ear swab']);
        $specimenTypeThroatSwab = SpecimenType::create(['name' => 'Throat swab']);
        $specimenTypeAspirates = SpecimenType::create(['name' => 'Pus Aspirate']);
        $specimenTypeBlood = SpecimenType::create(['name' => 'Blood']);
        $specimenTypeBAL = SpecimenType::create(['name' => 'BAL']);
        $specimenTypeSputum = SpecimenType::create(['name' => 'Sputum']);
        $specimenTypeUretheralSwab = SpecimenType::create(['name' => 'Uretheral swab']);
        $specimenTypeUrine = SpecimenType::create(['name' => 'Urine']);

        /* Test Categories table - These map on to the lab sections */
        $test_categories = TestTypeCategory::create(['name' => 'PARASITOLOGY']);
        $testTypeCategoryMicrobiology = TestTypeCategory::create(['name' => 'MICROBIOLOGY']);
        $testTypeCategoryHematology = TestTypeCategory::create(['name' => 'HEMATOLOGY']);
        $testTypeCategorySerology = TestTypeCategory::create(['name' => 'SEROLOGY']);
        $testTypeCategoryTransfusion = TestTypeCategory::create(['name' => 'BLOOD TRANSFUSION']);
        $testTypeCategoryChemistry = TestTypeCategory::create(['name' => 'CHEMISTRY']);
        $this->command->info('Lab Sections seeded');

        $testTypeHIV = TestType::create(['name' => 'HIV', 'test_type_category_id' => $testTypeCategorySerology->id]);
        $testTypeBS = TestType::create(['name' => 'BS for mps', 'test_type_category_id' => $test_categories->id]);
        $testTypeUrinalysis = TestType::create(['name' => 'Urinalysis', 'test_type_category_id' => $test_categories->id]);
        $testTypeWBC = TestType::create(['name' => 'WBC', 'test_type_category_id' => $test_categories->id]);
        $test_types_lfts = TestType::create(['name' => 'LFTS', 'test_type_category_id' => $testTypeCategoryChemistry->id]);
        $test_types_rfts = TestType::create(['name' => 'RFTS', 'test_type_category_id' => $testTypeCategoryChemistry->id]);
        $test_types_lipid_profile = TestType::create(['name' => 'LIPID PROFILE', 'test_type_category_id' => $testTypeCategoryChemistry->id]);

        $this->command->info('test_types seeded');

        $testTypeGXM = TestType::create(['name' => 'GXM', 'test_type_category_id' => $test_categories->id]);
        $measureGXM = Measure::create(['measure_type_id' => MeasureType::free_text, 'test_type_id' => $testTypeGXM->id, 'name' => 'GXM', 'unit' => '']);
        $measureBloodGroup = Measure::create(
            ['measure_type_id' => MeasureType::alphanumeric, 'test_type_id' => $testTypeGXM->id,
                'name' => 'Blood Grouping',
                'unit' => '', ]);
        MeasureRange::create(['measure_id' => $measureBloodGroup->id, 'display' => 'O-']);
        MeasureRange::create(['measure_id' => $measureBloodGroup->id, 'display' => 'O+']);
        MeasureRange::create(['measure_id' => $measureBloodGroup->id, 'display' => 'A-']);
        MeasureRange::create(['measure_id' => $measureBloodGroup->id, 'display' => 'A+']);
        MeasureRange::create(['measure_id' => $measureBloodGroup->id, 'display' => 'B-']);
        MeasureRange::create(['measure_id' => $measureBloodGroup->id, 'display' => 'B+']);
        MeasureRange::create(['measure_id' => $measureBloodGroup->id, 'display' => 'AB-']);
        MeasureRange::create(['measure_id' => $measureBloodGroup->id, 'display' => 'AB+']);

        $measuresUrinalysisData = [
            // Urine Microscopy
            ['measure_type_id' => MeasureType::free_text, 'test_type_id' => $testTypeUrinalysis->id,
                'name' => 'Pus cells', 'unit' => '', ],
            ['measure_type_id' => MeasureType::free_text, 'test_type_id' => $testTypeUrinalysis->id,
                'name' => 'S. haematobium', 'unit' => '', ],
            ['measure_type_id' => MeasureType::free_text, 'test_type_id' => $testTypeUrinalysis->id,
                'name' => 'T. vaginalis', 'unit' => '', ],
            ['measure_type_id' => MeasureType::free_text, 'test_type_id' => $testTypeUrinalysis->id,
                'name' => 'Yeast cells', 'unit' => '', ],
            ['measure_type_id' => MeasureType::free_text, 'test_type_id' => $testTypeUrinalysis->id,
                'name' => 'Red blood cells', 'unit' => '', ],
            ['measure_type_id' => MeasureType::free_text, 'test_type_id' => $testTypeUrinalysis->id,
                'name' => 'Bacteria', 'unit' => '', ],
            ['measure_type_id' => MeasureType::free_text, 'test_type_id' => $testTypeUrinalysis->id,
                'name' => 'Spermatozoa', 'unit' => '', ],
            ['measure_type_id' => MeasureType::free_text, 'test_type_id' => $testTypeUrinalysis->id,
                'name' => 'Epithelial cells', 'unit' => '', ],
            // Urine Chemistry
            ['measure_type_id' => MeasureType::free_text, 'test_type_id' => $testTypeUrinalysis->id,
                'name' => 'Glucose', 'unit' => '', ],
            ['measure_type_id' => MeasureType::free_text, 'test_type_id' => $testTypeUrinalysis->id,
                'name' => 'Ketones', 'unit' => '', ],
            ['measure_type_id' => MeasureType::free_text, 'test_type_id' => $testTypeUrinalysis->id,
                'name' => 'Proteins', 'unit' => '', ],
            ['measure_type_id' => MeasureType::free_text, 'test_type_id' => $testTypeUrinalysis->id,
                'name' => 'Blood', 'unit' => '', ],
            ['measure_type_id' => MeasureType::free_text, 'test_type_id' => $testTypeUrinalysis->id,
                'name' => 'Bilirubin', 'unit' => '', ],
            ['measure_type_id' => MeasureType::free_text, 'test_type_id' => $testTypeUrinalysis->id,
                'name' => 'Urobilinogen Phenlpyruvic acid', 'unit' => '', ],
            ['measure_type_id' => MeasureType::free_text, 'test_type_id' => $testTypeUrinalysis->id,
                'name' => 'pH', 'unit' => '', ],
        ];

        foreach ($measuresUrinalysisData as $measureU) {
            $measuresUrinalysis[] = Measure::create($measureU);
        }

        \DB::table('test_type_mappings')->insert(
            ['test_type_id' => $testTypeUrinalysis->id, 'specimen_type_id' => $specimenTypeUrine->id]);

        $measuresWBCData = [
            ['measure_type_id' => MeasureType::numeric,
                'test_type_id' => $testTypeWBC->id,
                'name' => 'WBC',
                'unit' => 'x10³/µL', ],
            ['measure_type_id' => MeasureType::numeric,
                'test_type_id' => $testTypeWBC->id,
                'name' => 'Lym', 'unit' => 'L', ],
            ['measure_type_id' => MeasureType::numeric,
                'test_type_id' => $testTypeWBC->id,
                'name' => 'Mon', 'unit' => '*', ],
            ['measure_type_id' => MeasureType::numeric,
                'test_type_id' => $testTypeWBC->id,
                'name' => 'Neu', 'unit' => '*', ],
            ['measure_type_id' => MeasureType::numeric,
                'test_type_id' => $testTypeWBC->id,
                'name' => 'Eos', 'unit' => '', ],
            ['measure_type_id' => MeasureType::numeric,
                'test_type_id' => $testTypeWBC->id,
                'name' => 'Baso', 'unit' => '', ],
        ];

        foreach ($measuresWBCData as $value) {
            $measuresWBC[] = Measure::create($value);
        }

        $measureRangesWBC = [
            ['measure_id' => $measuresWBC[0]->id, 'age_min' => 0, 'age_max' => 100, 'gender_id' => Gender::both,
                'low' => 4, 'high' => 11, ],
            ['measure_id' => $measuresWBC[1]->id, 'age_min' => 0, 'age_max' => 100, 'gender_id' => Gender::both,
                'low' => 1.5, 'high' => 4, ],
            ['measure_id' => $measuresWBC[2]->id, 'age_min' => 0, 'age_max' => 100, 'gender_id' => Gender::both,
                'low' => 0.1, 'high' => 9, ],
            ['measure_id' => $measuresWBC[3]->id, 'age_min' => 0, 'age_max' => 100, 'gender_id' => Gender::both,
                'low' => 2.5, 'high' => 7, ],
            ['measure_id' => $measuresWBC[4]->id, 'age_min' => 0, 'age_max' => 100, 'gender_id' => Gender::both,
                'low' => 0, 'high' => 6, ],
            ['measure_id' => $measuresWBC[5]->id, 'age_min' => 0, 'age_max' => 100, 'gender_id' => Gender::both,
                'low' => 0, 'high' => 2, ],
            ];

        foreach ($measureRangesWBC as $value) {
            MeasureRange::create($value);
        }

        $this->command->info('measures seeded');

        /* Measures table */
        $measureHIV = [
            [
                'measure_type_id' => MeasureType::alphanumeric,
                'test_type_id' => $testTypeHIV->id,
                'name' => 'Screening',
                'unit' => '',
            ],
            [
                'measure_type_id' => MeasureType::alphanumeric,
                'test_type_id' => $testTypeHIV->id,
                'name' => 'Confirmatory Test (Statpak)',
                'unit' => '',
            ],
            [
                'measure_type_id' => MeasureType::alphanumeric,
                'test_type_id' => $testTypeHIV->id,
                'name' => 'Unigold',
                'unit' =>'',
            ],
        ];

        foreach ($measureHIV as $measure) {
            $id = Measure::create($measure)->id;
            MeasureRange::create(['measure_id' => $id, 'display' => 'Reactive']);
            MeasureRange::create(['measure_id' => $id, 'display' => 'Non Reactive']);
        }

        $measureBSforMPS = Measure::create([
            'measure_type_id' => MeasureType::alphanumeric,
            'test_type_id' => $testTypeBS->id,
            'name' => 'BS for mps',
            'unit' => '', ]);

        $positive = Interpretation::create([
            'code' => 'positive',
            'name' => 'Positive',
        ]);
        $negative = Interpretation::create([
            'code' => 'negative',
            'name' => 'Negative',
        ]);

        MeasureRange::create([
            'measure_id' => $measureBSforMPS->id,
            'display' => 'No mps seen',
            'interpretation_id' => $negative->id,
        ]);
        MeasureRange::create([
            'measure_id' => $measureBSforMPS->id,
            'display' => '+',
            'interpretation_id' => $positive->id,
        ]);
        MeasureRange::create([
            'measure_id' => $measureBSforMPS->id,
            'display' => '++',
            'interpretation_id' => $positive->id,
        ]);
        MeasureRange::create([
            'measure_id' => $measureBSforMPS->id,

            'display' => '+++',
            'interpretation_id' => $positive->id,
        ]);

        /* test_type_mappings table */
        \DB::table('test_type_mappings')->insert(
            ['test_type_id' => $testTypeHIV->id, 'specimen_type_id' => $specimenTypeBlood->id]);
        \DB::table('test_type_mappings')->insert(
            ['test_type_id' => $testTypeBS->id, 'specimen_type_id' => $specimenTypeBlood->id]);
        \DB::table('test_type_mappings')->insert(
            ['test_type_id' => $testTypeGXM->id, 'specimen_type_id' => $specimenTypeBlood->id]);
        \DB::table('test_type_mappings')->insert(
            ['test_type_id' => $testTypeWBC->id, 'specimen_type_id' => $specimenTypeBlood->id]);

        $this->command->info('Test Type Mappings Seeded');


        /* Test Types for prevalence */
        $test_types_salmonella = TestType::create(['name' => 'Salmonella Antigen Test', 'test_type_category_id' => $test_categories->id]);
        $test_types_direct = TestType::create(['name' => 'Direct COOMBS Test', 'test_type_category_id' => $testTypeCategoryTransfusion->id]);
        $test_types_du = TestType::create(['name' => 'DU Test', 'test_type_category_id' => $testTypeCategoryTransfusion->id]);
        $test_types_sickling = TestType::create(['name' => 'Sickling Test', 'test_type_category_id' => $testTypeCategoryHematology->id]);
        $test_types_borrelia = TestType::create(['name' => 'Borrelia', 'test_type_category_id' => $test_categories->id]);
        $test_types_vdrl = TestType::create(['name' => 'VDRL', 'test_type_category_id' => $testTypeCategorySerology->id]);
        $test_types_pregnancy = TestType::create(['name' => 'Pregnancy Test', 'test_type_category_id' => $testTypeCategorySerology->id]);
        $test_types_brucella = TestType::create(['name' => 'Brucella', 'test_type_category_id' => $testTypeCategorySerology->id]);
        $test_types_pylori = TestType::create(['name' => 'H. Pylori', 'test_type_category_id' => $testTypeCategorySerology->id]);

        $this->command->info('Test Types seeded');

        /* Test Types and specimen types relationship for prevalence */
        \DB::insert('INSERT INTO test_type_mappings (test_type_id, specimen_type_id) VALUES (?, ?)',
            [$test_types_salmonella->id, $specimenTypeBlood->id]);
        \DB::insert('INSERT INTO test_type_mappings (test_type_id, specimen_type_id) VALUES (?, ?)',
            [$test_types_direct->id, $specimenTypeBlood->id]);
        \DB::insert('INSERT INTO test_type_mappings (test_type_id, specimen_type_id) VALUES (?, ?)',
            [$test_types_du->id, $specimenTypeBlood->id]);
        \DB::insert('INSERT INTO test_type_mappings (test_type_id, specimen_type_id) VALUES (?, ?)',
            [$test_types_sickling->id, $specimenTypeBlood->id]);
        \DB::insert('INSERT INTO test_type_mappings (test_type_id, specimen_type_id) VALUES (?, ?)',
            [$test_types_borrelia->id, $specimenTypeUrine->id]);
        \DB::insert('INSERT INTO test_type_mappings (test_type_id, specimen_type_id) VALUES (?, ?)',
            [$test_types_vdrl->id, $specimenTypeBlood->id]);
        \DB::insert('INSERT INTO test_type_mappings (test_type_id, specimen_type_id) VALUES (?, ?)',
            [$test_types_pregnancy->id, $specimenTypeUrine->id]);
        \DB::insert('INSERT INTO test_type_mappings (test_type_id, specimen_type_id) VALUES (?, ?)',
            [$test_types_brucella->id, $specimenTypeBlood->id]);
        \DB::insert('INSERT INTO test_type_mappings (test_type_id, specimen_type_id) VALUES (?, ?)',
            [$test_types_pylori->id, $specimenTypeStool->id]);
        \DB::insert('INSERT INTO test_type_mappings (test_type_id, specimen_type_id) VALUES (?, ?)',
            [$test_types_lfts->id, $specimenTypeBlood->id]);
        \DB::insert('INSERT INTO test_type_mappings (test_type_id, specimen_type_id) VALUES (?, ?)',
            [$test_types_lipid_profile->id, $specimenTypeBlood->id]);
        \DB::insert('INSERT INTO test_type_mappings (test_type_id, specimen_type_id) VALUES (?, ?)',
            [$test_types_rfts->id, $specimenTypeUrine->id]);
        $this->command->info('TestTypes/SpecimenTypes seeded');


        $testTypeCBC = TestType::create([
            'name' => 'CBC',
            'test_type_category_id' => $testTypeCategoryHematology->id,
        ]);

        /* test_type_mappings table */
        \DB::table('test_type_mappings')->insert(
            ['test_type_id' => $testTypeCBC->id, 'specimen_type_id' => $specimenTypeBlood->id]);

        // test types
        $testTypeAppearance = TestType::create([
            'name' => 'Appearance',
            'test_type_category_id' => $testTypeCategoryMicrobiology->id,
        ]);
        $testTypeCultureAndSensitivity = TestType::create([
            'name' => 'Culture and Sensitivity',
            'culture' => 1,
            'test_type_category_id' => $testTypeCategoryMicrobiology->id,
        ]);
        $testTypeGramStain = TestType::create([
            'name' => 'Gram Stain',
            'test_type_category_id' => $testTypeCategoryMicrobiology->id,
        ]);
        $testTypeIndiaInkStain = TestType::create([
            'name' => 'India Ink Stain',
            'test_type_category_id' => $testTypeCategoryMicrobiology->id,
        ]);
        $testTypeProtein = TestType::create([
            'name' => 'Protein',
            'test_type_category_id' => $testTypeCategoryMicrobiology->id,
        ]);
        $testTypeWetPreparation = TestType::create([
            'name' => 'Wet preparation (saline preparation)',
            'test_type_category_id' => $testTypeCategoryMicrobiology->id,
        ]);
        $testTypeWetSalineIodinePrep = TestType::create([
            'name' => 'Wet Saline Iodine Prep',
            'test_type_category_id' => $testTypeCategoryMicrobiology->id,
        ]);
        $testTypeWhiteBloodCellCount = TestType::create([
            'name' => 'White Blood Cell Count',
            'test_type_category_id' => $testTypeCategoryMicrobiology->id,
        ]);
        $testTypeZNStain = TestType::create([
            'name' => 'ZN Stain',
            'test_type_category_id' => $testTypeCategoryMicrobiology->id,
        ]);
        $testTypeModifiedZn = TestType::create([
            'name' => 'Modified ZN',
            'test_type_category_id' => $testTypeCategoryMicrobiology->id,
        ]);

        $testTypeCrag = TestType::create(['name' => 'Crag', 'test_type_category_id' => $testTypeCategoryMicrobiology->id]);
        $testTypeDifferential = TestType::create(['name' => 'Differential', 'test_type_category_id' => $testTypeCategoryMicrobiology->id]);
        $testTypeTotalCellCount = TestType::create(['name' => 'Total Cell Count', 'test_type_category_id' => $testTypeCategoryMicrobiology->id]);
        $testTypeLymphocytes = TestType::create(['name' => 'Lymphocytes', 'test_type_category_id' => $testTypeCategoryMicrobiology->id]);
        $testTypeQuantitativeCulture = TestType::create(['name' => 'Quantitative Culture', 'test_type_category_id' => $testTypeCategoryMicrobiology->id]);
        $testTypeRBC = TestType::create(['name' => 'RBC Count', 'test_type_category_id' => $testTypeCategoryMicrobiology->id]);
        $testTypeTPHA = TestType::create(['name' => 'TPHA', 'test_type_category_id' => $testTypeCategoryMicrobiology->id]);

        /* Urine Chemistry */
        $testTypeHCG = TestType::create(['name' => 'HCG', 'test_type_category_id' => $testTypeCategoryMicrobiology->id]);
        $testTypeBilirubin = TestType::create(['name' => 'Bilirubin', 'test_type_category_id' => $testTypeCategoryMicrobiology->id]);
        $testTypeBlood = TestType::create(['name' => 'Blood', 'test_type_category_id' => $testTypeCategoryMicrobiology->id]);
        $testTypeGlucose = TestType::create(['name' => 'Glucose', 'test_type_category_id' => $testTypeCategoryMicrobiology->id]);
        $testTypeKetones = TestType::create(['name' => 'Ketones', 'test_type_category_id' => $testTypeCategoryMicrobiology->id]);
        $testTypeLeukocytes = TestType::create(['name' => 'Leukocytes', 'test_type_category_id' => $testTypeCategoryMicrobiology->id]);
        $testTypeMicroscopy = TestType::create(['name' => 'Microscopy', 'test_type_category_id' => $testTypeCategoryMicrobiology->id]);
        $testTypeNitrite = TestType::create(['name' => 'Nitrite', 'test_type_category_id' => $testTypeCategoryMicrobiology->id]);
        $testTypePH = TestType::create(['name' => 'pH', 'test_type_category_id' => $testTypeCategoryMicrobiology->id]);
        // $testTypeProtein = TestType::create(["name" => "Protein","test_type_category_id" => $testTypeCategoryMicrobiology->id,]);
        $testTypeSpecificGravity = TestType::create(['name' => 'Specific Gravity', 'test_type_category_id' => $testTypeCategoryMicrobiology->id]);
        $testTypeUrobilinogen = TestType::create(['name' => 'Urobilinogen', 'test_type_category_id' => $testTypeCategoryMicrobiology->id]);

        \DB::table('test_type_mappings')->insert([
            'specimen_type_id' => $specimenTypeUrine->id,
            'test_type_id' => $testTypeHCG->id,
        ]);
        \DB::table('test_type_mappings')->insert([
            'specimen_type_id' => $specimenTypeUrine->id,
            'test_type_id' => $testTypeBilirubin->id,
        ]);
        \DB::table('test_type_mappings')->insert([
            'specimen_type_id' => $specimenTypeUrine->id,
            'test_type_id' => $testTypeBlood->id,
        ]);
        \DB::table('test_type_mappings')->insert([
            'specimen_type_id' => $specimenTypeUrine->id,
            'test_type_id' => $testTypeGlucose->id,
        ]);
        \DB::table('test_type_mappings')->insert([
            'specimen_type_id' => $specimenTypeUrine->id,
            'test_type_id' => $testTypeKetones->id,
        ]);
        \DB::table('test_type_mappings')->insert([
            'specimen_type_id' => $specimenTypeUrine->id,
            'test_type_id' => $testTypeLeukocytes->id,
        ]);
        \DB::table('test_type_mappings')->insert([
            'specimen_type_id' => $specimenTypeUrine->id,
            'test_type_id' => $testTypeMicroscopy->id,
        ]);
        \DB::table('test_type_mappings')->insert([
            'specimen_type_id' => $specimenTypeUrine->id,
            'test_type_id' => $testTypeNitrite->id,
        ]);
        \DB::table('test_type_mappings')->insert([
            'specimen_type_id' => $specimenTypeUrine->id,
            'test_type_id' => $testTypePH->id,
        ]);
        \DB::table('test_type_mappings')->insert([
            'specimen_type_id' => $specimenTypeUrine->id,
            'test_type_id' => $testTypeProtein->id,
        ]);
        \DB::table('test_type_mappings')->insert([
            'specimen_type_id' => $specimenTypeUrine->id,
            'test_type_id' => $testTypeSpecificGravity->id,
        ]);
        \DB::table('test_type_mappings')->insert([
            'specimen_type_id' => $specimenTypeUrine->id,
            'test_type_id' => $testTypeUrobilinogen->id,
        ]);
        \DB::table('test_type_mappings')->insert([
            'specimen_type_id' => $specimenTypeStool->id,
            'test_type_id' => $testTypeCultureAndSensitivity->id,
        ]);
        \DB::table('test_type_mappings')->insert([
            'specimen_type_id' => $specimenTypeStool->id,
            'test_type_id' => $testTypeAppearance->id,
        ]);
        \DB::table('test_type_mappings')->insert([
            'specimen_type_id' => $specimenTypeStool->id,
            'test_type_id' => $testTypeModifiedZn->id,
        ]);
        \DB::table('test_type_mappings')->insert([
            'specimen_type_id' => $specimenTypeUrine->id,
            'test_type_id' => $testTypeCultureAndSensitivity->id,
        ]);
        \DB::table('test_type_mappings')->insert([
            'specimen_type_id' => $specimenTypeUrine->id,
            'test_type_id' => $testTypeAppearance->id,
        ]);
        \DB::table('test_type_mappings')->insert([
            'specimen_type_id' => $specimenTypeCSF->id,
            'test_type_id' => $testTypeAppearance->id,
        ]);
        \DB::table('test_type_mappings')->insert([
            'specimen_type_id' => $specimenTypeCSF->id,
            'test_type_id' => $testTypeProtein->id,
        ]);
        \DB::table('test_type_mappings')->insert([
            'specimen_type_id' => $specimenTypeCSF->id,
            'test_type_id' => $testTypeIndiaInkStain->id,
        ]);
        \DB::table('test_type_mappings')->insert([
            'specimen_type_id' => $specimenTypeCSF->id,
            'test_type_id' => $testTypeWhiteBloodCellCount->id,
        ]);
        \DB::table('test_type_mappings')->insert([
            'specimen_type_id' => $specimenTypeCSF->id,
            'test_type_id' => $testTypeGramStain->id,
        ]);
        \DB::table('test_type_mappings')->insert([
            'specimen_type_id' => $specimenTypeCSF->id,
            'test_type_id' => $testTypeZNStain->id,
        ]);
        \DB::table('test_type_mappings')->insert([
            'specimen_type_id' => $specimenTypeCSF->id,
            'test_type_id' => $testTypeCultureAndSensitivity->id,
        ]);
        \DB::table('test_type_mappings')->insert([
            'specimen_type_id' => $specimenTypeCSF->id,
            'test_type_id' => $testTypeCrag->id,
        ]);
        \DB::table('test_type_mappings')->insert([
            'specimen_type_id' => $specimenTypeCSF->id,
            'test_type_id' => $testTypeDifferential->id,
        ]);
        \DB::table('test_type_mappings')->insert([
            'specimen_type_id' => $specimenTypeCSF->id,
            'test_type_id' => $testTypeTotalCellCount->id,
        ]);
        \DB::table('test_type_mappings')->insert([
            'specimen_type_id' => $specimenTypeCSF->id,
            'test_type_id' => $testTypeLymphocytes->id,
        ]);
        \DB::table('test_type_mappings')->insert([
            'specimen_type_id' => $specimenTypeCSF->id,
            'test_type_id' => $testTypeTPHA->id,
        ]);
        \DB::table('test_type_mappings')->insert([
            'specimen_type_id' => $specimenTypeCSF->id,
            'test_type_id' => $testTypeQuantitativeCulture->id,
        ]);
        \DB::table('test_type_mappings')->insert([
            'specimen_type_id' => $specimenTypeCSF->id,
            'test_type_id' => $testTypeRBC->id,
        ]);

        \DB::table('test_type_mappings')->insert([
            'specimen_type_id' => $specimenTypePusSwab->id,
            'test_type_id' => $testTypeGramStain->id,
        ]);
        \DB::table('test_type_mappings')->insert([
            'specimen_type_id' => $specimenTypePusSwab->id,
            'test_type_id' => $testTypeAppearance->id,
        ]);
        \DB::table('test_type_mappings')->insert([
            'specimen_type_id' => $specimenTypePusSwab->id,
            'test_type_id' => $testTypeZNStain->id,
        ]);
        \DB::table('test_type_mappings')->insert([
            'specimen_type_id' => $specimenTypePusSwab->id,
            'test_type_id' => $testTypeCultureAndSensitivity->id,
        ]);
        \DB::table('test_type_mappings')->insert([
            'specimen_type_id' => $specimenTypeWoundSwab->id,
            'test_type_id' => $testTypeGramStain->id,
        ]);
        \DB::table('test_type_mappings')->insert([
            'specimen_type_id' => $specimenTypeWoundSwab->id,
            'test_type_id' => $testTypeAppearance->id,
        ]);
        \DB::table('test_type_mappings')->insert([
            'specimen_type_id' => $specimenTypeWoundSwab->id,
            'test_type_id' => $testTypeZNStain->id,
        ]);
        \DB::table('test_type_mappings')->insert([
            'specimen_type_id' => $specimenTypeWoundSwab->id,
            'test_type_id' => $testTypeCultureAndSensitivity->id,
        ]);
        \DB::table('test_type_mappings')->insert([
            'specimen_type_id' => $specimenTypeUretheralSwab->id,
            'test_type_id' => $testTypeWetPreparation->id,
        ]);
        \DB::table('test_type_mappings')->insert([
            'specimen_type_id' => $specimenTypeUretheralSwab->id,
            'test_type_id' => $testTypeWetSalineIodinePrep->id,
        ]);
        \DB::table('test_type_mappings')->insert([
            'specimen_type_id' => $specimenTypeUretheralSwab->id,
            'test_type_id' => $testTypeAppearance->id,
        ]);
        \DB::table('test_type_mappings')->insert([
            'specimen_type_id' => $specimenTypeUretheralSwab->id,
            'test_type_id' => $testTypeGramStain->id,
        ]);
        \DB::table('test_type_mappings')->insert([
            'specimen_type_id' => $specimenTypeUretheralSwab->id,
            'test_type_id' => $testTypeCultureAndSensitivity->id,
        ]);
        \DB::table('test_type_mappings')->insert([
            'specimen_type_id' => $specimenTypeHVS->id,
            'test_type_id' => $testTypeWetPreparation->id,
        ]);
        \DB::table('test_type_mappings')->insert([
            'specimen_type_id' => $specimenTypeHVS->id,
            'test_type_id' => $testTypeAppearance->id,
        ]);
        \DB::table('test_type_mappings')->insert([
            'specimen_type_id' => $specimenTypeHVS->id,
            'test_type_id' => $testTypeGramStain->id,
        ]);
        \DB::table('test_type_mappings')->insert([
            'specimen_type_id' => $specimenTypeHVS->id,
            'test_type_id' => $testTypeCultureAndSensitivity->id,
        ]);
        \DB::table('test_type_mappings')->insert([
            'specimen_type_id' => $specimenTypeEyeSwab->id,
            'test_type_id' => $testTypeGramStain->id,
        ]);
        \DB::table('test_type_mappings')->insert([
            'specimen_type_id' => $specimenTypeEyeSwab->id,
            'test_type_id' => $testTypeCultureAndSensitivity->id,
        ]);
        \DB::table('test_type_mappings')->insert([
            'specimen_type_id' => $specimenTypeEyeSwab->id,
            'test_type_id' => $testTypeAppearance->id,
        ]);
        \DB::table('test_type_mappings')->insert([
            'specimen_type_id' => $specimenTypeEarSwab->id,
            'test_type_id' => $testTypeAppearance->id,
        ]);
        \DB::table('test_type_mappings')->insert([
            'specimen_type_id' => $specimenTypeEarSwab->id,
            'test_type_id' => $testTypeGramStain->id,
        ]);
        \DB::table('test_type_mappings')->insert([
            'specimen_type_id' => $specimenTypeEarSwab->id,
            'test_type_id' => $testTypeCultureAndSensitivity->id,
        ]);
        \DB::table('test_type_mappings')->insert([
            'specimen_type_id' => $specimenTypeThroatSwab->id,
            'test_type_id' => $testTypeAppearance->id,
        ]);
        \DB::table('test_type_mappings')->insert([
            'specimen_type_id' => $specimenTypeThroatSwab->id,
            'test_type_id' => $testTypeGramStain->id,
        ]);
        \DB::table('test_type_mappings')->insert([
            'specimen_type_id' => $specimenTypeThroatSwab->id,
            'test_type_id' => $testTypeCultureAndSensitivity->id,
        ]);
        \DB::table('test_type_mappings')->insert([
            'specimen_type_id' => $specimenTypeAspirates->id,
            'test_type_id' => $testTypeProtein->id,
        ]);
        \DB::table('test_type_mappings')->insert([
            'specimen_type_id' => $specimenTypeAspirates->id,
            'test_type_id' => $testTypeGramStain->id,
        ]);
        \DB::table('test_type_mappings')->insert([
            'specimen_type_id' => $specimenTypeAspirates->id,
            'test_type_id' => $testTypeAppearance->id,
        ]);
        \DB::table('test_type_mappings')->insert([
            'specimen_type_id' => $specimenTypeAspirates->id,
            'test_type_id' => $testTypeZNStain->id,
        ]);
        \DB::table('test_type_mappings')->insert([
            'specimen_type_id' => $specimenTypeAspirates->id,
            'test_type_id' => $testTypeCultureAndSensitivity->id,
        ]);
        \DB::table('test_type_mappings')->insert([
            'specimen_type_id' => $specimenTypeBAL->id,
            'test_type_id' => $testTypeAppearance->id,
        ]);
        \DB::table('test_type_mappings')->insert([
            'specimen_type_id' => $specimenTypeBAL->id,
            'test_type_id' => $testTypeGramStain->id,
        ]);
        \DB::table('test_type_mappings')->insert([
            'specimen_type_id' => $specimenTypeBAL->id,
            'test_type_id' => $testTypeZNStain->id,
        ]);
        \DB::table('test_type_mappings')->insert([
            'specimen_type_id' => $specimenTypeBAL->id,
            'test_type_id' => $testTypeCultureAndSensitivity->id,
        ]);
        \DB::table('test_type_mappings')->insert([
            'specimen_type_id' => $specimenTypeSputum->id,
            'test_type_id' => $testTypeZNStain->id,
        ]);
        \DB::table('test_type_mappings')->insert([
            'specimen_type_id' => $specimenTypeSputum->id,
            'test_type_id' => $testTypeAppearance->id,
        ]);
        \DB::table('test_type_mappings')->insert([
            'specimen_type_id' => $specimenTypeSputum->id,
            'test_type_id' => $testTypeGramStain->id,
        ]);
        \DB::table('test_type_mappings')->insert([
            'specimen_type_id' => $specimenTypeSputum->id,
            'test_type_id' => $testTypeCultureAndSensitivity->id,
        ]);
        $this->command->info('test_type_mappings seeded');

        $testTypeRPR = TestType::create(['name' => 'RPR', 'test_type_category_id' => $testTypeCategoryMicrobiology->id]);
        $testTypeSerumCrag = TestType::create(['name' => 'Serum Crag', 'test_type_category_id' => $testTypeCategoryMicrobiology->id]);

        \DB::table('test_type_mappings')->insert([
            'specimen_type_id' => $specimenTypeBlood->id,
            'test_type_id' => $testTypeRPR->id,
        ]);
        \DB::table('test_type_mappings')->insert([
            'specimen_type_id' => $specimenTypeBlood->id,
            'test_type_id' => $testTypeSerumCrag->id,
        ]);
        \DB::table('test_type_mappings')->insert([
            'specimen_type_id' => $specimenTypeBlood->id,
            'test_type_id' => $testTypeTPHA->id,
        ]);
        \DB::table('test_type_mappings')->insert([
            'specimen_type_id' => $specimenTypeBlood->id,
            'test_type_id' => $testTypeCultureAndSensitivity->id,
        ]);
        $this->command->info('more blood associated type types and measures seeded');



        $this->command->info('Tests Seeding...');

        for ($i = 0; $i < (int) env('DEV_TEST_NO', 100); $i++) {
            $testTypeId = \App\Models\TestType::inRandomOrder()->first()->id;
            $user_id = \App\User::inRandomOrder()->first()->id;
            $specimenTypeId = \App\Models\TestTypeMapping::where('test_type_id', $testTypeId)->first()->specimen_type_id;
            $specimen = factory(App\Models\Specimen::class)->create([
                'specimen_type_id' => $specimenTypeId,
            ]);

            $test_status = rand(1, 4);
            $created_at = date('Y-m-d H:i:s', strtotime('-'.rand(0, 10).' days'));
            switch ($test_status) {
                case 1: //pending
                    $tested_by = null;
                    $verified_by = null;
                    $time_started = null;
                    $specimen_id = null;
                    $time_completed = null;
                    $time_verified = null;
                    break;

                case 2: //started
                    $tested_by = null;
                    $verified_by = null;
                    $time_started = date('Y-m-d H:i:s', strtotime($created_at.'+'.rand(20, 1800).' minutes'));
                    $specimen_id = $specimen->id;
                    $time_completed = null;
                    $time_verified = null;
                    break;

                case 3: //completed
                    $tested_by = \App\User::inRandomOrder()->first()->id;
                    $verified_by = null;
                    $time_started = date($created_at, strtotime('+'.rand(20, 1800).' minutes'));
                    $specimen_id = $specimen->id;
                    $time_completed = date('Y-m-d H:i:s', strtotime($time_started.'+'.rand(10, 3600).' minutes'));
                    $time_verified = null;
                    break;

                case 4: //verified
                    $tested_by = \App\User::inRandomOrder()->first()->id;
                    $verified_by = \App\User::where('id', '!=', $tested_by)->inRandomOrder()->first()->id;
                    $time_started = date('Y-m-d H:i:s', strtotime($created_at.'+'.rand(20, 1800).' minutes'));
                    $specimen_id = $specimen->id;
                    $time_completed = date('Y-m-d H:i:s', strtotime($time_started.'+'.rand(20, 3600).' minutes'));
                    $time_verified = date('Y-m-d H:i:s', strtotime($time_completed.'+'.rand(5, 3600).' minutes'));
                    break;

                default:
                    $tested_by = null;
                    $verified_by = null;
                    $time_started = null;
                    $specimen_id = null;
                    $time_completed = null;
                    $time_verified = null;
                    break;
            }

            factory(\App\Models\Test::class)->create([
                'test_type_id' => $testTypeId,
                'specimen_id' => $specimen_id,
                'test_status_id' => $test_status,
                'created_by' => $user_id,
                'tested_by' => $tested_by,
                'verified_by' => $verified_by,
                'time_started' => $time_started,
                'time_completed' => $time_completed,
                'time_verified' => $time_verified,
                'created_at' => $created_at,
            ]);
        }
    }
}
