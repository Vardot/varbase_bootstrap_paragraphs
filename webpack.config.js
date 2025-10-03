const path = require('path');
const isDev = (process.env.NODE_ENV !== 'production');
const { CleanWebpackPlugin } = require('clean-webpack-plugin');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const autoprefixer = require('autoprefixer');
const RemoveEmptyScriptsPlugin = require('webpack-remove-empty-scripts');

module.exports = {
  mode: 'production',
  entry: {
    // ################################################
    // SCSS
    // ################################################
    // Base
    'base/vbp-default.admin': ['./scss/base/vbp-default.admin.scss'],
    'base/vbp-default.base': ['./scss/base/vbp-default.base.scss'],
    // Base
    'component/vbp-accordion.component': ['./scss/component/vbp-accordion.component.scss'],
    'component/vbp-carousel.component': ['./scss/component/vbp-carousel.component.scss'],
    'component/vbp-image.component': ['./scss/component/vbp-image.component.scss'],
    'component/vbp-modal.component': ['./scss/component/vbp-modal.component.scss'],
    'component/vbp-tabs.component': ['./scss/component/vbp-tabs.component.scss'],
    // Theme
    'theme/vbp-colors.theme': ['./scss/theme/vbp-colors.theme.scss'],
  },
  output: {
    path: path.resolve(__dirname, 'css'),
    pathinfo: false,
    publicPath: '',
  },
  module: {
    rules: [
      {
        test: /\.(png|jpe?g|gif|svg)$/,
        exclude: /sprite\.svg$/,
        type: 'asset/resource',
        generator: {
          filename: (pathData) => {
            // Remove leading slash from path
            const path = pathData.filename.replace(/^\//, '');
            return `../../${path}`;
          },
        },
      },
      {
        test: /\.(css|scss)$/,
        use: [
          {
            loader: MiniCssExtractPlugin.loader,
            options: {
              publicPath: '../../',
            },
          },
          {
            loader: 'css-loader',
            options: {
              sourceMap: isDev,
              importLoaders: 2,
              url: {
                filter: (url) => {
                  // Don't handle sprite svg or image paths - keep them as-is in SCSS
                  if (url.includes('sprite.svg') || url.includes('/images/')) {
                    return false;
                  }

                  return true;
                },
              },
            },
          },
          {
            loader: 'postcss-loader',
            options: {
              sourceMap: isDev,
              postcssOptions: {
                plugins: [
                  autoprefixer(),
                  ['postcss-perfectionist', {
                    format: 'expanded',
                    indentSize: 2,
                    trimLeadingZero: true,
                    zeroLengthNoUnit: false,
                    maxAtRuleLength: false,
                    maxSelectorLength: false,
                    maxValueLength: false,
                  }]
                ],
              },
            },
          },
          {
            loader: 'sass-loader',
            options: {
              sourceMap: isDev,
              // Global SCSS imports:
              additionalData: `
                @use "sass:color";
                @use "sass:math";
              `,
            },
          },
        ],
      },
    ],
  },
  resolve: {
    modules: [
      path.join(__dirname, 'node_modules'),
    ],
    extensions: ['.js', '.json'],
  },
  plugins: [
    new RemoveEmptyScriptsPlugin(),
    new CleanWebpackPlugin({
      cleanStaleWebpackAssets: false
    }),
    new MiniCssExtractPlugin(),
  ],
  watchOptions: {
    aggregateTimeout: 300,
    ignored: ['**/*.woff', '**/*.json', '**/*.woff2', '**/*.jpg', '**/*.png', '**/*.svg', 'node_modules', 'images'],
  }
};
