module.exports = {
  extends: [
    // add more generic rulesets here, such as:
    // 'eslint:recommended',
    'plugin:vue/recommended',
    'plugin:vue/essential',
    'eslint:recommended',
    'airbnb-base'
  ],
  rules: {
    // override/add rules settings here, such as:
    // 'vue/no-unused-vars': 'error'
    "semi": [2, "always"],
    "linebreak-style": "off",
    "no-console": "off",
    "no-shadow": "off",
    "no-param-reassign": "off",
    "import/no-unresolved": "off",
    "max-len": "off",
    "comma-dangle": "off",
    "object-shorthand": "off",
    "space-before-function-paren": "off",
    "func-names": "off",
    "no-plusplus": "off"
  }
};
