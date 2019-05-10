<?php

use Illuminate\Database\Seeder;
use Faker\Factory;

use App\Models\EnvironmentalHistories;
use App\Models\MedicationStatus;
use App\Models\SocialHistories;
use App\Models\EncounterClass;
use App\Models\ConditionTypes;
use App\Models\FamilyRelation;
use App\Models\FamilyHistory;
use App\Models\MaritalStatus;
use App\Models\ItemCategory;
use App\Models\InvoiceItem;
use App\Models\QueueStatus;
use App\Models\Medications;
use App\Models\BloodGroup;
use App\Models\Encounter;
use App\Models\Location;
use App\Models\Allergy;
use App\Models\Patient;
use App\Models\Invoice;
use App\Models\Gender;
use App\Models\Dosage;
use App\Models\Drugs;
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

        SocialHistories::truncate();
        for ($i = 0; $i < 200; $i++){
            SocialHistories::create([
                'patient_id' => $faker->randomElement($patients),
                'social_problem' => $faker->realText($maxNbChars = 50, $indexSize = 2),
                'start_date'  => $faker->date($format = 'Y-m-d', $max = 'now'),
                'end_date'  => $faker->date($format = 'Y-m-d', $max = 'now')
            ]);
        }
        EnvironmentalHistories::truncate();
        for ($i = 0; $i < 200; $i++){
            EnvironmentalHistories::create([
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

        ConditionTypes::truncate();

        ConditionTypes::create([
            'code_id' => '001',
            'description' => 'cystic fibrosis'
        ]);
        ConditionTypes::create([
            'code_id' => '002',
            'description' => 'alpha-and beta-thalassemias'
        ]);
        ConditionTypes::create([
            'code_id' => '003',
            'description' => 'sickle cell anemia'
        ]);
        ConditionTypes::create([
            'code_id' => '004',
            'description' => 'Marfan syndrome'
        ]);
        ConditionTypes::create([
            'code_id' => '005',
            'description' => 'fragile X syndrome'
        ]);
        ConditionTypes::create([
            'code_id' => '006',
            'description' => "Huntington's disease"
        ]);
        ConditionTypes::create([
            'code_id' => '007',
            'description' => 'hemochromatosis'
        ]);
        ConditionTypes::create([
            'code_id' => '008',
            'description' => 'heart disease'
        ]);
        ConditionTypes::create([
            'code_id' => '009',
            'description' => 'high blood pressure'
        ]);
        ConditionTypes::create([
            'code_id' => '010',
            'description' => "Alzheimer's disease"
        ]);
        ConditionTypes::create([
            'code_id' => '011',
            'description' => 'arthritis'
        ]);
        ConditionTypes::create([
            'code_id' => '012',
            'description' => 'diabetes'
        ]);
        ConditionTypes::create([
            'code_id' => '013',
            'description' => 'cancer'
        ]);
        ConditionTypes::create([
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

        $conditionTypes = ConditionTypes::pluck('id');
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

        Drugs::truncate();

        Drugs::create([
            'generic_name'  => 'SODIUM CHLORIDE',
            'trade_name'    => '0.225% W/V SODIUM CHLORIDE (1/4 NORMAL SALINE)  INTRAVENOUS INFUSION BP (500ML BOTTLE)',
            'strength_value'=> '0.225',
            'strength_unit' => '%',
            'dosage_form'   => 'Solution for infusion',
            'administration_route'=> 'Intravenous (not otherwise specified)'
        ]);
        Drugs::create([
            'generic_name'  => 'METRONIDAZOLE',
            'trade_name'    => '0.5% METRONIDAZOLE INJECTION USP',
            'strength_value'=> '5',
            'strength_unit' => 'mg/ml',
            'dosage_form'   => 'Solution for infusion',
            'administration_route'=> 'Intravenous (not otherwise specified)'
        ]);
        Drugs::create([
            'generic_name'  => 'SODIUM CHLORIDE',
            'trade_name'    => '0.9% W/V SODIUM CHLORIDE INJECTION B.P',
            'strength_value'=> '0.9',
            'strength_unit' => '%',
            'dosage_form'   => 'Solution for injection',
            'administration_route'=> 'Parenteral'
        ]);
        Drugs::create([
            'generic_name'  => 'LIDOCAINE (LIGNOCAINE) HYDROCHLORIDE',
            'trade_name'    => '1% W-V LIDOCAINE HCL INJECTION USP',
            'strength_value'=> '1',
            'strength_unit' => '%',
            'dosage_form'   => 'Solution for injection',
            'administration_route'=> 'Intravenous (not otherwise specified)'
        ]);
        Drugs::create([
            'generic_name'  => 'GLYCINE',
            'trade_name'    => '1.5% GLYCINE IRRIGATION USP',
            'strength_value'=> '1.5',
            'strength_unit' => '%',
            'dosage_form'   => 'Irrigation solution',
            'administration_route'=> 'Topical'
        ]);
        Drugs::create([
            'generic_name'  => 'DEXTROSE, SODIUM CHLORIDE',
            'trade_name'    => '10% DEXTROSE AND 0.18% SODIUM CHLORIDE USP',
            'strength_value'=> '10, 0.18',
            'strength_unit' => '%',
            'dosage_form'   => 'Solution for injection/infusion',
            'administration_route'=> 'Intravenous (not otherwise specified)'
        ]);
        Drugs::create([
            'generic_name'  => 'MANNITOL',
            'trade_name'    => '10% MANNITOL INTRAVENOUS INFUSION BP',
            'strength_value'=> '10',
            'strength_unit' => '%',
            'dosage_form'   => 'Solution for injection/infusion',
            'administration_route'=> 'Intravenous (not otherwise specified)'
        ]);
        Drugs::create([
            'generic_name'  => 'POTASSIUM CHLORIDE',
            'trade_name'    => '15% W-V POTASSIUM CHLORIDE FOR INJ. USP',
            'strength_value'=> '15',
            'strength_unit' => '%',
            'dosage_form'   => 'Solution for injection',
            'administration_route'=> 'Intravenous (not otherwise specified)'
        ]);
        Drugs::create([
            'generic_name'  => 'LIDOCAINE (LIGNOCAINE) HYDROCHLORIDE',
            'trade_name'    => '2% W-V LIDOCAINE HCL INJECTION USP',
            'strength_value'=> '2',
            'strength_unit' => '%',
            'dosage_form'   => 'Solution for injection',
            'administration_route'=> 'Intravenous (not otherwise specified)'
        ]);
        Drugs::create([
            'generic_name'  => 'DEXTROSE',
            'trade_name'    => '25% W/V DEXTROSE INTRAVENOUS INFUSION USP (1000ML PP BAG)',
            'strength_value'=> '25',
            'strength_unit' => '%',
            'dosage_form'   => 'Solution for infusion',
            'administration_route'=> 'Intravenous (not otherwise specified)'
        ]);
        Drugs::create([
            'generic_name'  => 'VITAMIN B1 (THIAMINE), VITAMIN B2 (RIBOFLAVIN), VITAMIN B6 (PYRIDOXINE), NICOTINAMIDE, CALCIUM PANTOTHENOL',
            'trade_name'    => '3V TABLETS',
            'strength_value'=> '100, 200, 0.2',
            'strength_unit' => 'mg',
            'dosage_form'   => 'Tablet',
            'administration_route'=> 'Oral'
        ]);
        Drugs::create([
            'generic_name'  => 'ARIPIPRAZOLE',
            'trade_name'    => 'ABILIFY 10MG TABLET',
            'strength_value'=> '10',
            'strength_unit' => 'mg',
            'dosage_form'   => 'Tablet',
            'administration_route'=> 'Oral'
        ]);
        Drugs::create([
            'generic_name'  => 'ACARBOSE',
            'trade_name'    => 'ACAROSE 100MG TABLETS',
            'strength_value'=> '100',
            'strength_unit' => 'mg',
            'dosage_form'   => 'Tablet',
            'administration_route'=> 'Oral'
        ]);
        Drugs::create([
            'generic_name'  => 'ACETYLCYSTEINE',
            'trade_name'    => 'ACC 200MG POWDER FOR ORAL SOLUTION',
            'strength_value'=> '200',
            'strength_unit' => 'mg',
            'dosage_form'   => 'Powder for oral solution',
            'administration_route'=> 'Oral'
        ]);
        Drugs::create([
            'generic_name'  => 'ZAFIRLUKAST',
            'trade_name'    => 'ACCOLATE 20 MG F.C.TAB',
            'strength_value'=> '20',
            'strength_unit' => 'mg',
            'dosage_form'   => 'Film-coated tablet',
            'administration_route'=> 'Oral'
        ]);
        Drugs::create([
            'generic_name'  => 'QUINAPRIL, HYDROCHLOROTHIAZIDE',
            'trade_name'    => 'ACCUZIDE 20 F.C.TAB',
            'strength_value'=> '20, 12.5',
            'strength_unit' => 'mg',
            'dosage_form'   => 'Film-coated tablet',
            'administration_route'=> 'Oral'
        ]);
        Drugs::create([
            'generic_name'  => 'CAPTOPRIL',
            'trade_name'    => 'ACETAB 25 MG TABLETS',
            'strength_value'=> '25',
            'strength_unit' => 'mg',
            'dosage_form'   => 'Tablet',
            'administration_route'=> 'Oral'
        ]);
        Drugs::create([
            'generic_name'  => 'SODIUM CHLORIDE, POTASSIUM CHLORIDE, CALCIUM CHLORIDE, MAGNESIUM CHLORIDE, ACETIC ACID, DEXTROSE',
            'trade_name'    => 'ACETATE HEMODIALYSIS CAT.NO 3-085-005',
            'strength_value'=> '0',
            'strength_unit' => '%',
            'dosage_form'   => 'Concentrate for haemodialysis solution',
            'administration_route'=> 'Hemodialysis'
        ]);
        Drugs::create([
            'generic_name'  => 'ACETYLCYSTEINE',
            'trade_name'    => 'ACETYLCYSTEINE EFFE INSTANT 200MG SACHET',
            'strength_value'=> '200',
            'strength_unit' => 'mg',
            'dosage_form'   => 'Granules',
            'administration_route'=> 'Oral'
        ]);
        Drugs::create([
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
        $drugs = Drugs::pluck('id');
        $users = User::pluck('id');
        $dosage = Dosage::pluck('id');

        Medications::truncate();
        for ($i = 0; $i < 200; $i++){
            Medications::create([
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