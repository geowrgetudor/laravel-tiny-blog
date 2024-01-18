/** @type {import('tailwindcss').Config} */
module.exports = {
    darkMode: "class",
    content: ["./resources/views/**/*.blade.php"],
    theme: {
        extend: {},
    },
    plugins: [require("@tailwindcss/typography")],
};
