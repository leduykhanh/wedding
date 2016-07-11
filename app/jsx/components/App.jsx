import React from 'react';
import Menu from './Menu.jsx'
import Countdown from './Countdown.jsx'
import Couple from './Couple.jsx'
import Slider from './Slider.jsx'
import CountDown from 'react-count-down'
import Preload from 'react-preload'
import { StickyContainer, Sticky } from 'react-sticky';

export default class App extends React.Component {

  constructor(){
    super();
  }
  componentWillMount(){

  }

onStickyStateChange(isSticky) {
      console.log(`Am I sticky?: ${ isSticky ? 'Yep!' : 'Nope!'}`);
    }
  render() {
    console.log("app render");
	var OPTIONS = { endDate: '06/03/2018 10:12 AM', prefix: 'until my birthday!' }

	var content = 	<div>
		<StickyContainer >
             {this.props.children}
			<Slider></Slider>
			<Sticky onStickyStateChange={this.onStickyStateChange.bind(this)}>
				<Menu></Menu>
			</Sticky>
			<section id="">
				<img src="http://www.agentevolution.com/wp-content/uploads/2014/08/thumbnails.png" />
				<img src="http://www.agentevolution.com/wp-content/uploads/2014/08/thumbnails.png" />
				<img src="http://www.agentevolution.com/wp-content/uploads/2014/08/thumbnails.png" />
				<img src="http://www.agentevolution.com/wp-content/uploads/2014/08/thumbnails.png" />
				<img src="http://www.agentevolution.com/wp-content/uploads/2014/08/thumbnails.png" />
				<img src="http://www.agentevolution.com/wp-content/uploads/2014/08/thumbnails.png" />
			</section>
			</StickyContainer>
		</div>;
	var loadingIndicator =        (
			<div id="preloader" style="display: block;">
			
				<div className="alignment">
					<div className="v-align center-middle"> 
						<div className="heart-animation">                	
							<i className="fa fa-heart fa-12"></i>ookgnaJ
						</div>
						<div className="heart-animation-reverse">
							<i className="fa fa-heart fa-12">Nancy</i>
						</div>     
						 
					</div>
				</div>
            
			</div> );
    return (
		<Preload
		  loadingIndicator={loadingIndicator}
		  images={[]}
		  autoResolveDelay={3000}
		  onError={this._handleImageLoadError}
		  onSuccess={this._handleImageLoadSuccess}
		  resolveOnError={true}
		  mountChildren={true}
		  >
			{content}
		</Preload>

    );
  }
};