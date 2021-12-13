<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //return \App\Models\User::factory(20)->create();
        $this->call(Slide::class);
        $this->call(MenuBanner::class);
        $this->call(IntroGlance::class);
        $this->call(CompanySlide01::class);
        $this->call(CompanySlide02::class);
        $this->call(MecBenCar::class);
        $this->call(MecBenVans::class);
        $this->call(CompanyBottomIntro::class);
        $this->call(CompanyImagePost::class);
    }
}
// Class slide
class Slide extends Seeder
{
    public function run()
    {
        DB::table('slide')->insert([
            [
                'active' => 'active',
                'title' => "The EQE.",
                'btn_text' => "Learn more about the EQE",
                'image' => "images/06-mercedes-benz.webp",
                'color' => "text-light",
                'des_1' => "EQE 350 vorläufige Angaben WLTP: Stromverbrauch kombiniert: 19,3–15,7 kWh/100 km; CO₂-Emissionen kombiniert: 0 g/km.",
                'des_2' => "Angaben zum Stromverbrauch und zur Reichweite sind vorläufig und wurden intern nach Maßgabe der Zertifizierungsmethode, WLTP-Prüfverfahren“ ermittelt. Es liegen bislang weder bestätigte Werte vom TÜV noch eine EG-Typgenehmigung noch eine Konformitätsbescheinigung mit amtlichen Werten vor. Abweichungen zwischen den Angaben und den amtlichen Werten sind möglich.",
            ],
            [
                'active' => '',
                'title' => "The Concept EQG.",
                'btn_text' => "Learn more about the Concept",
                'image' => "images/03-mercedes-benz.webp",
                'color' => "text-light",
                'des_1' => "",
                'des_2' => "",
            ],
            [
                'active' => '',
                'title' => "The Concept Mercedes-Maybach EQS.",
                'btn_text' => "Learn more about the Concept Mercedes-Maybach EQS",
                'image' => "images/05-maybach.webp",
                'color' => "text-dark",
                'des_1' => "",
                'des_2' => "",
            ],
            [
                'active' => '',
                'title' => "The new EQB.",
                'btn_text' => "Learn more about the EQB.",
                'image' => "images/04-mercedes-eq-eqb.webp",
                'color' => "text-dark",
                'des_1' => "",
                'des_2' => "",
            ],
            [
                'active' => '',
                'title' => "IAA MOBILITY 2021.",
                'btn_text' => "Learn more",
                'image' => "images/01-mercedes-benz.webp",
                'color' => "text-light",
                'des_1' => "",
                'des_2' => "",
            ],
            [
                'active' => '',
                'title' => "The new EQS. This is for you, world.",
                'btn_text' => "Learn more about the EQS.",
                'image' => "images/02-mercedes-benz-eqs.webp",
                'color' => "text-light",
                'des_1' => "",
                'des_2' => "",
            ],
        ]);
    }
}

/* ======================================= DATA COMPANY ============================================= */

class MenuBanner extends Seeder
{
    public function run()
    {
        DB::table('company_menu_banner')->insert([
            [
                'menu_name' => 'About us',
                'active' => 'active',
                'banner_img' => 'images/Banner.jpeg'
            ],
            [
                'menu_name' => 'Career',
                'active' => '',
                'banner_img' => ''
            ],
            [
                'menu_name' => 'Media',
                'active' => '',
                'banner_img' => ''
            ],
            [
                'menu_name' => 'Daimler AG Investors',
                'active' => '',
                'banner_img' => ''
            ],
        ]);
    }
}

class IntroGlance extends Seeder
{
    public function run()
    {
        DB::table('company_intro_glance')->insert([
            [
                'text' => 'Mercedes-Benz AG is responsible for the global business of Mercedes-Benz Cars and Mercedes-Benz Vans, with over 170,000 employees worldwide. Ola Källenius is Chairman of the Board of Management of Mercedes-Benz AG. The company focuses on the development, production and sales of passenger cars, vans and vehicle-related services. Furthermore, the company aspires to be the leader in the fields of electric mobility and vehicle software. The product portfolio comprises the Mercedes-Benz brand with the sub-brands of Mercedes-AMG, Mercedes-Maybach, Mercedes-EQ, G-Class and the smart brand. The Mercedes me brand offers access to the digital services from Mercedes-Benz. ',
            ],
            [
                'text' => 'Mercedes-Benz AG is responsible for the global business of Mercedes-Benz Cars and Mercedes-Benz Vans, with over 170,000 employees worldwide. Ola Källenius is Chairman of the Board of Management of Mercedes-Benz AG. The company focuses on the development, production and sales of passenger cars, vans and vehicle-related services. Furthermore, the company aspires to be the leader in the fields of electric mobility and vehicle software. The product portfolio comprises the Mercedes-Benz brand with the sub-brands of Mercedes-AMG, Mercedes-Maybach, Mercedes-EQ, G-Class and the smart brand. The Mercedes me brand offers access to the digital services from Mercedes-Benz. ',
            ],
            [
                'text' => 'As sustainability is the guiding principle of the Mercedes-Benz strategy and for the company itself, this means creating lasting value for all stakeholders: for customers, employees, investors, business partners and society as a whole. The basis for this is Daimler’s sustainable business strategy. The company thus takes responsibility for the economic, ecological and social effects of its business activities and looks at the entire value chain.',
            ],
        ]);
    }
}

class CompanySlide01 extends Seeder
{
    public function run()
    {
        DB::table('company_slide_01')->insert([
            [
                'active' => 'active',
                'image' => 'images/slides-01.jpeg',
            ],
            [
                'active' => '',
                'image' => 'images/slides-02.jpeg',
            ],
            [
                'active' => '',
                'image' => 'images/slides-03.jpeg',
            ],
            [
                'active' => '',
                'image' => 'images/slides-04.webp',
            ],
            [
                'active' => '',
                'image' => 'images/slides-05.webp',
            ],
        ]);
    }
}

class CompanySlide02 extends Seeder
{
    public function run()
    {
        DB::table('company_slide_02')->insert([
            [
                'active' => 'active',
                'image' => 'images/slides-06.webp',
            ],
            [
                'active' => '',
                'image' => 'images/slides-08.jpeg',
            ],
            [
                'active' => '',
                'image' => 'images/slides-09.webp',
            ],
            [
                'active' => '',
                'image' => 'images/slides-10.webp',
            ],
            [
                'active' => '',
                'image' => 'images/slides-11.webp',
            ],
        ]);
    }
}

class MecBenCar extends Seeder
{
    public function run()
    {
        DB::table('company_mec_ben_car')->insert([
            [
                'title' => 'Mercedes-Benz Cars.',
                'text' => '',
                'load' => ''
            ],
            [
                'title' => '',
                'text' => 'The Mercedes-Benz Cars range covers every passengercar segment: from the urban microcar by smart, tothe exclusive product range by Mercedes-Benz andMercedes-Maybach, to the performance and sports carsby Mercedes-AMG. With Mercedes-EQ, Mercedes-BenzCars is driving forward the systematic developmentof alternative drives: the aim is to electrify theentire portfolio by 2022. The company will offer arange of electrified models in each segment,including 48-volt models, a wide choice of plug-inhybrids, and all-electric vehicles with battery. Inthis way, the Cars division of Mercedes-Benz AGensures individual mobility for a vast spectrum ofcustomer needs. The company aims to build theworld’s most desirable cars.',
                'load' => ''
            ],
            [
                'title' => '',
                'text' => 'In 2020, Mercedes-Benz Cars delivered 2,087,200 vehicles, achieving the fifth consecutive year with a wholesale level above two million passenger cars. Since 2016, Mercedes-Benz has maintained its leading global position in terms of sales compared with its core competitors every year.',
                'load' => 'Learn more'
            ],
        ]);
    }
}

class MecBenVans extends Seeder
{
    public function run()
    {
        DB::table('company_mec_ben_vans')->insert([
            [
                'title' => 'Mercedes-Benz Vans.',
                'text' => '',
                'text02' => '',
                'text03' => '',
                'load' => ''
            ],
            [
                'title' => '',
                'text' => 'Mercedes-Benz Vans is a global full-line supplier of vans and related services – the product range in the commercial segment includes the Sprinter van, midsize van Vito (in the USA “Metris”) and the small van Citan, who will get a successor in the second half of 2021. Mercedes-Benz Vans is represented in the private segment with the V-Class MPV and the Marco Polo recreational and camper vans. In the coming year, the product range will be expanded by the T-Class, a small van for private customers. With the eVito, the eSprinter and the EQV all-electric premium MPV, Mercedes-Benz Vans underlines how it is driving forward the development of alternative drives. Mercedes-Benz Vans reached unit sales of 374,700 vehicles in 2020.',
                'text02' => '',
                'text03' => '',
                'load' => ''
            ],
            [
                'title' => '',
                'text' => 'EQV 300:',
                'text02' => 'Stromverbrauch kombiniert: 26,4–26,3 kWh/100 km;',
                'text03' => 'CO₂-Emissionen kombiniert: 0 g/km.⁶',
                'load' => 'Learn more'
            ],
        ]);
    }
}

class CompanyBottomIntro extends Seeder
{
    public function run()
    {
        DB::table('company_bottom_intro')->insert([
            [
                'name' => 'our-goal',
                'title' => 'Our goal: to build the world’s most desirable cars.',
                'text' => 'The Mercedes-Benz strategy is made up of six pillars. At its heart is the transformation of the company to become the number 1 for electric mobility and all-encompassing digitalisation. At the same time, there is a clear focus on the structural improvement of profitability, with sustainability as a guiding principle. The basis for the success of our new strategy is provided by our highly qualified and motivated team.',
                'img' => 'images/intro-our-goal.webp'
            ],
            [
                'name' => 'ambition',
                'title' => 'Ambition 2039: the road to CO₂-neutrality.',
                'text' => 'Under the heading “Ambition 2039”, Mercedes-Benz Cars has set itself ambitious yet realistic goals. As part of this, the automotive manufacturer is examining the issue of sustainability along the entire value chain. The goal is the transformation of the full range of passenger cars into a carbon-neutral product range as of 2039. This includes – from socially and climate-friendly degraded raw materials, through the supply chain, and the production of the vehicles – all stages up to the use phase as well as recycling concepts. Already during the development of a new model, Mercedes-Benz Cars looks at its environmental performance over the entire life cycle. Vehicles from Mercedes-Benz Cars are scrutinised in a comprehensive life-cycle assessment, the so-called 360-degree environmental check: from manufacture of the raw materials to production and from vehicle operation to recycling at the end of the vehicle’s service life – a long way off in the case of a new Mercedes-Benz.',
                'img' => 'images/intro-ambition.webp'
            ],
            [
                'name' => 'purpose',
                'title' => 'The Purpose of Mercedes-Benz Cars.',
                'text' => '“First Move the World” – that is the Purpose of Mercedes-Benz Cars. It is the deeper meaning behind our work, it is what drives us, our “reason why”. “First Move the World” means pursuing more than what is immediately achievable. This pioneering spirit is part of our DNA. In times of change, it gives us a direction for our all-embracing and sustainable business strategy, and for our decisions. It gave rise to, for example, Ambition 2039 – our road to sustainable mobility.',
                'img' => 'images/the-purpose.webp'
            ],
            [
                'name' => 'our-corporate',
                'title' => 'Our corporate governance.',
                'text' => 'As part of the new corporate structure of the Daimler AG holding company, the Mercedes-Benz Cars and Mercedes-Benz Vans divisions were consolidated under Mercedes-Benz AG on November 1, 2019. Dr. Bernd Pischetsrieder was elected as Chairman of the Supervisory Board of Mercedes-Benz AG. The Supervisory Board appointed Ola Källenius as Chairman of the Board of Management of Mercedes-Benz AG. Ola Källenius is also Chairman of the Board of Management of Daimler AG. Following is an overview of the eight members of the Board of Management of Mercedes-Benz AG and the allocation of responsibilities.',
                'img' => 'images/our-coparate.webp'
            ],
        ]);
    }
}

class CompanyImagePost extends Seeder
{
    public function run()
    {
        DB::table('company_image_post')->insert([
            [
                'img' => 'images/bottom-img-01.webp',
                'text' => 'Carrer.',
            ],
            [
                'img' => 'images/bottom-img-02.webp',
                'text' => 'Media..',
            ],
            [
                'img' => 'images/bottom-img-03.webp',
                'text' => 'Daimler AG Investors',
            ],

        ]);
    }
}

/* ======================================= ========================= ============================================= */
