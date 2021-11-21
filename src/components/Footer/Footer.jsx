import React, { useState, useEffect } from "react";
import './Footer.css'

export function Footer() {
    return (
        <footer className="footer">
            <div className="container">
                <div className="row">
                    <div className="col-lg-3 col-sm-6">
                        <div className="widget">
                            <div className="image-logo"></div>
                            <p>7th Harley Place, London W1G 8LZ United Kingdom</p>
                            <h6><span>Call us: </span>(+880) 111 222 3456</h6>
                        </div>
                    </div>
                    <div className="col-lg-3 col-sm-6">
                        <div className="widget">
                            <h4>Legal</h4>
                            <ul>
                                <li><a className="text-ami" href="#">Terms of Use</a></li>
                                <li><a className="text-ami" href="#">Privacy Policy</a></li>
                                <li><a className="text-ami" href="#">Security</a></li>
                            </ul>
                        </div>
                    </div>
                    <div className="col-lg-3 col-sm-6">
                        <div className="widget">
                            <h4>Account</h4>
                            <ul>
                                <li><a className="text-ami" href="#">My Account</a></li>
                                <li><a className="text-ami" href="#">Watchlist</a></li>
                                <li><a className="text-ami" href="#">Collections</a></li>
                                <li><a className="text-ami" href="#">User Guide</a></li>
                            </ul>
                        </div>
                    </div>
                    <div className="col-lg-3 col-sm-6">
                        <div className="widget">
                            <h4>Newsletter</h4>
                            <p>Subscribe to our newsletter system now to get latest news from us.</p>
                            <form action="#">
                                <input className="input-from" type="text" placeholder="Enter your email.." />
                                <button>SUBSCRIBE NOW</button>
                            </form>
                        </div>
                    </div>
                </div>
                <hr />
            </div>
            <div className="copyright">
                <div className="container">
                    <div className="row">
                        <div className="col-lg-6 text-center text-lg-left">
                            <div className="copyright-content">
                                <p><a className="text-ami" target="_blank" href="https://github.com/mytien0906/movie-reactjs">GitHub</a></p>
                            </div>
                        </div>
                        <div className="col-lg-6 text-center text-lg-right">
                            <div className="copyright-content">
                                <a className="text-ami" href="#">
                                    Back to top
                                    <i className="icofont icofont-arrow-up"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div className="bg"></div>
            <div className="bg bg2"></div>
            <div className="bg bg3"></div>
        </footer>
    )
}