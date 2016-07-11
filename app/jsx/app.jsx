import React from 'react';
import  { Router, IndexRoute, Route } from 'react-router';
import {TestReact} from './components/TestReact.jsx';
import {NoMatch} from './components/NoMatch.jsx';
import App from './components/App.jsx';
import { hashHistory } from 'react-router'
import ReactDOM from 'react-dom';

var routes = [
        <Route path="/" component={App}>
			<Route path="test" component={TestReact}>
			</Route>
		</Route>
		];
		
ReactDOM.render(<Router routes={routes} history={hashHistory}/>, document.getElementById('react_content'));
//ReactDOM.render(<App history={hashHistory}/>, document.getElementById('react_content'));

