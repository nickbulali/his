<?php

use Illuminate\Database\Seeder;
use Faker\Factory;

use App\Models\ItemCategory;
use App\Models\InvoiceItem;
use App\Models\Patient;
use App\Models\Invoice;
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

    	//Patients table
    	Patient::truncate();
    	foreach ($names as $name) {
            Patient::create([
                'identifier' => $faker->ean8,
                'ulin' => $faker->uuid,
                'name_id'=>$name->id,
                'gender_id'=>$faker->numberBetween($min = 1, $max = 2),
                'birth_date'=>$faker->date($format = 'Y-m-d', $max = 'now'),
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
   	}
}