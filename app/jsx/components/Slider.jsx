import ImageGallery from 'react-image-gallery';
import React from 'react';

export default class Slider extends React.Component {

  handleImageLoad(event) {
    console.log('Image loaded ', event.target)
  }

  handlePlay() {
    this._imageGallery.play()
  }

  handlePause() {
    this._imageGallery.pause()
  }

  render() {

    const images = [
      {
        original: 'http://www.agentevolution.com/wp-content/uploads/2014/08/thumbnails.png',
        thumbnail: 'http://lorempixel.com/250/150/nature/1/',
        originalClass: 'featured-slide',
        thumbnailClass: 'featured-thumb',
        originalAlt: 'original-alt',
        thumbnailAlt: 'thumbnail-alt',
        size: 'Optional size (image size relative to the breakpoint)'
      },
      {
        original: 'http://www.agentevolution.com/wp-content/uploads/2014/08/thumbnails.png',
        thumbnail: 'http://lorempixel.com/250/150/nature/2/'
      },
      {
        original: 'http://www.agentevolution.com/wp-content/uploads/2014/08/thumbnails.png',
        thumbnail: 'http://lorempixel.com/250/150/nature/3/'
      }
    ]

    return (
      <div>
        <ImageGallery
          ref={i => this._imageGallery = i}
          items={images}
          slideInterval={10000}
          autoPlay={true}
          showThumbnails={true}
		  showBullets={true}
          disableArrowKeys={true}
          onImageLoad={this.handleImageLoad}/>

          <div className="slide-title-inner-wrapper">
            <div className="slide-title align-middle">
            
                <div className="container">
                    <div className="row">
                        <div className="col-md-offset-3 col-md-6 animation delay1 fadeInUp animated" >
                            
                            <div id="invited">
                                You're Invited
                            </div>
                            <div className="banner-text withlove medium light">
                                <h1>WE ARE GETTING MARRIED</h1>
                            </div>                                       
                            <div id="banner-date">
                                - JULY / 23RD / 2016 -
                            </div>     
                            
                        </div> 
                    </div>
                </div>
                
            </div> 
                                
          </div>
      </div>
    );
  }

}