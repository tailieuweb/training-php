<?php

namespace Database\Factories;

use App\Models\SubEvent;
use Illuminate\Database\Eloquent\Factories\Factory;

class SubEventFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SubEvent::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
                // return [
                //     'subevent_item' => 'IAA MOBILITY 2021',
                //     'event_introduce' => 'Product may vary after press date on 26.09.2014.',
                //     'event_introduce_title' => 'Kraftstoffverbrauch kombiniert',
                //     'event_img' => 'https://www.mercedes-benz.com/en/events/_jcr_content/root/grid_3_copy/grid-par/griditem_1880768572_/image/MQ6-8-image-20201109155525/07-mercedes-benz-g500-2019-w463-2560x1440-09-2020.jpeg',
                //     'event_img_title_1' => 'G-class Experiencs Center.',
                //     'event_img_title_2' => ' Experiencs the various facets of the G-class',
                //     ];
                // return [
                //     'subevent_item' => 'Circle of Excellence',
                //     'event_introduce' => '1 Die angegebenen Werte wurden nach dem vorgeschriebenen
                //     Messverfahren ermittelt. Es handelt sich um die
                //     „NEFZ-CO₂-Werte“ i. S. v. Art. 2 Nr. 1
                //     Durchführungsverordnung (EU) 2017/1153. Die
                //     Kraftstoffverbrauchswerte wurden auf Basis dieser Werte
                //     errechnet. Der Stromverbrauch wurde auf der Grundlage
                //     der VO 692/2008/EG ermittelt. Weitere Informationen zum
                //     offiziellen Kraftstoffverbrauch und den offiziellen
                //     spezifischen CO₂-Emissionen neuer Personenkraftwagen
                //     können dem „Leitfaden über den Kraftstoffverbrauch, die
                //     CO₂-Emissionen und den Stromverbrauch aller neuen
                //     Personenkraftwagenmodelle“ entnommen werden, der an
                //     allen Verkaufsstellen und bei der Deutschen Automobil
                //     Treuhand GmbH unter www.dat.de unentgeltlich erhältlich
                //     ist.',
                //     'event_introduce_title' => 'CO₂-Emissionen kombiniert',
                //     'event_img' => 'https://www.mercedes-benz.com/en/events/_jcr_content/root/grid_3_copy/grid-par/griditem_0/image/MQ6-8-image-20191031163514/mbcom_events_driving-events_eventubersicht_neu0718_2560x1440.jpeg',
                //     'event_img_title_1' => 'Mercedes-Benz Driving Events.',
                //     'event_img_title_2' => 'The Driving Events are always a source of
                //     thrills and adventure: improve your driving
                //     skills, on and off',
                //     ];
            
                // return [
                //     'subevent_item' => 'Driving Events',
                //     'event_introduce' => '4 Angaben zu Kraftstoffverbrauch, Stromverbrauch und
                //     CO₂-Emissionen sind vorläufig und wurden vom Technischen
                //     Dienst für das Zertifizierungsverfahren nach Maßgabe des
                //     WLTP-Prüfverfahrens ermittelt und in NEFZ-Werte
                //     korreliert. Eine EG-Typgenehmigung und
                //     Konformitätsbescheinigung mit amtlichen Werten liegen
                //     noch nicht vor. Abweichungen zwischen den Angaben und
                //     den amtlichen Werten sind möglich.',
                //     'event_introduce_title' => ' Stromverbrauch im kombinierten Testzyklus',
                //     'event_img' => 'https://www.mercedes-benz.com/en/events/_jcr_content/root/grid_3_copy/grid-par/griditem_1/image/MQ6-8-image-20191015163057/01-mercedes-amg-driving-academy-2560x1440-2560x1440.jpeg',
                //     'event_img_title_1' => 'Mercedes-AMG Driving Academy.',
                //     'event_img_title_2' => 'Exploring and pushing personal limits,
                //     experiencing thrilling performance, and enjoying
                //     every moment to',
                //     ];
            
                // return [
                //     'subevent_item' => 'G-Class Experience',
                //     'event_introduce' => '6 Stromverbrauch und Reichweite wurden auf der Grundlage
                //     der VO 692/2008/EG ermittelt. Stromverbrauch und
                //     Reichweite sind abhängig von der Fahrzeugkonfiguration.
                //     Weitere Informationen zum offiziellen
                //     Kraftstoffverbrauch und den offiziellen spezifischen
                //     CO₂-Emissionen neuer Personenkraftwagen können dem
                //     „Leitfaden über den Kraftstoffverbrauch, die
                //     CO₂-Emissionen und den Stromverbrauch aller neuen
                //     Personenkraftwagenmodelle“ entnommen werden, der an
                //     allen Verkaufsstellen und bei der Deutschen Automobil
                //     Treuhand GmbH unter www.dat.de unentgeltlich erhältlich
                //     ist.',
                //     'event_introduce_title' => null,
                //     'event_img' => 'https://www.mercedes-benz.com/en/events/_jcr_content/root/grid_3_copy/grid-par/griditem_1_1512235882/image/MQ6-8-image-20191015153039/Keyvisual_Nizza_Nostal_029.jpeg',
                //     'event_img_title_1' => 'Classic Car Travel.',
                //     'event_img_title_2' => 'Hit Europe’s dreamy roads behind the wheel of a classic Mercedes-Benz roadster',
                    //];
            
                // return [
                //     'subevent_item' => 'AMG Driving Academy',
                //     'event_introduce' => '7 Angaben zu Stromverbrauch und Reichweite sind
                //     vorläufig und wurden vom Technischen Dienst für das
                //     Zertifizierungsverfahren nach Maßgabe der
                //     UN/ECE-Regelung Nr. 101 ermittelt. Die EG-Typgenehmigung
                //     und eine Konformitätsbescheinigung mit amtlichen Werten
                //     liegen noch nicht vor. Abweichungen zwischen den Angaben
                //     und den amtlichen Werten sind möglich.',
                //     'event_img' => 'https://www.mercedes-benz.com/en/events/_jcr_content/root/grid_3_copy/grid-par/griditem_0/image/MQ6-8-image-20191031163514/mbcom_events_driving-events_eventubersicht_neu0718_2560x1440.jpeg',
                //     'event_img_title_1' => 'G-class Experiencs Center.',
                //     'event_img_title_2' => ' Experiencs the various facets of the G-class',
                //     ];
            
                // return [
                //     'subevent_item' => 'Classic Car Travel',
                //     'event_introduce' => '8 Alle technischen Angaben sind vorläufig und wurden
                //     intern nach Maßgabe der jeweils anwendbaren
                //     Zertifizierungsmethode ermittelt. Es liegen bislang
                //     weder bestätigte Werte vom TÜV noch eine
                //     EG-Typgenehmigung noch eine Konformitätsbescheinigung
                //     mit amtlichen Werten vor. Abweichungen zwischen den
                //     Angaben und den amtlichen Werten sind möglich.',
                //     'event_img' => 'https://www.mercedes-benz.com/en/events/_jcr_content/root/grid_3_copy/grid-par/griditem_1880768572_/image/MQ6-8-image-20201109155525/07-mercedes-benz-g500-2019-w463-2560x1440-09-2020.jpeg',
                //     'event_img_title_1' => 'G-class Experiencs Center.',
                //     'event_img_title_2' => ' Experiencs the various facets of the G-class',
                //     ];
                // return [
                //         'subevent_item' => 'Motorsport Tickets',
                //     ];

    }
}
