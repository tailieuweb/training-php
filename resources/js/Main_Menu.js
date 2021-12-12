import React, { useState }  from 'react'
import Main from './components/Main'
import Admin from './components/Admin/Admin';

export default function Main_Menu() {
    const [roleOfUser, setRoleOfUser] = useState({
        roleUser: "admin",
    });
    const [roleChange, setRoleChange] = useState({
        role: "user",
    })
    
    if (roleChange.role === "user") {
        return (
            <Main 
                role={roleOfUser}
                setRoleChange={setRoleChange}
                setRoleOfUser={setRoleOfUser}
            />
        );
    } else {
        return (
            <Admin 
                setRoleChange={setRoleChange}
            />
        );
    }
}
