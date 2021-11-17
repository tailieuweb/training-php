import axios from 'axios';
import { set } from 'lodash';
import React, { createContext, useContext, useEffect, useState } from 'react';

export const CategoriesContext = createContext();

const CategoriesContextProvider = ({children}) => {
    const [categories, setCategories] = useState();

    // Data Context
    const categoriesDataContext = {
        categories, setCategories,
    }

    // Return provider
    return (
        <CategoriesContext.Provider value={categoriesDataContext}>
            {children}
        </CategoriesContext.Provider>

    )
}

export default CategoriesContextProvider;
