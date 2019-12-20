import React, { Component } from 'react'
import ReactDOM from 'react-dom';
import Home from './Home'
import { BrowserRouter, Route, Switch } from 'react-router-dom';
import Login from './Login'
import {Provider} from 'react-redux';
import configure from '../redux/store'

export default class App extends Component {
  render () {
    const {store} = configure();
    return (
       <Provider store={store}>
        <BrowserRouter>
          <Switch>
            <Route exact path='/' component={Home} />
            <Route path='/login' component={Login} />
          </Switch>
        </BrowserRouter>
       </Provider>

    )
  }
}

ReactDOM.render(<App />, document.getElementById('app'));
