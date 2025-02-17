import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
// import { resolve } from 'path'; // Importar la función resolve para manejar rutas

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
    ],
    // resolve: {
    //     alias: {
    //         // Configurar un alias para jQuery
    //         '$': resolve(__dirname, 'node_modules/jquery/dist/jquery.js'),
    //         'jquery': resolve(__dirname, 'node_modules/jquery/dist/jquery.js'),
    //     },
    // },
    // optimizeDeps: {
    //     // Incluir jQuery y Select2 en la optimización de dependencias
    //     include: ['jquery', 'select2'],
    // },
<<<<<<< HEAD
});
=======
});
>>>>>>> d3704ae626e026882bfef9d01fb0b0f917b87ef6
