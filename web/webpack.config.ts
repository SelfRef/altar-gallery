import * as webpack from "webpack";
import * as path from "path";
export default (env: string): webpack.Configuration => {
  return {
    entry: "./src/ts/boot.ts",
    output: {
      path: path.resolve(__dirname, "dist"),
      filename: "assets/bundle.js",
      //publicPath: "/dist/"
    },
    module: {
      rules: [
        {
          test: /\.vue$/,
          include: path.resolve(__dirname, "src"),
          loader: "vue-loader"
        },
        {
          test: /\.ts$/,
          include: path.resolve(__dirname, "src/ts"),
          loader: "ts-loader",
          options: { appendTsSuffixTo: [/\.vue$/] }
        },
        {
          test: /\.scss$/,
          include: path.resolve(__dirname, "src/scss"),
          use: [
            { loader: "style-loader" },
            { loader: "css-loader" },
            { loader: "sass-loader" }
          ]
        },
        {
          test: /\.css$/,
          use: [
            { loader: "style-loader" },
            { loader: "css-loader" }
          ]
        },
        {
          test: /\.(png|jpg|gif)$/,
          loader: 'file-loader',
          options: {
            name: '[name].[ext]?[hash]'
          }
        },
        {
          test: /\.(svg|eot|ttf|woff|woff2)$/,
          loader: 'url-loader'
        }
      ]
    },
    resolve: {
      extensions: [".vue", ".ts", ".scss", ".css", ".js"]
    },
    devServer: {
      contentBase: path.join(__dirname, "dist"),
      historyApiFallback: true
    }
  };
}