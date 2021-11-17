import React, {createContext, useState} from 'react';

export const ShoppingCartContext = createContext();

const ShoppingCartContextProvider = ({children}) => {
    // State
    const [SC_products, setSC_Products] = useState([]);
    const [isStateCart, setIsStateCart] = useState(false);

    

    function formatCash(str) {
        return str.split('').reverse().reduce((prev, next, index) => {
            return ((index % 3) ? next : (next + '.')) + prev
        })
   }

    // Data
    const shoppingCartData = {
        SC_products, setSC_Products, isStateCart, setIsStateCart, formatCash,
    };

    // Return Provider
    return (
        <ShoppingCartContext.Provider value={shoppingCartData}>
            {children}
        </ShoppingCartContext.Provider>
    )
}

export default ShoppingCartContextProvider;