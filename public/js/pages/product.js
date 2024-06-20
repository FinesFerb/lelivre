// скрыть и открыть полностью
document.querySelector('#foo').addEventListener('click', addBlock);
let flag= 1;
function addBlock() {

    if(flag === 1){
        document.querySelector('#fools').classList.remove('fools');
        document.querySelector('#span-open').style.display = 'none';
        document.querySelector('#span-closed').style.display = 'block';
        document.querySelector('#svg-up-suc').classList.add('svg-up-suc');
        flag=2;
    } else {
        document.querySelector('#fools').classList.add('fools');
        document.querySelector('#span-open').style.display = 'block';
        document.querySelector('#span-closed').style.display = 'none';
        document.querySelector('#svg-up-suc').classList.remove('svg-up-suc');
        flag=1;
    }
}

// rating
const stars = document.querySelectorAll('#star');
let selectedRating = 0;

stars.forEach(star => {
    star.addEventListener('mouseover', handleMouseOver);
    star.addEventListener('mouseout', handleMouseOut);
    star.addEventListener('click', handleClick);
});

function handleMouseOver(event) {
    const value = event.target.getAttribute('data-value')
    highlightStars(value)
}

function handleMouseOut(event) {
    if (selectedRating) {
        highlightStars(selectedRating);
    } else {
        clearStars();
    }
}

function handleClick(event) {
    if (selectedRating === event.target.getAttribute('data-value')) {
        deleteRating();
    } else {
        selectedRating = event.target.getAttribute('data-value');
        highlightStars(selectedRating);
        saveRating(selectedRating);
    }
}

function highlightStars(value) {
    stars.forEach(star => {
        if (star.getAttribute('data-value') <= value) {
            star.style.backgroundImage = 'url(/img/icons/star_active.svg)';
        } else {
            star.style.backgroundImage = 'url(/img/icons/star.svg)';
        }
    });
}

function clearStars() {
    stars.forEach(star => {
        star.style.backgroundImage = 'url(/img/icons/star.svg)';
    });
}

function deleteRating() {
    const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content')
    const bookId = document.querySelector('.rating').getAttribute('data-book-id');
    fetch('/rating/delete', {
        method: 'DELETE',
        headers: {
            'Content-type': 'application/json',
            'X-CSRF-TOKEN': token
        },
        body: JSON.stringify({
            book_id: Number(bookId),
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            selectedRating = 0
            clearStars();
            updateRatingSummary();
        }
    })
    .catch(error => {
        console.error('Error:', error);
    });
}

function saveRating(rating) {
    const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content')
    const bookId = document.querySelector('.rating').getAttribute('data-book-id');
    fetch(`/rating/add`, {
        method: 'POST',
        headers: {
            'Content-type': 'application/json',
            'X-CSRF-TOKEN': token
        },
        redirect: 'follow',
        body: JSON.stringify({
            book_id: bookId,
            rating: rating
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.redirect) {
            window.location.href = data.redirect;
        }
        if (data.rating) {
            // console.log(data.message);
            updateRatingSummary();
        }
    })
    .catch(error => {
        console.error('Error:', error);
    });
}

function updateRatingSummary() {
    const book = document.querySelector('.rating').getAttribute('data-book-id');
    fetch(`/books/${book}/ratings-summary`, {
        method: 'GET',
        headers: {
            'Content-Type': 'application/json'
        }
    })
        .then(response => response.json())
        .then(data => {
            document.querySelector('.b-up1').textContent = `${data.averageRating ? Number(data.averageRating).toFixed(2) : 'Оценок пока нет'}`;
            document.querySelector('.right1-flex_total').textContent = `(${data.ratingsCount} оценки)`;
        })
        .catch(error => {
            console.error('Error:', error);
        });
}

fetchCurrentRating();

function fetchCurrentRating() {
    const book = document.querySelector('.rating').getAttribute('data-book-id');
    fetch(`/rating/current/${book}`, {
        method: 'GET',
        headers: {
            'Content-type': 'application/json'
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.rating) {
            selectedRating = data.rating;
            highlightStars(selectedRating);
        }
    })
    .catch(error => {
        console.error('Error:', error);
    });
}
