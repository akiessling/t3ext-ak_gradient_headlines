const webpack = require('webpack')
module.exports = {
    filenameHashing: false,
    productionSourceMap: false,
    css: {
        extract: false
    },
    configureWebpack: {
        plugins: [
            new webpack.optimize.LimitChunkCountPlugin({
                maxChunks: 1
            })
        ]
    },
    chainWebpack: config => {
        config.optimization.delete('splitChunks')
    }
}