const Encore = require('@symfony/webpack-encore');
const path = require('path');

if (!Encore.isRuntimeEnvironmentConfigured()) {
    Encore.configureRuntimeEnvironment(process.env.NODE_ENV || 'dev');
}

Encore
    .setOutputPath('public/build/')
    .setPublicPath('/build')
    .addEntry('app', './assets/js/index.js')
    .splitEntryChunks()
    .enableSingleRuntimeChunk()
    .cleanupOutputBeforeBuild()
    .enableBuildNotifications()
    .enableSourceMaps(!Encore.isProduction())
    .enableVersioning(Encore.isProduction())
    .configureBabel((config) => {
        config.plugins.push('@babel/plugin-proposal-class-properties');
    })
    .configureBabelPresetEnv((config) => {
        config.useBuiltIns = 'usage';
        config.corejs = 3;
    })
    .enableSassLoader()
    .enableVueLoader()
;

let config = Encore.getWebpackConfig();

config.resolve.alias['@'] = path.resolve(__dirname, 'assets/js');
config.resolve.alias['@scss'] = path.resolve(__dirname, 'assets/scss');
config.resolve.alias['@img'] = path.resolve(__dirname, 'assets/img');
config.resolve.alias['@fonts'] = path.resolve(__dirname, 'assets/fonts');

module.exports = config;
