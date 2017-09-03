<?php

use App\Product;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product = new Product([
            'imagePath' =>'https://vignette1.wikia.nocookie.net/harrypotter/images/1/14/Harry_Potter_and_the_Cursed_Child_Script_Book_Cover.jpg/revision/latest?cb=20160726165903',
            'title' =>'Harry Potter and the cursed child',
            'description' =>'Harry Potter and the Cursed Child is a two-part stage play written by Jack Thorne based on an original new story by Thorne, J. K. Rowling and John Tiffany',
            'price' =>'9.99',
        ]);

        $product->save();

        $product = new Product([
            'imagePath' =>'https://store.storeimages.cdn-apple.com/4974/as-images.apple.com/is/image/AppleInc/aos/published/images/M/AC/MACBOOKPRO/MACBOOKPRO?wid=1879&hei=1061&fmt=jpeg&qlt=95&op_sharpen=0&resMode=bicub&op_usm=0.5,0.5,0,0&iccEmbed=0&layer=comp&.v=jBFkr5',
            'title' =>'Macbook Pro | Apple',
            'description' =>'Touch Bar and Touch ID A revolutionary new way to use your Mac. ... And now Touch ID is available on a Mac, enabling instant access to logins. ... The 15-inch MacBook Pro features a powerful Radeon Pro discrete GPU in every configuration.',
            'price' =>'1499',
        ]);

        $product->save();
        $product = new Product([
            'imagePath' =>'https://n4.sdlcdn.com/imgs/f/6/b/Emporio-Armani-AR1400i-Ceramica-Chronograph-SDL628418183-1-e01b5.jpeg',
            'title' =>'Emporio Armani AR1400i Ceramica Chronograph Watch For Men',
            'description' =>'Black ceramic case with a black ceramic bracelet. Fixed black ceramic bezel. Black dial with silver-tone hands and Roman numeral hour markers. The Emporio Armani logo appears at the 12 \'clock position. Dial Type: Analog. Luminescent hands and markers. Date display between the 4 and 5 o\'clock positions. Chronograph - three sub-dials displaying: 60 second, 60 minute and 24 hour. Quartz movement. Scratch resistant sapphire crystal. Pull / push crown. Solid case back. Case diameter: 42 mm. Case thickness: 12 mm. Round case shape. Band width: 22 mm. Band length: 8 inches. Deployment clasp. Water resistant at 30 meters / 100 feet. Functions: chronograph, date, hour, minute, second. Casual watch style. Emporio Armani Chronograph Black Dial Black Ceramic Men\'s Watch AR1400.',
            'price' =>'749',
        ]);

        $product->save();
        $product = new Product([
            'imagePath' => 'https://n1.sdlcdn.com/imgs/f/n/g/ILU-Multi-Printed-Polyester-Caps-SDL802032418-1-58248.jpeg',
            'title' =>'Linkin Park Cap | For Men',
            'description' =>'Raise your urban style credentials with this baseball cap from ILU. Mesh Cap Made from cotton blend. Worn with jeans or shorts, they\'ll make your off-duty wardrobe something to be proud of.',
            'price' =>'5.99',
        ]);

        $product->save();
    }
}
