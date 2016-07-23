var webpack = require('webpack')
var path = require('path')
module.exports = {
    entry: "./entry.js",
    output: {
        path: path.join(__dirname, 'dist'),
        filename: "bundle.js"
    },
    module: {
        loaders: [
            { test: /\.css$/, loader: "style!css" }
        ]
    },
	plugins: [
    new webpack.optimize.UglifyJsPlugin({
      compressor: {
        warnings: false,
      },
    }),
    new webpack.optimize.OccurenceOrderPlugin()
  ],
};