<?php

namespace Database\Factories;

use App\Models\Cars;
use Illuminate\Database\Eloquent\Factories\Factory;

class CarsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Cars::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => 'AMG GT 4-door Coupé',
            'price_description' => 'Giá từ 6.299.000.000',
            'status' => 'Còn bán',
            'logo_type_cars' => '<svg id="amg_svg__icon-amg" xmlns="http://www.w3.org/2000/svg" xml:space="preserve" x="0" y="0" viewBox="0 0 79 8" class="dh-io-vmos_2MTsP"><path d="M78.048 3.413a.456.456 0 00-.447-.446h-7.353a.456.456 0 00-.447.446v.639c0 .239.208.462.447.462h4.626c.303 0 .287.144.287.495v.08c0 .35.016.43-.287.43h-9.396a.456.456 0 01-.446-.447V2.36c0-.239.191-.446.447-.446H77.602c.238 0 .446-.207.446-.447V.447A.456.456 0 0077.6 0H62.672a.456.456 0 00-.447.447v6.635c0 .24.207.447.446.447H77.601c.24 0 .447-.208.447-.447V3.35M54.026 5.248c-.208.127-.351.255-.606.255H51.52c-.239 0-.398-.128-.606-.255l-3.652-2.313c-.208-.128-.383-.032-.383.207v3.94c0 .24-.208.447-.447.447h-1.898a.456.456 0 01-.447-.447V.447c0-.24.208-.447.447-.447h2.042c.239 0 .398.112.606.24L52.16 3.46a.553.553 0 00.622 0L57.758.24c.208-.127.351-.239.606-.239h2.042c.24 0 .447.207.447.447v6.635c0 .24-.208.447-.447.447h-1.898a.456.456 0 01-.447-.447V3.158c0-.239-.175-.335-.382-.207l-3.653 2.297zM32.556 1.914c-.128 0-.24.096-.32.207l-1.18 1.516c-.08.111-.031.207.096.207h8.486c.271 0 .287-.096.287-.367V2.425c0-.367.016-.495-.287-.495h-7.082v-.016zM27.61 7.53h-2.456c-.192 0-.272-.176-.176-.335l5.328-6.89C30.434.143 30.61 0 30.8 0h11.437c.303 0 .495.255.495.558v6.524c0 .24-.208.447-.447.447H40.372a.456.456 0 01-.447-.447v-.94c0-.272-.032-.368-.287-.368H29.621c-.192 0-.32.128-.447.287l-.032.032-.765.99c-.192.238-.463.446-.702.446h-.064zM22.587 7.529c.239 0 .51-.192.701-.447l5.12-6.635C28.6.207 28.505 0 28.266 0h-1.02c-.192 0-.368.128-.495.303l-5.328 6.89c-.08.16 0 .336.176.336h.989zM19.013 7.529c.24 0 .51-.192.702-.447l5.12-6.635c.192-.24.096-.447-.143-.447H23.24c-.19 0-.366.128-.494.303l-5.328 6.89c-.08.16 0 .336.176.336h1.42zM13.175 7.529c-.191 0-.27-.176-.175-.335l5.328-6.89c.127-.16.303-.304.494-.304h2.122c.239 0 .335.207.143.447l-5.136 6.635c-.191.24-.463.447-.702.447h-2.074zM8.31 7.529c-.191 0-.27-.176-.175-.335l5.312-6.89c.127-.16.303-.304.494-.304h2.855c.24 0 .335.207.144.447l-5.12 6.635c-.192.24-.463.447-.702.447H8.31zM.319 7.529c-.191 0-.271-.176-.175-.335L5.455.304C5.583.143 5.775 0 5.95 0h6.237c.239 0 .334.207.143.447L7.226 7.082c-.192.24-.463.447-.702.447H.319z"></path></svg>' ,
            'sub_group_id' => 3,
            'enabled' => 1,
            'image_front' => 'https://assets.oneweb.mercedes-benz.com/iris/iris.jpg?COSY-EU-100-1713d0VXqrWFqtyO67PobzIr3eWsrrCsdRRzwQZg9pZbMw3SGtieWtsd4ZtcUfgFfXGEzymJ0lgYhOB2PBqbAp7nCI5uKMTQmIJwF1H66PDGmhSc63ZstXS0h3cUf886XGEH9ZJ0lUHhOB2ZsbbA4wHEcmqN1IwCQKE7qpnIu2fzzjFm93Su9Q6DF1s1n2nvligKfLlCVz9Xu9&amp;imgt=P27&amp;bkgnd=9&amp;pov=BE040&amp;im=Crop,rect=(360,250,1280,580);Resize,width=300',
            'image_back' => 'https://assets.oneweb.mercedes-benz.com/iris/iris.jpg?COSY-EU-100-1713d0VXqrWFqtyO67PobzIr3eWsrrCsdRRzwQZg9pZbMw3SGtieWtsd4ZtcUfgFfXGEzymJ0lgYhOB2PBqbAp7nCI5uKMTQmIJwF1H66PDGmhSc63ZstXS0h3cUf886XGEH9ZJ0lUHhOB2ZsbbA4wHEcmqN1IwCQKE7qpnIu2fzzjFm93Su9Q6DF1s1n2nvligKfLlCVz9Xu9&amp;imgt=P27&amp;bkgnd=9&amp;pov=BE140&amp;im=Crop,rect=(290,250,1280,580);Resize,width=300'
        ];

    }
}
