require('./components/MainForm');
require('./bootstrap');

import React from 'react';
import { render } from 'react-dom';
//import { Router, Route, browserHistory } from 'react-router';

import MainForm from './components/MainForm';

render(<MainForm />, document.getElementById('MainForm'));
