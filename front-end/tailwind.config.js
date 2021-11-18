// tailwind.config.js
module.exports = {
  purge: [],
  purge: ["./src/**/*.{js,jsx,ts,tsx}", "./public/index.html"],
  darkMode: false, // or 'media' or 'class'
  theme: {
    extend: {},
  },
  variants: {
    display: ["responsive", "group-hover", "group-focus"],
    outline: ["focus"],
  },
  plugins: [require("@tailwindcss/line-clamp")],
};

