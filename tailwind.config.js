import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";
import typography from "@tailwindcss/typography";

/** @type {import('tailwindcss').Config} */
export default {
    presets: [require("./vendor/wireui/wireui/tailwind.config.js")],
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./vendor/laravel/jetstream/**/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "./vendor/wireui/wireui/src/*.php",
        "./vendor/wireui/wireui/ts/**/*.ts",
        "./vendor/wireui/wireui/src/WireUi/**/*.php",
        "./vendor/wireui/wireui/src/Components/**/*.php",
        "./vendor/rappasoft/laravel-livewire-tables/resources/views/**/*.blade.php",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
            },
            /*Esto es para el organigrama */
            colors: {
                primary: "#ea580c", //1E3A8A
                "netjer-blue": "#2196f3",
                "ceo-level": "#9999ff",
                "director-level": "#2563eb",
                "manager-level": "#BFDBFE",
                "team-level": "#3949ab",
                /*Colore para las FAses*/
                "phase-1": "#5D6BB0",
                "phase-2": "#6C8EBB",
                "phase-3": "#7AA1C6",
                "phase-4": "#EA638C",
                "phase-5": "#2FBF71",
                "phase-6": "#E87C3E",
                "phase-7": "#0A7EA4",
                "phase-8": "#4A7729",
                "phase-9": "#D96C2B",
                "phase-10": "#BE5024",
                "phase-11": "#D77BC9",
                "background-light": "#FAFAFA",
                "surface-light": "#FFFFFF",
                "raci-r": "#92D050", // Green
                "raci-a": "#5B9BD5", // Blue
                "raci-c": "#FFFF00", // Yellow
                "raci-i": "#FF0000", // Red
                "raci-w": "#FFFFFF",
                "background-light": "#FAFAFA",
                "surface-light": "#FFFFFF",
            },
        },
    },

    plugins: [forms, typography],
};
