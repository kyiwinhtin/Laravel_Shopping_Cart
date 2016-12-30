<?php

use Illuminate\Database\Seeder;

use App\Product;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
  $product =Product::create([

    	  		'imagePath' => 'i6.jpg',
    	  		'title'     => 'Iphone 6 128GB',
     	  		'description' => 'Apple iPhone 6. Apple iPhone 6 smartphone was launched in September 2014. The phone comes with a 4.70-inch touchscreen display with a resolution of 750 pixels by 1334 pixels at a PPI of 326 pixels per inch. It comes with 1GB of RAM.',
				'price' => 459

    	  ]);

   $product = 	  Product::create([

    	  		'imagePath' => 'lgg5.jpg',
    	  		'title'     => 'LG G6',
     	  		'description' => 'LG G5 have 5.3 inches large QHD display with having uni-body design. As per one recent launch event, phone have dimensions as 149.4 X 73.9 X 7.7 mm.The phone also get protection of scratches and dust as it have Corning Gorilla glass 4 protection on both sides. It also has fast charging features which features 80% of battery with 35 minutes of charging.',
				'price' => 496

    	  ]);


    	$product =  Product::create([

    	  		'imagePath' => 'note6.jpg',
    	  		'title'     => 'Note 6 32GB',
                'description' => 'Galaxy Note 6  coming with 8 GB RAM that would be very powerful. And even we can witness foldable display and with a 4K resolution.As per expectations galaxy note 6 is going to have a 30 MP primary camera with a 16 MP front camera that would make the selfie experience more better and smooth.',
				'price' => 368

    	  ]);

    	$product =  Product::create([

    	  		'imagePath' => 'nexus6.jpg',
    	  		'title'     => 'Nexus 6',
     	  		'description' => 'The Motorola Google Nexus 6 is powered by 2.7GHz quad-core Qualcomm Snapdragon 805 processor and it comes with 3GB of RAM. The phone packs 32GB of internal storage cannot be expanded. As far as the cameras are concerned, the Motorola Google Nexus 6 packs a 13-megapixel primary camera on the rear and a 2-megapixel front shooter for selfies.The Motorola Google Nexus 6 runs Android 5.0 and is powered by a 3220mAh non removable battery.',
				'price' => 340

    	  ]);


    	 $product = Product::create([

    	  		'imagePath' => 'xperiaz4.jpg',
    	  		'title'     => 'Sony Xperia Z4',
     	  		'description' => 'The phone comes with a 5.20-inch touchscreen display with a resolution of 1080 pixels by 1920 pixels. The Sony Xperia Z4 is powered by 1.5GHz Qualcomm Snapdragon 810 processor and it comes with 3GB of RAM. The phone packs 32GB of internal storage that can be expanded up to 128GB via a microSD card.',
				'price' => 495

    	  ]);


    	$product =  Product::create([

    	  		'imagePath' => 'ms.jpg',
    	  		'title'     => 'Microsoft Lumina 650',
     	  		'description' => 'The Microsoft Lumia 650 is powered by 1.3GHz quad-core Qualcomm Snapdragon 212 processor and it comes with 1GB of RAM. The phone packs 16GB of internal storage that can be expanded up to 200GB via a microSD card. As far as the cameras are concerned, the Microsoft Lumia 650 packs a 8-megapixel primary camera on the rear and a 5-megapixel front shooter for selfies.
                                    The Microsoft Lumia 650 runs Windows 10 Mobile and is powered by a 2000mAh removable battery. It measures 70.90 x 142.00 x 6.90 (height x width x thickness) and weighs 122.00 grams.',
				'price' => 382

    	  ]);


 



    }
}
