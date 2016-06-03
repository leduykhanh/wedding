  import React from 'react';

export default class Couple extends React.Component {

  constructor(){
    super();
  }
  componentWillMount(){

  }


  render() {
    return (
            <section id="couple">

                <div className="container">
                	<div className="row">
                    	<div className="col-md-6">
                        	<div className="photo-item frame-border animation fadeInLeft animated" >
                               	<img src="./app/images/him2.jpg" alt="" className="hover-animation image-zoom-in" />
                           		<div className="layer wh100 hidden-black-overlay hover-animation fade-in">
                            	</div>

                                <div className="layer wh100 hidden-link hover-animation delay1 fade-in">
                                    <div className="alignment">
                                    	<div className="v-align center-middle">

                                     		<a href="http://demo.dethemes.com/forever/versions/onepage/images/attachment-couple.jpg" className="magnific-zoom">
        										<div className="de-icon circle light medium-size inline">
            										<i className="de-icon-zoom-in"></i>
            									</div>
        									</a>

                                            <a className="magnific-ajax" href="http://demo.dethemes.com/forever/versions/onepage/him.html">
        										<div className="de-icon circle light medium-size inline">
            										<i className="de-icon-link"></i>
            									</div>
        									</a>

                                      	</div>
                                    </div>
                                </div>

                            </div>

                            <div className="his-her-name">
                        		<h2 className="text-center">JANGKOO<span className="last-name">-&nbsp;Lê Duy Khánh&nbsp;-</span></h2>
                                <div className="heart-wrapper">
                                	<div className="de-icon circle medium-size custom-heart">
            							<i className="de-icon-heart"></i>
            						</div>
                                </div>
                            </div>

                            <p className="blurb animation fadeInLeft text-center animated" >
                            	Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer ultrices malesuada ante quis pharetra. Nullam non bibendum dolor. Ut vel turpis accumsan, efficitur dolor fermentum, tincidunt metus. Etiam ut ultrices nibh.  Etiam aliquam mauris non hendrerit faucibus. Proin pulvinar congue  ex, vitae commodo. Phasellus condimentum, mi ut sodales gravida.
                            </p>

                        </div>

                        <div className="col-md-6">


                        	<div className="photo-item frame-border animation fadeInRight animated" >

                               	<img src="./app/images/her2.jpg" alt="" className="hover-animation image-zoom-in" />
                           		<div className="layer wh100 hidden-black-overlay hover-animation fade-in">
                            	</div>

                                <div className="layer wh100 hidden-link hover-animation delay1 fade-in">
                                    <div className="alignment">
                                    	<div className="v-align center-middle">

                                     		<a href="http://demo.dethemes.com/forever/versions/onepage/images/attachment-couple.jpg" className="magnific-zoom">
        										<div className="de-icon circle light medium-size inline">
            										<i className="de-icon-zoom-in"></i>
            									</div>
        									</a>

                                            <a className="magnific-ajax" href="http://demo.dethemes.com/forever/versions/onepage/her.html">
        										<div className="de-icon circle light medium-size inline">
            										<i className="de-icon-link"></i>
            									</div>
        									</a>

                                      	</div>
                                    </div>
                                </div>

                            </div>

                            <div className="his-her-name">
                        		<h2 className="text-center">NANCY<span className="last-name">-&nbsp;Hồ Thị Huyền Ngân&nbsp;-</span></h2>
                            </div>

                            <p className="blurb animation fadeInRight text-center animated" >
                            	Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer ultrices malesuada ante quis pharetra. Nullam non bibendum dolor. Ut vel turpis accumsan, efficitur dolor fermentum, tincidunt metus. Etiam ut ultrices nibh.  Etiam aliquam mauris non hendrerit faucibus. Proin pulvinar congue  ex, vitae commodo. Phasellus condimentum, mi ut sodales gravida.
                            </p>

                        </div>
                    </div>
                </div>
            </section>
           );
  }

}