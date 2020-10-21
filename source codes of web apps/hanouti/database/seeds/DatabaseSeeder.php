<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(EmployeesTableSeeder::class);
        $this->call(CustomersTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(CategoryProductsTableSeeder::class);
        $this->call(MyCountryTableSeeder::class);
        $this->call(MyProvincesTableSeeder::class);
        $this->call(MyCitiesTableSeeder::class);
        $this->call(USCitiesTableSeeder::class);
        $this->call(StatesTableSeeder::class);
        $this->call(CustomerAddressesTableSeeder::class);
        $this->call(CourierTableSeeder::class);
        $this->call(OrderStatusTableSeeder::class);
        $this->call(BrandsTableSeeder::class);
        $this->call(AttributeTableSeeder::class);
    }
}


insert i    nto `products` (`brand_id`, `cover`, `created_at`, `description`, `distance_unit`, `heigh  
  t`, `id`, `length`, `mass_unit`, `name`, `price`, `quantity`, `sale_price`, `status`, `wi  
  dth`, `0`, `sku`, `slug`, `updated_at`, `weight`) values (, products/acer1.png, 2020-09-2  
  9 13:22:20, Acer Predator Helios 300 Gaming Laptop- Intel i7-10750H- NVIDIA GeForce RTX 2  
  060 6GB- 15.6Inch Full HD 144Hz 3ms IPS Display- 16GB Dual-Channel DDR4- 512GB NVMe SSD-   
  Wi-Fi 6- RGB Keyboard- PH315-53-72XD, , , , , gms, Acer Predator Helios 300 Gaming Laptop  
  , 1, 10, , 1, , 179.38, 5223252, Acer Predator Helios 300 Gaming Laptop, 2020-09-29 13:22  
  :20, 400), (, products/lenovo2.jpg, 2020-09-29 13:22:20, Lenovo Chromebook Flex 5 13Inch   
  Laptop- FHD (1920 x 1080) Touch Display- Intel Core i3-10110U Processor- 4GB DDR4 OnBoard  
   RAM- 64GB SSD- Intel Integrated Graphics- Chrome OS- 82B80006UX- Graphite Grey, , , , ,   
  gms, Lenovo Chromebook Flex 5 13Inch Laptop, 409.99, 10, , 5328342, Lenovo Chromebook Fle  
  x 5 13Inch Laptop, 1, 2020-09-29 13:22:20, 400, ), (, products/acer2.jpg, 2020-09-29 13:2  
  2:20, Acer Swift 3 Thin & Light Laptop- 14Inch Full HD IPS- AMD Ryzen 7 4700U Octa-Core w  
  ith Radeon Graphics- 8GB LPDDR4- 512GB NVMe SSD- Wi-Fi 6- Backlit KB- Fingerprint Reader-  
   Alexa Built-in- SF314-42-R9YN, , , , , gms, Acer Swift 3 Thin & Light Laptop, 679.99, 10  
  , , 3409861, Acer Swift 3 Thin & Light Laptop, 1, 2020-09-29 13:22:20, 400, ), (, product  
  s/asus1.jpg, 2020-09-29 13:22:20, ASUS UX534FTC-AS77 ZenBook 15 Laptop- 15.6” UHD 4K Nano  
  Edge Display- Intel Core i7-10510U- GeForce GTX 1650- 16GB- 512GB PCIe SSD- ScreenPad 2.0  
  - Amazon Alexa Compatible- Windows 10- Icicle Silver, , , , , gms, ASUS UX534FTC-AS77 Zen  
  Book 15 Laptop, 1, 10, , 1, , 166.23, 6576073, ASUS UX534FTC-AS77 ZenBook 15 Laptop, 2020  
  -09-29 13:22:20, 400), (, products/acer3.jpg, 2020-09-29 13:22:20, Acer Chromebook Spin 1  
  1 CP311-1H-C5PN Convertible Laptop- Celeron N3350- 11.6Inch HD Touch- 4GB DDR4- 32GB eMMC  
  - Google Chrome, , , , , gms, Acer Chromebook Spin 11 CP311-1H-C5PN Convertible Laptop, 3  
  73, 10, , 3801000, Acer Chromebook Spin 11 CP311-1H-C5PN Convertible Laptop, 1, 2020-09-2  
  9 13:22:20, 400, ), (, products/asus2.jpg, 2020-09-29 13:22:20, ASUS F512JA-AS34 VivoBook  
   15 Thin And Light Laptop- 15.6” FHD Display- Intel i3-1005G1 CPU- 8GB RAM- 128GB SSD- Ba  
  cklit Keyboard- Fingerprint- Windows 10 Home in S Mode- Slate Gray, , , , , gms, ASUS F51  
  2JA-AS34 VivoBook 15 Thin And Light Laptop, 469, 10, , 2291700, ASUS F512JA-AS34 VivoBook  
   15 Thin And Light Laptop, 1, 2020-09-29 13:22:20, 400, ), (, products/acer4.jpg, 2020-09  
  -29 13:22:20, Acer Aspire TC-885-UA92 Desktop- 9th Gen Intel Core i5-9400- 12GB DDR4- 512  
  GB SSD- 8X DVD- 802.11AC Wifi- USB 3.1 Type C- Windows 10 Home- Black, , , , , gms, Acer   
  Aspire TC-885-UA92 Desktop, 639, 10, , 3631096, Acer Aspire TC-885-UA92 Desktop, 1, 2020-  
  09-29 13:22:20, 400, ), (, products/asus3.jpg, 2020-09-29 13:22:20, ASUS ROG GU502GW-AH76  
   Zephyrus M Thin and Portable Gaming Laptop- 15.6” 240Hz FHD IPS- NVIDIA GeForce RTX 2070  
  - Intel Core i7-9750H- 16GB DDR4 RAM- 1TB PCIe SSD- Per-Key RGB- Windows 10 Home, , , , ,  
   gms, ASUS ROG GU502GW-AH76 Zephyrus M Thin and Portable Gaming Laptop, 1, 10, , 1, , 688  
  .35, 1515964, ASUS ROG GU502GW-AH76 Zephyrus M Thin and Portable Gaming Laptop, 2020-09-2  
  9 13:22:20, 400), (, products/surface1.jpg, 2020-09-29 13:22:20, NEW Microsoft Surface Go  
   2 - 10.5Inch Touch-Screen - Intel Pentium - 4GB Memory - 64GB - Wifi - Platinum (Latest   
  Model), , , , , gms, NEW Microsoft Surface Go 2, 549.99, 10, , 8794250, NEW Microsoft Sur  
  face Go 2, 1, 2020-09-29 13:22:20, 400, ), (, products/ibuypower1.jpg, 2020-09-29 13:22:2  
  0, iBUYPOWER Gaming PC Computer Desktop Element Mini 9300 (AMD Ryzen 3 3100 3.6GHz- AMD R  
  adeon RX 550 2GB- 8GB DDR4 RAM- 240GB SSD- WiFi Ready- Windows 10 Home), , , , , gms, iBU  
  YPOWER Gaming PC Computer Desktop Element Mini 9300, 549.99, 10, , 8937103, iBUYPOWER Gam  
  ing PC Computer Desktop Element Mini 9300, 1, 2020-09-29 13:22:20, 400, ), (, products/hp  
  1.jpg, 2020-09-29 13:22:20, HP 22-inch All-in-One Desktop Computer- AMD Athlon Silver 305  
  0U Processor- 4 GB RAM- 256 GB SSD- Windows 10 Home (22-dd0010- White)- Snow White, , , ,  
   , gms, HP 22-inch All-in-One Desktop, 499, 10, , 4394289, HP 22-inch All-in-One Desktop,  
   1, 2020-09-29 13:22:20, 400, ), (, products/smart-plug.jpg, 2020-09-29 13:22:20, Smart P  
  lug works with Alexa to add voice control to any outlet.                                   
  Certified for Humans - Struggle-free- tinker-free- stress-free. No patience needed—its ac  
  tually simple., , , , , gms, Smart Plug, 24.99, 10, , 5386518, Smart Plug, 1, 2020-09-29   
  13:22:20, 400, ), (, products/have-healthing.jpg, 2020-09-29 13:22:20, Hive Heating and C  
  ooling Smart Thermostat Pack- Thermostat + Hive Hub- Works with Alexa & Google Home- Requ  
  ires C-Wire, , , , , gms, Hive Heating and Cooling Smart Thermostat Pack, 173.78, 10, , 2  
  823923, Hive Heating and Cooling Smart Thermostat Pack, 1, 2020-09-29 13:22:20, 400, ), (  
  , products/echo-dot.jpg, 2020-09-29 13:22:20, Echo Dot (3rd Gen) - Smart speaker with Ale  
  xa - Sandstone, , , , , gms, Echo Dot (3rd Gen), 39.99, 10, , 1981372, Echo Dot (3rd Gen)  
  , 1, 2020-09-29 13:22:20, 400, ), (, products/ring-alarm.jpg, 2020-09-29 13:22:20, Ring A  
  larm Smoke and CO Listener alerts you on your smart phone when your existing smoke and ca  
  rbon monoxide detectors sound their alarms., , , , , gms, Ring Alarm Smoke and CO Listene  
  r, 34.99, 10, , 9292163, Ring Alarm Smoke and CO Listener, 1, 2020-09-29 13:22:20, 400, )  
  , (, products/ nest-learning-thermostat.jpg, 2020-09-29 13:22:20, Google- T3008US- Nest L  
  earning Thermostat- 3rd Gen- Smart Thermostat- Pro Version- Works With Alexa, , , , , gms  
  , Google- T3008US- Nest Learning Thermostat, 226.9, 10, , 7485239, Google- T3008US- Nest   
  Learning Thermostat, 1, 2020-09-29 13:22:20, 400, ), (, products/ schlage-z.jpg, 2020-09-  
  29 13:22:20, Works with Alexa for voice control (hub required- Alexa device and hub sold   
  separately)                                                                                
  Touch Screen keypad and lock cylinder on exterior and thumb turn interior. Door thickness  
   range is 1.37 to 1.75 standard, , , , , gms, Schlage Z-Wave Connect Camelot Touchscreen   
  Deadbolt with Built-In Alarm- Satin Nickel- BE469 CAM 619, 223.99, 10, , 7047295, Schlage  
   Z-Wave Connect Camelot Touchscreen Deadbolt with Built-In Alarm- Satin Nickel- BE469 CAM  
   619, 1, 2020-09-29 13:22:20, 400, ), (, products/furinno1.jpg, 2020-09-29 13:22:20, FURI  
  NNO Efficient Home Laptop Notebook Computer Desk- Square Side Shelves- French Oak Grey/Bl  
  ack, , , , , gms, FURINNO Efficient Home, 61.79, 10, , 9966242, FURINNO Efficient Home, 1  
  , 2020-09-29 13:22:20, 400, ), (, products/fitueyes.jpg, 2020-09-29 13:22:20, FITUEYES Un  
  iversal TV Stand Table Top TV Stand for 27-55 inch LCD LED TVs 6 Level Height Adjustable   
  TV Base with Tempered Glass Base VESA 400x400 Holds up to 88lbs TT103701GB, , , , , gms,   
  FITUEYES Universal TV, 23.99, 10, , 8890370, FITUEYES Universal TV, 1, 2020-09-29 13:22:2  
  0, 400, ), (, products/office-chair.jpg, 2020-09-29 13:22:20, Office Chair- Mid Back Mesh  
   Office Computer Swivel Desk Task Chair- Ergonomic Executive Chair with Armrests, , , , ,  
   gms, Office Chair, 79.99, 10, , 7476954, Office Chair, 1, 2020-09-29 13:22:20, 400, ), (  
  , products/furinno2.jpg, 2020-09-29 13:22:20, FURINNO Andrey End Table Nightstand Set- 2-  
  Pack- French Oak Grey, , , , , gms, FURINNO Andrey End Table Nightstand Set, 40, 10, , 37  
  14580, FURINNO Andrey End Table Nightstand Set, 1, 2020-09-29 13:22:20, 400, ), (, produc  
  ts/lorell-file-cabinet.jpg, 2020-09-29 13:22:20, Plastic100% Imported Accommodates letter  
  -size hanging files Designed with stylish embossed drawer fronts and easy roll casters. P  
  roduct Dimensions are 14.3InchWIDTH x 18InchDEPTH x 24.5Inch HEIGHT, , , , , gms, Lorell   
  File Cabinet, 73.99, 10, , 2718523, Lorell File Cabinet, 1, 2020-09-29 13:22:20, 400, ),   
  (, products/winsome-halifax.jpg, 2020-09-29 13:22:20, Winsome Halifax Storage/Organizatio  
  n- 5 Drawer- White, , , , , gms, Winsome Halifax, 96.54, 10, , 1191658, Winsome Halifax,   
  1, 2020-09-29 13:22:20, 400, ), (, products/table.jpg, 2020-09-29 13:22:20, Brown Faux Ma  
  rble Seat includes Tray Tables and Storage Stand Easy to move from one room to another wi  
  th the handle on top A home furnishing staple Set in stand is 19Inchw x 13Inchd x 31Inchh  
   Individual tray, , , , , gms, Linon Home Decor Tray Table Set, 63.1, 10, , 7575537, Lino  
  n Home Decor Tray Table Set, 1, 2020-09-29 13:22:20, 400, ), (, products/bed.jpg, 2020-09  
  -29 13:22:20, Vibe 12-Inch Gel Memory Foam Mattress | Bed in a Box- [Mattress Only]- Twin  
   XL, , , , , gms, Vibe 12-Inch Gel Memory Foam Mattress | Bed in a Box, 155.97, 10, , 984  
  0570, Vibe 12-Inch Gel Memory Foam Mattress | Bed in a Box, 1, 2020-09-29 13:22:20, 400,   
  ), (, products/humble-crew-kids-book.png, 2020-09-29 13:22:20, Nylon Toddler-sized booksh  
  elf Displays books making it easy for kids to identify and grab books 4 deep- fabric slin  
  g sleeves hold books of almost any size Promotes organization and reading skills for Girl  
  s and boys, , , , , gms, Humble Crew Kids Book Rack Storage Bookshelf, 33.96, 10, , 49655  
  68, Humble Crew Kids Book Rack Storage Bookshelf, 1, 2020-09-29 13:22:20, 400, ), (, prod  
  ucts/computer-office1.png, 2020-09-29 13:22:20, CubiCubi Computer Office Small Desk 47Inc  
  h- Study Writing Table- Modern Simple Style PC Desk with Splice Board- Black and Rustic B  
  rown, , , , , gms, CubiCubi Computer Office Small Desk 47Inch, 119.99, 10, , 5403804, Cub  
  iCubi Computer Office Small Desk 47Inch, 1, 2020-09-29 13:22:20, 400, ), (, products/luci  
  d5.jpg, 2020-09-29 13:22:20, LUCID 5 Inch Memory Foam Low Profile-Cooling Gel Infusion-Hy  
  poallergenic Bamboo Charcoal-Breathable Cover Bed Mattress Conventional- Twin- WHITE, , ,  
   , , gms, LUCID 5 Inch Memory Foam Low Profile-Cooling Gel, 99.99, 10, , 7927901, LUCID 5  
   Inch Memory Foam Low Profile-Cooling Gel, 1, 2020-09-29 13:22:20, 400, ), (, products/wa  
  lker-edison.jpg, 2020-09-29 13:22:20, Walker Edison Furniture Company Modern Corner L Sha  
  ped Glass Computer Writing Gaming Gamer Command Center Workstation Desk Home Office- Sing  
  le- Black, , , , , gms, Walker Edison Furniture, 135.72, 10, , 7779890, Walker Edison Fur  
  niture, 1, 2020-09-29 13:22:20, 400, ), (, products/amazon-brand.jpg, 2020-09-29 13:22:20  
  , Amazon Brand – Rivet Malida Mid-Century Modern Open Back Kitchen Dining Room Accent Cha  
  ir- 33InchH- Aqua, , , , , gms, Amazon Brand – Rivet Malida, 215.42, 10, , 3652201, Amazo  
  n Brand – Rivet Malida, 1, 2020-09-29 13:22:20, 400, ), (, products/google-pixel.jpg, 202  
  0-09-29 13:22:20, Google Pixel 4a - New Unlocked Android Smartphone - 128 GB of Storage -  
   Up to 24 Hour Battery - Just Black, , , , , gms, Google Pixel 4a, 349.99, 10, , 1917270,  
   Google Pixel 4a, 1, 2020-09-29 13:22:20, 400, ), (, products/earbuds1.jpg, 2020-09-29 13  
  :22:20, TOZO T6 True Wireless Earbuds Bluetooth Headphones Touch Control with Wireless Ch  
  arging Case IPX8 Waterproof TWS Stereo Earphones in-Ear Built-in Mic Headset Premium Deep  
   Bass for Sport Black, , , , , gms, TOZO T6 True Wireless Earbuds Bluetooth, 39.99, 10, ,  
   6638411, TOZO T6 True Wireless Earbuds Bluetooth, 1, 2020-09-29 13:22:20, 400, ), (, pro  
  ducts/microsdxc.jpg, 2020-09-29 13:22:20, SAMSUNG: EVO Select 128GB microSDXC UHS-I U3 10  
  0MB/s Full HD & 4K UHD Memory Card with Adapter (MB-ME128HA), , , , , gms, SAMSUNG: EVO S  
  elect 128GB microSDXC, 19.99, 10, , 9640196, SAMSUNG: EVO Select 128GB microSDXC, 1, 2020  
  -09-29 13:22:20, 400, ), (, products/ earbuds2.jpg, 2020-09-29 13:22:20, Samsung Galaxy B  
  uds+ Plus- True Wireless Earbuds (Wireless Charging Case included)- Black – US Version, ,  
   , , , gms, Samsung Galaxy Buds+ Plus, 129.99, 10, , 1325559, Samsung Galaxy Buds+ Plus,   
  1, 2020-09-29 13:22:20, 400, ), (, products/iphone-charger.jpg, 2020-09-29 13:22:20, HOVA  
  MP iPhone Charger- MFi Certified Lightning Cable 5 Pack (3/3/6/6/10FT) Nylon Woven with M  
  etal Connector Compatible iPhone 11/Pro/Xs Max/X/8/7/Plus/6S/6/SE/5S iPad - Silver&White,  
   , , , , gms, HOVAMP iPhone Charger, 10.99, 10, , 5410390, HOVAMP iPhone Charger, 1, 2020  
  -09-29 13:22:20, 400, ), (, products/sony-casq.jpg, 2020-09-29 13:22:20, Sony WH-1000XM4   
  Wireless Industry Leading Noise Canceling Overhead Headphones with Mic for phone-call and  
   Alexa voice control- Black, , , , , gms, Sony WH-1000XM4 Wireless, 348, 10, , 7071299, S  
  ony WH-1000XM4 Wireless, 1, 2020-09-29 13:22:20, 400, ), (, products/watch-charger.png, 2  
  020-09-29 13:22:20, Updated 2020 Watch Charger- Powlaken Charging Cable MFi Certified Mag  
  netic Wireless Portable Charger Charging Cable Cord Compatible for Apple Watch SE Apple W  
  atch Series 6 5 4 3 2 1, , , , , gms, Updated 2020 Watch Charger, 11.95, 10, , 3855329, U  
  pdated 2020 Watch Charger, 1, 2020-09-29 13:22:20, 400, ), (, products/fitbit-versa-2.jpg  
  , 2020-09-29 13:22:20, Fitbit Versa 2 Health and Fitness Smartwatch with Heart Rate- Musi  
  c- Alexa Built-In- Sleep and Swim Tracking- Black/Carbon- One Size (S and L Bands Include  
  d), , , , , gms, Fitbit Versa 2, 178.95, 10, , 2631803, Fitbit Versa 2, 1, 2020-09-29 13:  
  22:20, 400, ), (, products/S20.jpg, 2020-09-29 13:22:20, Samsung Galaxy S20 FE 5G | Facto  
  ry Unlocked Android Cell Phone | 128 GB | US Version Smartphone | Pro-Grade Camera- 30X S  
  pace Zoom- Night Mode | Cloud Navy, , , , , gms, Samsung Galaxy S20 FE 5G, 599.99, 10, ,   
  3567884, Samsung Galaxy S20 FE 5G, 1, 2020-09-29 13:22:20, 400, ), (, products/Samsung-Ga  
  laxy-Note-10.jpg, 2020-09-29 13:22:20, Samsung Galaxy Note 10+ Plus Factory Unlocked Cell  
   Phone with 256GB (U.S. Warranty)- Aura White/ Note10+, , , , , gms, Samsung Galaxy Note   
  10+, 1099.99, 10, , 7341589, Samsung Galaxy Note 10+, 1, 2020-09-29 13:22:20, 400, ), (,   
  products/pantom-2-pack.jpg, 2020-09-29 13:22:20, Chargers- Pantom 2-Pack Charging Adapter  
   Travel Wall Chargers with 2-Pack 5-FeetLightning Cables Charge Sync for iPhone X- iPhone  
   8- iPhone 7- iPhone 6- iPhone 5- iPad Mini, , , , , gms, Chargers- Pantom 2-Pack, 15.95,  
   10, , 3323941, Chargers- Pantom 2-Pack, 1, 2020-09-29 13:22:20, 400, ))