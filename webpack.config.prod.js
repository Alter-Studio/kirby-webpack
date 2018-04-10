const path = require('path')
const webpack = require('webpack')
const merge = require('webpack-merge')
const ExtractTextPlugin = require('extract-text-webpack-plugin')
const common = require('./webpack.config.common')
const user = require('./scripts/utils/format-config')(require('./main.config.js'))
const ImageminPlugin = require('imagemin-webpack-plugin').default
const imageminMozjpeg = require('imagemin-mozjpeg')
const CopyWebpackPlugin = require('copy-webpack-plugin')
const SpriteLoaderPlugin = require('svg-sprite-loader/plugin')

const prodConfig = {
  entry: user.entries,
  module: {
    rules: [
      {
        test: user.css.sourceRegexExt,
        use: ExtractTextPlugin.extract({
          fallback: 'style-loader',
          use: common.CSSLoaders
        })
      },
      {
        test: /\.svg$/,
        loader: 'svg-sprite-loader',
        //include: 'src/icons',
        options: {
          extract: true,
          spriteFilename: 'assets/icons/sprites.svg',
        },
      },
    ]
  },
  plugins: [
    // Extract all css into one file
    new ExtractTextPlugin({
      filename: (getPath) => {
        const ext = path.extname(getPath('[name]'))
        // If you import css from js entry files, these lines avoid to
        // override the js files with the extract-text-plugin output.
        // Instead, replace the bundle filepath extension by .css
        return (ext === '.css')
          ? getPath('[name]')
          : getPath('[name]').slice(0, -ext.length) + '.css'
      },
      allChunks: true
    }),
    new SpriteLoaderPlugin(),
    // Minification and size optimization
    new webpack.DefinePlugin({ 'process.env': { 'NODE_ENV': '"production"' } }),
    new webpack.optimize.UglifyJsPlugin({
      compress: { warnings: false, screw_ie8: true, drop_console: true },
      output: { comments: false },
      mangle: { screw_ie8: true },
      sourceMap: true
    }),
    new webpack.optimize.OccurrenceOrderPlugin(),
    new CopyWebpackPlugin([{
        from:'src/images',
        to:'assets/images'
    }]),
    new ImageminPlugin({
      // externalImages: {
      //   context: 'src', // Important! This tells the plugin where to "base" the paths at
      //   //sources: 'src/images/**/*',
      //   sources: glob.sync('src/images/**/*'),
      //   destination: 'www/assets'
      // },
      optipng: { optimizationLevel: 7 },
      gifsicle: { optimizationLevel: 3 },
      pngquant: { quality: '65-90', speed: 4 },
      svgo: { removeUnknownsAndDefaults: false, cleanupIDs: false },
      plugins: [imageminMozjpeg({ quality: 75 })]
    })    
  ],
  devtool: '#source-map',
  bail: true
}

module.exports = merge(common.webpack, prodConfig)
