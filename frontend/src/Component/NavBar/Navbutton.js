import React, {useState} from "react";


export default function Navbutton(props) {
    return <h1 className=".navbar-btn" onClick={props.onClick}>{
        props.name
        }</h1>;
}
