var id,div1content,div2content,heading;

a=[];
a=$(".content");
gsap.registerPlugin(ScrollTrigger);
gsap.from(".initial h1",{scrollTrigger:".initial",x:-300,delay:0.15, duration: 1,opacity:0.4});
gsap.from(".initial h2",{scrollTrigger:".initial",x:-300, duration: 1,opacity:0.4});
gsap.from(".initial p",{scrollTrigger:".initial",x:-300,delay:0.25, duration: 1,opacity:0.4});
gsap.from("."+a[0].classList[0]+" h1",{scrollTrigger:"."+a[0].classList[0],x:-300,delay:0.25, duration: 1.5,opacity:0.4});
gsap.from("."+a[0].classList[0]+" p",{scrollTrigger:"."+a[0].classList[0],x:-300, duration: 1.5,opacity:0.4});
for (var i = 1; i < a.length; i++) {
  gsap.from("."+a[i].classList[0]+" h1",{scrollTrigger:"."+a[i].classList[0],x:-300, duration: 2,opacity:0.2});
  gsap.from("."+a[i].classList[0]+" .l-card", {scrollTrigger:{trigger:"."+a[i].classList[0]},x:-300,y:100, duration: 2,opacity:0.2});
  gsap.from("."+a[i].classList[0]+" .r-card", {scrollTrigger:{trigger:"."+a[i].classList[0]},x:300,y:100, duration: 2,opacity:0.2});
}
$('.card__face--back').on('click', function(){
   id = $(this).data('div');
   heading=document.querySelectorAll(".heading")[id];
   document.querySelector(".modal-title").innerHTML=heading.innerHTML;
   div1content= document.querySelectorAll(".text_align")[id];
   div2content=document.querySelector(".modal-body");
   div2content.innerHTML=div1content.innerHTML;
});
