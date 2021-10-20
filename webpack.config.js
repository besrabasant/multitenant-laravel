const path = require('path');
const ResolveTypeScriptPlugin = require("resolve-typescript-plugin").default;
const ForkTsCheckerWebpackPlugin = require('fork-ts-checker-webpack-plugin');
const LiveReloadPlugin = require('webpack-livereload-plugin');

module.exports = {
    resolve: {
        alias: {
            '@': path.resolve(__dirname, 'resources/js'),
        },
        fullySpecified: false,
        plugins: [new ResolveTypeScriptPlugin()]
    },
    plugins: [
        new ForkTsCheckerWebpackPlugin(),
        new LiveReloadPlugin()
    ],
};
