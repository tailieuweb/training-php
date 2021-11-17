import React, { useContext, useState } from 'react'
import * as Yup from 'yup';
import { Formik, Field, Form, ErrorMessage } from 'formik';
import axios from "axios";
import { AuthContext } from '../Contexts/AuthContext';
import styles from '../Styles/Form.module.css';
import { Spin } from 'antd';
import 'antd/dist/antd.css';
import { Link } from 'react-router-dom';
import { useHistory } from 'react-router-dom';
import swal from 'sweetalert';

function RegisterPage() {
    const authCtx = useContext(AuthContext)
    const [feedBack, setFeedBack] = useState([]);
    const history = useHistory();

    const showFeedBackFor_SuccessfulTask = (title, msg) => {
        swal({
            title: title,
            text: msg,
            icon: "success",
            button: "Ok!",
        })
            .then((value) => {
                history.replace('/');
            });
    }

    const showFeedBackFor_UnsuccessfulTask = (err_title, err_msg) => {
        swal({
            title: err_title,
            text: err_msg,
            icon: "error",
            button: "Ok!",
        });
    }

    return (
        <Formik
            initialValues={{ email: '', name: '', password: '' }}
            validationSchema={Yup.object({
                email: Yup.string().email('Invalid email').required('Required'),
                name: Yup.string().required('Required'),
                password: Yup.string().required('Required')
            })}
            onSubmit={(values, { setSubmitting }) => {
                setTimeout(() => {
                    axios.post('/api/register', {
                        email: values.email,
                        name: values.name,
                        password: values.password
                    })
                        .then(response => {
                            if (response.status == 201 && response.data.token) {
                                authCtx.login(response.data.token);
                                setFeedBack(null);
                                // history.replace('/');
                                showFeedBackFor_SuccessfulTask("Done!", "Account successfully created!");
                            }
                        })
                        .catch(error => {
                            if (error.response.status == 422) {
                                setFeedBack(error.response.data.errors.email[0]);
                            }
                            else {
                                console.log(error.toJSON());
                                showFeedBackFor_UnsuccessfulTask("Error!", error.toJSON().message);
                            }
                        })
                    setSubmitting(false);
                }, 100);
            }}
        >
            {formik => (
                <div className={styles.container}>
                    <div className={styles.wrapper}>
                        <div className={styles.title}>
                            Register Form
                        </div>
                        <Form>
                            <div className={styles.field}>
                                <Field name="email" placeholder="Email" type="email" className={styles.field_input} />
                                <ErrorMessage name="email">{msg => <div className={styles.error}>{msg}</div>}</ErrorMessage>
                            </div>
                            <div className={styles.field}>
                                <Field name="name" placeholder="Username" type="name" className={styles.field_input} />
                                <ErrorMessage name="name">{msg => <div className={styles.error}>{msg}</div>}</ErrorMessage>
                            </div>
                            <div className={styles.field}>
                                <Field name="password" placeholder="Password" type="password" className={styles.field_input} />
                                <ErrorMessage name="password">{msg => <div className={styles.error}>{msg}</div>}</ErrorMessage>
                            </div>
                            {
                                feedBack ?
                                    <div className={styles.feedback}>
                                        {feedBack}
                                    </div>
                                    : null
                            }
                            <div className={styles.field}>
                                <Link style={{ padding: '15px 0 0' }} to="/login">If you had an accout, login here!</Link>
                            </div>
                            <div className={styles.field}>
                                {
                                    formik.isSubmitting ? <Spin style={{ padding: '25px 0' }} /> : <button type="submit" className={styles.input}>Submit</button>
                                }
                            </div>
                        </Form>
                    </div>
                </div>
            )}
        </Formik >
    )
}

export default RegisterPage




