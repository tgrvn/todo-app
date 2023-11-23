/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            backdropBrightness: {
                25: "0.85",
            },
        },
    },
    plugins: [require("@tailwindcss/forms")],
};
