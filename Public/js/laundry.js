//do home
window.addEventListener('popstate', function (event)
{
    window.location.assign(window.location.href.split('=')[0]+"=home");
})
