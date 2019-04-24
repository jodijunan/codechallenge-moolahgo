const path = require('path');
const TerserJSPlugin = require('terser-webpack-plugin');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const OptimizeCSSAssetsPlugin = require('optimize-css-assets-webpack-plugin');
const VueLoaderPlugin = require('vue-loader').VueLoaderPlugin

module.exports = {
  mode: 'production',
  entry: path.resolve(__dirname, "resources", "assets", "js", "app"),
  output: {
      path: path.resolve(__dirname, "public", "assets")
  },
  optimization: {
    minimizer: [new TerserJSPlugin({}), new OptimizeCSSAssetsPlugin({})],
  },
  module: {
    rules: [
      {
        test: /\.(scss)$/,
        include: [
          path.resolve(__dirname, "resources", "assets", "sass")
        ],
        use: [
          {
            loader: MiniCssExtractPlugin.loader
          }, {
            loader: 'css-loader', // translates CSS into CommonJS modules
          }, {
            loader: 'sass-loader' // compiles Sass to CSS
          }
        ]
      },
      {
        test: /\.vue$/,
        include: [
          path.resolve(__dirname, "resources", "assets", "js")
        ],
        use: 'vue-loader'
      }
    ]
  },
  resolve: {
    extensions: ['.js', '.scss'],
    alias: {
      'vue$': 'vue/dist/vue.esm.js'
    }
  },
  plugins: [
    new VueLoaderPlugin(),
    new MiniCssExtractPlugin({
        // Options similar to the same options in webpackOptions.output
        // both options are optional
        filename: "[name].css",
        chunkFilename: "[id].css"
    })
  ]
};