import js from '@eslint/js';
import globals from 'globals';
import { defineConfig } from 'eslint/config';


export default defineConfig([
  {
    files: ['**/*.{js,mjs,cjs}'],
    plugins: { js },
    extends: ['js/recommended'],
    languageOptions: { globals: globals.browser },
    rules: {
	  'no-unused-vars': 1,
	  'no-undef': 2,
	  'no-use-before-define': 1,
	  'no-unused-expressions': 1,
	  'no-var': 2,
	  'prefer-const': 1,
	  'no-multi-spaces': 1,
	  'no-shadow': 2,
	  'no-redeclare': 2,
	  eqeqeq: [2, 'always'],
	  quotes: [1, 'single'],
	  semi: [0, 'always'],
	  indent: [2, 2],
	  curly: 2,
    },
  },
]);
