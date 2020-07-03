<?php

namespace App\Console\Commands;

use Validator;
use App\Category;
use App\Product;
use Illuminate\Console\Command;

class Productcomm extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'Productcomm';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Product Create';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // Heade Table
        $headerCategory = ['Id', 'Name'];
        $headerData = ['Name', 'Description', 'Price', 'CategoryId'];

        // Select All Category
        $categorys = Category::select('id', 'name')->get();
        $categorysId = "";

        // Get Data
        $name = $this->ask('Name of Product (String)');
        $description = $this->ask('Description of Product (String)');
        $price = $this->ask('Price of Product (Float)');

        // check if category exist
        if ($categorys->count()) {
            $this->table($headerCategory, $categorys);
            $categorysId = $this->ask('Select multi Category Id for Product separation with "," (Int)');
        }

        // validation Data given
        $validator = Validator::make([
            'name' => $name,
            'description' => $description,
            'price' => $price,
        ], [
            'name' => ['required'],
            'description' => ['required'],
            'price' => ['required'],
        ]);

        if ($validator->fails()) {
            $this->info('Product not created. See error messages below:');

            foreach ($validator->errors()->all() as $error) {
                $this->error($error);
            }
            return 1;
        }


        // Show Data given
        $data = [$name, $description, $price, $categorysId];
        $this->table($headerData, [$data]);


        $confirm = $this->confirm('Do you want to add this Product ?');
        if ($confirm) {

            // add Product
            $product = new Product();

            $product->name = $name;
            $product->description = $description;
            $product->price = $price;
            $product->image = 'empty.jpg';

            $product->save();

            if ($categorysId) {
                // add relation category product
                $categorysIdArray = array_map('intval', explode(',', $categorysId));
                foreach ($categorysIdArray as $k) {
                    $product->categorys()->attach(Category::find($k));
                }
            }

            $this->info('The product is added successfully ');
        }
    }
}
