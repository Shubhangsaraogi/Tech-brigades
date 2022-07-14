// function change1(){
//     document.getElementById('image').src="pic22.png";
// }
// function change2(){
//     document.getElementById('image').src="Stacey_Finley_v2.png";
// }
// function change3(){
//     document.getElementById('image').src="image7.png";
// }
// function change4(){
//     document.getElementById('image').src="image8.png";
// }
// // document.querySelector('.box  img').forEach(image =>{
// // //     image.onclick = () =>{
// // //         document.querySelector('.popup-image').style.display='block';
// // //         ocument.querySelector('.popup-image img').src = image.getAtrribute('src');
// // //     }
// // // });
// document.querySelector('.pic span').onclick = () =>{
//     document.getElementsByClassName('.pic').style.display='none';
// }
window.onload = () => {
    // (A) GET LIGHTBOX & ALL .ZOOMD IMAGES
    let all = document.getElementsByClassName("zoomD"),
        lightbox = document.getElementById("lightbox");
   
    // (B) CLICK TO SHOW IMAGE IN LIGHTBOX
    // * SIMPLY CLONE INTO LIGHTBOX & SHOW
    if (all.length>0) { for (let i of all) {
      i.onclick = () => {
        let clone = i.cloneNode();
        clone.className = "";
        lightbox.innerHTML = "";
        lightbox.appendChild(clone);
        lightbox.className = "show";
      };
    }}
   
    // (C) CLICK TO CLOSE LIGHTBOX
    lightbox.onclick = () => {
      lightbox.className = "";
    };
  };