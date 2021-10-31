import Loading from '../components/Base/Loading';

export default function Footer() {
  return (
    <div className="text-center my-5">
      {/* <Loading /> */}
      Copyright &copy; {new Date().getFullYear()} - All rights reserved.
    </div>
  );
}
