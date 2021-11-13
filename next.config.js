const { i18n } = require("./next-i18next.config");

module.exports = {
  i18n,
  webpack: function (config) {
    config.module.rules.push({ test: /\.svg$/, use: ["url-loader"] });
    return config;
  },
};
