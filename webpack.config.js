const Encore = require('@symfony/webpack-encore');
const dotenv = require('dotenv');

if (!Encore.isRuntimeEnvironmentConfigured()) {
    Encore.configureRuntimeEnvironment(process.env.NODE_ENV || 'dev');
}

Encore
    .setOutputPath('public/build/')
    .setPublicPath('/build')
    .addEntry('app', './assets/app.js')
    .splitEntryChunks()
    .enableSingleRuntimeChunk()
    .cleanupOutputBeforeBuild()
    .enableBuildNotifications()
    .enableSourceMaps(!Encore.isProduction())
    .enableVersioning(Encore.isProduction())
    .configureBabelPresetEnv((config) => {
        config.useBuiltIns = 'usage';
        config.corejs = 3;
    })
    .enableSassLoader(options => {
        const env = dotenv.config();

        if (env.error) {
            throw env.error;
        }

        options.additionalData = "$baseUrl: \"" + env.parsed.BASE_URL + "\";";
    })
;

module.exports = Encore.getWebpackConfig();
