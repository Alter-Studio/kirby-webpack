const merge = require('webpack-merge')
const webpack = require('webpack')
const common = require('./webpack.config.common')
const user = require('./scripts/utils/format-config')(require('./main.config.js'))
const ImageminPlugin = require('imagemin-webpack-plugin').default
const imageminMozjpeg = require('imagemin-mozjpeg')
const CopyWebpackPlugin = require('copy-webpack-plugin')
const WriteFilePlugin = require('write-file-webpack-plugin');

const cssLoaders = (
  [
    {
      loader: 'style-loader',
      options: {
        sourceMap: true
      }
    }
  ].concat(common.CSSLoaders)
)

// append resolve-url-loader before the preprocessor loader so that
// we can avoid broken relative url with the dev server
if (user.css.preprocessorLoader) {
  for (let i = 0; i < cssLoaders.length; i++) {
    const obj = cssLoaders[i]
    if (obj.loader !== user.css.preprocessorLoader) continue
    cssLoaders.splice(i, 0,
      {
        loader: 'resolve-url-loader',
        options: { sourceMap: true }
      }
    )
    break
  }
}

const devConfig = {
  entry: user.entries,
  module: {
    rules: [
      {
        test: user.css.sourceRegexExt,
        use: cssLoaders
      },
      {
        test: /\.(svg|png|jpg|gif|ttf|otf|woff|woff2|eot)$/,
        use: [
          {
            loader: 'file-loader',
            options: {}
          }
        ]
      }
    ]
  },
  plugins: [
    new webpack.NoEmitOnErrorsPlugin(),
    new webpack.HotModuleReplacementPlugin(),
    new WriteFilePlugin(),
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
  devtool: '#eval-source-map'
}

module.exports = merge(common.webpack, devConfig)
