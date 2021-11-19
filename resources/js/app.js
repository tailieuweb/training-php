require('./bootstrap');
import React from 'react';
import { render } from 'react-dom';
import Main from './components/Main'
import Admin from './components/Admin/Admin';

render(<Admin />, document.getElementById('app'));
