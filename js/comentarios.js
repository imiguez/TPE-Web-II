"use strict";



async function getComments() {
    try {
        let response = await fetch('api/comments');
        if (response.ok) {
            let comments = await response.json();
            console.log(comments);
        }
    } catch (error) {
        console.log(error);
    }

}

getComments();