<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Categoria;
use Faker\Generator as Faker;

$factory->define(Categoria::class, function (Faker $faker) {
    return [
        'nombre' => $faker->unique()->name,
        'descripcion' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam ut dolor et dolor varius tincidunt. Ut ornare maximus luctus. 
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas a finibus justo, quis fermentum erat. Donec mi tortor, 
                        tempus a urna sit amet, congue elementum urna. Nullam sed faucibus lectus. Aenean et justo aliquam nisl pellentesque eleifend 
                        id eget tortor. Vivamus velit nulla, dapibus id est sit amet, semper porttitor ligula. Cras urna sapien, blandit sit amet interdum sed,
                         cursus elementum erat. Interdum et malesuada fames ac ante ipsum primis in faucibus. Pellentesque consequat in erat at auctor. Nulla 
                         pulvinar, lacus id facilisis dignissim, tellus urna suscipit leo, eu suscipit orci diam quis neque',
        'imagen' => 'nofoto.jpg',
    ];
});
