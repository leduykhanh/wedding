import React from 'react';
import Menu from './Menu.jsx'
import Countdown from './Countdown.jsx'
import CountDown from 'react-count-down'
export default class App extends React.Component {

  constructor(){
    super();
  }
  componentWillMount(){

  }


  render() {
    console.log("app render");
	var OPTIONS = { endDate: '06/03/2018 10:12 AM', prefix: 'until my birthday!' }
    return (
        <div className="wrapper">
            {this.props.children}
			<Menu></Menu>
			<CountDown options={OPTIONS} />
			<Countdown />
        </div>
    );
  }
};