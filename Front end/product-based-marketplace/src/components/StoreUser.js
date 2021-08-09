import React, {useState} from 'react';

//const initialState={};

export const Context = React.createContext();

const Store =({children}) =>{
    const [user,setUser]=useState();
    const [type,setType]=useState();

    return(
        <Context.Provider value={{user:[user,setUser],type:[type,setType]}}>{children}</Context.Provider>
    );
};

export default Store;

{/* <GameContext.Provider
 value={{ name: [name, setName], color: [color, setColor] }}
   >
  {props.children}
</GameContext.Provider>;

const { name, color } = React.useContext(GameContext);
const [nameValue, setnameValue] = name;
const [colorValue, setcolorValue] = color; */}