import React from 'react';
import Menu from './Menu.jsx'
import Countdown from './Countdown.jsx'
import Couple from './Couple.jsx'
import Slider from './Slider.jsx'
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
	<div>
        <div className="wrapper">
            {this.props.children}
			<Slider></Slider>
			<Menu></Menu>
			<CountDown options={OPTIONS} />
        </div>
		<Countdown />
        <section id="content">
            <Couple />
        </section>
	</div>
    );
  }
};