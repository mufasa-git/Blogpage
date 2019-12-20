import {createStore, applyMiddleware, compose, combineReducers} from 'redux'
import {persistStore, persistReducer} from 'redux-persist'
import thunk from 'redux-thunk'
import storage from 'redux-persist/lib/storage'
import notes from './modules/notes'

const persistConfig = {
    key: 'root',
    storage,
    // stateReconciler: hardSet,
};

const rootReducer = combineReducers({
    notes,
});

const persistedReducer = persistReducer(persistConfig, rootReducer);

export default function configureStore() {
    const store = createStore(
        persistedReducer,
        compose(
            applyMiddleware(thunk),
            window.__REDUX_DEVTOOLS_EXTENSION__ && window.__REDUX_DEVTOOLS_EXTENSION__(),
        )
    );

    const persistor = persistStore(store);
    // persistor.purge();
    return {store, persistor};
}
