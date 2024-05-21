import React from "react";
import "./Carousel.css"

export default function CarouselImage(props){ 
    return ( 
        <div>
            <img src={props.image} alt={props.alt} className={props.className} />
        </div>
    )
}