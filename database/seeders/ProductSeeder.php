<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            
            'prod_name'=> 'AIRA Face Primer',
            'description'=> 'AIRA Face Primer can make the skin look moisturized all day long and is able to disguise acne scars or fine wrinkles that appear.',
            'stock'=> 500,
            'weight'=> 200,
            'price'=> 31500,
            'image'=>'Assets/images/face_primer.jpg',
        ]);
        DB::table('products')->insert([
            
            'prod_name'=> 'AIRA Foundation',
            'description'=> 'AIRA Foundation as a base foundation that aims to maintain makeup results.',
            'stock'=> 230,
            'weight'=> 50,
            'price'=> 45000,
            'image'=>'Assets/images/foundation.jpg',
        ]);
        DB::table('products')->insert([
            
            'prod_name'=> 'AIRA Concealer ',
            'description'=> 'Use AIRA Concealer after primer and foundation. AIRA Concealer has a thicker and denser texture, so it can be used to disguise various facial problems, such as acne, scars, skin pores, to the problem of dark circles under the eyes.',
            'stock'=> 555,
            'weight'=> 38,
            'price'=> 50000,
            'image'=>'Assets/images/concealer.jpg',
        ]);
        DB::table('products')->insert([
            
            'prod_name'=> 'AIRA Loose Powder',
            'description'=> 'functions to absorb excess oil at once, locks the results of makeup, and can smooth the surface of the skin.',
            'stock'=> 400,
            'weight'=> 35,
            'price'=> 48500,
            'image'=>'Assets/images/loose_powder.jpg',
        ]);
        DB::table('products')->insert([
            
            'prod_name'=> 'AIRA BB Cream',
            'description'=> 'AIRA BB Cream is a moisturizing cream that functions to even out the results of makeup so that it can cover acne, black spots, or other facial problems. That way, the facial makeup will look smoother and look natural.',
            'stock'=> 230,
            'weight'=> 70,
            'price'=> 66000,
            'image'=>'Assets/images/bb_cream.jpg',
        ]);
        DB::table('products')->insert([
            
            'prod_name'=> 'AIRA Blush On',
            'description'=> '6.	AIRA Blush On products have several types, such as loose, cream, gel and compact. There are so many types of colors to choose from, ranging from pink, sheer plum, coral, tangerine, mauve, orange, and soft berry.',
            'stock'=> 500,
            'weight'=> 45,
            'price'=> 66000,
            'image'=>'Assets/images/blush_on.jpg',
        ]);
        DB::table('products')->insert([
            
            'prod_name'=> 'AIRA Eyeshadow ',
            'description'=> 'Aira Eyeshadow makes your eyelids look more beautiful. Use the printer first as the base. Choose a color that matches your skin tone, then immediately make up the eyelid area using a small brush so that the eyeshadow can be more evenly distributed.',
            'stock'=> 230,
            'weight'=> 50,
            'price'=> 45000,
            'image'=>'Assets/images/eyeshadow.jpg',
        ]);
        DB::table('products')->insert([
            
            'prod_name'=> 'AIRA Brownzer',
            'description'=> 'Aira Brownzer specifically can make your skin look warmer.',
            'stock'=> 350,
            'weight'=> 50,
            'price'=> 30000,
            'image'=>'Assets/images/brownzer.jpg',
        ]);
        DB::table('products')->insert([
            
            'prod_name'=> 'AIRA Eyeliner ',
            'description'=> 'Aira Eyeliner defines the lines of your eyes.',
            'stock'=> 200,
            'weight'=> 50,
            'price'=> 44000,
            'image'=>'Assets/images/eyeliner.jpg',
        ]);
        DB::table('products')->insert([
            
            'prod_name'=> 'AIRA Lipstick',
            'description'=> 'AIRA Lipstick has several colors available, such as pink, red, orange, cora, brown, peach, to purple, which can make your appearance shine even more beautiful.',
            'stock'=> 230,
            'weight'=> 50,
            'price'=> 45000,
            'image'=>'Assets/images/lipstick.jpg',
        ]);
        DB::table('products')->insert([
            
            'prod_name'=> 'AIRA Foundation',
            'description'=> 'AIRA Foundation as a base foundation that aims to maintain makeup results.',
            'stock'=> 230,
            'weight'=> 50,
            'price'=> 45000,
            'image'=>'Assets/images/foundation.jpg',
        ]);
    }
}
