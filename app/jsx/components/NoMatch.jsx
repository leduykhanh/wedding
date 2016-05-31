import React from 'react';
import {Alert} from  'react-bootstrap';

export default class NoMatch extends React.Component {

  constructor(){
    super()
  }
  componentWillMount(){
  }


  render() {
    return (
        <div className="container">
          <div className="row">
              <div className="col-md-12">
                  <div className="error-template">
                      <h1>Oops!</h1>
                      <div className="error-details">
                          {this.props.message?this.props.message:"Sorry, an error has occured, Requested page not found!"}
                      </div>
                      <div className="error-actions">
                          <a href="/app/dashboard" className="btn btn-primary btn-lg">
                          <span className="glyphicon glyphicon-home">
                          </span>
                              Go to Dashboard </a>
                              <a href="mailto:feedback@waach.com" className="btn btn-default btn-lg">
                              <span className="glyphicon glyphicon-envelope"></span> Contact Support </a>
                      </div>
                  </div>
              </div>
          </div>
      </div>

    );
  }
}