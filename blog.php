<?php
header("Content-type: text/css"); // Set the content type as CSS

// PHP code to generate dynamic CSS properties
$color = 'blue';
?>
h2 {
    margin-left: 2%;
    font-size: 3rem;
}
h4 {
    margin-left: 2%;
    font-size: 2.5rem;
}

body {
    font-family: 'Arial', sans-serif;
    margin: 0;
    padding: 0;
   
    /* Replace with your background image URL */
    background-size: cover;

    /* Adjust the blur effect */
    position: relative;
}

section {
    max-width: 800px;
    margin: 100px auto;
    
    padding: 20px;
    background-color: rgba(255, 255, 255, 0.4);
    /* Semi-transparent white */
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    backdrop-filter: blur(10px);
    /* Apply blur to the background */
}



/* Add this CSS to your existing styles or create a new stylesheet */

article p {
    width: 95%;
    margin-left: 3%;
    text-align-last: left;
    text-align: justify;
    line-height: 1.6;
    font-size: 1.1rem;
}

article a {
    color: #007bff;
    text-decoration: none;
    font-weight: 600;
    display: inline-block;
    margin-top: 10px;
    /* Add spacing between the paragraph and the "Read more" link */
}

article a:hover {
    text-decoration: underline;
}

article {
    padding-bottom: 20px;
    /* Adjust the padding to achieve the desired spacing at the bottom of the article */
}

.content {
    display: flex;
    flex-direction: column;


}

.sub {
    width: 95%;
    margin-left: 3%;
    text-align-last: left;
    text-align: justify;
    line-height: 1.6;
    font-size: 1.1rem;
    font-weight: 500;

}

.share-section {
    display: flex;
   
    justify-content:space-between;
    flex-wrap: wrap;
    align-items: center;
    max-width: 800px;
    margin: 20px auto;
    padding: 20px;
    background-color: rgba(255, 255, 255, 0.4);
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    backdrop-filter: blur(10px);
}


.share-section a,
form {
    display: block;
    margin-top: 10px;
    text-decoration: none;
    color: #007bff;
}

.share-section a:hover {
    text-decoration: underline;
    color: black;
    transform: scale(1.2);
}

.comment-section {
    max-width: 800px;
    margin: 20px auto;
    padding: 20px;
    background-color: rgba(255, 255, 255, 0.4);
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    backdrop-filter: blur(10px);
}

.comment-section h3 {
    font-size: 1.5rem;
    margin-bottom: 15px;
}

.comment-form {
    display: grid;
    gap: 15px;
}

.comment-form label {
    font-size: 1rem;
    font-weight: bold;
}

.comment-form input,
.comment-form textarea {
    width: 90%;
    padding: 10px;
    font-size: 1rem;
    border: 1px solid #ccc;
    border-radius: 5px;
}

.comment-form textarea {
    resize: vertical;
}

.comment-form input[type="submit"] {
    background-color: #031B64;
    color: #fff;
    cursor: pointer;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    font-size: 1rem;
    width: min-content;
}

.comment-form input[type="submit"]:hover {
    background-color: #7CAFD5;
}

.comments {
    margin-top: 20px;
}

.comment {
    margin-bottom: 20px;
}

.comment h4 {
    font-size: 1.2rem;
    margin-bottom: 5px;
}

.comment p {
    font-size: 1rem;
    line-height: 1.4;
}

.comment-date {
    font-size: 0.9rem;
    color: #555;
}
/* ... Your existing styles ... */

/* New styles for the related blogs section */
.related-blogs {
display: flex;
justify-content: space-between;
margin: 20px 0;
}

.blog-box {
flex: 0 0 48%;
max-width: 48%;
padding: 20px;
background-color: rgba(255, 255, 255, 0.8);
border-radius: 8px;
box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
text-align: center;
box-sizing: border-box;
margin-top: 20px;
}

.blog-box h3 {
font-size: 1.5rem;
margin-bottom: 10px;
}

.blog-box p {
text-align: left;
font-size: 1rem;
margin-bottom: 15px;
}

.blog-box a {
display: block;
background-color: #031B64;
color: #fff;
padding: 10px;
text-decoration: none;
border-radius: 5px;
transition: background-color 0.3s ease;
}

.blog-box a:hover {
background-color: #7CAFD5;
}

/* Additional styling for the related blogs section */
.related-blogs h2 {
font-size: 2rem;
margin-bottom: 20px;
}

/* Media query for smaller screens */
@media (max-width: 768px) {
.related-blogs {
flex-direction: column;
align-items: center;
}

.blog-box {
flex: 0 0 100%;
max-width: 100%;
}
}

/* ... Your existing styles ... */
