import React from "react";
import Admin_Menu from "./Admin_Menu";

export default function Admin({ setRoleChange }) {
    return (
        <div className="admin">
            <Admin_Menu
                setRoleChange={setRoleChange}
            />
        </div>
    );
}
