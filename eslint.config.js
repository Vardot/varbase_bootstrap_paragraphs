const js = require('@eslint/js');
const globals = require('globals');
const yml = require('eslint-plugin-yml');

module.exports = [
  {
    ignores: [
      'node_modules/**/*',
      'drupalci.yml',
      'webpack.config.build.js',
      'webpack.config.components.js',
      'webpack.config.dev.js',
      'webpack.config.js',
      '.yarn/**',
      'vendor/**',
      'dist/**',
      'build/**',
    ],
  },
  js.configs.recommended,
  {
    languageOptions: {
      ecmaVersion: 2022,
      sourceType: 'module',
      globals: {
        ...globals.browser,
        ...globals.node,
        ...globals.es2021,
        Drupal: 'readonly',
        drupalSettings: 'readonly',
        drupalTranslations: 'readonly',
        jQuery: 'readonly',
        _: 'readonly',
        Cookies: 'readonly',
        Backbone: 'readonly',
        Modernizr: 'readonly',
        loadjs: 'readonly',
        Shepherd: 'readonly',
        Sortable: 'readonly',
        once: 'readonly',
        CKEditor5: 'readonly',
        tabbable: 'readonly',
      },
    },
    rules: {
      'consistent-return': 'off',
      'no-underscore-dangle': 'off',
      'max-nested-callbacks': ['warn', 3],
      'no-plusplus': ['warn', {
        allowForLoopAfterthoughts: true,
      }],
      'no-param-reassign': 'off',
      'no-prototype-builtins': 'off',
      'no-unused-vars': 'warn',
      'operator-linebreak': ['error', 'after', {
        overrides: { '?': 'ignore', ':': 'ignore' },
      }],
    },
  },
  ...yml.configs['flat/recommended'],
  {
    files: ['**/*.yml', '**/*.yaml'],
    rules: {
      'yml/indent': ['error', 2],
    },
  },
];
