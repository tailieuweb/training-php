import React from "react";
import { BrowserRouter as Router, Route, Link } from "react-router-dom";
import Header from "../../components/Header";
const Register = () => {
  const handleFormSubmit = e => {
    e.preventDefault();

    // let email = e.target.elements.email ? .value;
    // let password = e.target.elements.password ? .value;
    // let firtname = e.target.elements.firtname ? .value;

    // console.log(email, password);
  };
  return (
    // Form Register
    <div>
      <Header />
      <div className="h-screen flex bg-gray-bg1">
        <div className="w-full max-w-md m-auto bg-white rounded-lg border border-primaryBorder shadow-default py-6 px-16">
          <h1 className="text-2xl font-medium text-primary mt-4 mb-12 text-center">
            REGISTER ACCOUNT{" "}
          </h1>
          <form onSubmit={handleFormSubmit}>
            <div>
              <label htmlFor="email"> </label>{" "}
              <input
                type="email"
                className={`w-full p-2 text-primary border rounded-md outline-none text-sm transition duration-150 ease-in-out mb-2`}
                id="email"
                placeholder="Your Email"
              />
            </div>{" "}
            <div>
              <label htmlFor="firtname"> </label>{" "}
              <input
                type="text"
                className={`w-full p-2 text-primary border rounded-md outline-none text-sm transition duration-150 ease-in-out mb-2`}
                id="firtname"
                placeholder="Firt Name"
              />
            </div>{" "}
            <div>
              <label htmlFor="lastname"> </label>{" "}
              <input
                type="text"
                className={`w-full p-2 text-primary border rounded-md outline-none text-sm transition duration-150 ease-in-out mb-2`}
                id="lastname"
                placeholder="Last Name"
              />
            </div>{" "}
            <div>
              <label htmlFor="password"> </label>{" "}
              <input
                type="password"
                className={`w-full p-2 text-primary border rounded-md outline-none text-sm transition duration-150 ease-in-out mb-2`}
                id="password"
                placeholder="Your Password"
              />
            </div>{" "}
            <div>
              <label htmlFor="confirmpassword"> </label>{" "}
              <input
                type="password"
                className={`w-full p-2 text-primary border rounded-md outline-none text-sm transition duration-150 ease-in-out mb-2`}
                id="confirmpassword"
                placeholder="Confirm Password"
              />
            </div>{" "}
            <div>
              <label htmlFor="Gender"> </label>{" "}
              <select
                className={`w-full p-2 text-primary border rounded-md outline-none text-sm transition duration-150 ease-in-out mb-2`}
              >
                <option> Male </option> <option> Female </option>{" "}
              </select>{" "}
            </div>{" "}
            <div>
              <label htmlFor="phone"> </label>{" "}
              <input
                type="text"
                className={`w-full p-2 text-primary border rounded-md outline-none text-sm transition duration-150 ease-in-out mb-2`}
                id="phone"
                placeholder="Phone"
              />
            </div>{" "}
            <div className="text-center">
              <label htmlFor="policy"> Aggree policy </label>{" "}
              <input
                type="checkbox"
                className={`w-full p-2 text-primary border rounded-md outline-none text-sm transition duration-150 ease-in-out mb-2`}
                id="policy"
              />
            </div>{" "}
            <div
              className={`text-center bg-green-600 py-2 px-10 text-sm text-white rounded border border-green focus:outline-none focus:border-green-dark`}
            >
              <Link to="./Login"> Register </Link>{" "}
            </div>
            <div className="flex justify-center items-center mt-6">
              <button
                className={` bg-blue-500 py-2 px-4 text-sm text-white rounded border border-green focus:outline-none focus:border-green-dark`}
              >
                <Link to="./Login"> Login </Link>{" "}
              </button>{" "}
            </div>{" "}
          </form>{" "}
        </div>{" "}
      </div>{" "}
    </div>
  );
};

export default Register;
