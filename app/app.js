/*
*	Author: Jean-Pierre Sierens
*	===========================================================================
*/

import React from 'react';
import ReactDOM from 'react-dom';
import SearchableTable from './SearchableTable';
import {data} from './data';
import TestReact from './jsx/components/TestReact.jsx'
// Filterable CheatSheet Component
ReactDOM.render( <TestReact data={data}/>, document.getElementById('content') );