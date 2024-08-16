/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {},
    },
    plugins: [
        require('daisyui'),
    ],
    daisyui: {
        themes: ['light','dark','cupcake'], // false: only light + dark | true: all themes | array: specific themes like this ["light", "dark", "cupcake"]
        darkTheme: "cupcake", // name of one of the included themes for dark mode
    },
}
