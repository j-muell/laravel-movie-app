/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            spacing: {
                96: "24rem",
            },
            colors: {
                primary: {
                    900: "#140d0b",
                    700: "#271c19",
                    600: "#3E2F2B",
                    500: "#55423d",
                },
                secondary: "#ffc0ad",
                textHeading: "#fffffe",
                textSubHeading: "#fff3ec",
            },
        },
    },
    plugins: [],
};
