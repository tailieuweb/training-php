import React, { useState } from 'react';

import Navigation from '../Components/Navigation';
import HeaderLayout from '../Components/Layouts/HeaderLayout';
import FooterSection from '../Components/FooterSection';


function LayoutWrapper(props) {
    const [isChecked, setIsChecked] = useState(false);

    return (
        <div className="layout-wrapper">
            <div className="header-section">
                <HeaderLayout
                    isChecked={isChecked}
                    setIsChecked={setIsChecked}
                ></HeaderLayout>
            </div>

            <div className="body-section">
                <div className="body-content">
                    {/* Checkbox for checking if menu is displayed: */}
                    <input
                        type="checkbox"
                        name=""
                        id="checkbox-for-Menu"
                        checked={isChecked}
                        onChange={() => { return setIsChecked(!isChecked); }}>
                    </input>

                    {/* Overlay: */}
                    <label className="overlay" htmlFor="checkbox-for-Menu"></label>

                    {/* Category menu: */}
                    <div className="category-menu">
                        <Navigation
                            isChecked={isChecked}
                            setIsChecked={setIsChecked}
                        ></Navigation>
                    </div>

                    {/* Page main content: */}
                    {props.mainContent()}
                </div>
            </div>
            <FooterSection></FooterSection>
        </div>
    );
}

export default LayoutWrapper;