import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import {connect} from 'react-redux';
import { Router, Route, Switch} from 'react-router-dom';


function mapStateToProps(state) {
    return {
        notes: state.notes.notes,
    };
}

export default connect(mapStateToProps)(
  class Home extends Component {
    componentWillMout = () => {

    }

      render() {
        console.log(this.props);
          return (
              <div className="magic">
                <p>Home Page</p>
              </div>
          );
      }
    }
)
