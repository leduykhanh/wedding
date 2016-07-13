 import React from 'react';
 import { StickyContainer, Sticky } from 'react-sticky';
export default class Menu extends React.Component {

  constructor(){
    super();
  }
  componentWillMount(){

  }


  render() {
    return (
	<section id="main-slider" className="flexslider fullscreen">
		<header id="nav-header">
			<nav id="nav-bar" className="bottom-bar outside fluid-width block-color nav-center sticky-nav animation fadeIn  animated fadeInDownBig" >

				<div id="nav-wrapper">
					<div className="logo-wrapper">
						<a href="http://jangkoo.com/wedding/">
							<div className="css-logo rounded">
								<div className="css-logo-text">
									<strong>J</strong><i className="fa fa-heart-o"></i><strong>N</strong>
								</div>
							</div>
						</a>
					</div>

					<div id="mobile-nav">
						<i className="fa fa-diamond-2"></i>
					</div>

					<ul id="nav-menu" className="nav-smooth-scroll">
						<li className="first-child">
							<a href="#main-slider">HOME</a>
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

	</section>
		 );
  }
};