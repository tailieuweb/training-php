import { Fragment, useState } from "react";
import { Disclosure, Menu, Transition } from "@headlessui/react";
import { BellOutline, MenuOutline, XOutline } from "heroicons-react";
import routes from "../constant/routes";
import { useCookies } from "react-cookie";
import { useHistory } from "react-router";
import { useDispatch, useSelector } from "react-redux";
import PropTypes from "prop-types";
import { logoutRequest } from "../redux/actions";
import env from "../env";
import { Link } from "react-router-dom";

const navigation = [{ name: "Home", href: routes.homepage, current: true }];

function classNames(...classes) {
  return classes.filter(Boolean).join(" ");
}

export default function Header(props) {
  const dispatch = useDispatch();
  const profile = useSelector(state => state.getProfileReducer.data);
  // console.log("PROFILE: ", profile);
  let history = useHistory();
  const [cookies, setCookie, removeCookie] = useCookies(["_token"]);
  //
  const onHandleLogin = () => {
    history.push(routes.login);
  };
  //
  const onHandleRegister = () => {
    history.push(routes.register);
  };
  //
  const onHandleLogout = () => {
    dispatch(logoutRequest());
  };
  //
  const change = e => {
    props.parenCallBack(e.target.value);
  };
  //
  //ALL CATEGORIES
  Header.propTypes = {
    name: PropTypes.string,
  };

  Header.defaultProps = {
    name: "",
  };
  //lấy danh sách categories
  const { listCategories } = props;
  // Lấy danh sách categories nổi bật
  const { featureCategories } = props;
  return (
    <Disclosure as="nav" className="relative bg-pink-500 ">
      {({ open }) => (
        <>
          <div className="px-2 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div className="relative flex items-center justify-between h-16">
              <div className="absolute inset-y-0 left-0 flex items-center sm:hidden">
                {/* Mobile menu button*/}
                <Disclosure.Button className="inline-flex items-center justify-center p-2 text-gray-400 rounded-md hover:text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white">
                  <span className="sr-only">Open main menu</span>
                  {open ? (
                    <XOutline className="block w-6 h-6" aria-hidden="true" />
                  ) : (
                    <MenuOutline className="block w-6 h-6" aria-hidden="true" />
                  )}
                </Disclosure.Button>
              </div>
              <div className="flex items-center justify-center flex-1 sm:items-stretch sm:justify-start">
                <div className="flex items-center flex-shrink-0">
                  <img
                    className="block w-auto h-8 pr-32 sm:pr-0 sm:hidden lg:hidden"
                    src="/logo/logo-blog.png"
                    alt="chicken"
                  />
                  <img
                    className="hidden w-auto h-8 lg:block"
                    src="/logo/logo-blog.png"
                    alt="chicken"
                  />
                </div>
                <div className="hidden sm:ml-0 md:ml-6 sm:block">
                  <div className="flex inline lg:space-x-4">
                    {navigation.map(item => (
                      <Link
                        key={item.name}
                        to={item.href}
                        className={classNames(
                          item.current
                            ? "bg-gray-900 text-white"
                            : "text-gray-300 hover:bg-gray-700 hover:text-white",
                          "px-3 py-2 rounded-md text-sm font-medium"
                        )}
                        aria-current={item.current ? "page" : undefined}
                      >
                        {item.name}
                      </Link>
                    ))}

                    {listCategories ? (
                      <div className="relative inline-flex ">
                        <svg
                          className="absolute top-0 right-0 w-3 h-2 m-3 pointer-events-none sm:h-4"
                          xmlns="http://www.w3.org/2000/svg"
                          viewBox="0 0 412 232"
                        >
                          <path
                            d="M206 171.144L42.678 7.822c-9.763-9.763-25.592-9.763-35.355 0-9.763 9.764-9.763 25.592 0 35.355l181 181c4.88 4.882 11.279 7.323 17.677 7.323s12.796-2.441 17.678-7.322l181-181c9.763-9.764 9.763-25.592 0-35.355-9.763-9.763-25.592-9.763-35.355 0L206 171.144z"
                            fill="#648299"
                            fillRule="nonzero"
                          />
                        </svg>
                        <select
                          onChange={e => change(e)}
                          className="px-3 py-2 text-base font-medium text-gray-300 bg-gray-600 rounded-md appearance-none hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white"
                        >
                          <option>Categories</option>
                          <option value="*">AllCategories</option>
                          {listCategories.map(post => (
                            <option value={post.id} key={post.id}>
                              {post.name}
                            </option>
                          ))}
                        </select>
                      </div>
                    ) : (
                      <div></div>
                    )}
                  </div>
                </div>
              </div>
              <div className="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
                {/* Profile dropdown */}
                {cookies._token ? (
                  <Menu as="div" className="relative ml-3">
                    <div>
                      <Menu.Button className="flex text-sm bg-gray-800 rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white">
                        <span className="sr-only">Open user menu</span>
                        <img
                          className="w-8 h-8 rounded-full"
                          src={
                            localStorage.getItem("avatar")
                              ? localStorage.getItem("avatar")
                              : "./logo-chicken.png"
                          }
                          alt=""
                        />
                      </Menu.Button>
                    </div>
                    <Transition
                      as={Fragment}
                      enter="transition ease-out duration-100"
                      enterFrom="transform opacity-0 scale-95"
                      enterTo="transform opacity-100 scale-100"
                      leave="transition ease-in duration-75"
                      leaveFrom="transform opacity-100 scale-100"
                      leaveTo="transform opacity-0 scale-95"
                    >
                      <Menu.Items className="absolute right-0 z-20 w-48 py-1 mt-2 origin-top-right bg-white rounded-md shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none">
                        <Menu.Item>
                          {({ active }) => (
                            <Link
                              to={routes.profile}
                              className={classNames(
                                active ? "bg-gray-100" : "",
                                "block px-4 py-2 text-sm text-gray-700"
                              )}
                            >
                              Your Profile
                            </Link>
                          )}
                        </Menu.Item>
                        <Menu.Item>
                          {({ active }) => (
                            <Link
                              to={routes.changepassword}
                              className={classNames(
                                active ? "bg-gray-100" : "",
                                "block px-4 py-2 text-sm text-gray-700"
                              )}
                            >
                              Change Password
                            </Link>
                          )}
                        </Menu.Item>
                        <Menu.Item>
                          {({ active }) => (
                            <p
                              className={classNames(
                                active ? "bg-gray-100" : "",
                                "block px-4 py-2 text-sm text-gray-700"
                              )}
                              onClick={onHandleLogout}
                            >
                              Sign out
                            </p>
                          )}
                        </Menu.Item>
                      </Menu.Items>
                    </Transition>
                  </Menu>
                ) : (
                  <>
                    <div className="hidden inline sm:block">
                      <button
                        type="button"
                        className="mr-4 px-3 py-2 text-sm font-medium text-gray-300 bg-gray-600 rounded-md appearance-none md:text-base hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white"
                        onClick={onHandleLogin}
                      >
                        Login
                      </button>
                      <button
                        type="button"
                        className="px-3 py-2 text-sm font-medium text-gray-300 bg-gray-600 rounded-md appearance-none md:text-base hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white"
                        onClick={onHandleRegister}
                      >
                        Register
                      </button>
                    </div>
                    <div className="inline sm:hidden">
                      <div className="">
                        <button
                          type="button"
                          className="px-3 py-2 text-sm font-medium text-gray-300 bg-gray-600 rounded-md appearance-none md:text-base hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white"
                          onClick={onHandleLogin}
                        >
                          Login
                        </button>
                        <button
                          type="button"
                          className="px-3 py-2 text-sm font-medium text-gray-300 bg-gray-600 rounded-md appearance-none md:text-base hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white"
                          onClick={onHandleRegister}
                        >
                          Register
                        </button>
                      </div>
                    </div>
                  </>
                )}
              </div>
            </div>
          </div>

          <Disclosure.Panel className="sm:hidden">
            <div className="px-2 pt-2 pb-3 space-y-1">
              {navigation.map(item => (
                <Link
                  key={item.name}
                  to={item.href}
                  className={classNames(
                    item.current
                      ? "bg-gray-900 text-white"
                      : "text-gray-300 hover:bg-gray-700 hover:text-white",
                    "block px-3 py-2 rounded-md text-base font-medium"
                  )}
                  aria-current={item.current ? "page" : undefined}
                >
                  {item.name}
                </Link>
              ))}
              {featureCategories ? (
                <div className="relative inline-flex ">
                  <svg
                    className="absolute top-0 right-0 w-3 h-2 m-3 pointer-events-none sm:h-4"
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 412 232"
                  >
                    <path
                      d="M206 171.144L42.678 7.822c-9.763-9.763-25.592-9.763-35.355 0-9.763 9.764-9.763 25.592 0 35.355l181 181c4.88 4.882 11.279 7.323 17.677 7.323s12.796-2.441 17.678-7.322l181-181c9.763-9.764 9.763-25.592 0-35.355-9.763-9.763-25.592-9.763-35.355 0L206 171.144z"
                      fill="#648299"
                      fillRule="nonzero"
                    />
                  </svg>
                  <select
                    onChange={e => change(e)}
                    className="px-3 py-2 text-base font-medium text-gray-300 bg-gray-600 rounded-md appearance-none hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white"
                  >
                    <option>Feature Categories</option>
                    <option value="*">AllCategories</option>
                    {featureCategories.map(post => (
                      <option value={post.id} key={post.id}>
                        {post.name}
                      </option>
                    ))}
                  </select>
                </div>
              ) : (
                <div></div>
              )}
              {listCategories ? (
                <div className="relative inline-flex ">
                  <svg
                    className="absolute top-0 right-0 w-3 h-2 m-3 pointer-events-none sm:h-4"
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 412 232"
                  >
                    <path
                      d="M206 171.144L42.678 7.822c-9.763-9.763-25.592-9.763-35.355 0-9.763 9.764-9.763 25.592 0 35.355l181 181c4.88 4.882 11.279 7.323 17.677 7.323s12.796-2.441 17.678-7.322l181-181c9.763-9.764 9.763-25.592 0-35.355-9.763-9.763-25.592-9.763-35.355 0L206 171.144z"
                      fill="#648299"
                      fillRule="nonzero"
                    />
                  </svg>
                  <select
                    onChange={e => change(e)}
                    className="px-3 py-2 text-base font-medium text-gray-300 bg-gray-600 rounded-md appearance-none hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white"
                  >
                    <option value="*">Categories</option>
                    {listCategories.map(post => (
                      <option value={post.id} key={post.id}>
                        {post.name}
                      </option>
                    ))}
                  </select>
                </div>
              ) : (
                <div></div>
              )}
            </div>
          </Disclosure.Panel>
        </>
      )}
    </Disclosure>
  );
}
