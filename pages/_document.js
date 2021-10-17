import Document, { Html, Main, NextScript } from "next/document";
import Head from "../src/components/Base/Head";
import Script from '../src/components/Base/Script';

class MyDocument extends Document {
  static async getInitialProps(ctx) {
    const initialProps = await Document.getInitialProps(ctx);
    return { ...initialProps };
  }

  render() {
    return (
      <Html>
        <Head />
        <body>
          <Main />
          <Script />
          <NextScript />
        </body>
      </Html>
    );
  }
}

export default MyDocument;
