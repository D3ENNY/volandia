$(()=>{
    const path = window.location.origin + "/progetti/volandia"
    console.log(path);

    $('#user').attr('src', path+'/assets/img/icon.jpg');

    $('#user').click(()=>{
        let element = $('#account')
        element.toggleClass('hidden')
    })

    $(window).scroll(()=>{
        if(!$("#account").hasClass('hidden'))
            $('#account').addClass('hidden')
    })

    $('#register').click(()=>{
        window.location.replace(path+'/pages/register.php')
    })

    $('#login').click(()=>{
        window.location.replace(path+'/pages/login.php')
    })

    $("#home").click(()=>{
        window.location.replace(path+'/index.php')
    })

    $("#adminPanel").click(()=>{
        window.location.replace(path+'/pages/admin.php')
    })

    $('#hamburger').click(()=>{ 
        $('#adminNav').toggleClass('hidden')
    })

    $("#addFly").click(function (e) { 
        e.preventDefault();
        $.post(path+"/assets/components/admin/main.php",{
            request: "addFly"
        }, function (response) {
            console.log("debug")
        });
    });

    //--------------------------//

    $('#instagram').click(()=>{
        window.location.href ='https://www.instagram.com/d3enny_2004/'
    })

    $('#twitter').click(()=>{
        window.location.href = 'https://twitter.com/D3ENNY04'
    })

    $('#telegram').click(()=>{
        window.location.href = 'https://t.me/d3enny04'
    })
})
