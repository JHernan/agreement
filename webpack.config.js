var Encore = require('@symfony/webpack-encore'); Encore
   .setOutputPath('public/build/')
   .setPublicPath('/build')
   .cleanupOutputBeforeBuild()
   .enableSourceMaps(!Encore.isProduction())
   .addEntry('js/app', './public/js/app.js')
   // .addStyleEntry('css/app', './public/css/app.scss')
   // .enableSassLoader()
   // .autoProvidejQuery()
   // Enable Vue loader
   .enableVueLoader()
;
module.exports = Encore.getWebpackConfig();
