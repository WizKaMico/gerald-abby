


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Gerald & Abegail Wedding</title>

<script src="https://cdn.tailwindcss.com"></script>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&family=Poppins:wght@300;400;500&display=swap" rel="stylesheet">

<style>
body { font-family: 'Poppins', sans-serif; scroll-behavior:smooth; }
h1,h2,h3 { font-family: 'Playfair Display', serif; }

/* PAGE LOADER */
#loader{position:fixed;inset:0;background:#6b8f71;display:flex;align-items:center;justify-content:center;color:white;z-index:99999;font-size:28px;letter-spacing:2px;}

/* Reveal animation */
.reveal { opacity:0; transform:translateY(60px); transition:all 1s ease; }
.reveal.active { opacity:1; transform:translateY(0); }

/* Parallax */
.parallax { background-attachment: fixed; background-size:cover; background-position:center; }

/* Slow zoom */
@keyframes slowZoom {0%{transform:scale(1);}100%{transform:scale(1.12);}}
.animate-slowZoom{animation:slowZoom 20s ease-in-out infinite alternate;}

/* Petals */
#petals { z-index: 10; pointer-events: none; }
.petal{position:absolute;top:-50px;width:18px;height:18px;background:#cfe3d5;border-radius:50% 50% 50% 0;opacity:0.7;animation:fall linear infinite;}
@keyframes fall{0%{transform:translateY(0) rotate(0);}100%{transform:translateY(120vh) rotate(360deg);}}

/* Lightbox */
.lightbox{position:fixed;inset:0;background:rgba(0,0,0,.95);display:none;align-items:center;justify-content:center;z-index:1000;touch-action:none;}
.lightbox img{max-width:90%;max-height:90%;transition:transform .3s ease;}

.section{padding:100px 20px;}

/* ================= CAROUSEL PREMIUM ANIMATION ================= */
.carousel-wrapper{position:relative;overflow:hidden;}
.carousel-slide{position:absolute;inset:0;opacity:0;transform:scale(1.08);transition:all 1s cubic-bezier(.4,0,.2,1);}
.carousel-slide.active{opacity:1;transform:scale(1);z-index:2;}

.carousel-text{opacity:0;transform:translateY(40px);transition:all .8s ease;}
.carousel-text.active{opacity:1;transform:translateY(0);}




/* elegant blur intro */
.blur-in{animation:blurIn 1.2s ease forwards;}
@keyframes blurIn{
  from{filter:blur(12px);opacity:0;}
  to{filter:blur(0);opacity:1;}
}

/* navigation buttons */
.carousel-btn{
  backdrop-filter: blur(6px);
  transition:all .3s ease;
}
.carousel-btn:hover{transform:scale(1.1);}

</style>
</head>
<body class="bg-[#f6fbf7] text-gray-700">

<div id="loader">Gerald & Abby</div>

<div id="intro" class="fixed inset-0 bg-[#6b8f71] flex items-center justify-center text-white z-[9999]">
  <div class="text-center blur-in">
    <img src="./style/component_image/flowers.png" class="w-small max-w-2xl mx-auto mb-6"/>
    <h1 class="text-4xl mb-6">You're Invited, <?php echo ucwords(strtolower(str_replace('_', ' ', $_GET['name'] ?? ''))); ?></h1>
    <button onclick="enterSite()" class="bg-white text-[#6b8f71] px-6 py-3 rounded-full">Enter Invitation</button>
  </div>
</div>

<nav class="fixed w-full bg-white/80 backdrop-blur shadow-sm z-50">
  <div class="max-w-6xl mx-auto px-6 py-4 flex justify-between items-center">
    <h1 class="text-xl font-semibold text-[#6b8f71]">Gerald & Abby</h1>
    <div class="space-x-6 hidden md:flex">
      <a href="#home" class="navlink">Home</a>
      <a href="#story" class="navlink">Our Story</a>
      <a href="#gallery" class="navlink">Gallery</a>
      <a href="#entourage" class="navlink">Wedding Flow</a>
      <a href="#event" class="navlink">Event</a>
      <a href="#rsvp" class="navlink">RSVP</a>
    </div>
    <button id="menuBtn" class="md:hidden text-2xl">☰</button>
  </div>
  <div id="mobileMenu" class="hidden flex flex-col bg-white px-6 pb-4 space-y-3 md:hidden">
    <a href="#story">Our Story</a>
    <a href="#gallery">Gallery</a>
    <a href="#entourage">Wedding Flow</a>
    <a href="#event">Event</a>
    <a href="#rsvp">RSVP</a>
  </div>
</nav>

<section id="home" class="relative min-h-screen flex items-center justify-center overflow-hidden">
  <div id="petals"></div>
  <img src="./style/img/upper.png" class="absolute inset-0 w-full h-full object-cover animate-slowZoom">
  <div class="absolute inset-0 bg-[#6b8f71]/70"></div>
  <div class="relative text-center text-white reveal">
    <h1 class="text-5xl mb-4">Gerald & Abby</h1>
    <img src="./style/component_image/flowers.png" class="w-small max-w-2xl mx-auto mb-6"/>
    <p class="mb-4">March 28, 2026</p>

    <div id="countdown" class="flex flex-wrap justify-center gap-6 text-center">
      <div><span id="days" class="text-3xl font-bold"></span><p>Days</p></div>
      <div><span id="hours" class="text-3xl font-bold"></span><p>Hours</p></div>
      <div><span id="minutes" class="text-3xl font-bold"></span><p>Minutes</p></div>
      <div><span id="seconds" class="text-3xl font-bold"></span><p>Seconds</p></div>
    </div>
  </div>
</section>

<!-- PREMIUM STORY CAROUSEL -->
<section id="story" class="section bg-white reveal">
   <h2 class="text-3xl mb-1 text-center text-[#6b8f71]">Our Story</h2>
   <img src="./style/component_image/flowers.png" class="w-small max-w-2xl mx-auto mb-6"/>
  <div class="max-w-6xl mx-auto md:grid md:grid-cols-2 gap-8 items-center">

    <div class="text-left">
      <div id="storyText" class="carousel-text active"></div>
    </div>

    <div class="relative carousel-wrapper h-[420px] rounded-xl shadow-xl">

      <div id="slidesContainer"></div>

      <button id="prevSlide" class="carousel-btn absolute top-1/2 left-3 -translate-y-1/2 bg-white/70 p-3 rounded-full shadow">‹</button>
      <button id="nextSlide" class="carousel-btn absolute top-1/2 right-3 -translate-y-1/2 bg-white/70 p-3 rounded-full shadow">›</button>

    </div>
  </div>
</section>

<!-- GALLERY -->
<section id="gallery" class="section bg-[#f0f7f2] reveal">
<h2 class="text-3xl mb-1 text-center text-[#6b8f71]">Gallery</h2>
<img src="./style/component_image/flowers.png" class="w-small max-w-2xl mx-auto mb-6"/>
<div class="grid sm:grid-cols-2 md:grid-cols-3 gap-6 max-w-6xl mx-auto">
<img src="./style/gallery/1e8d405f-a1f6-4093-ba4d-857d7a0b2b1e.png" onclick="openLightbox(this.src)" class="rounded-xl cursor-pointer">
<img src="./style/gallery/430afc7b-45b2-4e9e-bfc3-063213aca32e.png" onclick="openLightbox(this.src)" class="rounded-xl cursor-pointer">
<img src="./style/gallery/85091405-6402-4dee-8c84-b8e9b004b97c.png" onclick="openLightbox(this.src)" class="rounded-xl cursor-pointer">
<img src="./style/gallery/7f5732c6-680c-4a27-aee8-4a15e68c0e2c.png" onclick="openLightbox(this.src)" class="rounded-xl cursor-pointer">
<img src="./style/gallery/530e044b-b9ae-4e52-a52c-f32183acfb2e.png" onclick="openLightbox(this.src)" class="rounded-xl cursor-pointer">
<img src="./style/gallery/8c1ded32-2251-45dd-a16f-fe270c52a8b3.png" onclick="openLightbox(this.src)" class="rounded-xl cursor-pointer">
</div>
</section>

<!-- LIGHTBOX -->
<div id="lightbox" class="lightbox">
<img id="lightboxImg">
</div>

<!-- WEDDING FLOW TIMELINE -->
<section id="entourage" class="section bg-white reveal">
  <h2 class="text-3xl mb-2 text-center text-[#6b8f71]">Wedding Flow</h2>
  <img src="./style/component_image/flowers.png" class="w-small max-w-2xl mx-auto mb-10"/>

  <div class="max-w-4xl mx-auto relative">

    <!-- animated timeline line -->
    <div class="absolute left-1/2 top-0 bottom-0 w-[3px] bg-[#6b8f71]/20 overflow-hidden">
      <div class="timeline-progress bg-[#6b8f71]"></div>
    </div>

    <!-- ITEM 1 -->
    <div class="timeline-item mb-14 flex items-center justify-between w-full">
      <div class="w-1/2 pr-10 text-right">
        <h3 class="text-xl font-semibold text-[#6b8f71]">Guest Arrival</h3>
        <p class="text-gray-600">Welcome drinks & seating</p>
        <p class="text-gray-600">2:30 pm</p>
      </div>
      <div class="timeline-node relative z-10 w-12 h-12 bg-[#6b8f71] text-white flex items-center justify-center rounded-full shadow-lg">
        🕊️
      </div>
      <div class="w-1/2"></div>
    </div>

    <!-- ITEM 2 -->
    <div class="timeline-item mb-14 flex items-center justify-between w-full">
      <div class="w-1/2"></div>
      <div class="timeline-node relative z-10 w-12 h-12 bg-[#6b8f71] text-white flex items-center justify-center rounded-full shadow-lg">
        💍
      </div>
      <div class="w-1/2 pl-10 text-left">
        <h3 class="text-xl font-semibold text-[#6b8f71]">Wedding Ceremony</h3>
        <p class="text-gray-600">The moment we say \"I do\"</p>
        <p class="text-gray-600">3:00 pm</p>
      </div>
    </div>

    <!-- ITEM 3 -->
    <div class="timeline-item mb-14 flex items-center justify-between w-full">
      <div class="w-1/2 pr-10 text-right">
        <h3 class="text-xl font-semibold text-[#6b8f71]">Cocktails & Photos</h3>
        <p class="text-gray-600">Capture memories & mingle</p>
        <p class="text-gray-600">5:30 pm</p>
      </div>
      <div class="timeline-node relative z-10 w-12 h-12 bg-[#6b8f71] text-white flex items-center justify-center rounded-full shadow-lg">
        📸
      </div>
      <div class="w-1/2"></div>
    </div>

    <!-- ITEM 4 -->
    <div class="timeline-item flex items-center justify-between w-full">
      <div class="w-1/2"></div>
      <div class="timeline-node relative z-10 w-12 h-12 bg-[#6b8f71] text-white flex items-center justify-center rounded-full shadow-lg">
        🥂
      </div>
      <div class="w-1/2 pl-10 text-left">
        <h3 class="text-xl font-semibold text-[#6b8f71]">Dinner & Celebration</h3>
        <p class="text-gray-600">Reception, toasts & party</p>
        <p class="text-gray-600">7:00 pm</p>
      </div>
    </div>

  </div>
</section>


<!-- EVENT PARALLAX -->
<section id="event" class="section parallax text-white text-center" style="background-image:url('./style/gallery/image (2).png');">
<h2 class="text-4xl mb-4">Wedding Event</h2>
<img src="./style/component_image/flowers.png" class="w-small max-w-2xl mx-auto mb-10"/>
<p>Ceremony 3PM • Reception 7PM</p>
<a href="https://maps.app.goo.gl/vWZcXbUP35DbE7Au8?g_st=ic" target="_blank" class="mt-4 inline-block bg-white text-[#6b8f71] px-5 py-3 rounded-full">Open in Google Maps</a>
</section>

<!-- RSVP -->
<section id="rsvp" class="section bg-white text-center reveal">
<h2 class="text-3xl mb-6 text-[#6b8f71]">RSVP</h2>
<img src="./style/component_image/flowers.png" class="w-small max-w-2xl mx-auto mb-10"/>
<form action="https://script.google.com/macros/s/AKfycbzp_4PO8EzYoF8epyAlx7aZyX0e5jHSrOFpJDkfXm1xVAWOg9DaY1-BUSv1lp3LVwyZ/exec" method="POST" class="max-w-md mx-auto space-y-4">
<input name="name" placeholder="Your Name" class="w-full border p-3 rounded" value="<?php echo str_replace('_', ' ', $_GET['name'] ?? ''); ?>" readonly="">
<select name="attendance" class="w-full border p-3 rounded">
<option value="" disabled selected>Will you attend?</option>  
<option value="Yes">Yes, I will attend</option>
<option value="No">No, I cannot attend</option>
</select>  
<button class="bg-[#6b8f71] text-white px-6 py-3 rounded-full" style="width:100%;">Submit</button>
</form>
</section>

<!-- MUSIC -->
<audio autoplay loop>
<source src="music.mp3" type="audio/mpeg">
</audio>

<script>
window.addEventListener('load',()=>{loader.style.display='none';});
function enterSite(){ document.getElementById('intro').style.display='none'; }
menuBtn.onclick=()=>mobileMenu.classList.toggle('hidden');

const weddingDate=new Date("March 28, 2026 00:00:00").getTime();
setInterval(()=>{
let now=new Date().getTime();
let gap=weddingDate-now;

// navbar smooth scroll
document.querySelectorAll('.navlink').forEach(link=>{
link.addEventListener('click',function(e){
e.preventDefault();
document.querySelector(this.getAttribute('href')).scrollIntoView({behavior:'smooth'});
});
});

days.innerText=Math.floor(gap/(1000*60*60*24));
hours.innerText=Math.floor((gap%(1000*60*60*24))/(1000*60*60));
minutes.innerText=Math.floor((gap%(1000*60*60))/(1000*60));
seconds.innerText=Math.floor((gap%(1000*60))/1000);
},1000);

for(let i=0;i<30;i++){let p=document.createElement('div');p.className='petal';p.style.left=Math.random()*100+'vw';p.style.animationDuration=(6+Math.random()*6)+'s';petals.appendChild(p);} 

window.addEventListener('scroll',()=>{document.querySelectorAll('.reveal').forEach(el=>{if(el.getBoundingClientRect().top<window.innerHeight-100)el.classList.add('active');});});

/* ================= CAROUSEL LOGIC ================= */
const slides = [
  {
    image: "./style/img/7f5732c6-680c-4a27-aee8-4a15e68c0e2c.png",
    title: "First Meet",
    text: "Our story began during our college days, where friendship slowly turned into something deeper. Amid classes, shared laughs, and youthful dreams, we discovered a connection that felt natural and effortless—one that would quietly shape our future together. <br>"
  },
  {
    image: "./style/img/625015915_1294879222685126_853317249447206079_n.jpg",
    title: "He Proposed",
    text: "On October 12, 2013, he asked the question that changed everything. With a sincere heart and unwavering love, he proposed—turning a beautiful relationship into a promise of forever. It was a moment filled with joy, love, and the certainty that this was the beginning of our lifelong journey. <br>"
  },
  {
    image: "./style/img/85091405-6402-4dee-8c84-b8e9b004b97c.png",
    title: "Our Love Story",
    text: "For thirteen beautiful years, our love story has grown from college days into a lifetime promise. What started as friendship turned into a love built on laughter, patience, and countless shared moments. Through every season, we chose each other—learning, growing, and dreaming side by side. Thirteen years later, our hearts are still full, our love even stronger, and our forever just beginning <br>"
  }
];

const slidesContainer=document.getElementById('slidesContainer');
const storyText=document.getElementById('storyText');

slides.forEach((slide,i)=>{
  const div=document.createElement('div');
  div.className='carousel-slide'+(i===0?' active':'');
  div.innerHTML=`<img src="${slide.image}" class="w-full h-full object-cover rounded-xl">`;
  slidesContainer.appendChild(div);
});

let currentSlide=0;

function updateSlide(index){
  const slideEls=document.querySelectorAll('.carousel-slide');
  slideEls.forEach(el=>el.classList.remove('active'));
  slideEls[index].classList.add('active');

  storyText.classList.remove('active');
  setTimeout(()=>{
    storyText.innerHTML=`<h3 class='font-semibold text-[#6b8f71] text-xl mb-5'>${slides[index].title}</h3><p>${slides[index].text}</p>`;
    storyText.classList.add('active');
  },200);
}

updateSlide(0);

document.getElementById('nextSlide').onclick=()=>{
  currentSlide=(currentSlide+1)%slides.length;
  updateSlide(currentSlide);
};

document.getElementById('prevSlide').onclick=()=>{
  currentSlide=(currentSlide-1+slides.length)%slides.length;
  updateSlide(currentSlide);
};

setInterval(()=>{
  currentSlide=(currentSlide+1)%slides.length;
  updateSlide(currentSlide);
},6000);
</script>

</body>
</html>