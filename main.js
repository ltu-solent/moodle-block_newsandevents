var slides, imagecount, currentslide = 0, lastslide = -1;

window.onload = (event) => { 
    imagecount = document.getElementById("slidecount").value;
    slides = document.getElementsByClassName("mySlides");
    
    showSlides();    
    setInterval(function(){         
        showSlides();   
    }, 10000);
};

function currentSlide() {    
    if (currentslide +1 < imagecount) {
        lastslide = currentslide;
        currentslide ++;
    } else {
        lastslide = currentslide;
        currentslide = 0;
    }    
}

function showSlides() {  
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";  
    }  
    
    slides[currentslide].style.display = "block";
    currentSlide();
}

function plusSlides(n) {
    currentSlide();
    showSlides();
}

