<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Perfil;
use App\Admin;
use App\Autor;
use App\Editorial;
use App\Genero;
use App\Libro;
use App\Novedad;
use App\Trailer;
use App\Capitulo;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;
use App\Traits\FileUpload;

class LibrosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    use FileUpload;
    public function run()
    {
    // Borrar archivos (Ya que vamos a re-crear la bd con semillas nuevas)
        // $files =   Storage::allFiles($dir);
        // $files =   Storage::files($dir);
        Storage::delete(Storage::files('public/novedades'));
        Storage::delete(Storage::files('public/capitulos'));
        Storage::delete(Storage::files('public/trailers'));
        Storage::delete(Storage::files('public/portadas'));

        //$file = $this->TrailerFileUpload(Form::file(public_path('image/seeds/portadas/hp6.jpg')));
        //$filePath = $file->url;
        //echo $filePath;
        //echo Storage::putFile('public/novedades', new File(public_path('image/seeds/portadas/hp6.jpg')), 'public');
        //
        // Luego de muchas pruebas esta es la mejor forma:
        //$this->guardarArchivo('portadas/hp6.jpg');

    // Libros
    //Libro::truncate();

        // Libro #1
        $libro = new Libro();
        $libro->titulo = "Harry Potter y el Príncipe Mestizo";
        $libro->portada = $this->guardarArchivo('portadas/hp6.jpg');
        $libro->isbn = "0000000001";
        $libro->autor_id = 4;
        $libro->editorial_id = 1;
        $libro->fecha_de_lanzamiento = Carbon::now();
        $libro->fecha_de_vencimiento = Carbon::now()->addYear();
        $libro->es_completo = FALSE;
        $libro->terminado_de_cargar = TRUE;
        $libro->save();
        $libro->generos()->attach([4, 5]); //Relacionar el libro a dos etiquetas
            // Trailer para este libro
            $trailer = new Trailer();
            $trailer->titulo = "Trailer Harry Potter 6";
            $trailer->pdf = $this->guardarArchivo('trailers/sample.pdf');
            $trailer->libro_id = 1;
            $trailer->save();
            // Capitulos
                //Capítulo 1
                $capitulo = new Capitulo();
                $capitulo->titulo = "Capitulo 1";
                $capitulo->pdf = $this->guardarArchivo('trailers/sample.pdf');
                $capitulo->fecha_de_lanzamiento = Carbon::now();
                $capitulo->fecha_de_vencimiento = Carbon::now()->addYear()->subDay(); 
                $capitulo->libro_id = 1;
                $capitulo->save();
                //Capítulo 2
                $capitulo = new Capitulo();
                $capitulo->titulo = "Capitulo 2";
                $capitulo->pdf = $this->guardarArchivo('trailers/sample.pdf');
                $capitulo->fecha_de_lanzamiento = Carbon::now();
                $capitulo->fecha_de_vencimiento = Carbon::now()->addYear()->subDay(); 
                $capitulo->libro_id = 1;
                $capitulo->save();


        // Libro #2
        $libro = new Libro();
        $libro->titulo = "Diario de una Jovencita";
        $libro->portada = $this->guardarArchivo('portadas/anne.jpg');
        $libro->isbn = "0000000002";
        $libro->autor_id = 2;
        $libro->editorial_id = 2;
        $libro->fecha_de_lanzamiento = Carbon::now();
        $libro->fecha_de_vencimiento = Carbon::now()->addYear();
        $libro->es_completo = TRUE;
        $libro->terminado_de_cargar = TRUE;
        $libro->save();
        $libro->generos()->attach([2, 6]);
            // Trailer para este libro
            $trailer = new Trailer();
            $trailer->titulo = "Trailer Libro de Anne Frank";
            $trailer->pdf = $this->guardarArchivo('trailers/sample.pdf');
            $trailer->libro_id = 2;
            $trailer->save();
            // Capitulos
                //Capítulo 1
                $capitulo = new Capitulo();
                $capitulo->titulo = "Capitulo I";
                $capitulo->pdf = $this->guardarArchivo('trailers/sample.pdf');
                $capitulo->fecha_de_lanzamiento = Carbon::now();
                $capitulo->fecha_de_vencimiento = Carbon::now()->addYear()->subDay(); 
                $capitulo->libro_id = 2;
                $capitulo->save();

        // Libro #3
        $libro = new Libro();
        $libro->titulo = "El Hobbit";
        $libro->portada = $this->guardarArchivo('portadas/hobbit.jpg');
        $libro->isbn = "0000000003";
        $libro->autor_id = 1;
        $libro->editorial_id = 2;
        $libro->fecha_de_lanzamiento = Carbon::now();
        $libro->fecha_de_vencimiento = Carbon::now()->addYear();
        $libro->es_completo = FALSE;
        $libro->terminado_de_cargar = TRUE;
        $libro->save();
        $libro->generos()->attach([4, 5]);
            // Trailer para este libro
            $trailer = new Trailer();
            $trailer->titulo = "Trailer Hobbit";
            $trailer->pdf = $this->guardarArchivo('trailers/sample.pdf');
            $trailer->libro_id = 3;
            $trailer->save();
            // Capitulos
                //Capítulo 1
                $capitulo = new Capitulo();
                $capitulo->titulo = "1";
                $capitulo->pdf = $this->guardarArchivo('trailers/sample.pdf');
                $capitulo->fecha_de_lanzamiento = Carbon::now();
                $capitulo->fecha_de_vencimiento = Carbon::now()->addYear()->subDay(); 
                $capitulo->libro_id = 3;
                $capitulo->save();
                //Capítulo 2
                $capitulo = new Capitulo();
                $capitulo->titulo = "2";
                $capitulo->pdf = $this->guardarArchivo('trailers/sample.pdf');
                $capitulo->fecha_de_lanzamiento = Carbon::now();
                $capitulo->fecha_de_vencimiento = Carbon::now()->addYear()->subDay(); 
                $capitulo->libro_id = 3;
                $capitulo->save();

        // Libro #4
        $libro = new Libro();
        $libro->titulo = "The Connections In Our Brain";
        $libro->portada = $this->guardarArchivo('portadas/connection.jpg');
        $libro->isbn = "0000000004";
        $libro->autor_id = 5;
        $libro->editorial_id = 4;
        $libro->fecha_de_lanzamiento = Carbon::now();
        $libro->fecha_de_vencimiento = Carbon::now()->addYear();
        $libro->es_completo = TRUE;
        $libro->terminado_de_cargar = TRUE;
        $libro->save();
        $libro->generos()->attach([1,7]);
            // Trailer para este libro
            $trailer = new Trailer();
            $trailer->titulo = "Trailer Connections";
            $trailer->pdf = $this->guardarArchivo('trailers/sample.pdf');
            $trailer->libro_id = 4;
            $trailer->save();
            // Capitulos
                //Capítulo 1
                $capitulo = new Capitulo();
                $capitulo->titulo = "Unico";
                $capitulo->pdf = $this->guardarArchivo('trailers/sample.pdf');
                $capitulo->fecha_de_lanzamiento = Carbon::now();
                $capitulo->fecha_de_vencimiento = Carbon::now()->addYear()->subDay(); 
                $capitulo->libro_id = 4;
                $capitulo->save();

        // Libro #5
        $libro = new Libro();
        $libro->titulo = "Yo, robot";
        $libro->portada = $this->guardarArchivo('portadas/robot.jpg');
        $libro->isbn = "0000000005";
        $libro->autor_id = 6;
        $libro->editorial_id = 3;
        $libro->fecha_de_lanzamiento = Carbon::now();
        $libro->fecha_de_vencimiento = Carbon::now()->addYear();
        $libro->es_completo = TRUE;
        $libro->terminado_de_cargar = TRUE;
        $libro->save();
        $libro->generos()->attach([1]);
            // Trailer para este libro
            $trailer = new Trailer();
            $trailer->titulo = "Robot";
            $trailer->pdf = $this->guardarArchivo('trailers/sample.pdf');
            $trailer->libro_id = 5;
            $trailer->save();
            // Capitulos
                //Capítulo 1
                $capitulo = new Capitulo();
                $capitulo->titulo = "i";
                $capitulo->pdf = $this->guardarArchivo('trailers/sample.pdf');
                $capitulo->fecha_de_lanzamiento = Carbon::now();
                $capitulo->fecha_de_vencimiento = Carbon::now()->addYear()->subDay(); 
                $capitulo->libro_id = 5;
                $capitulo->save();

        // Libro #6
        $libro = new Libro();
        $libro->titulo = "Elementos";
        $libro->portada = $this->guardarArchivo('portadas/euclides.jpg');
        $libro->isbn = "0000000006";
        $libro->autor_id = 7;
        $libro->editorial_id = 4;
        $libro->fecha_de_lanzamiento = Carbon::now();
        $libro->fecha_de_vencimiento = Carbon::now()->addYear();
        $libro->es_completo = FALSE;
        $libro->terminado_de_cargar = TRUE;
        $libro->save();
        $libro->generos()->attach([7]);
            // Trailer para este libro
            $trailer = new Trailer();
            $trailer->titulo = "Elementos";
            $trailer->pdf = $this->guardarArchivo('trailers/sample.pdf');
            $trailer->libro_id = 6;
            $trailer->save();
            // Capitulos
                //Capítulo 1
                $capitulo = new Capitulo();
                $capitulo->titulo = "I";
                $capitulo->pdf = $this->guardarArchivo('trailers/sample.pdf');
                $capitulo->fecha_de_lanzamiento = Carbon::now();
                $capitulo->fecha_de_vencimiento = Carbon::now()->addYear()->subDay(); 
                $capitulo->libro_id = 6;
                $capitulo->save();
                //Capítulo 1
                $capitulo = new Capitulo();
                $capitulo->titulo = "II";
                $capitulo->pdf = $this->guardarArchivo('trailers/sample.pdf');
                $capitulo->fecha_de_lanzamiento = Carbon::now();
                $capitulo->fecha_de_vencimiento = Carbon::now()->addYear()->subDay(); 
                $capitulo->libro_id = 6;
                $capitulo->save();
                //Capítulo 1
                $capitulo = new Capitulo();
                $capitulo->titulo = "III";
                $capitulo->pdf = $this->guardarArchivo('trailers/sample.pdf');
                $capitulo->fecha_de_lanzamiento = Carbon::now();
                $capitulo->fecha_de_vencimiento = Carbon::now()->addYear()->subDay(); 
                $capitulo->libro_id = 6;
                $capitulo->save();
                //Capítulo 1
                $capitulo = new Capitulo();
                $capitulo->titulo = "IV";
                $capitulo->pdf = $this->guardarArchivo('trailers/sample.pdf');
                $capitulo->fecha_de_lanzamiento = Carbon::now();
                $capitulo->fecha_de_vencimiento = Carbon::now()->addYear()->subDay(); 
                $capitulo->libro_id = 6;
                $capitulo->save();
                //Capítulo 1
                $capitulo = new Capitulo();
                $capitulo->titulo = "V";
                $capitulo->pdf = $this->guardarArchivo('trailers/sample.pdf');
                $capitulo->fecha_de_lanzamiento = Carbon::now();
                $capitulo->fecha_de_vencimiento = Carbon::now()->addYear()->subDay(); 
                $capitulo->libro_id = 6;
                $capitulo->save();
                //Capítulo 1
                $capitulo = new Capitulo();
                $capitulo->titulo = "VI";
                $capitulo->pdf = $this->guardarArchivo('trailers/sample.pdf');
                $capitulo->fecha_de_lanzamiento = Carbon::now();
                $capitulo->fecha_de_vencimiento = Carbon::now()->addYear()->subDay(); 
                $capitulo->libro_id = 6;
                $capitulo->save();
        
        // Libro #7
        $libro = new Libro();
        $libro->titulo = "COMPLETO FUTURO";
        $libro->portada = $this->guardarArchivo('portadas/garciamarquez.jpeg');
        $libro->isbn = "0000000007";
        $libro->autor_id = 5;
        $libro->editorial_id = 4;
        $libro->es_completo = TRUE;
        $libro->fecha_de_lanzamiento = Carbon::now()->addYear();
        $libro->fecha_de_vencimiento = Carbon::now()->addYears(2);
        $libro->terminado_de_cargar = TRUE;
        $libro->save();
            // Trailer para este libro
            $trailer = new Trailer();
            $trailer->titulo = "TRAILER LIBRO FUTURO";
            $trailer->pdf = $this->guardarArchivo('trailers/sample.pdf');
            $trailer->libro_id = 7;
            $trailer->save();
            // Capitulos
                //Capítulo 1
                $capitulo = new Capitulo();
                $capitulo->titulo = "UNICO";
                $capitulo->pdf = $this->guardarArchivo('trailers/sample.pdf');
                $capitulo->fecha_de_lanzamiento = $libro->fecha_de_lanzamiento;
                $capitulo->fecha_de_vencimiento = $libro->fecha_de_vencimiento; 
                $capitulo->libro_id = 7;
                $capitulo->save();

        // Libro #8
        $libro = new Libro();
        $libro->titulo = "POR CAPITULOS PAS / PRES / FUT";
        $libro->portada = $this->guardarArchivo('portadas/garciamarquez.jpeg');
        $libro->isbn = "0000000008";
        $libro->autor_id = 5;
        $libro->editorial_id = 4;
        $libro->es_completo = FALSE;
        $libro->fecha_de_lanzamiento = Carbon::now();
        $libro->fecha_de_vencimiento = Carbon::now()->addYear();
        $libro->terminado_de_cargar = TRUE;
        $libro->save();
            // Capitulos
                //Capítulo PASADO
                $capitulo = new Capitulo();
                $capitulo->titulo = "PASADO";
                $capitulo->pdf = $this->guardarArchivo('trailers/sample.pdf');
                $capitulo->fecha_de_lanzamiento = $libro->fecha_de_lanzamiento;
                $capitulo->fecha_de_vencimiento = Carbon::now()->subWeek();
                $capitulo->libro_id = 8;
                $capitulo->save();
                //Capítulo PRESENTE
                $capitulo = new Capitulo();
                $capitulo->titulo = "PRESENTE";
                $capitulo->pdf = $this->guardarArchivo('trailers/sample.pdf');
                $capitulo->fecha_de_lanzamiento = Carbon::now()->subWeek();
                $capitulo->fecha_de_vencimiento = Carbon::now()->addWeek();
                $capitulo->libro_id = 8;
                $capitulo->save();
                //Capítulo FUTURO
                $capitulo = new Capitulo();
                $capitulo->titulo = "FUTURO";
                $capitulo->pdf = $this->guardarArchivo('trailers/sample.pdf');
                $capitulo->fecha_de_lanzamiento = Carbon::now()->addWeek();
                $capitulo->fecha_de_vencimiento = $libro->fecha_de_vencimiento; 
                $capitulo->libro_id = 8;
                $capitulo->save();

        // Libro #9
        $libro = new Libro();
        $libro->titulo = "SIN FINALIZAR";
        $libro->portada = $this->guardarArchivo('portadas/garciamarquez.jpeg');
        $libro->isbn = "0000000009";
        $libro->autor_id = 5;
        $libro->editorial_id = 4;
        $libro->es_completo = FALSE;
        $libro->fecha_de_lanzamiento = Carbon::now()->subYear();
        $libro->fecha_de_vencimiento = Carbon::now()->addYear();
        $libro->terminado_de_cargar = FALSE;
        $libro->save();
            // Trailer para este libro
            $trailer = new Trailer();
            $trailer->titulo = "TRAILER DE LIBRO SIN FINALIZAR";
            $trailer->pdf = $this->guardarArchivo('trailers/sample.pdf');
            $trailer->libro_id = 9;
            $trailer->save();

        // Libro #10
        $libro = new Libro();
        $libro->titulo = "VENCIDO";
        $libro->portada = $this->guardarArchivo('portadas/garciamarquez.jpeg');
        $libro->isbn = "0000000010";
        $libro->autor_id = 5;
        $libro->editorial_id = 4;
        $libro->es_completo = FALSE;
        $libro->fecha_de_lanzamiento = Carbon::now()->subYears(2);
        $libro->fecha_de_vencimiento = Carbon::now()->subYear();
        $libro->terminado_de_cargar = TRUE;
        $libro->save();
            // Trailer para este libro NO SE VE BIEN LO SACO
            // $trailer = new Trailer();
            // $trailer->titulo = "TRAILER VENCIDO";
            // $trailer->pdf = $this->guardarArchivo('trailers/sample.pdf');
            // $trailer->libro_id = 11;
            // $trailer->save();

        // TRAILER SIN LIBRO
        $trailer = new Trailer();
        $trailer->titulo = "TRAILER SIN LIBRO";
        $trailer->pdf = $this->guardarArchivo('trailers/sample.pdf');
        $trailer->save();
        
        // Novedades
        $novedad = new Novedad();
        $novedad->titulo = "Novedad sin archivo";
        $novedad->descripcion = "Una novedad sin archivo";
        $novedad->archivo = 'noFile';
        $novedad->fecha_de_publicacion = Carbon::now();
        $novedad->save();

        $novedad = new Novedad();
        $novedad->titulo = "Novedad con imagen";
        $novedad->archivo = $this->guardarArchivo('novedades/edward.jpg');
        $novedad->es_video = false;
        $novedad->descripcion = "Una novedad con archivo de imagen";
        $novedad->fecha_de_publicacion = Carbon::now();
        $novedad->save();

        $novedad = new Novedad();
        $novedad->titulo = "Novedad con video";
        $novedad->archivo = $this->guardarArchivo('novedades/video_earth.mp4');
        $novedad->es_video = true;
        $novedad->descripcion = "Una novedad con archivo de video";
        $novedad->fecha_de_publicacion = Carbon::now();
        $novedad->save();

        $novedad = new Novedad();
        $novedad->titulo = "Novedad Futura";
        $novedad->archivo = $this->guardarArchivo('novedades/question.jpg');
        $novedad->es_video = false;
        $novedad->descripcion = "Una novedad con fecha de publicacion futura";
        $novedad->fecha_de_publicacion = (Carbon::now()->addYear());
        $novedad->save();
    
        //factory(Libro::class, 5)->create();
    }
    public function guardarArchivo($file){
        //$file = "novedades/edward.jpg";
        $folder = explode("/", $file)[0];
        $badname = Storage::putFile('public/'.$folder , new File(public_path('/image/seeds/'.$file)), 'public');
        // esto me da algo asi "public/portadas/mxiED6oizk413MyOBAoKuY49mUFxyiDg6CHDKyh1.jpeg"
        $filename = str_replace ( "public" , "storage" , $badname);
        // debe quedar asi "storage/portadas/mxiED6oizk413MyOBAoKuY49mUFxyiDg6CHDKyh1.jpeg";
        echo "archivo ".$file." guardado en ".$filename."\n";
        return $filename;
    }
}
