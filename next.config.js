module.exports = {
  webpack: function (config) {
    config.module.rules.push({ test: /\.svg$/, use: ["url-loader"] });
    return config;
  },
};
