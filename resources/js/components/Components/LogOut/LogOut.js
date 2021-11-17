import React, { useContext, useCallback } from 'react'
import styles from './Styles/Logout.module.css'
import { useHistory } from 'react-router'
import { AuthContext } from '../../Contexts/AuthContext'
import axios from 'axios'

function LogOut() {
    const authCtx = useContext(AuthContext)
    const history = useHistory()
    const logout = useCallback(
        () => {
            axios.post('/api/logout', null, {
                headers: {
                    Authorization: `Bearer ${authCtx.token}`
                }
            }).then(response => {
                console.log(response.data.message);
            })
            authCtx.logout()

            history.replace('/')
        },
        [authCtx.token],
    )

    return (
        <React.Fragment>
            <div onClick={logout} className={styles.logout}>Log out</div>
        </React.Fragment>
    )
}

export default LogOut
