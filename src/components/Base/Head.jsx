import { Head as DefaultHead } from "next/document";

export default function Head() {
  return (
    <DefaultHead>
      <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet"
      />
      <link
        rel="stylesheet"
        href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
      />
      <link rel="icon" type="image/x-icon" href="/vietnam.png" />
      <link rel="icon" type="image/png" href="/vietnam.png" />
      <link rel="apple-touch-icon" href="/vietnam.png" />
    </DefaultHead>
  );
}
