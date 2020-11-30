"use strict";

let app = new Vue({
    el: '#comments-box',
    data: {
        comments: []
    }
});

async function getComments() {
    let bikeId = document.getElementById("bike-id").value;
    try {
        let response = await fetch('api/comments/'+bikeId);
        if (response.ok) {
            let comments = await response.json();
            app.comments = comments;
            setTimeout(() => {
                let btns = document.getElementsByClassName("delete-comment");
                for (let i = 0; i < btns.length; i++) {
                    console.log(btns[i].id);
                    btns[i].addEventListener('click', () => {deleteComment(btns[i].id)});
                }
            }, 1000);
        }
    } catch (error) {
        console.log(error);
    }
}


async function deleteComment(id) {
    try {
        let response = await fetch('api/comment/'+id, {
            method: 'DELETE',
            header: 'Content-Type: application/json',
        });
        if (response.ok) {
            let msj = await response.json();
            console.log(msj);
            app.comments.pop();
        }
    } catch (error) {
        console.log(error);
    }
}

async function insertComment() {
    let comment = {
        id_usuario: document.querySelector("input[name='user-id']").value,
        id_bicicleta: document.querySelector("input[name='bike-id']").value,
        puntuacion: document.querySelector("input[name='punctuation']:checked").value,
        titulo: document.querySelector("input[name='title']").value,
        descripcion: document.querySelector("input[name='description']").value,
        usuario: document.querySelector("input[name='user']").value
    }
    try {
        let response = await fetch('api/comment', {
            method: 'POST',
            header: 'Content-Type: application/json',
            body: JSON.stringify(comment)
        });
        if (response.ok) {
            let comment = await response.json();
            console.log(comment);
            getComments();
        }
    } catch (error) {
        console.log(error);
    }
}

document.addEventListener('DOMContentLoaded', getComments());

document.querySelector("#comment-form-btn").addEventListener('click', insertComment);
