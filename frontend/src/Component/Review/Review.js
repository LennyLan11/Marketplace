import React, { useState } from "react";
import './Review.css';
import ReviewHistory from "./ReviewHistory";

export default function Review() {
    // The form data state
    const [formData, setFormData] = useState({
        name: '',
        review: ''
    });

    const [responseMessage, setResponseMessage] = useState('');

    const handleFormSubmit = async (event) => {
        event.preventDefault(); // Prevent the page from refreshing

        try {
            const response = await fetch('http://localhost:80?api=second', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(formData),
            });

            if (!response.ok) {
                throw new Error('Failed to submit review');
            }

            const responseData = await response.json();
            setResponseMessage(responseData.message);

            setFormData({
                name: '',
                review: ''
            });
        } catch (error) {
            console.error('Error submitting review:', error);
        }
    };

    const handleInputChange = (event) => {
        const { name, value } = event.target;
        setFormData({
            ...formData,
            [name]: value
        });
    };

    return (
        <>
            <ReviewHistory />
            <div className="container">
                <div className="review-form">
                    <h2>Add A Review</h2>
                    <form onSubmit={handleFormSubmit}>
                        <input
                            type="text"
                            name="name"
                            placeholder="Your name"
                            value={formData.name}
                            onChange={handleInputChange}
                            required
                        />
                        <textarea
                            name="review"
                            placeholder="Your review"
                            value={formData.review}
                            onChange={handleInputChange}
                            required
                        ></textarea>
                        <button type="submit">Submit Review</button>
                    </form>
                    {responseMessage && <div className="response-message">{responseMessage}</div>}
                </div>
            </div>
        </>
    );
}
