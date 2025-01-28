import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography';

const colors =require('tailwindcss/colors');

/** @type {import('tailwindcss').Config} */
export default {
    presets: [
        
    require("./vendor/power-components/livewire-powergrid/tailwind.config"),
    ],
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './app/Livewire/**/*Table.php',
        './vendor/power-components/livewire-powergrid/resources/views/**/*.php',
        './vendor/power-components/livewire-powergrid/src/Themes/Tailwind.php'
    ],

    theme: {
        extend: {
            colors:{
                "pg-primary": colors.indigo, // Color primario
                "pg-secondary": colors.gray, // Color secundario
                "pg-success": colors.green, // Color de éxito
                "pg-danger": colors.red, // Color de peligro
            },
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            borderWidth: {
                '3': '3px', // Grosor de borde personalizado
            },
            boxShadow: {
                'custom': '0 4px 6px -1px rgba(0, 0, 0, 0.2)', // Sombra personalizada
            },
        },
    },
    

    plugins: [forms, typography,
        require('@tailwindcss/forms')
    ],
    // plugins: [forms, typography,requiere('@tailwindcss/forms')({
    //     strategy: 'class',
    // }),],
};
