import React from 'react';
import AwesomeSlider from 'react-awesome-slider';
import 'react-awesome-slider/dist/styles.css';
import './Carousel.css';
import CarouselImage from './CarouselImage';

export default function CarouselSlider() {
  const images = [
    {
      image: "https://www.advanceconsulting.com/wp-content/uploads/2020/03/Beautiful-Business.jpg",
      alt: "Image 1",
      note: "Small Startup Company tailored to help local Businesses"
    },
    {
      image: "https://www.esa.int/var/esa/storage/images/esa_multimedia/images/2019/10/business_with_esa/21093947-3-eng-GB/Business_with_ESA_pillars.jpg",
      alt: "Image 2"
    },
    {
      image: "https://assets.entrepreneur.com/content/3x2/2000/20150429160658-website-traffic.jpeg",
      alt: "Image 3"
    },
    {
      image: "https://upload.wikimedia.org/wikipedia/commons/e/e4/Latte_and_dark_coffee.jpg",
      alt: "Image 4"
    }
  ];

  return (
    <AwesomeSlider className="slider" animation="cubeAnimation" interval={1000}>
      {images.map((item, index) => (
        <div key={index}>
          <CarouselImage image={item.image} alt={item.alt} className="image" note={item.note} />
        </div>
      ))}
    </AwesomeSlider>
  );
}
