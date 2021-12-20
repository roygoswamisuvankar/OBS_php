window.addEventListener('scroll',function()
{
    let navbar=this.document.getElementsByTagName("navbar");
    if(this.window.pageYOffset>=172)
    {
        navbar.classList.add("sticky");
    }
    else
    {
        navbar.classList.remove("fixed-bottom");
 
    }
})