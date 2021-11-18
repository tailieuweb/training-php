import React from 'react';
import { BrowserRouter as Router, Route, Link } from "react-router-dom";
import Header from '../../components/Header';
const Pass = () => {
    const handleFormSubmit = (e) => {
        e.preventDefault();

        let email = e.target.elements.email?.value;
        let password = e.target.elements.password?.value;

        console.log(email, password);
    };
    return (
        <div>
             <Header/>
            <div className='h-screen flex bg-gray-bg1'>
                <div className='w-full max-w-md m-auto bg-white rounded-lg border border-primaryBorder shadow-default py-10 px-16'>
                    <h1 className='text-2xl font-medium text-primary mt-4 mb-12 text-center'>
                        FORGOT PASSWORD
                    </h1>

                    <form onSubmit={handleFormSubmit}>
                        <div>
                            <label htmlFor='email'></label>
                            <input
                                type='email'
                                className={`w-full p-2 text-primary border rounded-md outline-none text-sm transition duration-150 ease-in-out mb-4`}
                                id='email'
                                placeholder='Your Email'
                            />
                        </div>
                        <div>
                            <label htmlFor='verification'></label>
                            <input
                                type='text'
                                className={`w-full p-2 text-primary border rounded-md outline-none text-sm transition duration-150 ease-in-out mb-4`}
                                id='verification'
                                placeholder='verification code'
                            />
                        </div>
                        <div>
                            <label htmlFor='newpassword'></label>
                            <input
                                type='password'
                                className={`w-full p-2 text-primary border rounded-md outline-none text-sm transition duration-150 ease-in-out mb-4`}
                                id='newpassword'
                                placeholder='New PassWord'
                            />
                        </div>

                        <div className={`bg-blue-500 py-2 px-4 text-sm text-white rounded border border-green focus:outline-none focus:border-green-dark text-center`}>
                            <button>
                                <Link to="./Login">Confirm</Link>
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    );
};

export default Pass;
