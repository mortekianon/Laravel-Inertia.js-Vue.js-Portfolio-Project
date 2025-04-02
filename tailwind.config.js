import defaultTheme from "tailwindcss/defaultTheme";
const colors = require("tailwindcss/colors");
import forms from "@tailwindcss/forms";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "./resources/js/**/*.vue",
    ],

    theme: {
        fontFamily: {
            primary: "PlayFair Display",
            body: "work Sans",
        },
        container: {
            padding: {
                DEFAULT: "1rem",
                lg: "3rem",
            },
        },
        extend: {
            colors: {
                "light-primary": "#F6F8D5",
                "light-secondary": "#98D2C0",
                "light-third": "#4F959D",
                "light-fourth": "#205781",
                "light-fifth": "#FFB433",
                "dark-primary": "#222831",
                "dark-secondary": "#31363F",
                "dark-third": "#76ABAE",
                "dark-fourth": "#EEEEEE",
                accent: {
                    DEFAULT: "#FFB433",
                    hover: "#F6F8D5",
                },
                paragraph: "#FFB433",
                blue: colors.blue,
                indigo: colors.indigo,
                green: colors.green,
                red: colors.red,
            },
        },
    },

    plugins: [forms],
};
