
(function(){
	console.log("test");
    var menu = document.querySelector('.menu_profil');
    var as = menu.querySelectorAll('li');
    as.forEach(li => {
       li.addEventListener('click', function(e){
           if(this.classList.contains('active')){
               return false;
           }

           menu.querySelector('li .active').classList.remove('active');

           this.firstChild.classList.add('active');

           document.querySelector('.content.active').classList.remove('active');
           var attrHref = this.querySelector('a').getAttribute('href').split("#");
           document.getElementById(attrHref[1]).classList.add('active');
       })
    });
})(); 
