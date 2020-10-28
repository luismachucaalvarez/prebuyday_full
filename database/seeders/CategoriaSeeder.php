<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categorias')->insert([
            ['descripcion'=>'Cámaras y Fotográficas'],
            ['descripcion'=>'Telefonía móvil y fija'],
            ['descripcion'=>'Computación'],
            ['descripcion'=>'Libros y revistas'],
            ['descripcion'=>'Accesorios de TV, audio y video'],
            ['descripcion'=>'Consolas y videojuegos'],
            ['descripcion'=>'Audio, Video'],
            ['descripcion'=>'Automotriz'],
            ['descripcion'=>'Electrodomésticos y línea blanca'],
            ['descripcion'=>'Instrumentos musicales'],
            ['descripcion'=>'Motos y Automóviles'],
            ['descripcion'=>'Movilidad eléctrica'],
            ['descripcion'=>'Herramientas Eléctricas e inalámbricas'],
            ['descripcion'=>'Accesorios cámaras y fotografía'],
            ['descripcion'=>'Comida y pañales para bebé'],
            ['descripcion'=>'Ferretería y herramientas manuales'],
            ['descripcion'=>'Supermercado'],
            ['descripcion'=>'Vinos y licores'],
            ['descripcion'=>'Accesorios telefonía móvil y fija'],
            ['descripcion'=>'Accesorios computación'],
            ['descripcion'=>'Colchones'],
            ['descripcion'=>'Música y películas'],
            ['descripcion'=>'Perfumes y fragancias'],
            ['descripcion'=>'Mundo Mascotas y accesorios'],
            ['descripcion'=>'Muebles'],
            ['descripcion'=>'Juguetería niños y bebés'],
            ['descripcion'=>'Hobby y entretención'],
            ['descripcion'=>'Relojes y lentes'],
            ['descripcion'=>'Alimento de mascotas'],
            ['descripcion'=>'Salud y cuidado personal'],
            ['descripcion'=>'Tienda del Fan (Fanshop)'],
            ['descripcion'=>'Alimentación especial'],
            ['descripcion'=>'Deportes, accesorios y Máquinas de ejercicio'],
            ['descripcion'=>'Artículos casa y jardín'],
            ['descripcion'=>'Mochilas, bolsos y malatería'],
            ['descripcion'=>'Alimentos Gourmet y seleccionados'],
            ['descripcion'=>'Oficina y papelería'],
            ['descripcion'=>'Ropa deportiva'],
            ['descripcion'=>'Moda, Ropa y Accesorios'],
            ['descripcion'=>'Otras']

        ]);
    }
}
