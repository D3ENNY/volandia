import { CryptManager } from "./crypt/CryptManager.js"
const cryptManager = new CryptManager()
var currentFilePath = window.location.origin + "/progetti/volandia/engine/client/"

$(()=>{

    $.getJSON(currentFilePath+"validatorJSON/editUser.json", (data) =>{
        localStorage.setItem("editUser", cryptManager.encrypt(JSON.stringify(data)))
    })

    //validazione username  
    $("#floating_username").on("input", (event) =>{
        let regex = new RegExp("^[a-zA-Z0-9\u00C0-\u00FF\s]+$")
        let input = $(event.target)
        let isValid = true

        input.val(input.val().capitalizeWord())

        for(let i of input.val().split(" "))
            if(!regex.test(i))
                isValid = false

        if(input.val().trim() === "" || !isValid) input.setError()
        else input.setSuccess()

        if(input.val() === "") input.setDefault()
        checkValidate()
    })

    

    //validazione email
    $("#floating_email").on("input", (event) => {
        let input = $(event.target)
        
        if(!validator.isEmail(input.val())) input.setError()
        else input.setSuccess()

        if(input.val() === "") input.setDefault()
        checkValidate()
    })

    //validazione password
    $("#floating_password").on("input", (event) => {
        let input = $(event.target);
        let errors = []
      
        if (input.val().length < 8) errors.push("La password deve contenere almeno 8 caratteri")
        
      
        if (!/[A-Z]/.test(input.val())) errors.push("La password deve contenere almeno una lettera maiuscola")
      
        if (!/[a-z]/.test(input.val())) errors.push("La password deve contenere almeno una lettera minuscola")
      
        if (!/\d/.test(input.val())) errors.push("La password deve contenere almeno un numero")
      
        if (!/[!@#$%^&*(),.?":{}|<>]/.test(input.val())) errors.push("La password deve contenere almeno un carattere speciale")
    
        if(errors.length != 0) input.setError()
        else input.setSuccess()

        if(input.val() === "") input.setDefault()
        checkValidate()
    })
 
    $("#register").on("click", (event)=>{
        if(!$("#register").prop("disabled"))
            localStorage.removeItem("register")
    })
})

let checkValidate = () =>{
    let json = JSON.parse(cryptManager.decrypt(localStorage.getItem("editUser")))
    let flag = true
    $.each(json, (i, data) =>{
        if(data != true) flag=false
    })

    if(flag) $("#register").setEnabled()
    else $("#register").setDisabled()
}

$.fn.setEnabled = function () {
    this.prop("disabled", false)
}

$.fn.setDisabled = function () {
    this.prop("disabled", true)
}

$.fn.setError = function(){
    this.css('background-color', '#ff000020')
    let json = JSON.parse(cryptManager.decrypt(localStorage.getItem("editUser")))
    json[this.prop("id")] = false
    localStorage.setItem("editUser", cryptManager.encrypt(JSON.stringify(json)))
}

$.fn.setSuccess = function() {
    this.css('background-color','#00ff0020')
    let json = JSON.parse(cryptManager.decrypt(localStorage.getItem("editUser")))
    json[this.prop("id")] = true
    localStorage.setItem("editUser", cryptManager.encrypt(JSON.stringify(json)))
}

$.fn.setDefault = function(){
    this.css('background-color', 'rgba(0,0,0,0)')
    let json = JSON.parse(cryptManager.decrypt(localStorage.getItem("editUser")))
    json[this.prop("id")] = null
    localStorage.setItem("editUser", cryptManager.encrypt(JSON.stringify(json)))
}

String.prototype.capitalizeWord = function(){
    return this.split(' ').map(word => word.charAt(0).toUpperCase() + word.slice(1)).join(' ');
}
