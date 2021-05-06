module.exports = {
  purge: [],
  darkMode: 'media', // or 'media' or 'class'
  theme: {
    extend: {
        colors: {
            'rqm-light': '#2a202b',
            'rqm-lighter': '#2c212d',
            'rqm-dark': '#211922',
            'rqm-yellow': '#ffc888',
            'rqm-yellow-dark': '#ffbc6e',
            'rqm-yellow-darkest': '#E57002',
            'rqm-white': '#FFFFFF'
        },
        minHeight: {
            '1/2': '50%'
        }
    },
  },
  variants: {
    extend: {
        borderColor: ["responsive", "hover", "focus", "group-hover"],
        visibility: ["responsive", "group-hover"],
    },
  },
  plugins: [],
}
