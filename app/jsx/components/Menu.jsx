 import React from 'react';
export default class Menu extends React.Component {

  constructor(){
    super();
  }
  componentWillMount(){

  }


  render() {
    console.log("app render");
    return (
	<section id="main-slider" className="flexslider fullscreen">      	
            <header id="nav-header">
        		<nav id="nav-bar" className="bottom-bar outside fluid-width block-color nav-center sticky-nav animation fadeIn stick-it animated fadeInDownBig" >
            	
                	<div id="nav-wrapper">
            			<div className="logo-wrapper">
                        	<a href="http://demo.dethemes.com/forever/versions/onepage/index.html">
                    			<div className="css-logo rounded">
                   					<div className="css-logo-text">
                        				<strong>J</strong><i className="de-icon-heart-1"></i><strong>N</strong>
                    				</div>
                    			</div>
                       		</a>
                    		<div className="img-logo">
                    			<img src="images/slide1.jpg" />
                    		</div>
                		</div>
                    
                    	<div id="mobile-nav">
                    		<i className="de-icon-menu"></i>
                    	</div>
                
                		<ul id="nav-menu" className="nav-smooth-scroll">
                			<li className="first-child">
                        		<a href="#main-slider">HOME</a>
                        	</li>                   			
                    		<li>
                        		<a href="#our-story">STORY</a>
                        	</li>
                    		<li>
                            	<a href="#where-when">WHERE &amp; WHEN</a>
                            </li>
                            <li>
                            	<a href="#gallery-section">GALLERY</a>
                            </li>
                            <li className="first-child split-margin">
                            	<a href="#more-events">EVENTS</a>
                            </li>
                            <li>
                            	<a href="#groomsmen-section">GROOMSMEN</a>
                            </li>
                            <li>
                            	<a href="#bridesmaid-section">BRIDESMAID</a>
                            </li>                           
                            <li>
                            	<a href="#rsvp-section">RSVP</a>
                            </li>
                        	
                		</ul>
                    
                    	<div className="clearboth"></div>
                    
                	</div>
                
            	</nav>
        	</header>
            
		<ul className="flex-direction-nav"><li><a className="flex-prev flex-disabled" href="http://demo.dethemes.com/forever/versions/onepage/index.html#" tabIndex="-1">Previous</a></li><li><a className="flex-next flex-disabled" href="http://demo.dethemes.com/forever/versions/onepage/index.html#" tabIndex="-1">Next</a></li></ul></section>
		 );
  }
};