const SET_NOTE = 'SET_NOTE'

const initialState = {
  notes: ['ddddd', 'ssss']
};

function rootReducer(state = initialState, action) {
  switch(action.type) {
    case SET_NOTE:
      return {
        notes: [
          ...state.notes,
          {
            title: action.title,
            content: action.content
          }
        ]
      };

    default:
      return state;
  };
}


export function setNotes(test) {
  return (dispatch) => {
    return dispatch({
      type: SET_NOTE,
      test,
    });
  };
}

export default rootReducer;
